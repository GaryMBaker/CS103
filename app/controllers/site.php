<?php

use App\Database;
use App\Auth;
use App\Model\User;
use App\Model\Products;
use App\Email;
use App\Model\Product;
use App\URL;

class Site extends Controller {
	function index() {
		View::load('home-header');
		View::load('slider');
		View::load('footer');
	}

	function individual($slug) {
		$product = new Product();
		$product->load(['id' => $slug]);
		$data['item'] = $product;

		View::load('header');
		View::load('view_once', $data);
		View::load('footer');
	}

	function shopFront() {
		$this->shop(1);
		$page = 0;
	}

	function shop($page) {
		if(!$page) {
			URL::redirect('/shop/1');
		}

		$perpage = 12;
		$totalpages = ceil(count($all_posts) / $perpage);

		$products = new Products();
		$products->paginate($perpage, $page);
		$products->where('deleted', 0)->get();

		$data['product'] = $products->items;
		$data['page'] = $page;
		$data['totalpages'] = $totalpages;

		View::load('header');
		View::load('shop', $data);
		View::load('footer');
	}

	function login() {
		View::load('header');
		View::load('login');
		View::load('footer');
	}

	function submit() {
		$user = new User();
		$user->load([
			'username' => $_POST['username']
		]);

		$verified = password_verify($_POST['password'], $user->password);

		if($user->id && $verified){
			Auth::log_in($user->id);
			URL::redirect('/admin/'.$user->id);
		} else {
			URL::redirect('/');
		}
	}

	function registration() {
		$newUser = new User();
		$newUser->username = $_POST['username'];
		$newUser->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$newUser->save();

		URL::redirect('/login');
	}

	function search() {
		$search = $_POST['search'];

		$products = Product::where([
			'name LIKE' => '%'.$_POST['search'].'%',
			'description LIKE' => '%'.$_POST['search'].'%'
		])->get();

		$data['products'] = $products;

		View::load('header');
		View::load('search', $data);
		View::load('footer');
	}

	function send_email() {
		$email = new Email();
		$email->from = $_POST['email'];
		$email->subject = $_POST['name'];
		$email->message = $_POST['message'];
		$email->send();

		URL::redirect('/');
	}
}