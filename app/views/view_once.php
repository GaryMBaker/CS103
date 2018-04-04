<?php 
use App\Auth;
?>
<div class="product-contain">
	<div class="product-cont">
		<img src="{{ url('/'.$item->image) }}" height='200px'>
		<div class="product-info">

			<h4><a href="{{ url('/item/'.$item->id) }}"> {{ $item->name }}</a></h4>
			<p>{{ $item->description }}</p>
			<h4>Price: ${{ $item->price }}</h4>
			{{ $users->id }}
			<?= Form::open('/cart/'.$item->id) ?>
				<?= Form::number('qty', ['class' => 'form-control'], ['value' => '1']) ?>
				<?= Form::submit('Add to cart', ['class' => 'btn btn-primary']) ?>
			<?= Form::close() ?>
		</div>
		<?php if(Auth::is_logged_in() == 1) {

				echo '<a href="/update/'.$item->id.'">Edit</a><br>';
			echo '<a href="/delete/'.$item->id.'">Delete</a>';
		}
		?> 
	</div>
</div>