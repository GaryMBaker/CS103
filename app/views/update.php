<div class="form-container">
	<?= Form::open('/edit') ?>
		<p><?= $update->id ?></p>
		<?= Form::hidden('id', $update->id) ?>
		<?= Form::label('name', 'Name: ') ?>
		<?= Form::input('text', 'name', $update->name) ?>
		<br>
		<?= Form::label('price', 'Price: ') ?>
		<?= Form::input('text', 'price', $update->price) ?>
		<br>
		<?= Form::label('image', 'Image Directory: ') ?>
		<?= Form::input('text', 'image', $update->image) ?>
		<br>
		<?= Form::label('content', 'Edit Content Line: ') ?>
		<?= Form::textarea('content', $update->description) ?>
		<?= Form::submit() ?>
	<?= Form::close() ?>
</div>