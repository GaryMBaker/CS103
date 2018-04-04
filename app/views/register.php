<?= Form::open('submit-register') ?>
	<div class="form">
		<div class="login-form">
			<?= Form::hidden('id', '') ?>
			<div class="login-form-row">
				<?= Form::label('username', 'Username') ?>
				<?= Form::input('text', 'username') ?>
			</div>
			<div class="login-form-row">
				<?= Form::label('password', 'Password') ?>
				<?= Form::password('password') ?>
			</div>
			<div class="login-form-row">
				<?= Form::submit() ?>
			</div>	
		</div>
	</div>
<?= Form::close() ?>