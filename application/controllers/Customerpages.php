<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Customercontrol.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pages
 *
 * @author FRANK
 */
class Customerpages extends Customercontrol{

    public function staff_single() {
        
        $this->load->view('admin/cpanel_staffsingle');
    }


//home page
public function home() {
    
    $data['title'] = 'Pat Micro Finance Cooperative Society Limited | home';
    $this->load->view('layouts/header', $data);
    $this->load->view('pages/home');
    $this->load->view('layouts/footer');
}

//404 page
public function page_404() {
        $this->load->view('layouts/header');
        $this->load->view('errors/_404');
        $this->load->view('layouts/footer');
}
//contact form page
public function contactform() {
    $data['title'] = 'Pat Micro Finance Cooperative Society Limited | contact';
        $this->load->view('layouts/header', $data);
        $this->load->view('pages/contactform');
        $this->load->view('layouts/footer');
}
//services page
public function services() {
    
    $data['title'] = 'Pat Micro Finance Cooperative Society Limited | services';
        $this->load->view('layouts/header', $data);
        $this->load->view('pages/services');
        $this->load->view('layouts/footer');
}

//marketer page
    public function marketers() {
        
        if ($this->aauth->is_loggedin()) {
            
            $this->Staffmodel->get_staff_information($id);
            $this->load->view('pages/staff_profile');
            
        }else{
            redirect(base_url('home'));
        }
        
    }

//staff login page
public function login() {
      $data['title'] = 'Pat Micro Finance Cooperative Society Limited | login';
       $this->load->view('pages/login', $data);
	  
       
}
//admin index page
public function cpanel_index() {
    if ($this->aauth->is_loggedin()) {
        $data['staff_info'] = $this->Staffmodel->get_staff_information($this->uri->segment(3));
    $data['history'] = $this->Customermodel->get_all_transaction(10);
    $data['customer_no'] = $this->Customermodel->get_no('customers');
    $data['history_no'] = $this->Customermodel->get_no('history');
    $data['staff_online'] = $this->Customermodel->get_staff_no('online_status');
    $data['staff_atwork'] = $this->Customermodel->get_staff_no('clocking_status');
    $data['title'] =  'Pat Micro Finance Cooperative Society Limited | admin | index';
    $this->load->view('admin/cpanel_index', $data); 
    }else{
        redirect(base_url('home'));
    }
   
}

//cpanel transaction page
public function cpanel_transaction() {
    
    if ($this->aauth->is_loggedin()){
        $data['staff_info'] = $this->Staffmodel->get_staff_information($this->uri->segment(3));
         $data['customer_no'] = $this->Customermodel->get_no('customers');
    $data['history_no'] = $this->Customermodel->get_no('history');
    $data['staff_online'] = $this->Customermodel->get_staff_no('online_status');
    $data['staff_atwork'] = $this->Customermodel->get_staff_no('clocking_status');
    $data['title'] = 'Pat Micro Finance Cooperative Society Limited | monthly deduction';
     $this->load->view('admin/cpanel_transaction', $data);
    }else{
        redirect(base_url('home'));
    }
   
}
//cpanel history page
public function cpanel_allhistory() {
    if ($this->aauth->is_loggedin()){
        $data['staff_info'] = $this->Staffmodel->get_staff_information($this->uri->segment(3));
    $data['history'] = $this->Customermodel->get_all_transaction(10);
    $data['customer_no'] = $this->Customermodel->get_no('customers');
    $data['history_no'] = $this->Customermodel->get_no('history');
    $data['staff_online'] = $this->Customermodel->get_staff_no('online_status');
    $data['staff_atwork'] = $this->Customermodel->get_staff_no('clocking_status');
    $data['title'] = 'Pat Micro Finance Cooperative Society Limited | all transaction history';
     $this->load->view('admin/cpanel_allhistory', $data); 
    }else{
        redirect(base_url('home'));
    }
  
}

     
//cpanel customers page
public function cpanel_customers() {
    if ($this->aauth->is_loggedin()){
         $data['info'] = $this->Customermodel->get_customer_info();
         $data['title'] = 'Pat Micro Finance Cooperative Society Limited | customers';
     $this->load->view('admin/cpanel_customers', $data);
    }else{
        redirect(base_url('home'));
    }
   
}

//cpanel customer single page
public function cpanel_customersingle() {
    if ($this->aauth->is_loggedin()) {
        $data['staff_info'] = $this->Staffmodel->get_staff_information($this->uri->segment(4));
        $data['info'] = $this->Customermodel->get_customer_vars($this->uri->segment(5));
       $data['history'] = $this->Customermodel->get_transaction_history($data['info'][0]['id'], 5);
       $data['title'] = 'Pat Micro Finance Cooperative Society Limited | '.$data['info'][0]['firstname'].' '.$data['info'][0]['lastname'];
     $this->load->view('admin/cpanel_customersingle', $data);
    }  else {
        redirect(base_url('home'));
    }
        
}

public function cpanel_totalhistory() {
      if ($this->aauth->is_loggedin()){
          $data['history'] = $this->Customermodel->get_all_transaction(NULL);
          $data['title'] = 'Pat Micro Finance Cooperative Society Limited | all history';
                $this->load->view('admin/cpanel_totalhistory', $data);
            } else {
            redirect(base_url('home')); 
         }
}

public function history_single() {
    $data['info'] = $this->Customermodel->get_customer_vars($this->uri->segment(4));
    $data['history'] = $this->Customermodel->get_transaction_history($data['info'][0]['id'], NULL);
    $data['title'] = 'Pat Micro Finance Cooperative Society Limited | ';
    $this->load->view('admin/history_single', $data);
}
}
