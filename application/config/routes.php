<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
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

$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;


/*********** USER DEFINED ROUTES *******************/

$route['default_controller'] = "main";
$route['scaffolding_trigger'] = "";

$route['logout'] = "auth/logout";
$route['auth'] = "auth";
$route['loginMe'] = 'login/loginMe';

$route["auth/(:any)"] = "auth/$1";

$route["editor/(:any)"] = "admin_editor/$1";
$route["editor/(:any)/(:any)"] = "admin_editor/$1/$2";
$route["editor/(:any)/(:any)/(:any)"] = "admin_editor/$1/$2/$3";

$route[adminPath."/users"] = "adminusers";
$route[adminPath."/users/(:any)"] = "adminusers/$1";
$route[adminPath."/users/(:any)/(:any)"] = "adminusers/$1/$2";

$route[adminPath."/(:any)/(:any)/(:any)"] = "admin/index/$1/$2/$3";
$route[adminPath."/(:any)/(:num)"] = "admin/$1/index/$2";
$route[adminPath."/(:any)/(:any)"] = "admin/index/$1/$2";
$route[adminPath."/(:any)"] = "admin/index/$1";
    
$route[adminPath] = "admin";

/* default route */
$route['(:any)'] = "main/index/$1";
$route["(:any)/(:any)"] = "main/index/$1/$2";
$route["(:any)/(:any)/(:any)"] = "main/index/$1/$2/$3";


/*
$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";
*/

/* End of file routes.php */
/* Location: ./application/config/routes.php */
