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
$route['default_controller'] = 'AccountController';

$route['login'] = 'auth/LoginController/single';
$route['forgot-password'] = 'auth/LoginController/forgot_pw';
$route['logout'] = 'auth/LoginController/logout';
$route['register'] = 'auth/RegisterController';
$route['register/social'] = 'auth/Example';
$route['multi-login'] = 'auth/LoginController/multi';

// Participant
$route['my-nominations'] = 'NominationsController/user_side';
$route['my-presentations'] = 'PresentationsController';

$route['category/(:any)/nominate'] = 'NominationsController/nominate/$1';

// Jury
$route['nominations'] = 'NominationsController';
$route['nomination/(:any)'] = 'NominationsController/single/$1';
$route['nomination/(:any)/edit'] = 'NominationsController/user_edit/$1';
$route['nomination/(:any)/download'] = 'NominationsController/download/$1';
$route['nomination/(:any)/reject'] = 'api/awards/NominationAPIController/reject_default_comment/$1';

$route['presentations'] = 'PresentationsController';
$route['nomination/(:any)/presentation'] = 'PresentationsController/new_presentation/$1';
$route['presentation/(:any)/view'] = 'PresentationsController/single/$1';
$route['presentation/(:any)/edit'] = 'PresentationsController/edit/$1';
$route['presentation/(:any)/download'] = 'PresentationsController/download/$1';

$route['categories'] = 'CategoriesController';
$route['category/(:any)'] = 'CategoriesController/single/$1';

// Admin
$route['all-agents'] = 'AccountController/all_agents';
$route['agent/(:any)'] = 'AccountController/agent_single/$1';

$route['all-users'] = 'AccountController/all_users';

// All
$route['my-profile'] = 'AccountController/profile';
$route['my-profile/edit'] = 'AccountController/profile_edit';
$route['my-profile/verify'] = 'AccountController/profile_verify';
$route['my-profile/settings'] = 'AccountController/profile_settings';
$route['my-profile/setting/(:any)'] = 'AccountController/profile_setting_single/$1';

$route['profile/(:any)'] = 'awards/AccountController/public_profile/$1';

$route['app/settings'] = 'settings/GlobalSettingsController/index';



$route['api/new-nominee'] = 'NomineeController/add';

$route['api/v2/auth/verify/(:any)/send'] = 'api/auth/VerificationAPIController/send/$1';
$route['api/v2/auth/verify/(:any)/verify'] = 'api/auth/VerificationAPIController/verify/$1';
$route['api/v2/settings/password/reset'] = 'api/awards/SettingsAPIController/password_reset';
$route['api/v2/auth/forgot-password/send-otp'] = 'api/awards/SettingsAPIController/forgot_pw_otp';
$route['api/v2/auth/forgot-password/resend-password'] = 'api/awards/SettingsAPIController/forgot_pw_resend';


$route['api/v2/register/otp/send'] = 'api/auth/AuthAPIController/send_otp';
$route['api/v2/register/otp/verify'] = 'api/auth/AuthAPIController/verify_otp';
$route['api/v2/participant/register'] = 'api/auth/AuthAPIController/participant_register';
$route['api/v2/participant/login'] = 'api/auth/AuthAPIController/participant_login';
$route['api/v2/oauth/googleuser'] = 'api/auth/SSOAPIController/participant_google_profile';
$route['api/v2/agency/lead'] = 'api/auth/AuthAPIController/agency_lead_register';

$route['api/v2/dashboard/agency/new'] = 'api/agency/AgencyAPIController/new_agency';


$route['api/v2/participant/nominate'] = 'api/auth/AuthAPIController/participant_nominate';

// $route['api/v2/awards/nomination/single/new'] = 'api/awards/NominationAPIController/new_single';
$route['api/v2/awards/nomination/single/new'] = 'api/awards/NominationAPIController/new_nomination';

$route['api/v2/awards/nomination/single/new_bulk'] = 'api/awards/NominationAPIController/new_bulk';
$route['api/v2/awards/nomination/single/edit'] = 'api/awards/NominationAPIController/bulk_edit';
$route['api/v2/awards/nomination/reject_w_comment'] = 'api/awards/NominationAPIController/comment_and_reject';
$route['api/v2/awards/nomination/unlock_w_comment'] = 'api/awards/NominationAPIController/comment_and_unlock';
$route['api/v2/awards/nomination/accept'] = 'api/awards/NominationAPIController/accept';
$route['api/v2/awards/nomination/download'] = 'api/awards/NominationAPIController/download_docket';

$route['api/v2/awards/presentation/edit'] = 'api/awards/PresentationAPIController/bulk_edit';
$route['api/v2/awards/presentation/reject_w_comment'] = 'api/awards/PresentationAPIController/comment_and_reject';
$route['api/v2/awards/presentation/unlock_w_comment'] = 'api/awards/PresentationAPIController/comment_and_unlock';
$route['api/v2/awards/presentation/accept'] = 'api/awards/PresentationAPIController/accept';

$route['api/v2/awards/presentation/new'] = 'api/awards/PresentationAPIController/new_presentation';

$route['api/v2/rsvp/register'] = 'api/attendees/RegistrationAPI/new_waitlist';
$route['api/v2/awards/rsvp'] = 'api/attendees/RegistrationAPI/new_waitlist_awards';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
