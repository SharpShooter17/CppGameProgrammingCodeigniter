<h3 class="panel-title">Zaloguj się!</h3>
<div class="divider"></div>

<?php
echo validation_errors();
echo form_open('login');
?>
<div class="row">
	<div class="input-field col s12 m6">
		<i class="material-icons prefix">account_circle</i>
		<input type="text" class="validate" name="username" placeholder="Podaj swój nick" value="<?=set_value('username'); ?>">
		<label for="username">Nick</label>
	</div>

	<div class="input-field col s12 m6">
		<i class="material-icons prefix">lock</i>
		<input type="password" class="validate" name="pass" placeholder="Podaj swoje hasło">
		<label for="password" class="control-label">Hasło</label>
	</div>
</div>
<div class="row">
	<div class="col s12 center-align">
	<button type="reset" name="Reset" class="btn">Wyczyść</button>
	<button type="submit" name="login" class="btn">	Zaloguj się</button>
	</div>
</div>

<?php echo form_close(); ?>