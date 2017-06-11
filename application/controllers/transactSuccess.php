<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transactSuccess extends CI_Controller {

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

        //if admin
        $data['admin']      = $this->session->userdata('admin');

        //set static pages to variables
        $data['cdn']        = $this->load->view('include/cdn', NULL, TRUE);
        $data['bottom_cdn'] = $this->load->view('include/main/bottom_cdn', NULL, TRUE);
        $data['style']      = $this->load->view('include/main/user_style', NULL, TRUE);
        $data['header']     = $this->load->view('include/main/header', NULL, TRUE);
        $data['footer']     = $this->load->view('include/main/footer', NULL, TRUE);

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


        $uid = $this->session->flashdata('refID');

        $this->load->model('transfermodel');

        //logic if its NOT pembayaran
        if($this->input->post('description') != ""){
            $checkTo             = $this->transfermodel->checkTransferTo($uid);
            $dataHistory         = $this->loadData($uid, $checkTo);

            $data['dataHistory'] = $dataHistory;
            $data['successForm'] = $this->load->view('include/main/buktiTr/form', array('dataHistory' => $data['dataHistory'], 'exist' => $checkTo), TRUE);
        }else if($this->input->post('description') == ""){
            //pembayaran
            $checkTo             = 2;
            $dataHistory         = $this->loadData($uid, $checkTo);
            $type                = $this->input->post('transactType');

            $data['dataHistory'] = $dataHistory;
            $data['successForm'] = $this->load->view('include/main/transactSuccess/form', array('dataHistory' => $data['dataHistory'], 'exist' => $checkTo, 'type' => $type), TRUE);
        }

        return $data;
    }

    public function loadData($uid, $checkTo){

        $this->load->model('historymodel');
        $dataHistory = $this->historymodel->loadbuktiTr($uid);

        if($checkTo == 0){
            $dataHistory = $this->historymodel->loadbuktiTrToNon($uid);
        }else if($checkTo == 1){
            $dataHistory = $this->historymodel->loadbuktiTr($uid);
        } else if($checkTo == 2){
            $dataHistory = $this->historymodel->loadbuktiTrPembayaran($uid);
        }

        if($dataHistory->num_rows()>0){foreach ($dataHistory->result() as $line) {return $line;}}
        return $dataHistory;
    }

    public function generateIDReference(){
        //generate string for id in history
        $characters       = '0123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $halfCity         = substr($this->session->userdata('city'), 0, 4);
        $halfID           = substr($this->session->userdata('detailID'),-3);
        $halfDate         = date("md");
        $random           = "";
        for ($i = 0; $i < 5; $i++) {
            $random .= $characters[rand(0, $charactersLength - 1)];
        }

        $refCode = $halfCity.$halfID."-".$halfDate.$random;

        return $refCode;
    }

    public function transactFinish(){
        $numberTo        = $this->input->post('creditNumber');
        $selectedNumber  = $this->input->post('selectedNumber');
        //logic determine account number to transaction
        if(isset($numberTo)){
            $accountNumberTo = $numberTo;
        }else if(isset($selectedNumber)){
            $accountNumberTo = $selectedNumber;
        }
        $refID           = $this->generateIDReference();
        $ownAccount      = $this->session->userdata('detailID');
        $datenow         = date('Y-m-d');
        $time            = date("H:i");
        $type            = $this->input->post('transactType');
        $description     = $this->input->post('description');
        $nominal         = $this->input->post('nominal');
        $status          = 1;

        //transferModel save to history
        $this->load->model('transfermodel');
        $this->transfermodel->processTransfer($refID, $ownAccount, $accountNumberTo, $datenow, $time, $type, $description, $nominal, $status);

        //userModel update balance currentAccount & accountTo
        $this->load->model('usermodel');
        $this->usermodel->updateBalance($nominal, $accountNumberTo);
        $this->session->unset_userdata('otp');
        $this->session->set_flashdata('refID', $refID."-a");

        //send email
        $this->load->model('usermodel');
        $exist = $this->usermodel->isAccountExist($accountNumberTo);
        if($exist == 1) {
            $ownTo = $this->usermodel->getFullname($accountNumberTo);
        }else if($exist == 0){
            if($description==""){
                $ownTo = $type;
            }else{
                $ownTo = "Rekening Bank Lain";
            }
        }

        $data['emailData']   = $this->load->view('include/email/emaildata.php', array(
                'fullName'  => $this->session->userdata('fullname'),
                'refid'     => $refID,
                'date'      => $datenow,
                'time'      => $time,
                'numberTo'  => $accountNumberTo,
                'nominal'   => number_format($nominal, 0,",", "."),
                'ownTo'     => $ownTo,
                'desc'      => $description
            ) ,TRUE);

        $ci                  = get_instance();
        $config['protocol']  = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "";  //change this
        $config['smtp_pass'] = "";  //and this
        $config['charset']   = "utf-8";
        $config['mailtype']  = "html";
        $config['newline']   = "\r\n";

        $ci->email->initialize($config);
        $ci->email->from('crudbank@gmail.com', 'CRUD BANK');
        $list     = array('malik.abdul@student.umn.ac.id');
        $ci->email->to($list);
        $ci->email->subject('Bukti Transaksi');

        $msg  = $this->load->view('email/mail.php', $data, TRUE);
        $ci->email->message($msg);
        if ($this->email->send()) {echo 'Email sent.';} else {show_error($this->email->print_debugger());}
        //end of send email
    }


    public function index(){
        $logged = $this->checkLoggedin();

        if($logged == true){
            $this->transactFinish();
            $data = $this->getAllUserData();

            echo $this->session->userdata('phone');
            $this->load->view('main/transactSuccess.php', $data);
        }
    }
}
