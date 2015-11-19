<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['settings/(:num)'] = 'settings/index/$1';
$route['settings/menu/(:num)'] = 'settings/menu/index/$1';
$route['settings/application/(:num)'] = 'settings/application/index/$1';