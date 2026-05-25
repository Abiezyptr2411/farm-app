<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['katalog'] = 'home/katalog';
$route['katalog/(:any)'] = 'home/detail/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
