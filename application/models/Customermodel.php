<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customercontrol
 *
 * @author FRANK
 */
class Customermodel extends CI_Model{
    //put your code here
      function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
//    stores the customer information
//    returns the array set
    public function store_customers($firstname, $surname, $user_id, $gender, $age, $residential_address, $business_address, $state, $local_govt, $email = Null, $phone, $next_of_kin, $kin_age, $kin_phone, $kin_gender, $relationship, $marketer_id, $acc_no, $passport) {
        
        $input = array(
            'user_id' => $user_id,
            'firstname'=> $firstname,
            'lastname' => $surname,
            'phone_number' => $phone,
            'residential_address' => $residential_address,
            'bussiness_address' => $business_address,
            'passport_id' => $passport,
            'account_number' => $acc_no,
            'next_of_kin' => $next_of_kin,
            'next_of_kin_phone' => $kin_phone,
            'relationship_to_next_of_kin' => $relationship,
            'next_of_kin_age' => $kin_age,
            'next_of_kin_gender' => $kin_gender,
            'marketer_id' => $marketer_id,
            'state_id' => $state,
            'local_govt_id' => $local_govt
        );
        
        $insert = $this->db->insert('customers', $input);
        return $insert;
    } 
    
//    gets the customer information
//    returns array of information from the specified customer row
       public function get_customer_vars($user_id = FALSE) {
        
        if (!$user_id) {
            return FALSE;
        }else{
            $this->db->select('*')
                    ->from('customers')
                        ->join('uploads' , 'uploads.passport_id = customers.passport_id')
                            ->join('staff', 'customers.marketer_id = staff_id')
                                 ->join('account', 'account.account_number = customers.account_number')
                                       ->where('customers.user_id', $user_id);
            
            $query = $this->db->get()->result_array();
        }
        
        
        return $query;
    }
//checks if account number exists
//    returns array of information from the customer table if 
//    account number is valid else returns false
      public function check_account_number($acc_no) {
        
 $this->db->select('*')
                ->from('customers')
                    ->where('account_number', $acc_no);
        
        $query = $this->db->get();
      if ($query->num_rows() <= 0) {
          return FALSE;
      }
      
      return $query->result_array();
    }
//stores the customer information
//    checks if the account number exists
//    returns false if it does, else
//     returns the customer id
    public function create_customer($email = null, $acc_no, $username) {
        
        $input = array(
            'email' => $email,
            'pass' => $acc_no,
            'username' => $username
        );
        
        $insert = $this->db->insert('aauth_users', $input);
        
        $this->db->select('*')
                ->from('aauth_users')
                    ->where('pass', $acc_no);
        
        $row = $this->db->get();
        
        if ($row->num_rows() <= 0) {
            return FALSE;
        }
        
        if ($insert) {
            
            $this->db->select('id')
                    ->from('aauth_users')
                        ->where('pass', $acc_no);
            
            $query = $this->db->get()->result();
        }
        
        return $query;
    }
    
//    stores the account information in the account table
//    returns the stored information
        public function store_account($acc_name, $acc_number) {
        
        $input = array(
            'account_name' => $acc_name,
            'account_number' => $acc_number
        );
        
        return  $this->db->insert('account', $input);
    }
    
//    gets transaction history of the specified account
//    returns the array set
    public function get_transaction_history($account_id, $limit) {
        
        $this->db->select('*')
                ->from('history')
                    ->where('account_id', $account_id)
                        ->order_by('id', 'DESC')
                           ->limit($limit);
        
            return $this->db->get()->result_array();
    }

//    gets all customer information
//    returns the array set
    public function get_customer_info() {
        
        $this->db->select('*')
                ->from('customers')
                    ->order_by('id', 'DESC');
        
           return $this->db->get()->result_array();
    }
    
    public function get_all_transaction($value) {
        
              $this->db->select('*')
                 ->from('staff')
                    ->join('customers', 'customers.marketer_id = staff.staff_id')
                        ->join('account', 'account.account_number = customers.account_number')
                            ->join('history', 'history.account_id = account.id')
                                ->order_by('history.id', 'DESC')
                                    ->limit($value);
              
              return  $this->db->get()->result_array();

    }
    
    public function get_no($value) {
        return  $this->db->count_all($value);
    }
    
    public function get_staff_no($value) {
       
     $query =   $this->db->where($value, 1)
              ->count_all_results('staff');
        
      return $query;
    }
    
    public function client_no($staff_id) {
        
        $query = $this->db->where('marketer_id', $staff_id)
                ->count_all_results('customers');
        
        return $query;
    }
    
}
