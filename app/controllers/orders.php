<?php

use App\Cart;
use App\Auth;
use App\URL;
use App\Model\Order;
use App\Model\Orderline;

class Orders {

	function view() {
		View::load('header');
		View::load('view_cart');
		View::load('footer');
	}

	function add($id) {
		Cart::add_product($id, $_POST['qty']);
		URL::redirect('/cart');
	}

	function update($id) {
		Cart::set_quantity($id, $_POST['quantity']);
		URL::redirect('/cart');
	}

	function remove($id) {
		Cart::remove_product($id);
		URL::redirect('/cart');
	}

	function clear() {
		Cart::clear_cart();
		URL::redirect('/cart');
	}

	function order() {
		foreach (Cart::get_cart() as $id => $quantity) {
			if (!$id <= 0) {
				$orderline = new Orderline();
				$orderline->user_id = Auth::user_id();
				$orderline->product_id = $id;
				$orderline->quantity = $quantity;
				$orderline->date = date('Y/m/d H:i:s');
				$orderline->save();
			}
		}

		URL::redirect('/');
	}
}