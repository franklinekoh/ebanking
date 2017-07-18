    <?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Public
 *
 * @author FRANK
 */
class Staffcontrol extends CI_Controller{
//put your code here
    function __construct(){
    parent::__construct();
        
        $this->load->helper(array('form'));
        $this->load->model('Staffmodel');
        $this->load->library(array('form_validation', 'user_agent'));
        
        $this->company = 'Pat Micro Finance Cooperative Society Limited';
        $this->phone = '(+234) 08039421039';
        $this->phone1 = '(+234) 08095275448';
        $this->email = 'contact@Patmicrofinancecooperative.com';
        $this->email1 = 'support@Patmicrofinancecooperative.com';
        $this->adress = '';
        
        $this->api_key = 'e238088637ba7a39822f39cf852f49c2a8849eb4';
        $this->user_name = 'ekohfranklin@gmail.com';
        $this->json_url = 'http://api.ebulksms.com:8080/sendsms.json';
        $this->sender = 'P.M.F.C.S.L';
        $this->flash = 0;
        
        $this->day = date('Y-m-d 12:00:00');
        $this->month_end = date('Y-m-t H:i:s');
        
//        if ($this->day == $this->month_end) {
//            $this->monthly_deduction();
//        }
}


public $user_id;
// registers the staff
public function staff_reg() {
    
    $this->form_validation->set_rules("firstname", "text", "required");
    $this->form_validation->set_rules("lastname", "text", "required");
    $this->form_validation->set_rules("gender", "text", "required");
    $this->form_validation->set_rules("residential_address", "text", "required");
    $this->form_validation->set_rules("qualification", "text", "required");
    $this->form_validation->set_rules("state", "text", "required");
    $this->form_validation->set_rules("local_govt", "text", "required");
    $this->form_validation->set_rules("email", "email", "required");
    $this->form_validation->set_rules("phone", "tel", "required|min_length[11]", array('min_length' => '<strong>Invalid phone number</strong>, Phone number should not be less than 11 characters.'));
    $this->form_validation->set_rules("next_of_kin", "text", "required");
    $this->form_validation->set_rules("kin_phone", "tel", "required|min_length[11]", array('min_length' => '<strong>Invalid phone number</strong>, Phone number should not be less than 11 characters.'));
    $this->form_validation->set_rules("relationship", "text", "required");
    $this->form_validation->set_rules("kin_age", "text", "required");
    $this->form_validation->set_rules("kin_gender", "text", "required");
    $this->form_validation->set_rules("username", "text", "required");
    $this->form_validation->set_rules("password", "password", "required|max_length[4]|min_length[4]", array('max_length' => 'password should not exceed four (4) characters', 'min_length' => 'password should not be less than four (4) characters'));
    $this->form_validation->set_rules("password_confirm", "password", "required|matches[password]");
    $this->form_validation->set_rules("passport","text","");
    
    if ($this->form_validation->run() === true){
        
        $email = $this->input->post(html_escape('email'));
        $pass =  $this->input->post(html_escape('password'));
        $username = $this->input->post(html_escape('username'));
        
         //calls the upload function
        $passport = $this->upload($_FILES['passport']);
        
        if ($passport == FALSE) {
            return FALSE;
        }
        
        
        $user_id = $this->aauth->create_user($email, $pass, $username);
        
        if ($user_id == 0) {

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
        
        $firstname = $this->input->post(html_escape('firstname'));
        $surname = $this->input->post(html_escape('lastname'));
        $gender = $this->input->post(html_escape('gender'));
        $address = $this->input->post(html_escape('residential_address'));
        $qualification = $this->input->post(html_escape('qualification'));
        $state = $this->input->post(html_escape('state'));
        $local_govt = $this->input->post(html_escape('local_govt'));
        $phone = $this->input->post(html_escape('phone'));
        $next_of_kin = $this->input->post(html_escape('next_of_kin'));
        $kin_phone = $this->input->post(html_escape('kin_phone'));
        $relationship = $this->input->post(html_escape('relationship'));
        $kin_age = $this->input->post(html_escape('kin_age'));
        $kin_gender = $this->input->post(html_escape('kin_gender'));
        $staff_id = $this->staff_id();
        
            
            while ($this->Staffmodel->check_staff_id($staff_id) == TRUE) {
                $staff_id ;
            }
          
        $store = $this->Staffmodel->store_staff($email, $username, $user_id, $firstname, $surname, $address, $qualification, $state, $local_govt, $phone, $next_of_kin, $kin_phone, $relationship, $kin_age, $kin_gender, $passport, $gender, $staff_id);
        if ($store){
            
            $this->aauth->add_member($user_id, 2);
 
            $this->session->set_flashdata('success', "Staff registration complete! Username: <strong>$username</strong> Password: <strong>$pass</strong> staff_id: <strong>$staff_id</strong>");
            redirect(base_url('cpanel/forms/'.$this->uri->segment(3)));
        }else{
            $this->session->set_flashdata('error', 'Staff registration incomplete!');
            redirect(base_url('cpanel/forms/'.$this->uri->segment(3)));
        }
        
    }else{
        $this->session->set_flashdata('error', validation_errors());
        $this->cpanel_forms();
    }
    
}
// randomizes the unique staff/markter id
// returns the staff id
public function staff_id() {
     //first alphabet randomizer
        $alphabets1 = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $i = rand(0, count($alphabets1)-1);
        $select1 = $alphabets1[$i];
        //second alphabet randomizer
        $alphabets2 = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $j= rand(0, count($alphabets2)-1);
        $select2 = $alphabets2[$j];
        //number randomizer
        $num = rand(10, 99);
         $staff_id = $num.$select1.$select2;
         
         return $staff_id;
}

//loads the cpanel form page
   public function cpanel_forms() {
       
       if ($this->aauth->is_loggedin()){
      
    $data['staff_info'] = $this->Staffmodel->get_staff_information($this->uri->segment(3));
    $data['title'] = 'administrator';
    $data['state'] = $this->Staffmodel->get_state();

    $this->load->view('admin/cpanel_forms', $data);
       }else{
           redirect(base_url('index')); 
       }
   
}
//displays the dynamic dropdown menu for the staff registeration form
public function drop_down_staff() {
          if (isset($_POST) && isset($_POST['get_option'])){
       $option = $_POST['get_option'];
       
         $data['lga'] = $this->Staffmodel->getlga($option);
         foreach ($data['lga'] as $key => $value) {
             $lga = array($value['id_no'] => $value['local_govt']);
          echo   form_dropdown('lga', $lga);
         }
         
    }
}
//displays the dynamic dropdown menu for customer registeration form
public function drop_down_customers() {
        if (isset($_POST) && isset($_POST['get_option'])){
       $option = $_POST['get_option'];
       
         $data['lga'] = $this->Staffmodel->getlga($option);
         foreach ($data['lga'] as $key => $value) {
             $lga = array($value['id_no'] => $value['local_govt']);
          echo   form_dropdown('lga_customers', $lga);
         }
         
    }
}

// uploads the image name to the data base and the image to the server
// returns php time function if the image is successfully uploaded else
// returns false

   public function upload($name = array()) {
          
         $time = time();

        $fileName = $name['name'];
        $fileType = $name['type'];
        $fileSize = $name['size'];
        $fileTemp = $name['tmp_name'];
        $maxFileSize = 5242880;
        $dir = 'uploads/';

    if ($fileType === 'image/jpg' || $fileType === 'image/jpeg' || $fileType === 'image/png' || $fileType === 'image/gif' || $fileType === 'image/JPG') {
            if($fileSize < $maxFileSize) {
                    $store = move_uploaded_file($fileTemp, $dir. $time. '_' .$fileName);
                    
                    if ($store) {
                        $newFileName = $time. '_' .$fileName;
                        $this->Staffmodel->store_passport($newFileName, $time);
                    }else{
                        return FALSE;
                    }
            }else{
                    $this->session->set_flashdata('error', 'Error: file size is too big (must be less than 5 mb)');
                   $this->cpanel_forms();
                    return false;
            }
        }else{
                $this->session->set_flashdata('error', 'Error: file most be <strong>jpg</strong>, <strong>jpeg</strong>, <strong>png</strong> or <strong>gif</strong> file format');
                $this->cpanel_forms();
                return FALSE;
        }

        return $time;
          
      }
      
//      logs the user in
//      returns false if the loggin was not successfull
      
      public function staff_login() {
          
        $this->form_validation->set_rules("username", "text", "required");
        $this->form_validation->set_rules("password", "password", "required"); 
        $this->form_validation->set_rules("checkbox", "remember", ""); 
        
        if ($this->form_validation->run() === true){
            
            $username = $this->input->post(html_escape('username'));
            $pass = $this->input->post(html_escape('password'));
            $remember = $this->input->post(html_escape('remember'));
            
          $login =  $this->aauth->login($username, $pass, $remember);
          
          if ($login == TRUE) {
              
              $user_id  = $this->aauth->get_user_id($username);
              
              $this->Staffmodel->update_login($user_id, 1);
          $staff_vars = $this->Staffmodel->get_staff_vars($user_id);

          if (!$this->aauth->is_admin($user_id)) {
              if (!$this->aauth->is_member(4, $user_id)){
                  
              
          switch ($staff_vars[0]['clocking_status']) {
              case 1:
                  redirect(base_url('marketer/'.$staff_vars[0]['staff_surname'].$staff_vars[0]['staff_firstname']. '/'. $staff_vars[0]['staff_id']));
                  break;
              case 0:
                  $this->session->set_flashdata('error', 'You are to sign in at the office to continue. Thank you !');
                  $this->Staffmodel->update_login($user_id, 0);
              redirect(base_url('login'));
              return FALSE;
              break;
                    
              default:
                  break;
          }
          }else{
              redirect(base_url('cpanel/index/'. $staff_vars[0]['staff_id']));
          }
          }else{
              redirect(base_url('cpanel/index/'. $staff_vars[0]['staff_id']));
          }

          }else{
//              $this->aauth->print_errors();
              $this->session->set_flashdata('error', 'Opps! there seems to be an error, your login attempt was not successfull, try again!');
              redirect(base_url('login'));
              return FALSE;
          }
        }else{
           $this->session->set_flashdata('error', validation_errors());
           redirect(base_url('login'));
        }
        
        $user_id = $this->user_id;
      }
     
//      logs user out i.e distroys sessioin
//      redirects to login page
      
      public function logout() {
          
          $this->aauth->logout();
          $this->Staffmodel->update_login($this->uri->segment(2), 0);
              redirect(base_url('login'));
    
      }
      
//      credits the specified account
      public function credit_account() {
      
        $this->form_validation->set_rules("acc_no", "text", "required");
        $this->form_validation->set_rules("amount", "password", "required"); 
        
        if ($this->form_validation->run() === true){
          
            $acc_no = $this->input->post(html_escape('acc_no'));
            $amount = $this->input->post(html_escape('amount'));
            
           $user_id  = $this->aauth->get_user_id($this->user_id);
          $staff_vars = $this->Staffmodel->get_staff_vars($user_id);
                     
        $current_balance =  $this->Staffmodel->get_current_balance($acc_no);  
        $customer = $this->Staffmodel->get_customer_var($acc_no);
        if ($current_balance === FALSE) {
             $this->session->set_flashdata('error', 'Invalid account number !');
                    redirect(base_url('marketer/'.$staff_vars[0]['staff_surname'].$staff_vars[0]['staff_firstname']. '/'. $staff_vars[0]['staff_id']));
                    return FALSE;
        }
        
        $new_balance = $current_balance + $amount;
        
        $update = $this->Staffmodel->credit_account($acc_no, $new_balance, $amount, $user_id);
                if ($update){
                    
                    $time = date("Y-m-d H:i:s");
                    $staff_name = $staff_vars[0]['staff_surname'].' '.$staff_vars[0]['staff_firstname'];
                    $customer_name = $customer[0]['lastname'].' '.$customer[0]['firstname'];
                    $customer_phone = $customer[0]['phone_number'];
                    $messagetext = "Your account has being credited with $amount N on $time by $staff_name current balance: $new_balance N. Thank you for banking with us, $this->sender";
//                    sends SMS to the specific user
                    $this->useJSON($this->json_url, $this->user_name, $this->api_key, $this->flash, $this->sender, $messagetext, $customer_phone);
                     $this->session->set_flashdata('success', "account <strong>($customer_name)</strong> has being credited with <strong> $amount N </strong>successfully. current balance: <strong>$new_balance N</strong>");
           redirect(base_url('marketer/'.$staff_vars[0]['staff_surname'].$staff_vars[0]['staff_firstname']. '/'. $staff_vars[0]['staff_id']));
                }else{
                    $this->session->set_flashdata('error', 'account could not be credited! please contact admin');
                    redirect(base_url('marketer/'.$staff_vars[0]['staff_surname'].$staff_vars[0]['staff_firstname']. '/'. $staff_vars[0]['staff_id']));
                    return FALSE;
                }     
                
        }  else {
             $this->session->set_flashdata('error', validation_errors());
           redirect(base_url('marketer/'.$staff_vars[0]['staff_surname'].$staff_vars[0]['staff_firstname']. '/'. $staff_vars[0]['staff_id']));
        }
      }
//    signs the specifies staff in with his/her user id  
      public function sign_in() {
          
          $this->form_validation->set_rules('in_id', 'text', 'required|min_length[4]|max_length[4]', array('min_length' => 'Admin ID should be not be less than four(4) characters in length', 'max_length' => 'Admin ID should be not be more than four(4) characters in length'));
          
          if ($this->form_validation->run() === true) {
              
              $staff_id = $this->input->post(html_escape('in_id'));
             $validate_id = $this->Staffmodel->check_staff_id($staff_id);
             
             if ($validate_id == TRUE) {
                 $this->Staffmodel->update_sign_in($staff_id, 1);
//                 $signin_time = time(); //current time.
//                 $exp_time = 3600 * 5; //expiring time. five hours
//                 if ($exp_time ) {
//                     
//                 }
                 $this->session->set_flashdata('success', 'signed in successfully !');
              redirect(base_url('cpanel/clockcard/'.$this->uri->segment(3)));
             }else{
                 $this->session->set_flashdata('error', 'Invalid staff ID !');
              redirect(base_url('cpanel/clockcard/'.$this->uri->segment(3)));
              return FALSE;
             }
           }else{
              $this->session->set_flashdata('error', validation_errors());
              redirect(base_url('cpanel/clockcard/'.$this->uri->segment(3)));
          }
          
      }
//   signs the specifies staff in with his/her user id  
      public function sign_out() {
          
          $this->form_validation->set_rules('out_id', 'text', 'required|min_length[4]|max_length[4]', array('min_length' => 'Admin ID should be not be less than four(4) characters in length', 'max_length' => 'Admin ID should be not be more than four(4) characters in length'));
          
           if ($this->form_validation->run() === true) {
               
               $staff_id = $this->input->post(html_escape('out_id'));
               $validate_id = $this->Staffmodel->check_staff_id($staff_id);
               if ($validate_id == TRUE) {
                 $this->Staffmodel->update_login($staff_id, 0);
                 $this->Staffmodel->update_sign_in($staff_id, 0);
                 $this->session->set_flashdata('error', 'signed out successfully !');
                 redirect(base_url('cpanel/clockcard/'.$this->uri->segment(3)));
               }else{
                   $this->session->set_flashdata('error', 'Invalid staff ID !');
              redirect(base_url('cpanel/clockcard/'.$this->uri->segment(3)));
              return FALSE;
               }
           }else{
                $this->session->set_flashdata('error', validation_errors());
              redirect(base_url('cpanel/clockcard/'.$this->uri->segment(3)));
           }
      }
     
//      deducts 200 Naira from each account monthly
      public function monthly_deduction() {
          
          $this->form_validation->set_rules('admin_id', 'password', 'required|min_length[4]|max_length[4]', array('min_length' => 'Admin ID should be not be less than four(4) characters in length', 'max_length' => 'Admin ID should not be more than four(4) characters in length'));
          if ($this->form_validation->run() === true){
              
              $admin_id = $this->input->post(html_escape('admin_id'));
              $user_id = $this->Staffmodel->get_user_id($admin_id);
              
              if ($this->aauth->is_admin($user_id[0]['staff_user_id'])) {
                  $all_balance = $this->Staffmodel->get_all_balance();
                  
                foreach ($all_balance as $key => $value) {
//two Hundred niara monthly deduction
                    
                    $deduct = 200;
                    if($value['account_balance'] != NULL) {
                       $new_balance = $value['account_balance'] - $deduct; 
//                       individual customer info
                        $customer = $this->Staffmodel->get_customer_var($value['account_number']);

                        foreach ($customer as $key => $var ) {
                      $time = date("Y-m-d H:i:s");
                    $staff_name = $user_id[0]['staff_surname'].' '.$user_id[0]['staff_firstname'];
                    $customer_name = strtoupper($var['lastname']).' '.strtoupper($var['firstname']);
                    $customer_phone = $var['phone_number'];
                    $messagetext = "Dear $customer_name, 100 N monthly service charge was deducted from your account, your balance as at the of the month is $new_balance. Thank you for banking with us. $this->sender";
//                  SMS will be sent to each customer 
                    $this->useJSON($this->json_url, $this->user_name, $this->api_key, $this->flash, $this->sender, $messagetext, $customer_phone);
                        }
                   
                        $this->Staffmodel->update_account($new_balance, $value['id']);
                    }
                }
                
                $this->session->set_flashdata('success', 'Monthly deduction was a success. Thank you');
              redirect(base_url('cpanel/transaction/'.$this->uri->segment(3)));
              }else{
                  $this->session->set_flashdata('error', 'This privilage is specifically meant for <strong> the super administrators only </strong>');
              redirect(base_url('cpanel/transaction/'.$this->uri->segment(3)));
              }
          }else{
              $this->session->set_flashdata('error', validation_errors());
              redirect(base_url('cpanel/transaction/'.$this->uri->segment(3)));
          }
      }
      
//              automatically deducts 200 N or 400 N as the case may be from every account
      
      public function automated_deduction() {
          
          $all_balance = $this->Staffmodel->get_all_balance();
                  
                foreach ($all_balance as $key => $value) {
            //two Hundred niara monthly deduction
                    
                    $deduct = 200;
                    $max_deduct = 400;
                    if($value['account_balance'] != NULL) {
                        if ($value['no_of_debit'] < 2) {
                       $new_balance = $value['account_balance'] - $deduct; 
//                       individual customer info
                        $customer = $this->Staffmodel->get_customer_var($value['account_number']);

                        foreach ($customer as $key => $var ) {
                      $time = date("Y-m-d H:i:s");
                    $staff_name = $this->sender;
                    $customer_name = strtoupper($var['lastname']).' '.strtoupper($var['firstname']);
                    $customer_phone = $var['phone_number'];
                    $messagetext = "Dear $customer_name, 100 N monthly service charge was deducted from your account, your balance as at the of the month is $new_balance. Thank you for banking with us. $this->sender";
//                  SMS will be sent to each customer 
                    $this->useJSON($this->json_url, $this->user_name, $this->api_key, $this->flash, $this->sender, $messagetext, $customer_phone);
                        }
                   
                        $this->Staffmodel->update_account($new_balance, $value['id']);
                    }else{
                           $new_balance = $value['account_balance'] - $max_deduct; 
//                       individual customer info
                        $customer = $this->Staffmodel->get_customer_var($value['account_number']);

                        foreach ($customer as $key => $var ) {
                      $time = date("Y-m-d H:i:s");
                    $staff_name = $this->sender;
                    $customer_name = strtoupper($var['lastname']).' '.strtoupper($var['firstname']);
                    $customer_phone = $var['phone_number'];
                    $messagetext = "Dear $customer_name, 100 N monthly service charge was deducted from your account, your balance as at the of the month is $new_balance. Thank you for banking with us. $this->sender";
//                  SMS will be sent to each customer 
                    $this->useJSON($this->json_url, $this->user_name, $this->api_key, $this->flash, $this->sender, $messagetext, $customer_phone);
                        }
                   
                        $this->Staffmodel->update_account($new_balance, $value['id']);
                    }
                    
                        }
                }
      }
      
//      changes password from the admin dashboard
      public function change_password() {
          
          $this->form_validation->set_rules("staff_id", "text", 'required|min_length[4]|max_length[4]', array('min_length' => 'Staff password should be not be less than four(4) characters in length', 'max_length' => 'Staff password should not be more than four(4) characters in length'));
          $this->form_validation->set_rules("staff_new", "text", "required");
          $this->form_validation->set_rules("staff_confirm", "text", "required|matches[staff_new]");
          
 
          if ($this->form_validation->run() === true){
             $staff_id = $this->input->post(html_escape('staff_id'));
             $new_password = $this->input->post(html_escape('staff_new'));
             $validate_id = $this->Staffmodel->check_staff_id($staff_id);
             
             if ($validate_id == TRUE) {
                $staff_info = $this->Staffmodel->get_staff_information($staff_id);
                 $user_id = $staff_info[0]['staff_user_id'];
                $hashed = $this->aauth->hash_password($new_password, $user_id);
                $this->Staffmodel->update_password($hashed, $user_id);
                 $this->session->set_flashdata('success', "password updated successfully");
              redirect(base_url('admin/profile/'.$this->uri->segment(3)));
             }else{
                  $this->session->set_flashdata('error', 'invalid staff ID');
              redirect(base_url('admin/profile/'.$this->uri->segment(3)));
             }
             
              
          }else{
              $this->session->set_flashdata('error', validation_errors());
              redirect(base_url('admin/profile/'.$this->uri->segment(3)));
                      
          }
      }
      
      public function permit_admin() {
          $this->form_validation->set_rules("permit_id", "text", "required");
          
          if ($this->form_validation->run() === true){
             $user_id = $this->input->post('permit_id');
             $this->aauth->allow_user($user_id, 1);           
//             $this->aauth->create_perm('sub_admin', 'sub administrators');
//              $this->aauth->allow_group(1, 1);
            $this->aauth->add_member($user_id, 4);
             $this->session->set_flashdata('success', 'admin permission granted successfully');
             redirect(base_url('admin/profile/'.$this->uri->segment(3)));
          }else{
              $this->session->set_flashdata('error', validation_errors());
              redirect(base_url('admin/profile/'.$this->uri->segment(3)));
          }
      }
      
      
      public function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) {
        $gsm = array();
        $country_code = '234';
        $arr_recipient = explode(',', $recipients);
        foreach ($arr_recipient as $recipient) {
            $mobilenumber = trim($recipient);
            if (substr($mobilenumber, 0, 1) == '0') {
                $mobilenumber = $country_code . substr($mobilenumber, 1);
            } elseif (substr($mobilenumber, 0, 1) == '+') {
                $mobilenumber = substr($mobilenumber, 1);
            }
            $generated_id = uniqid('int_', false);
            $generated_id = substr($generated_id, 0, 30);
            $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
        }
        $message = array(
            'sender' => $sendername,
            'messagetext' => $messagetext,
            'flash' => "{$flash}",
        );
        $request = array('SMS' => array(
                'auth' => array(
                    'username' => $username,
                    'apikey' => $apikey
                ),
                'message' => $message,
                'recipients' => $gsm
        ));
        $json_data = json_encode($request);
        if ($json_data) {
            $response = $this->doPostRequest($url, $json_data, array('Content-Type: application/json'));
            $result = json_decode($response);
            return $result->response->status;
        } else {
            return false;
        }
    }

    //Function to connect to SMS sending server using HTTP POST
      public function doPostRequest($url, $data, $headers = array()) {
        $php_errormsg = '';
        if (is_array($data)) {
            $data = http_build_query($data, '', '&');
        }
        $params = array('http' => array(
                'method' => 'POST',
                'content' => $data)
        );
        if ($headers !== null) {
            $params['http']['header'] = $headers;
        }
        $ctx = stream_context_create($params);
        $fp = fopen($url, 'rb', false, $ctx);
        if (!$fp) {
            return "Error: gateway is inaccessible";
        }
//stream_set_timeout($fp, 0, 250);
        try {
            $response = stream_get_contents($fp);
            if ($response === false) {
                throw new Exception("Problem reading data from $url, $php_errormsg");
            }
            return $response;
        } catch (Exception $e) {
            $response = $e->getMessage();
            return $response;
        }
    }

}


?>