<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'BlogController::index');
$routes->get('/contact/form', 'BlogController::contact_form');
$routes->post('/contact/us', 'BlogController::contact_us');
$routes->get('/all/articles', 'BlogController::all_posts');
$routes->get('/post/(:segment)', 'BlogController::single_post/$1');
$routes->get('/category/(:segment)', 'BlogController::getPostBelongsToCategories/$1');



$routes->group('admin', static function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::dashboard');

    //dashboard settings
    $routes->get('settings/dashboard', 'Admin\SettingsController::dashboard');
    $routes->post('settings/dashboard/update', 'Admin\SettingsController::edit_dashboard');
    $routes->get('settings/site', 'Admin\SettingsController::site');
    $routes->post('settings/site/update', 'Admin\SettingsController::edit_site');

    //categories
    $routes->get('categories', 'Admin\CategoryController::index');
    $routes->get('add/category', 'Admin\CategoryController::create');
    $routes->post('store/category', 'Admin\CategoryController::store');
    $routes->get('edit/category/(:num)', 'Admin\CategoryController::edit/$1');
    $routes->post('update/category/(:num)', 'Admin\CategoryController::update/$1');
    $routes->get('delete/category/(:num)', 'Admin\CategoryController::delete/$1');


    //posts
    $routes->get('posts', 'Admin\PostController::index');
    $routes->get('trashed/posts', 'Admin\PostController::trashed_posts');
    $routes->get('add/post', 'Admin\PostController::create');
    $routes->post('store/post', 'Admin\PostController::store');
    $routes->get('show/post/(:num)', 'Admin\PostController::show/$1');
    $routes->get('edit/post/(:num)', 'Admin\PostController::edit/$1');
    $routes->post('update/post/(:num)', 'Admin\PostController::update/$1');
    $routes->get('delete/post/(:num)', 'Admin\PostController::delete/$1');
    $routes->get('force/delete/post/(:num)', 'Admin\PostController::force_delete/$1');
    $routes->get('restore/post/(:num)', 'Admin\PostController::restore/$1');
    $routes->get('view/post/(:num)', 'Admin\PostController::view/$1');
    $routes->post('upload/uploadImage', 'Admin\PostController::uploadImage');


    //users
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('add/user', 'Admin\UserController::create');
    $routes->post('store/user', 'Admin\UserController::store');
    $routes->get('edit/user/(:num)', 'Admin\UserController::edit/$1');
    $routes->post('update/user/(:num)', 'Admin\UserController::update/$1');
    $routes->get('delete/user/(:num)', 'Admin\UserController::delete/$1');


    //mails
    $routes->get('mails', 'Admin\MailController::index');
    $routes->get('add/mail', 'Admin\MailController::create');
    $routes->post('store/mail', 'Admin\MailController::store');
    $routes->get('edit/mail/(:num)', 'Admin\MailController::edit/$1');
    $routes->post('update/mail/(:num)', 'Admin\MailController::update/$1');
    $routes->get('delete/mail/(:num)', 'Admin\MailController::delete/$1');

});

//register
$routes->get('register','AuthController::register');
$routes->post('register','AuthController::doRegister');

//login

$routes->get('login','AuthController::login');
$routes->post('login','AuthController::doLogin');

//logout
$routes->get('logout','AuthController::logout');
