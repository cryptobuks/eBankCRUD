<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrasimodel extends CI_Model {
    public function changeEmail($detailID, $newEmail){
        $this->db->query("UPDATE user_detail SET email = '$newEmail' WHERE userid = $detailID");
    }
}
