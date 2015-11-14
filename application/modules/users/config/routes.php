<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['users/(:num)'] = 'users/index/$1';
$route['users/groups/(:num)'] = 'users/groups/index/$1';
$route['users/permissions/(:num)'] = 'users/permissions/index/$1';