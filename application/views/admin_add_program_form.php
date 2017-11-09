<h3>Panel administratora!</h3>
<div class="divider"></div>
<h5>Dodaj program</h5>
<?php
echo form_open_multipart('admin');
?>
<div class="row">
	<div class="input-field col s12 m6">
		<i class="material-icons prefix">mode_edit</i>
		<input type="text" class="form-control" name="name" placeholder="Podaj nazwe programu" value="<?=set_value('name'); ?>">
		<label for="name" class="control-label">Nazwa programu</label>
	</div>

	<div class="input-field col s12 m6">
		<i class="material-icons prefix">mode_edit</i>
		<textarea class="materialize-textarea" rows="3" name="description" placeholder="Opis programu" value="<?=set_value('description'); ?>"></textarea>
		<label for="description" class="control-label">Opisz program</label>
	</div>
</div>
<div class="row">
	<div class="file-field input-field col s12 m6">
		<i class="material-icons prefix">photo</i>
		<div class="btn">
			<span>Wybierz zdjęcie</span>
			<input type="file" class="form-control" name="img" placeholder="Wybierz zdjęcie" value="<?=set_value('img'); ?>">
		</div>
		<div class="file-path-wrapper">
			<input class="file-path validate" type="text">
		</div>
	</div>

	<div class="file-field input-field col s12 m6">
		<i class="material-icons prefix">file_upload</i>
		<div class="btn">
			<span>Wybierz plik</span>
			<input type="file" class="form-control" name="file" placeholder="Wybierz plik" value="<?=set_value('file'); ?>">
		</div>
		<div class="file-path-wrapper">
			<input class="file-path validate" type="text">
		</div>
	</div>
</div>

<div class="row">
	<div class="col s12 center-align">
		<button type="reset" name="Reset" class="btn btn-danger">
			Wyczyść
		</button>
		<button type="submit" name="login" class="btn btn-success">
			Dodaj program
		</button>
	</div>
</div>

<?php echo form_close(); ?>
