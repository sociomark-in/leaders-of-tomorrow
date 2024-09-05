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

$route['api/v2/rsvp/register'] = 'api/attendees/RegistrationAPI/new_waitlist';
/* All Springboards */

/* Awards */
$route['awards'] = 'awards/AwardsController/home';
$route['categories'] = 'awards/AwardsController/categories';
/* Awards */

$route['login'] = 'auth/LoginController/single';
$route['multi-login'] = 'auth/LoginController/multi';

$route['dashboard'] = 'awards/AccountController';
$route['dashboard/my-profile'] = 'awards/AccountController/profile';
$route['dashboard/my-profile/edit'] = 'awards/AccountController/profile_edit';
$route['dashboard/applications'] = 'awards/NominationsController';
$route['dashboard/application/(:any)'] = 'awards/NominationsController/single/$1';

$route['dashboard/profile/(:any)'] = 'awards/AccountController/public_profile/$1';

$route['api/new-nominee'] = 'NomineeController/add';
$route['api/participant/login'] = 'api/auth/SSOController/participant_login';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
