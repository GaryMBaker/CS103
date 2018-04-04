<?php

use App\Auth;
use App\URL;
use App\Model\User;
use App\Model\Product;
use App\Model\Products;
use App\Upload;

class Admin extends Controller {
	
	function __CONSTRUCT() {
		Auth::kickout('/login');
	}

	function login() {
		$users = new User();
		$users->load(['id' => Auth::user_id()]);
		if ($users->admin == 0) {
			View::load('header');
			echo "<div class='container' style='text-align: center;'><h3>Whoops, you're not an admin!</h3></div>";
			View::load('footer');
		} else {
			View::load('header');
			View::load('add_product');
			View::load('footer');
		}
	}

	function admin() {
		$create = new Product();
		$create->load($id);

		$data['create'] = $create;

		View::load('header');
		View::load('admin');
		View::load('footer');
	}

	function add_product() {
		$files = Upload::to_folder('/assets/images/', date('U').'_');
		$create = new Product();
		# replace the title and content with form data
		$create->fill($_POST);
		$create->image = $files[0]['filepath'];
		# send update query tto the database
		$create->save();

		URL::redirect('/shop');
	}

	function logout() {
		Auth::log_out();
		URL::redirect('/');
	}

	function userpage($id) {
		$users = new User();
		$users->load(['id' => $id]);

		$data['users'] = $users;

		View::load('header');
		View::load('user', $data);
		View::load('footer');
	}

	function delete($id) {
		# make a new blank page model
		$delete = new Product();
		# load the page with the id from the url
		$delete->load($id);
		# send and update query that does a soft delete
		$delete->delete();
		# go back to the shop page
		URL::redirect('/shop');
	}

	function update($id) {
		$update = new Product();
		$update->load($id);
		$data['update'] = $update;

		View::load('header');
		View::load('update', $data);
		View::load('footer');
	}

	function edit($id) {
		$update = new Product();
		# load the page from the database
		$update->load($_POST['id']);
		# replace the title and content with form data
		$update->fill($_POST);
		# send update query tto the database
		$update->save();
		# go back to the admin home
		URL::redirect('/shop');
	}
}