<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Indexmodel
 *
 * @author FRANK
 */
class Staffmodel extends CI_Model{
    //put your code here
     function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
//    gets data from state table
//    returns the array set of the state table
    public function get_state() {
         if (empty($id)) {
           $this->db->select('*')
                   ->from('state');                  
           return $this->db->get()->result_array();
       }else {
          
           $getQuery = $this->db->get_where('state' ,array('id_no'=>$id));
    return $getQuery->result_array();
              }
    }
    
//    gets data from lga table
//    returns the array set of the lga state
        public function getLga($option) {
                  $this->db->select('*')
                        ->from('local_govt')
                            ->where('state_id', $option);
           return $this->db->get()->result_array(); 
      
    }
    
//    stores staff information
//    returns the array set
    public function store_staff($email, $username, $user_id, $firstname, $surname, $address, $qualification, $state, $local_govt, $phone, $next_of_kin, $kin_phone, $relationship, $kin_age, $kin_gender, $passport, $gender, $staff_id) {
        
        $input = array(
            
            'staff_user_id' => $user_id, 
            'staff_firstname' => $firstname,
            'staff_surname' => $surname,
            'staff_id' => $staff_id,
            'gender' => $gender,
            'residential_address' => $address,
            'qualification' => $qualification,
            'email' => $email,
            'staff_phone_number' => $phone,
            'next_of_kin' => $next_of_kin,
            'next_of_kin_phone' => $kin_phone,
            'relationship_to_next_of_kin' => $relationship,
            'state_id' => $state,
            'local_govt_id' => $local_govt,
            'passport_id' => $passport,
            'next_of_kin_age' => $kin_age,
            'next_of_kin_gender' => $kin_gender
        );
        
        $insert = $this->db->insert('staff', $input);
        return $insert;
    }
    
//    stores the name and unique time to the uploads table
//    returns the array sdet
    public function store_passport($newFileName, $time) {
        $input = array(
            
            'passport_name'=>$newFileName,
            'passport_id'=>$time
        );
         $insert = $this->db->insert('uploads', $input);
        return $insert;
    }
    
//    gets staff information from the staff table
//    returns the array set
    public function get_staff_vars($user_id) {
        
        if (!$user_id) {

            return FALSE;
        }else{
            $this->db->select('*')
                    ->from('staff')
                        ->where('staff_user_id', $user_id);
            
            $query = $this->db->get()->result_array();
        }
        
        return $query;
    }
    
//     checks if unique staff id already exits
//    returns false if staff id exis, else returns true
    public function check_staff_id($id) {
        
        $this->db->select('*')
                ->from('staff')
                    ->where('staff_id', $id);
        
        $query = $this->db->get();
      if ($query->num_rows() <= 0) {
          return FALSE;
      }
      
      return TRUE;
    }
    
//    gets staff information , along side uploads information
//    returns the array set
    public function get_staff_information($staff_id) {
        
        $this->db->select('*')
                ->from('staff')
                    ->join('uploads' , 'uploads.passport_id = staff.passport_id')
                           ->where('staff_id', $staff_id);
                
            return $this->db->get()->result_array();
    }
    
//    gets each set of client for a particular staff
//    returns the array set
    public function get_staff_clients($staff_id) {
        
        $this->db->select('*')
                 ->from('customers')
                   ->join('account' , 'account.account_number = customers.account_number')
                      ->where('marketer_id', $staff_id);
       
        return $this->db->get()->result_array();
    }
    
//    gets current account balance
//    returns the current account balance of a specified account
    public function get_current_balance($acc_no) {
        
        $this->db->select('*')
                ->from('account')
                    ->where('account_number', $acc_no);
        $query = $this->db->get();
        if ($query->num_rows() <= 0){
            return FALSE;
        }
        $row = $query->result_array();
        return $row[0]['account_balance'];
    }
    
//    get no of debit
//    returns the number of times an account is debited monthly
    public function get_no_debit($acc_no) {
        
        $this->db->select('*')
                ->from('account')
                    ->where('account_number', $acc_no);
        $query = $this->db->get();
   
        $row = $query->result_array();
        return $row[0]['no_of_debit'];
    }
    
//    credits the specified account
//    returns the current time of transaction
    public function credit_account($acc_no, $balance, $amount, $staff_user_id) {
        
        $this->db->set('account_balance', $balance)
                  ->where('account_number', $acc_no)
                    ->update('account');
        
        $time = date("Y-m-d H:i:s");
        
        $this->update_transaction_history($acc_no, $balance, $amount, 2, $time);
        $this->update_last_transaction($time, $acc_no, $staff_user_id);
        
          return $time;
    }
    
//    debits the specifiec account
//    returns the current time of transaction
    public function debit_account($acc_no, $balance, $amount, $staff_user_id, $no_of_debit) {
        
        $this->db->set('account_balance', $balance)
                    ->set('no_of_debit', $no_of_debit)
                      ->where('account_number', $acc_no)
                         ->update('account');
        
        $time = date("Y-m-d H:i:s");
        
        $this->update_transaction_history($acc_no, $balance, $amount, 1, $time);
        $this->update_last_transaction($time, $acc_no, $staff_user_id);
        
          return $time;
    }
    
//    updates the time of the last transaction
//    returns the current time of transaction
    public function update_last_transaction($time, $acc_no, $staff_user_id) {
                   
            $this->db->set('last_transaction', $time)
                    ->where('account_number', $acc_no)
                        ->update('customers');
            
            $this->db->set('staff_last_transaction', $time)
                    ->where('staff_user_id', $staff_user_id)
                        ->update('staff');

                return $time;
        
    }
    
//    stores each transaction history of the application
//    returns time of the transaction
    public function update_transaction_history($acc_no, $balance, $amount, $type, $time) {
        
         $this->db->select('*')
                ->from('account')
                    ->where('account_number', $acc_no);
                    
            $query = $this->db->get();
            $row = $query->result_array();
            $acc_id = $row[0]['id'];
            
            $input = array(
                'account_id' => $acc_id,
                'balance' => $balance,
                'amount' => $amount,
                'transaction_type' => $type,
                'date' => $time
            );
        
            $this->db->insert('history', $input);
            
            return $time;
    }
    
//   gets user id
//    gets user id from admin id
//    returns false if password is not valid
//    returns user id if other wise
    public function get_user_id($admin_id) {    
        
        $this->db->select('*')
                ->from('staff')
                    ->where('staff_id', $admin_id);
        
         $query = $this->db->get();
         if ($query->num_rows() <= 0) {
             return FALSE;
         }
         return $query->result_array();
    }
    
//    updates clocking status 
//    updates time of  sign in
//    returns time of sign in
    public function update_sign_in($staff_id, $value) {
        
    $time = date("Y-m-d H:i:s");
    
        $this->db->set('clocking_status', $value)
                ->set('clocked_in_time', $time)
                    ->where('staff_id', $staff_id)
                        ->update('staff');
        
                $this->store_clocking_record($staff_id, $value, $time);
//                $this->auto_sign_out($staff_id, time());
            return $time;
    }
//    automatically signs a staff out after seven hours
//    return time of sign out
    public function auto_sign_out($staff_id, $sign_in_time) {
           
//        $expire_time = time() + 5;
//        if ($expire_time > $sign_in_time){         
//            $this->db->set('clocking_status', 0)
//                    ->set('clocked_in_time', date("Y-m-d H:i:s"))
//                        ->where('staff_id', $staff_id)
//                            ->update('staff');
//        }
        
        
    }
    
