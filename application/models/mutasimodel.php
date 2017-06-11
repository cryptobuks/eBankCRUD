<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasimodel extends CI_Model {
    public function loadmutasi($user_account){
        $data = $this->db->select('id ,transact_date,transact_time,transact_rek,transact_type,transact_desc,transact_nominal,transact_status,transact_name')
            ->from('history_transaction')
            ->where('user_detailid',$user_account)
            ->or_where('transact_rek', $user_account)
            ->get();

        return $data;
    }
}
