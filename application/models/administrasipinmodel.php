<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrasipinmodel extends CI_Model {
    public function changePassword($detailID, $newPassword){
        $this->db->query("UPDATE user_login SET user_password = '$newPassword' WHERE user_account = '$detailID'");
    }
}
