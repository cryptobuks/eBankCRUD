<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historymodel extends CI_Model {
    public function loadhistory($user_account){
        $data = $this->db->select('id ,transact_date,transact_time,transact_rek,transact_type,transact_desc,transact_nominal,transact_status,transact_name')
            ->from('history_transaction')
            ->where('user_detailid',$user_account)
            ->where('transact_type',0)
            ->get();

        return $data;
    }

    public function loadbuktiTr($noreff){
        $data = $this->db->select('id ,transact_date,transact_time,transact_rek,transact_type,transact_desc,transact_nominal,transact_status,transact_name,first_name,last_name')
            ->from('history_transaction')
            ->join('user_detail','history_transaction.transact_rek = user_detail.userid')
            ->where('id',$noreff)->get();

        return $data;
    }

    public function loadbuktiTrToNon($noreff){
        $data = $this->db->select('id ,transact_date,transact_time,transact_rek,transact_type,transact_desc,transact_nominal,transact_status,transact_name')
            ->from('history_transaction')
            ->where('id',$noreff)->get();

        return $data;
    }

    public function loadbuktiTrPembayaran($noreff){
        $data = $this->db->select('id ,transact_date,transact_time,transact_rek,transact_type,transact_desc,transact_nominal,transact_status,transact_name')
            ->from('history_transaction')
            ->where('id',$noreff)->get();

        return $data;
    }
}
