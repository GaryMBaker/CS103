<div class="form-container" style="padding: 2em;">
	<h4>Please fill in all the fields before creating the new product.</h4>
	<br>
	<?= Form::open('/add') ?>
		<?= Form::label('name', 'Name: ') ?>
		<?= Form::input('text', 'name', '') ?>
		<br>
		<?= Form::label('price', 'Price: ') ?>
		<?= Form::input('text', 'price', '') ?>
		<br>
		<?= Form::label('image', 'Image: ') ?>
		<?= Form::file() ?>
		<br>

		<br>
		<?= Form::label('description', 'Edit Content Line: ') ?>
		<?= Form::textarea('description', '') ?>
		<br>
		<?= Form::submit() ?>
	<?= Form::close() ?>
</div>