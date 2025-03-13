<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = 'Admin/index';

$route['product-details/(:any)'] = 'Welcome/product_details/$1';
$route['blog-details/(:any)'] = 'Welcome/blog_details/$1';
$route['shop'] = 'Welcome/shop';
$route['shop/(:any)'] = 'Welcome/shop/$1';
$route['my-account'] = 'User/my_account';
$route['checkout'] = 'Welcome/checkout';
$route['all-product'] = 'Welcome/all_product';
$route['userinvoice/(:any)'] = 'Welcome/userinvoice/$1';
$route['my-account/(:num)'] = 'user/my_account/$1';



$route['(:any)'] = 'Welcome/all/$1';