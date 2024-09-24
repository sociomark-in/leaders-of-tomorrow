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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'PagesController';
// $route[''] = 'ViewsController/soon';
$route['history'] = 'main/HistoryController';
$route['gallery'] = 'main/GalleryController';
$route['all-cities'] = 'main/CityController';
$route['history/season-(:any)'] = 'main/HistoryController/season_single/$1';
$route['misc/(:any)'] = 'main/OtherPagesController/misc/$1';
$route['sitemap'] = 'main/OtherPagesController/sitemap';

/* All Springboards */
$route['city/(:any)'] = 'main/CityController/city_single/$1';
$route['city/(:any)/gallery'] = 'main/CityController/city_gallery/$1';
$route['city/(:any)/register'] = 'main/CityController/registration/$1';
$route['city/(:any)/rsvp/thank-you'] = 'main/CityController/rsvp_thankyou/$1';

/* All Springboards */

/* Awards */
$route['awards'] = 'main/AwardsController';
$route['awards/categories'] = 'main/AwardsController/categories';
$route['awards/category/(:any)'] = 'main/AwardsController/category_single/$1';
$route['awards/category/(:any)/nominate'] = 'main/AwardsController/category_nominate/$1';
/* Awards */

$route['login'] = 'auth/LoginController/single';
$route['logout'] = 'auth/LoginController/logout';
$route['register'] = 'auth/RegisterController';
$route['register/social'] = 'auth/Example';
$route['multi-login'] = 'auth/LoginController/multi';

$route['nominate'] = 'awards/AccountController/nominate';

// Participant
$route['dashboard'] = 'panel/AccountController';
$route['dashboard/my-applications'] = 'panel/NominationsController/user_side';

$route['dashboard/category/(:any)/nominate'] = 'panel/NominationsController/nominate/$1';

// Jury
$route['dashboard/applications'] = 'panel/NominationsController';
$route['dashboard/application/(:any)'] = 'panel/NominationsController/single/$1';
$route['dashboard/application/(:any)/edit'] = 'panel/NominationsController/user_edit/$1';

$route['dashboard/categories'] = 'panel/CategoriesController';
$route['dashboard/category/(:any)'] = 'panel/CategoriesController/single/$1';

// All
$route['dashboard/my-profile'] = 'panel/AccountController/profile';
$route['dashboard/my-profile/edit'] = 'panel/AccountController/profile_edit';
$route['dashboard/my-profile/settings'] = 'panel/AccountController/profile_settings';
$route['dashboard/my-profile/setting/(:any)'] = 'panel/AccountController/profile_setting_single/$1';

$route['dashboard/profile/(:any)'] = 'awards/AccountController/public_profile/$1';

$route['api/new-nominee'] = 'NomineeController/add';
$route['api/v2/register/otp/send'] = 'api/auth/AuthAPIController/send_otp';
$route['api/v2/register/otp/verify'] = 'api/auth/AuthAPIController/verify_otp';
$route['api/v2/participant/register'] = 'api/auth/AuthAPIController/participant_register';
$route['api/v2/participant/login'] = 'api/auth/AuthAPIController/participant_login';
$route['api/v2/participant/google-login'] = 'api/auth/SSOController/participant_google_login';
$route['api/v2/participant/nominate'] = 'api/auth/AuthAPIController/participant_nominate';
$route['api/v2/awards/nomination/single/new'] = 'api/awards/NominationAPIController/new_single';
$route['api/v2/awards/nomination/single/new_bulk'] = 'api/awards/NominationAPIController/new_bulk';
$route['api/v2/awards/nomination/single/bulk_edit'] = 'api/awards/NominationAPIController/bulk_edit';
$route['api/v2/rsvp/register'] = 'api/attendees/RegistrationAPI/new_waitlist';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
