<?php

use App\Cart;
$subtotal = 0;
foreach(Cart::products() as $product) {
	$subtotal += $product->quantity * $product->price;
}
?>
<div class="container">
	<h2>Cart</h2>
	<? if(Cart::products()): ?>
	<table>
		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total</th>
			<th></th>
		</tr>
		<? foreach(Cart::products() as $product): ?>
			<tr>
				<td>
					<img src="<?=$product->image?>" alt="" width="150px" height="150px">
				</td>
				<td><?= $product->name ?></td>
				<td>
					<?= Form::open('/cart/update/'.$product->id) ?>
						<?= Form::number('quantity', $product->quantity) ?>
						<?= Form::submit('Update') ?>
					<?= Form::close() ?>
				</td>
				<td>$<?= $product->price ?></td>
				<td>$<?= $product->quantity * $product->price ?></td>
				<td>
					<a href="<?=url('/cart/remove/'.$product->id)?>">Remove</a>
				</td>
			</tr>
		<? endforeach ?>
	</table>
	<h2>Subtotal: $<?= $subtotal ?></h2>
	<a href="<?=url('/cart/clear')?>" class="btn btn-secondary">Clear</a>
	<a href="<?=url('/cart/confirm')?>" class="btn btn-primary">Place Order</a>
	<? else: ?>
		<p>There are no products in the cart</p>
	<? endif ?>
</div>