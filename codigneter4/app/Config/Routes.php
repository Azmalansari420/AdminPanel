<?php

use CodeIgniter\Router\RouteCollection;


$routes->add('(.*)', 'Home::all/$1');











/*---------------------Admin------------------------*/

$routes->group('admin', function ($routes) 
{
	/*admin/index*/
    $routes->get('/', 'admin_con\AdminController::index'); 
    $routes->get('access_denied', 'admin_con\AdminController::access_denied'); 
    /*admin*/
    $routes->post('login', 'admin_con\AdminController::login'); 
    $routes->get('logout', 'admin_con\AdminController::logout');

    /*dashboard*/
    $routes->get('dashboard', 'admin_con\AdminController::dashboard');
    /*rofile*/
    $routes->get('edit_profile', 'admin_con\AdminController::edit_profile');
	$routes->post('update_edit_profile', 'admin_con\AdminController::update_edit_profile');
});


/*role*/
$routes->group('admin/role', ['namespace' => 'App\Controllers\admin_con'], function($routes) {
    $routes->get('/', 'Role::listing');
    $routes->post('get_table_data', 'Role::getTableData');
    $routes->post('update_status', 'Role::clicktoupdatestatus');
    // Route for adding a new Role
    $routes->get('add_page', 'Role::add_page');
    $routes->post('add_new_entryURL', 'Role::add_new_entryURL');
    /*update*/
    $routes->get('edit_page/(:num)', 'Role::edit_page/$1');
    $routes->post('update_page/(:num)', 'Role::update_dataURL/$1');
    /*delete*/
    $routes->get('singledelete/(:num)', 'Role::singledelete/$1');
    $routes->post('delete_all', 'Role::delete_all');
});
/*tbl_admin*/
$routes->group('admin/tbl_admin', ['namespace' => 'App\Controllers\admin_con'], function($routes) {
    $routes->get('/', 'Tbl_admin::listing');
    $routes->post('get_table_data', 'Tbl_admin::getTableData');
    $routes->post('update_status', 'Tbl_admin::clicktoupdatestatus');
    // Route for adding a new Tbl_admin
    $routes->get('add_page', 'Tbl_admin::add_page');
    $routes->post('add_new_entryURL', 'Tbl_admin::add_new_entryURL');
    /*update*/
    $routes->get('edit_page/(:num)', 'Tbl_admin::edit_page/$1');
    $routes->post('update_page/(:num)', 'Tbl_admin::update_dataURL/$1');
    /*delete*/
    $routes->get('singledelete/(:num)', 'Tbl_admin::singledelete/$1');
    $routes->post('delete_all', 'Tbl_admin::delete_all');
});





/*sityesettinfg*/
$routes->group('admin/site_setting', ['namespace' => 'App\Controllers\admin_con'], function($routes) {
    $routes->get('/', 'Site_setting::listing');
    $routes->post('get_table_data', 'Site_setting::getTableData');
    /*update*/
    $routes->get('edit_page/(:num)', 'Site_setting::edit_page/$1');
    $routes->post('update_page/(:num)', 'Site_setting::update_dataURL/$1');
});

/*slider*/
$routes->group('admin/slider', ['namespace' => 'App\Controllers\admin_con'], function($routes) {
    $routes->get('/', 'Slider::listing');
    $routes->post('get_table_data', 'Slider::getTableData');
    $routes->post('update_status', 'Slider::clicktoupdatestatus');
    // Route for adding a new slider
    $routes->get('add_page', 'Slider::add_page');
    $routes->post('add_new_entryURL', 'Slider::add_new_entryURL');
    /*update*/
    $routes->get('edit_page/(:num)', 'Slider::edit_page/$1');
    $routes->post('update_page/(:num)', 'Slider::update_dataURL/$1');
    /*delete*/
    $routes->get('singledelete/(:num)', 'Slider::singledelete/$1');
    $routes->post('delete_all', 'Slider::delete_all');
});


/*Contact*/
$routes->group('admin/contact', ['namespace' => 'App\Controllers\admin_con'], function($routes) {
    $routes->get('/', 'Contact::listing');
    $routes->post('get_table_data', 'Contact::getTableData');
    $routes->post('update_status', 'Contact::clicktoupdatestatus');
    // Route for adding a new Contact
    $routes->get('add_page', 'Contact::add_page');
    $routes->post('add_new_entryURL', 'Contact::add_new_entryURL');
    /*update*/
    $routes->get('edit_page/(:num)', 'Contact::edit_page/$1');
    $routes->post('update_page/(:num)', 'Contact::update_dataURL/$1');
    /*delete*/
    $routes->get('singledelete/(:num)', 'Contact::singledelete/$1');
    $routes->post('delete_all', 'Contact::delete_all');
});


/*multiplaeimage*/
$routes->group('admin/multipleimage', ['namespace' => 'App\Controllers\admin_con'], function($routes) {
    $routes->get('/', 'Multipleimage::listing');
    $routes->post('get_table_data', 'Multipleimage::getTableData');
    $routes->post('update_status', 'Multipleimage::clicktoupdatestatus');
    // Route for adding a new Multipleimage
    $routes->get('add_page', 'Multipleimage::add_page');
    $routes->post('add_new_entryURL', 'Multipleimage::add_new_entryURL');
    /*update*/
    $routes->get('edit_page/(:num)', 'Multipleimage::edit_page/$1');
    $routes->post('update_page/(:num)', 'Multipleimage::update_dataURL/$1');
    /*delete*/
    $routes->get('singledelete/(:num)', 'Multipleimage::singledelete/$1');
    $routes->post('delete_all', 'Multipleimage::delete_all');

    /*single add more*/
    $routes->post('load_more_singleimage', 'Multipleimage::load_more_singleimage');
    $routes->post('load_more_multiimage', 'Multipleimage::load_more_multiimage');

});
























/*website routes*/

$routes->post('/home/enquiry_form', 'Home::enquiry_form'); //contact form
