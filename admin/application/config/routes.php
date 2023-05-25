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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// CUSTOM DEFINED ROUTES HERE

// AUTH ROUTES
$route['/']          		= "Admin";
$route['dashboard']  	    = "Admin";
$route['login']       		= "Admin/login";
$route['auth']        		= "Admin/auth";
$route['logout']      		= "Admin/logout";


// Assignment routes ....
$route['assignments'] 		        = "Admin/assignments";
$route['assignments/view/(:num)']   = "Admin/assignment_view/$1";
$route['assignments/create']   		= "Admin/assignment_create";
$route['assignments/save']   		= "Admin/assignment_save";
$route['assignments/update/(:num)'] = "Admin/assignment_update/$1";
$route['assignments/delete/(:num)'] = "Admin/assignment_delete/$1";


// solution routes ....
$route['solutions'] 		        = "Admin/solutions";
$route['solutions/view/(:num)']     = "Admin/solution_view/$1";
$route['solutions/delete/(:num)']   = "Admin/solution_delete/$1";



// result routes ....
$route['results/save']     	         = "Admin/result_save";


// User routes ....
$route['users'] 		      = "Admin/users";
$route['users/view/(:num)']   = "Admin/user_view/$1";
$route['users/create']        = "Admin/user_create";
$route['users/save']   		  = "Admin/user_save";
$route['users/update/(:num)'] = "Admin/user_update/$1";
$route['users/delete/(:num)'] = "Admin/user_delete/$1";



