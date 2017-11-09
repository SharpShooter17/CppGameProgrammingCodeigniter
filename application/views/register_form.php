<h3>Zarejestruj się!</h3>

<div class="divider"></div>

<?php echo validation_errors(); ?>
<?php echo form_open('register'); ?>

<div class="row">
	<div class="input-field col s12 m6">
		<i class="material-icons prefix">account_circle</i>
		<input type="text" class="validate" name="username" placeholder="Podaj swój nick" value="<?=set_value('username'); ?>">
		<label for="username">Nick</label>
	</div>

	<div class="input-field col s12 m6">
		<i class="material-icons prefix">email</i>
		<input type="email" class="validate" name="email" placeholder="Podaj swój email" value="<?=set_value('email') ?>">
		<label for="email">Email</label>
	</div>
</div>

<div class="row">
	<div class="input-field col s12">
		<i class="material-icons prefix">lock</i>
		<input type="password" class="validate" name="password" placeholder="Podaj swoje hasło">
		<label for="password">Hasło</label>
	</div>
</div>
<div class="row">
	<div class="col s12 center-align">
		<button type="reset" name="Reset" class="btn">Wyczyść</button>
		<button type="submit" name="wyslij" class="btn">Zarejestruj się</button>
	</div>
</div>

<?php echo form_close(); ?>
