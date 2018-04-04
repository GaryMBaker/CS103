<? $next = $page+1 ?>
<? use App\Auth; ?>

<div class="center">
<? foreach ($product as $item): ?>

	<div class="product-container">
		<!-- <div class="product-content">
			<div class="product-info">
				<h4><a href="{{ url('/item/'.$item->id) }}"> </a></h4>
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
		</div> -->
		<a href="{{ url('/item/'.$item->id) }}"><img src="{{ url('/'.$item->image) }}" height='200px'></a>
		{{ $item->name }}
	</div>
<? endforeach ?>
</div>
<div class="pagination">
	<ul>
		<?php if ($page == 1) {
		} else {
			echo "<li><a href=". url('/shop/'.($page-1)) .">Previous Page</a></li>";
		}?>
		<? for($i = 1;$i <= $totalpages; $i++): ?>
			<li class="{{ $i == $page? 'current' : ''}}">
				<a href="{{ url('/shop/'.$i) }}">
					{{ $i }}
				</a>
			</li>
		<? endfor ?>
		<li>
			<a href="{{ url('/shop/'.($page+1)) }}">Next Page</a>
		</li>
	</ul>
</div>