<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class History extends CI_Controller{
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

        $uid 				 = $data['detailID'];
        $dataHistory 		 = $this->loadData($uid);
        $data['dataHistory'] = $dataHistory->result();

        $data['datatablez']  = $this->load->view('include/main/history/datatablez', array('dataHistory' => $data['dataHistory']), TRUE);

        return $data;
    }

    public function index(){
        $logged = $this->checkLoggedin();

        if($logged == true){
            $data = $this->getAllUserData();

            $this->load->view('main/history.php', $data);
        }
    }

    public function loadData($uid){

        $this->load->model('historymodel');
        $dataHistory = $this->historymodel->loadhistory($uid);

        return $dataHistory;
    }
}