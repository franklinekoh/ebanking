<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Staffcontrol.php';
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
class Customercontrol extends Staffcontrol{

   function __construct(){
    parent::__construct();
        $this->load->model(array('Customermodel', 'Staffmodel'));
 
}

//validates customer information
//if validation is true 
//stores to database
public function customer_reg() {
    
    $this->form_validation->set_rules("Cfirstname", "text", "required");
    $this->form_validation->set_rules("Clastname", "text", "required");
    $this->form_validation->set_rules("Caccount_name", "text", "required");
    $this->form_validation->set_rules("Cgender", "text", "required");
    $this->form_validation->set_rules("Cage", "text", "required");
    $this->form_validation->set_rules("Cresidential_address", "text", "required");
    $this->form_validation->set_rules("Cbusiness_address", "text", "required");
    $this->form_validation->set_rules("Cstate", "text", "required");
    $this->form_validation->set_rules("Clocal_govt", "text", "required");
    $this->form_validation->set_rules("Cemail", "email", "");
    $this->form_validation->set_rules("Cphone", "tel", "required|min_length[11]", array('min_length' => '<strong>Invalid phone number</strong>, Phone number should not be less than 11 characters.'));
    $this->form_validation->set_rules("Cnext_of_kin", "text", "required");
    $this->form_validation->set_rules("Ckin_age", "text", "required");
    $this->form_validation->set_rules("Ckin_gender", "text", "required");
    $this->form_validation->set_rules("Ckin_phone", "tel", "required|min_length[11]", array('min_length' => '<strong>Invalid phone number</strong>, Phone number should not be less than 11 characters.'));
    $this->form_validation->set_rules("Crelationship", "text", "required");
    $this->form_validation->set_rules("Cmarketer_id", "text", "required|min_length[4]|max_length[4]", array('min_length' => 'Admin ID should be not be less than four(4) characters in length', 'max_length' => 'Admin ID should be not be more than four(4) characters in length'));
    $this->form_validation->set_rules("Cpassport", "text", "");
    
    if ($this->form_validation->run() === true) {
        
        $email = $this->input->post(html_escape('Cemail'));
        $username = $this->input->post(html_escape('Caccount_name'));
        $acc_no = date('y').$acc_no = rand(10, 99999999);
        
         $passport = $this->upload($_FILES['Cpassport']);
        
        if ($passport == FALSE) {
            return FALSE;
        }
        
        $user_id = $this->aauth->create_user($email, $acc_no, $username);
        
           if ($user_id == FALSE) {
//                        $this->aauth->print_errors();
                switch ($this->aauth->print_errors()) {
                    case 'Account already exists on the system with that username. Please enter a different username, or if you forgot your password, please click the link below.':
                                
            $this->session->set_flashdata('error','Account already exists on the system with that username. Please enter a different username, or if you forgot your password, please click the link below.');
    $this->cpanel_forms();
                        break;
                        case 'Email address already exists on the system. If you forgot your password, you can click the link below.':
                                       
            $this->session->set_flashdata('error','Email address already exists on the system. If you forgot your password, you can click the link below.');
                             $this->cpanel_forms();
                        break;
                    default:
                   $this->session->set_flashdata('error','Account already exists on the system with that username. Please enter a different username, or if you forgot your password, please click the link below.<br>0R<br>Email address already exists on the system. If you forgot your password, you can click the link below.');
    $this->cpanel_forms();
                        break;
                }
                
      
            return FALSE;
        }
        
        $firstname = $this->input->post(html_escape('Cfirstname'));
        $surname = $this->input->post(html_escape('Clastname'));
        $gender = $this->input->post(html_escape('Cgender'));
        $age = $this->input->post(html_escape('Cage'));
        $residential_address = $this->input->post(html_escape('Cresidential_address'));
        $business_address = $this->input->post(html_escape('Cbusiness_address'));
        $state = $this->input->post(html_escape('Cstate'));
        $local_govt = $this->input->post(html_escape('Clocal_govt'));
        $email = $this->input->post(html_escape('Cemail'));
        $phone = $this->input->post(html_escape('Cphone'));
        $next_of_kin = $this->input->post(html_escape('Cnext_of_kin'));
        $kin_age = $this->input->post(html_escape('Ckin_age'));
        $kin_gender = $this->input->post(html_escape('Ckin_gender'));
        $kin_phone = $this->input->post(html_escape('Ckin_phone'));
        $relationship = $this->input->post(html_escape('Crelationship'));
        $marketer_id = $this->input->post(html_escape('Cmarketer_id'));
        
        $validate_staff = $this->Staffmodel->check_staff_id($marketer_id);
        
        if ($validate_staff == FALSE) {
        $this->session->set_flashdata('error', 'marketer identification number is invalid! please try again with the correct one.');
        $this->cpanel_forms(); 
        return FALSE;
        }
        
        $store = $this->Customermodel->store_customers($firstname, $surname, $user_id, $gender, $age, $residential_address, $business_address, $state, $local_govt, $email, $phone, $next_of_kin, $kin_age, $kin_phone, $kin_gender, $relationship, $marketer_id, $acc_no, $passport);
        
          if ($store){
              
              $this->aauth->add_member($user_id, 3);
               $this->Customermodel->store_account($username, $acc_no);
               
            $this->session->set_flashdata('success', "Customer registration complete! Account name: <strong>$username</strong> Account number: <strong>$acc_no</strong>");
            redirect(base_url('cpanel/forms/'.$this->uri->segment(3)));
        }else{
            $this->session->set_flashdata('error', 'Customer registration incomplete!');
            redirect(base_url('cpanel/forms/'.$this->uri->segment(3)));
        }
        
    }else{
       $this->session->set_flashdata('error', validation_errors());
        $this->cpanel_forms(); 
    }
}

//gets customer profile with account number
public function get_customer_profile() {
    
    $this->form_validation->set_rules("account_number", "text", "required");
    
    if ($this->form_validation->run() === true){
 
        $acc_no = $this->input->post(html_escape('account_number'));
       $get_customer = $this->Customermodel->check_account_number($acc_no);
       
       if ($get_customer == FALSE) {
           $this->session->set_flashdata('error', 'invalid account number, <strong>Administrator only !</strong>');
           redirect(base_url('cpanel/customers/'.$this->uri->segment(3))); 
       }  else {
            
           redirect(base_url('cpanel/customer/'.$get_customer[0]['firstname'].$get_customer[0]['lastname'].'/'.$this->uri->segment(3).'/'.$get_customer[0]['user_id']));
       }
    }  else {
        $this->session->set_flashdata('error', validation_errors());
        redirect(base_url('cpanel/customers/'.$this->uri->segment(3)));
    }
     
}

//credits account from admin dashboard
public function admin_credit_acc() {
    
    $this->form_validation->set_rules('admin_id', 'password', 'required|min_length[4]|max_length[4]', array('min_length' => 'Admin ID should be not be less than four(4) characters in length', 'max_length' => 'Admin ID should be not be more than four(4) characters in length'
        ));
    $this->form_validation->set_rules('amount', 'text', 'required|is_natural');
    
    $customer_info = $this->Customermodel->get_customer_vars($this->uri->segment(3));
     if ($this->form_validation->run() === true) {
         
         $admin_id = $this->input->post(html_escape('admin_id'));
         $amount = $this->input->post(html_escape('amount'));
       $user_id = $this->Staffmodel->get_user_id($admin_id);
       
       if ($this->aauth->is_admin($user_id[0]['staff_user_id']) || $this->aauth->is_member(4, $user_id[0]['staff_user_id'])) {
           $current_balance = $this->Staffmodel->get_current_balance($customer_info[0]['account_number']);
          
           $time = date("Y-m-d H:i:s");
           $new_balance = $current_balance + $amount;
           $staff_name = $user_id[0]['staff_surname'].' '.$user_id[0]['staff_firstname'];
           $customer_name = $customer_info[0]['lastname'].' '.$customer_info[0]['firstname'];
           $customer_phone = $customer_info[0]['phone_number'];
           $messagetext = "Your account has being credited with $amount N on $time by $staff_name current balance: $new_balance N. Thank you for banking with us, $this->sender";
           $update = $this->Staffmodel->credit_account($customer_info[0]['account_number'], $new_balance, $amount, $user_id[0]['staff_user_id']);
           $this->useJSON($this->json_url, $this->user_name, $this->api_key, $this->flash, $this->sender, $messagetext, $customer_phone);
        $this->session->set_flashdata('success', "account <strong>($customer_name)</strong> has being credited with <strong> $amount N </strong>successfully. current balance: <strong>$new_balance N</strong>");
        redirect(base_url('cpanel/customer/'.$customer_info[0]['firstname'].$customer_info[0]['lastname'].'/'.$user_id[0]['staff_id'].'/'.$customer_info[0]['user_id']));
       }else{
           $this->session->set_flashdata('error', 'This privilage is specifically meant for <strong> administrators only </strong>');
        redirect(base_url('cpanel/customer/'.$customer_info[0]['firstname'].$customer_info[0]['lastname'].'/'.$user_id[0]['staff_id'].'/'.$customer_info[0]['user_id']));
        return FALSE;
       }

     }else{

         $this->session->set_flashdata('error', validation_errors());
        redirect(base_url('cpanel/customer/'.$customer_info[0]['firstname'].$customer_info[0]['lastname'].'/'.$user_id[0]['staff_id'].'/'.$customer_info[0]['user_id']));
     }
}

//debits account from admin dashboard
public function admin_debit_acc() {
    
        $this->form_validation->set_rules('Dadmin_id', 'password', 'required|min_length[4]|max_length[4]', array('min_length' => 'Admin ID should be not be less than four(4) characters in length', 'max_length' => 'Admin ID should be not be more than four(4) characters in length'
        ));
    $this->form_validation->set_rules('Damount', 'text', 'required|is_natural');
    
     $customer_info = $this->Customermodel->get_customer_vars($this->uri->segment(3));
    if ($this->form_validation->run() === true){
        
        $admin_id = $this->input->post(html_escape('Dadmin_id'));
         $amount = $this->input->post(html_escape('Damount'));
       $user_id = $this->Staffmodel->get_user_id($admin_id);
        
       if ($this->aauth->is_admin($user_id[0]['staff_user_id']) || $this->aauth->is_member(4, $user_id[0]['staff_user_id'])) {
            $current_balance = $this->Staffmodel->get_current_balance($customer_info[0]['account_number']);
          if ($amount > $current_balance) {
              $this->session->set_flashdata('error', 'Insufficient fund');
              redirect(base_url('cpanel/customer/'.$customer_info[0]['firstname'].$customer_info[0]['lastname'].'/'.$user_id[0]['staff_id'].'/'.$customer_info[0]['user_id']));
              return FALSE;
          }

                    $new_balance = $current_balance - $amount;
                    $time = date("Y-m-d H:i:s");
                    $staff_name = $user_id[0]['staff_surname'].' '.$user_id[0]['staff_firstname'];
                    $customer_name = $customer_info[0]['lastname'].' '.$customer_info[0]['firstname'];
                    $customer_phone = $customer_info[0]['phone_number'];
                    $messagetext = "Your account has being debited with $amount N on $time by $staff_name current balance: $new_balance N. thank you for banking with us. $this->sender";
                    
           $current_no_debit = $this->Staffmodel->get_no_debit($customer_info[0]['account_number']);
           $new_no_debit = $current_no_debit + 1;
           $update = $this->Staffmodel->debit_account($customer_info[0]['account_number'], $new_balance, $amount, $user_id[0]['staff_user_id'], $new_no_debit);
           
//           sends SMS to specific user
           $this->useJSON($this->json_url, $this->user_name, $this->api_key, $this->flash, $this->sender, $messagetext, $customer_phone);
        $this->session->set_flashdata('success', "account <strong>($customer_name)</strong> has being debited with <strong> $amount N </strong>successfully. current balance: <strong>$new_balance N</strong>");
         redirect(base_url('cpanel/customer/'.$customer_info[0]['firstname'].$customer_info[0]['lastname'].'/'.$user_id[0]['staff_id'].'/'.$customer_info[0]['user_id']));
       }else{
         $this->session->set_flashdata('error', 'This privilage is specifically meant for <strong> administrators only </strong>');
         redirect(base_url('cpanel/customer/'.$customer_info[0]['firstname'].$customer_info[0]['lastname'].'/'.$user_id[0]['staff_id'].'/'.$customer_info[0]['user_id']));
        return FALSE;  
       }
    }else{
           $this->session->set_flashdata('error', validation_errors());
         redirect(base_url('cpanel/customer/'.$customer_info[0]['firstname'].$customer_info[0]['lastname'].'/'.$user_id[0]['staff_id'].'/'.$customer_info[0]['user_id']));
    }
}

//function that sends an email to company contact information
    public function contactus() {
        
        $this->form_validation->set_rules("name", "text", "required");   
        $this->form_validation->set_rules("email", "text", "required");
        $this->form_validation->set_rules("subject", "text", "required");
        $this->form_validation->set_rules("comment", "text", "required");
        
        if ($this->form_validation->run() === true){
            
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $comment = $this->input->post('comment');
            
            $ufullname = ucwords($name);
             $sendTo = 'contact@patmicrofinancecooperativesocietylimited.com';
          $headers = "From: " . strip_tags($email) . "\r\n";
                $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
                $headers .= "BCC: " . $sendTo . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                
                $newMessage = "<h1>FROM P.M.F.C.S.L</h1> \r\n<h3>name : </h3>$name \r\n <h3>subject : </h3> $subject \r\n <h3>message: </h3>$comment<h3>";
                 $mailed = mail($sendTo, $subject, $newMessage, $headers);
                 if ($mailed) {
                     $this->session->set_flashdata('success', ''.$ufullname.', Your message has being successfully sent, we will get back to you shortly');
                     redirect(base_url('home'));
                 }else{
                     $this->session->set_flashdata('error', 'your message was not sent successfully please try again!');
                     redirect(base_url('contact'));
                 }
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('contact'));
        }
    }
}
