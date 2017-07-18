
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Staffcontrol.php';
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
class Staffpages extends Staffcontrol{  

    function __construct(){
    parent::__construct();
    $this->load->model('Customermodel');
    }    
//services page
public function services() {
        $this->load->view('layouts/header');
        $this->load->view('pages/services');
        $this->load->view('layouts/footer');
}

//marketer page
    public function marketers() {
        
        if ($this->aauth->is_loggedin()) {
            
            //gets the staff information to be displayed on the page
           $data['staff_info'] = $this->Staffmodel->get_staff_information($this->uri->segment(3));
           //gets the customer info to be displayed on the page
           $data['customer_info'] = $this->Staffmodel->get_staff_clients($this->uri->segment(3));
           $data['clients'] = $this->Customermodel->client_no($this->uri->segment(3));
           $data['title'] = 'Pat Micro Finance Cooperative Society Limited | '.$data['staff_info'][0]['staff_surname'].' '.$data['staff_info'][0]['staff_firstname'];
            $this->load->view('pages/staff_profile', $data);  
//      
        }else{
            redirect(base_url('home'));
        }
        
    }
//admin profile
      public function profile() {
          $data['staff_info'] = $this->Staffmodel->get_staff_information($this->uri->segment(3));
          $data['all_staff'] = $this->Staffmodel->get_staff();
          $data['title'] = 'Pat Micro Finance Cooperative Society Limited | '.$data['staff_info'][0]['staff_surname'].' '.$data['staff_info'][0]['staff_firstname'];
        $this->load->view('admin/admin_profile', $data);
    }
//   admin settings 
       public function settings() {
        $this->load->view('admin/admin_settings');
    }

//cpanel clock card page
public function cpanel_clock_card() {
    if ($this->aauth->is_loggedin()) {
    $data['info'] = $this->Staffmodel->get_signed_in_staff();
    $data['staff_info'] = $this->Staffmodel->get_staff_information($this->uri->segment(3));
    $data['customer_no'] = $this->Customermodel->get_no('customers');
    $data['history_no'] = $this->Customermodel->get_no('history');
    $data['staff_online'] = $this->Customermodel->get_staff_no('online_status');
    $data['staff_atwork'] = $this->Customermodel->get_staff_no('clocking_status');
    $data['title'] = 'Pat Micro Finance Cooperative Society Limited | clocking card';
     $this->load->view('admin/cpanel_clock_card', $data);
    }else{
        redirect(base_url('home'));
    }

}

//cpanel staff at work page
public function cpanel_staffatwork() {
    if ($this->aauth->is_loggedin()) {
            $data['info'] = $this->Staffmodel->get_signed_in_staff();
            $data['title'] = 'Pat Micro Finance Cooperative Society Limited | staff at work';
     $this->load->view('admin/cpanel_staffatwork', $data);
    }else{
        redirect(base_url('home'));
    }

}

//cpanel staff online page
public function cpanel_staffonline() {
    if ($this->aauth->is_loggedin()){
         $data['at_work'] = $this->Staffmodel->get_signed_in_staff();
  $data['online'] = $this->Staffmodel->get_loggedin_in_staff(); 
  $data['title'] = 'Pat Micro Finance Cooperative Society Limited | staff online';
     $this->load->view('admin/cpanel_staffonline', $data);
    }else{
        redirect(base_url('home'));
    }
  
}

}