 //    updates sign in status 
//    returns the value passed
    public function update_login($id, $value) {

            if (strlen($id) === 1 || strlen($id) === 2){
                $this->db->set('online_status', $value)
                    ->where('staff_user_id', $id)
                        ->update('staff');
            }elseif (strlen($id) === 4) {
                 $this->db->set('online_status', $value)
                    ->where('staff_id', $id)
                       ->update('staff');
            }else{
                return FALSE;
            }
            return $value;
        }

            
    
//    stores clocking record
    public function store_clocking_record($staff_id, $value, $time) {
        
        $sign_in_input = array(
            'staff_id' => $staff_id,
            'sign_in_time' => $time
        );
        
        $sign_out_input = array(
            'staff_id' => $staff_id,
            'sign_out_time' => $time
        );
        
        switch ($value) {
            case 1:
                $this->db->insert('clocking_record', $sign_in_input);
                break;
            case 0:
                $this->db->insert('clocking_record', $sign_out_input);
                break;
            default:
                return FALSE;
                break;
        }
        
    }
    
//   checks for signed in staff
//    returns array of information
    public function get_signed_in_staff() {
        
        $this->db->select('*')
                ->from('staff')
                    ->where('clocking_status', 1);
        
            return  $this->db->get()->result_array();
    }
    
//  checks for loggedin staff
//    returns array of information
    public function get_loggedin_in_staff() {
        
          $this->db->select('*')
                 ->from('staff')
                      ->where('online_status', 1);
        
            return  $this->db->get()->result_array();
    }
    
//    gets all the account balance
//    returns the array set
    public function get_all_balance() {
        
        $this->db->select('*')
                ->from('account');
             
        return  $this->db->get()->result_array();
    }
    
    public function update_account($balance, $id) {
        
        $this->db->set('account_balance', $balance)
                ->set('no_of_debit', NULL)
                  ->where('id', $id)
                    ->update('account');
    }
    
//    updates staff password
    public function update_password($hashed_password, $user_id) {
        $this->db->set('pass', $hashed_password)
                ->where('id', $user_id)
                    ->update('aauth_users');
    }
    
//    gets all the staff information
//    returns the array set
    public function get_staff() {
        
          if (empty($id)) {
           $this->db->select('*')
                   ->from('staff');                  
           return $this->db->get()->result_array();
       }else {
          
           $getQuery = $this->db->get_where('staff' ,array('id'=>$id));
    return $getQuery->result_array();
              }
    }
//    gets specified customer information
//    returns the array set
    public function get_customer_var($acc_no = array()) {
        $this->db->select('*')
                ->from('customers')
                    ->where('account_number', $acc_no);
        
            return  $this->db->get()->result_array();
    }
}
