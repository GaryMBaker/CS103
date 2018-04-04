<div class="container">
	<h4>Welcome: {{ $users->username }}</h4>
	<h4>{{ $users->id }}</h4>
	<?php
		if($users->admin == 1) {
			print_r($users);
			echo '<a href="/admin">View Your Admin Privileges</a>';
		}
	?>
</div>