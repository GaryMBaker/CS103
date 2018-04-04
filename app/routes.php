<?php

Route::get('/', 'Site->index');

Route::get('/login', 'Site->login');
Route::post('/submit-login', 'Site->submit');
Route::post('/submit-register', 'Site->registration');

Route::post('/add', 'Admin->add_product');

Route::get('/admin', 'Admin->login');

Route::get('/admin/:id', 'Admin->userpage');

Route::get('/logout', 'Admin->logout');

Route::get('/shop', 'Site->shopFront');
Route::get('/shop/:id', 'Site->shop');
Route::get('/delete/:id', 'Admin->delete');
Route::get('/update/:id', 'Admin->update');
Route::post('/edit', 'Admin->edit');

Route::get('/cart', 'Orders->view');
Route::post('/cart/:id', 'Orders->add');
Route::post('/cart/update/:id', 'Orders->update');
Route::get('/cart/remove/:id', 'Orders->remove');
Route::get('/cart/clear', 'Orders->clear');


Route::post('/email', 'Site->send_email');

Route::get('/item/:slug', 'Site->individual');

Route::get('/cart/confirm', 'Orders->order');

Route::post('/search', 'Site->search');

Route::fallback(ERRORS.'404.php');