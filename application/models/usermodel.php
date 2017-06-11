<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {
	public function checklogin($user_account){
	    $data = $this->db->query(
            "SELECT a.user_account, a.user_password, a.user_salt, a.user_lastlogin, a.user_detailid, a.user_priveledge,
                    b.first_name, b.last_name, b.gender, b.dob, b.phone, b.email, b.address, b.city, b.account_created, b.card_type, b.balance
             FROM user_login as a join user_detail as b on a.user_detailid = b.userid
             WHERE user_account = '$user_account'"
        );

	    return $data;
    }

    public function addlastlogin($user_account, $lastlogin){
	    $this->db->query("UPDATE user_login SET user_lastlogin = '$lastlogin' WHERE user_account = '$user_account'");
    }

    public function getBalance($accountNumberTo = NULL){
        //get current balance from db
        //if parameter passed return accountNumberTo balance
        //if parameter not passed return accountNumber balance
        if($accountNumberTo == NULL){
            $where = $this->session->userdata('detailID');
        } else{
            $where = $accountNumberTo;
        }

        //logic get balance if account exist or not
        $query   = $this->db->query("SELECT balance FROM user_detail WHERE userid   = $where");
        if($query->num_rows() == 0 ){
            $row = 0;
        } else{
            $row = $query->row()->balance;
        }

        return $row;
    }

    public function getPasswordAndSalt($where){
        $query = $this->db->query("SELECT user_password, user_salt FROM user_login WHERE user_account = '$where'");
        return $query;
    }

    public function getEmail($where){
        $query = $this->db->query("SELECT email FROM user_detail WHERE userid = $where");
        return $query->row()->email;
    }

    public function getFullname($where){
        $query = $this->db->query("SELECT concat(first_name,\" \", last_name) AS name FROM user_detail WHERE userid = $where");
        return $query->row()->name;
    }

    public function isAccountExist($accountNumberTo){
        //is accountNumberTo exist in db?
        //exist 1
        $query        = $this->db->query("SELECT userid FROM user_detail WHERE userid = $accountNumberTo");
        return $exist = $query->num_rows();
    }

    public function updateBalance($nominal, $accountNumberTo){
        $exist          = $this->isAccountExist($accountNumberTo);
        $accountNumber  = $this->session->userdata('detailID');
        $currentBalance = $this->getBalance();

        $willMinus      = $currentBalance-$nominal;
        $willAdd        = $this->getBalance($accountNumberTo)+$nominal;

        if($exist==1){
            //minus balance for accountNumber
            //add balace for accountNumberTo
            $this->db->query("UPDATE user_detail SET balance=$willMinus WHERE userid = $accountNumber");
            $this->db->query("UPDATE user_detail SET balance=$willAdd   WHERE userid = $accountNumberTo");
        }else{
            $this->db->query("UPDATE user_detail SET balance=$willMinus WHERE userid = $accountNumber");
        }
    }
}
