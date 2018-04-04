<?php
use App\Model;
?>
<? if ($products == true): ?>
	<? foreach($products as $item): ?>
		<div class="product-container">
			<div class="product-content">
				<h4><a href="{{url('/item/'.$item->id)}}">{{ $item->name }}</a></h4>
				<p>{{ $item->description }}</p>
				<h4>Price: ${{ $item->price }}</h4>
				{{ $users->id }}
				<?= Form::open('/cart/'.$item->id) ?>
					<?= Form::number('qty', ['class' => 'form-control'], ['value' => '1']) ?>
					<?= Form::submit('Add to cart', ['class' => 'btn btn-primary']) ?>
				<?= Form::close() ?>
				<br>
			</div>
			<?= "<img src='$item->image' height='200px'>" ?>
		</div>
	<? endforeach ?>
<? else: ?>
	<?php 
		echo "<div class='container'>";
		echo "Actually your search results came back and nothing matched.";
		echo "</div>"
	?>
<? endif ?>