<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transfermodel extends CI_Model {
    public function processTransfer($id, $user_detailid, $transact_to, $transact_date, $transact_time, $transact_name, $transact_desc, $transact_nominal, $transact_status){
        $this->db->query("
         INSERT INTO history_transaction(`id`, `user_detailid`, `transact_date`, `transact_time`, `transact_type`, `transact_desc`, `transact_nominal`, `transact_status`, `transact_rek`, `transact_name`) 
         VALUES('$id-a', $user_detailid, '$transact_date', '$transact_time', 0, '$transact_desc', '$transact_nominal', $transact_status, $transact_to,'$transact_name'),
         ('$id-b', $transact_to , '$transact_date', '$transact_time', 1 , '$transact_desc', '$transact_nominal', $transact_status, $user_detailid , '$transact_name')");
    }

    public function checkTransferTo($uid){
        $query = $this->db->query("SELECT transact_name FROM history_transaction WHERE  id = '$uid'");

        $row = $query->row()->transact_name;

        if(strcasecmp($row,"Transfer ke Rekening Bank Lain")==0){
            return 0;
        }else
        if(strcasecmp($row,"Transfer ke Rekening CRUD")==0){
            return 1;
        }else
        if(strcasecmp($row,"Pembayaran Internet")==0){
            return 2;
        }else
        if(strcasecmp($row,"Pembayaran Telepon")==0){
            return 3;
        }else
        if(strcasecmp($row,"Pembayaran Kartu Kredit")==0){
            return 4;
        }
    }

    public function saveAccountNumberToDb($uid, $number, $type){
        $this->db->query("INSERT INTO list_saved_account(id, from_account, target_account, target_type)
                          VALUES(NULL, $uid, $number, $type )");
    }

    public function  showSavedAccountNumber($uid){
        $data = $this->db->query("SELECT DISTINCT target_account FROM list_Saved_Account WHERE from_account = $uid ORDER BY target_account");
        return $data->result();
    }

    public function checkBalance($uid){
        $data = $this->db->query("SELECT balance FROM user_detail WHERE userid = $uid ");
        return $data->row()->balance;
    }

}