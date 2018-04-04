<div class="form-container">
	<h3 class="form-heading">Use the form below to login to your account or use the other form to register your account.</h3>
	<div class="form-alignment">
		<?= Form::open('submit-login') ?>
			<div class="login-form">
				<h3>Login Here:</h3>
				<div class="login-form-row">
					<?= Form::label('username', 'Username') ?>
					<?= Form::input('text', 'username', '', ['class' => 'form-control']) ?>
				</div>

				<div class="login-form-row">
					<?= Form::label('password', 'Password' ) ?>
					<?= Form::password('password', '', ['class' => 'form-control']) ?>
				</div>

				<div class="login-form-row">
					<?= Form::submit('Login', ['class' => 'btn btn-primary']) ?>
				</div>
			</div>
		<?= Form::close() ?>
		<?= Form::open('submit-register') ?>
			<div class="login-form">
				<h3>Register Here:</h3>
				<?= Form::hidden('id', '') ?>
				<div class="login-form-row">
					<?= Form::label('username', 'Username') ?>
						<?= Form::input('text', 'username', '', ['class' => 'form-control']) ?>
				</div>
				<div class="login-form-row">
					<?= Form::label('password', 'Password') ?>
					<?= Form::password('password', '', ['class' => 'form-control']) ?>
				</div>
				<div class="login-form-row">
					<?= Form::submit('Register', ['class' => 'btn btn-primary']) ?>
				</div>
			</div>
		<?= Form::close() ?>
	</div>
</div>

