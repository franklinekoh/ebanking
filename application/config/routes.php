<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Customerpages/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//custom routes
//home page
$route['home'] = 'Customerpages/home';
//contact form page
$route['contact'] = 'Customerpages/contactform';
//services page
$route['services'] = 'Customerpages/services';
//login page
$route['login'] = 'Customerpages/login';
//login route
$route['account/staff/login'] = 'Staffcontrol/staff_login';



//cpanel pages
//index
$route['cpanel/index/(:any)'] = 'Customerpages/cpanel_index';
//forms
$route['cpanel/forms/(:any)'] = 'Staffcontrol/cpanel_forms';
//staff registration
$route['registration/staff'] = 'Staffcontrol/staff_reg';
//customer registration
$route['registration/customer'] = 'Customercontrol/customer_reg';
//clock_card
$route['cpanel/clockcard/(:any)'] = 'Staffpages/cpanel_clock_card';
//transaction
$route['cpanel/transaction/(:any)'] = 'Customerpages/cpanel_transaction';
//all history
$route['cpanel/history/(:any)'] = 'Customerpages/cpanel_allhistory';
//all history page
$route['cpanel/allhistory/(:any)'] = 'Customerpages/cpanel_totalhistory';
//staff online
$route['cpanel/staffonline/(:any)'] = 'Staffpages/cpanel_staffonline';
//staff at work
$route['cpanel/staffatwork/(:any)'] = 'Staffpages/cpanel_staffatwork';
//customers
$route['cpanel/customers/(:any)'] = 'Customerpages/cpanel_customers';
//single staff profile
$route['cpanel/staff/(:any)'] = 'Customerpages/cpanel_staffsingle';
//staff profile
$route['marketer/(:any)/(:any)'] = 'Staffpages/marketers';
//profile
$route['cpanel/profile/(:any)'] = 'Customerpages/profile';
//settings
$route['cpanel/setting/(:any)'] = 'Customerpages/settings';
//customer single
$route['cpanel/customer/(:any)/(:any)/(:any)'] = 'Customerpages/cpanel_customersingle';
//credit account
$route['marketer/credit_account/(:any)'] = 'Staffcontrol/credit_account';
//admin credit account
$route['admin/credit_acc/(:any)'] = 'Customercontrol/admin_credit_acc';
//admin debit account
$route['admin/debit_acc/(:any)'] = 'Customercontrol/admin_debit_acc';
//log out
$route['logout/(:any)'] = 'Staffcontrol/logout';
//admin profile
$route['admin/profile/(:any)'] = 'Staffpages/profile';
//change password
$route['password/change/(:any)'] = 'Staffcontrol/change_password';
//grant admin permission
$route['permit/admin/(:any)'] = 'Staffcontrol/permit_admin';
//staff registeration
$route['staff/registeration/(:any)'] = 'Staffcontrol/staff_reg';
//customer registeration
$route['customer/registeration/(:any)'] = 'Customercontrol/customer_reg';
//staff  sign in
$route['staff/signin/(:any)'] = 'Staffcontrol/sign_in';
//staff sign out
$route['staff/signout/(:any)'] = 'Staffcontrol/sign_out';
//customer get profile
$route['customer/specific/(:any)'] = 'Customercontrol/get_customer_profile';
//monthly deduction
$route['admin/monthly_deduction/(:any)'] = 'Staffcontrol/monthly_deduction';
//single customer history
$route['customer/(:any)/(:any)/(:any)'] = 'Customerpages/history_single';

$route['debug'] = 'Customerpages/staff_single';