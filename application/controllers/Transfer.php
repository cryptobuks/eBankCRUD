<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class transfer extends CI_Controller{
     public function checkLoggedin(){
         $isLogged = $this->session->userdata('logged');

         $logged = NULL;

         if(strcmp($isLogged, "true")!=0){
             //not loggedin but try to access this page, redirect
             redirect('/index.php/login');
         } else{
             $logged = true;
         }

         return $logged;
     }

     public function getAllUserData(){
         //set userdata session to variables
         $data['fullname']   = $this->session->userdata('fullname');
         $data['userid']     = $this->session->userdata('userid');
         $data['detailID']   = $this->session->userdata('detailID');

         //if admin
         $data['admin']      = $this->session->userdata('admin');

         $this->load->model('transfermodel');
         $data['saved']      = $this->transfermodel->showSavedAccountNumber($data['detailID']);

         //set static pages to variables(data)
         $data['cdn']        = $this->load->view('include/cdn', NULL, TRUE);
         $data['style']      = $this->load->view('include/main/user_style', NULL, TRUE);
         $data['header']     = $this->load->view('include/main/header', NULL, TRUE);
         $data['form']       = $this->load->view('include/main/transfer/form', array('detailID' => $data['detailID'], 'save' => $data['saved']), TRUE);
         $data['footer']     = $this->load->view('include/main/footer', NULL, TRUE);
         $data['form_js']    = $this->load->view('include/main/js_formFunction_transfer', NULL, TRUE);
         $data['bottom_cdn'] = $this->load->view('include/main/bottom_cdn', NULL, TRUE);

         //rawtime is rawtime of lastlogin
         $rawtime            = $this->session->userdata('lastlogin');
         $data['time']       = substr($rawtime, -11);
         $data['day']        = substr($rawtime, 0, 11);

         //realrawtime is rawtime of current date
         $realrawtime        = $this->session->userdata('currenttime');
         $data['current']    = substr($realrawtime, 0, 11);

         //send data to static pages because static pages need to calling variables
         $data['sidebar']    = $this->load->view('include/main/sidebar',   array('fullname' => $data['fullname'], 'admin' => $data['admin']), TRUE);
         $data['basicInfo']  = $this->load->view('include/main/basic_info', array('current' => $data['current'], 'userid' => $data['userid'], 'day' => $data['day'], 'time' => $data['time']), TRUE);

         return $data;
     }

     public function generateOTP($length = 5) {
         $characters        = '0123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
         $charactersLength  = strlen($characters);
         $randomString      = "Kode OTP(One Time Password) anda adalah: ";
         for ($i = 0; $i < $length; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
         $otpCode           = substr($randomString, -5);

         //get user phone number from userdata
         $destination = $this->session->userdata('phone');

         //begin of call mesabot library To send SMS
         $this->load->library('Mesabot');
         try {
             $data = [
                 'destination' => $destination,
                 'text' => $randomString
             ];

             $mesabot = new Mesabot();
             $mesabot->sms($data);
             echo($mesabot->response());
         } catch (Exception $e) {
             echo $e->getMessage();
         }
         //end of call mesabot library To send SMS

         $this->session->set_userdata('otp', $otpCode);
     }

     //begin of ajax function
     public function checkNumberExist(){
         $entered = $this->input->post("number");
         $this->load->model("usermodel");
         $result  = $this->usermodel->isAccountExist($entered);

         echo $response = ($result == 1 ? 1:0);
     }

     public function getFullname(){
         $entered = $this->input->post("number");
         $this->load->model("usermodel");
         $result  = $this->usermodel->getFullname($entered);

         echo $result;
     }

     public function transferItself(){
         $entered = $this->input->post('number');
         if(strcmp($entered, $this->session->userdata('detailID'))==0){
             echo 1;
         }else echo 0;
     }

     public function checkOTP(){
         $entered = $_POST["otp"];
         $realOTP = $this->session->userdata('otp');

         if(strcmp($entered, $realOTP)==0){
             echo "1";
         } else echo "0";
     }

     public function saveAccountNumber(){
         $uid     = $this->session->userdata('detailID');
         $entered = $this->input->post('number');
         $type    = $this->input->post('target');
         $this->load->model('transfermodel');
         $this->transfermodel->saveAccountNumberToDb($uid, $entered, $type);
     }

     public function checkBalance(){
         $uid     = $this->session->userdata('detailID');
         $this->load->model('transfermodel');
         $entered = $this->input->post('number');
         $balance = $this->transfermodel->checkBalance($uid);

         if($balance-$entered <= 0 ){
             echo 0; //cant
         } else{
             echo 1;
         }

     }
     //end of ajax function

     public function test(){
         echo $this->session->userdata('otp');
     }

     public function index(){
         $logged = $this->checkLoggedin();

         if($logged == true){
             $data = $this->getAllUserData();
             $this->load->view('main/transfer.php', $data);
         }
     }
}