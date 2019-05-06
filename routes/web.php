<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','F_home@index');

Route::get('about','control@about');

Route::get('contact','control@contact');
Route::post('add-contact','control@addContact');

Route::get('page/{slug}','F_home@page');

// pdf view
Route::get('pdf/{id}','F_home@pdf');
Route::get('detail-article/{slug}','F_home@detailArticle');

// Admin auth
Route::get('/back','LoginController@loginform');
Route::post('/dologin','LoginController@dologin');
Route::get('/logout','LoginController@logout');

// Dashboard admin
Route::get('/dashboard','C_dashboard@dash');

// set admin
Route::get('/set-admin','C_admin@list_admin');
Route::post('/add-admin','C_admin@add_admin');
Route::get('del-admin/{id}','C_admin@del_admin');

// masterdata
Route::get('back-contact','C_divisi@list_contact');
Route::get('del-messege/{id}','C_divisi@del_messege');

Route::get('divisi','C_divisi@list_divisi');
Route::get('del-divisi/{id}','C_divisi@del_divisi');
Route::post('add-divisi','C_divisi@add_divisi');
Route::patch('update-divisi/{id}','C_divisi@upd_divisi');


// album
Route::get('album/{id}','C_album@list_album');
Route::post('add-album/{id}','C_album@add_album');
Route::patch('upd-album/{id}','C_album@upd_album');
Route::get('del-album/{id}','C_album@del_album');

// Page Home
Route::get('/testimonial/','C_testi@testi_list');
Route::get('/banner','C_banner@bannerList');
Route::get('meta','C_dashboard@meta');

// Menu
Route::get('menuList','C_content@menuList');
Route::post('add-menu','C_content@addMenu');
Route::get('del-menu/{id}','C_content@delMenu');
Route::patch('upd-menu/{id}','C_content@updMenu');
// submenu
Route::get('sub-menu/{id}','C_content@subMenu');
Route::post('add-sub-menu/{id}','C_content@addsubMenu');
Route::patch('upd-sub-menu/{id}','C_content@updsubMenu');

// Post
Route::get('postList/{id}','C_content@postList');
Route::get('add-post/{id}','C_content@addpost');
Route::post('upload-post/{id}','C_content@uploadPost');
Route::get('del-post/{id}','C_content@delPost');
// list
Route::post('add-headline/{id}','C_content@addHeadline');
Route::get('del-headline/{id}','C_content@delHeadline');
Route::get('add-list/{id}','C_content@addList');
Route::get('add-new-list/{id}','C_content@addNewList');
Route::post('upload-list/{id}','C_content@uploadList');
Route::get('del-list/{id}','C_content@delList');

// Isi Content
Route::post('add-projek/{id}','C_content@addProjek');
Route::get('del-projek/{id}','C_content@delProjek');

// report
Route::get('add-new-report/{id}','C_content@addNewReport');
Route::post('upload-report/{id}','C_content@uploadReport');
