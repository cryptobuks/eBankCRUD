<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaranmodel extends CI_Model {
    public function processTransfer($id, $user_detailid, $transact_to, $transact_date, $transact_time, $transact_name, $transact_desc, $transact_nominal, $transact_status){
        $this->db->query("
         INSERT INTO history_transaction(`id`, `user_detailid`, `transact_date`, `transact_time`, `transact_type`, `transact_desc`, `transact_nominal`, `transact_status`, `transact_rek`, `transact_name`) 
         VALUES('$id-a', $user_detailid, '$transact_date', '$transact_time', 0, '$transact_desc', '$transact_nominal', $transact_status, $transact_to,'$transact_name'),
         ('$id-b', $transact_to , '$transact_date', '$transact_time', 1 , '$transact_desc', '$transact_nominal', $transact_status, $user_detailid , '$transact_name')");
    }


    public function saveAccountNumberToDb($uid, $number){
        $this->db->query("INSERT INTO list_saved_account_pembayaran(id, from_account, target_account)
                          VALUES(NULL, $uid, $number)");
    }

    public function  showSavedAccountNumber($uid){
        $data = $this->db->query("SELECT DISTINCT target_account FROM list_saved_account_pembayaran WHERE from_account = $uid ORDER BY target_account");
        return $data->result();
    }
}