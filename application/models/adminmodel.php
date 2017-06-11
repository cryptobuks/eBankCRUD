<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminmodel extends CI_Model {
    public function addUser($userAccount, $hashedPassword, $salt, $userDetailId, $firstName, $lastName, $gender, $realDob, $phone, $email, $address, $city
        , $cardType, $balance){

        $dateNow = date("Y-m-d");

        $this->db->query("INSERT INTO user_login  VALUES('$userAccount', '$hashedPassword', '$salt', NULL, $userDetailId, 0)");
        $this->db->query("INSERT INTO user_detail 
            VALUES($userDetailId,
                    '$firstName',
                    '$lastName',
                    '$gender', 
                    '$realDob', 
                    '$phone', 
                    '$email', 
                    '$address', 
                    '$city', 
                    '$dateNow', 
                    '$cardType', 
                    $balance)");

    }
}
