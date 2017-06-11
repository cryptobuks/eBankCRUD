<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class add extends CI_Controller{
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

    public function index($flagSuccess = 10){
        $logged = $this->checkLoggedin();

        if($logged == true){

            //set userdata session to variables
            $data['fullname']   = $this->session->userdata('fullname');
            $data['userid']     = $this->session->userdata('userid');

            //if admin
            $data['admin']      = $this->session->userdata('admin');

            //set static pages to variables(data)
            $data['cdn']        = $this->load->view('include/cdn', NULL, TRUE);
            $data['style']      = $this->load->view('include/main/user_style', NULL, TRUE);
            $data['header']     = $this->load->view('include/main/header', NULL, TRUE);
            $data['footer']     = $this->load->view('include/main/footer', NULL, TRUE);
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

            $data['form']       = $this->load->view('include/admin/add/form', array('success' => $flagSuccess), TRUE);

            $this->load->view('admin/add.php', $data);
        }
    }

    public function generateSalt(){
        $characters = '0123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
        $salt = "";
        $charactersLength = strlen($characters);
        for ($i = 0; $i < 5; $i++) {
            $salt .= $characters[rand(0, $charactersLength - 1)];
        }
        return $salt;
    }


    public function addUser(){
        $userAccount  = $this->input->post('userAccount');
        $userPassword = $this->input->post('userPassword');
        $userDetailId = $this->input->post('userDetailId');

        $salt = $this->generateSalt();
        $hashedPassword = sha1($userPassword.$salt);

        $firstName    = $this->input->post('firstName');
        $lastName     = $this->input->post('lastName');
        $gender       = $this->input->post('gender');
        $dob          = strtotime($this->input->post('dob'));
        $realDob      = date('Y-m-d', $dob);
        $phone        = $this->input->post('phone');
        $email        = $this->input->post('email');
        $address      = $this->input->post('address');
        $city         = $this->input->post('city');
        $cardType     = $this->input->post('cardType');
        $balance      = $this->input->post('balance');


        $this->load->model('adminmodel');
        $this->adminmodel->addUser($userAccount, $hashedPassword, $salt, $userDetailId, $firstName, $lastName, $gender, $realDob, $phone, $email, $address, $city
        , $cardType, $balance);

        $this->index(1);
        $this->session->set_flashdata('added', 1);

    }
}