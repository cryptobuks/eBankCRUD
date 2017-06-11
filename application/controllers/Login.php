<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function index($flag = null){

	    $islogged = $this->session->userdata('logged');
	    if(strcmp($islogged, "true")==0){
	        //if loggedin but tryin to acces login redirect to main
	        redirect('/index.php/');
        }

	    $data['cdn']          = $this->load->view('include/cdn', NULL, TRUE);
	    $data['login_left']   = $this->load->view('include/login/login_left', NULL, TRUE);
        $data['login_right']  = $this->load->view('include/login/login_right', array('flags' => $flag), TRUE);         //flag for wrong idpass
        $data['style_login']  = $this->load->view('include/login/user_style_login', NULL, TRUE);
	    $data['login_script'] = $this->load->view('include/login/login_script', NULL, TRUE);

		$this->load->view('login/index.php', $data);
	}

	public function go(){
	    $uid = $this->input->post('userid');
	    $pw  = $this->input->post('password');

	    $this->load->model('usermodel');
	    $data = $this->usermodel->checklogin($uid, $pw);

	    if($data->num_rows()>0){
            foreach ($data->result() as $line){
                $userid     = $line->user_account;
                $password   = $line->user_password;
                $salt       = $line->user_salt;
                $fullName   = $line->first_name." ".$line->last_name;
                $lastlogin  = $line->user_lastlogin;
                $detailID   = $line->user_detailid;
                $priveledge = $line->user_priveledge;
                $gender     = $line->gender;
                $dob        = $line->dob;
                $phone      = $line->phone;
                $email      = $line->email;
                $address    = $line->address;
                $city       = $line->city;
                $accCreated = $line->account_created;
                $card_type  = $line->card_type;
                $balance    = $line->balance;
            }

            //sha1 encrypt
            $hashed = sha1($pw.$salt);
            if(strcmp($password, $hashed)==0){
                //raw date
                $raw  = date('d M Y h:i:s A', time());

                //save lastlogin to db
                $lastlogintodb = $raw;
                $this->usermodel->addlastlogin($userid, $lastlogintodb);

                //set session
                $usersession =
                    array('userid'      => $userid,
                          'fullname'    => $fullName,
                          'logged'      => 'true',
                          'lastlogin'   => $lastlogin,
                          'currenttime' => $raw,
                          'detailID'    => $detailID,
                          'priveledge'  => $priveledge,
                          'gender'      => $gender,
                          'dob'         => $dob,
                          'phone'       => $phone,
                          'email'       => $email,
                          'address'     => $address,
                          'city'        => $city,
                          'accCreated'  => $accCreated,
                          'card_type'   => $card_type,
                          'balance'     => $balance);

                $this->session->set_userdata($usersession);
                if(strcmp($userid, "admin")==0){
                    $this->session->set_userdata('admin', 1);
                }
                redirect('/index.php/');
            } else {
                //found but wrong Password
                $flag = "0";
                $this->index($flag);
            }
        } else{
	        //user id notFound
            $flag = "0";
	        $this->index($flag);
        }
    }
}
