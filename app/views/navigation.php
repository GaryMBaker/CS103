<? use App\Auth; ?>
<nav>
	<ul>
		<img src="../../assets/images/IMG_3388.png" alt="">
		<li class='btn btn-primary'><a href="{{ url('/') }}">Home</a></li>
		<li class='btn btn-primary'><a href="{{ url('/shop') }}">Shop</a></li>
		<li class='btn btn-primary'><a href="{{ url('/cart') }}">Cart</a></li>
		<? if(Auth::is_logged_in() == 1): ?>
			<li class='btn btn-primary'><a href="{{ url('/admin') }}">Admin</a></li>
			<li class='btn btn-primary'><a href="{{ url('/logout') }}">Logout</a></li>
		<? else: ?>
			<li class='btn btn-primary'><a href="{{ url('/login') }}">Login</a></li>
		<? endif ?>
		<?= Form::open('/search') ?>
			<li>
				<?= Form::input('text', 'search', 'Search...') ?>
			</li>
		<?= Form::close() ?>
	</ul>
</nav>