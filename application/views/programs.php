<div class="col s12">
	<?php $i = 0; ?>
	<?php foreach ($query as $item): ?>
		<?php if (($i%2) == 0): ?>
			<div class="row">
		<?php endif; ?>
		<div class="col s12 l6">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img src="<?php echo site_url('../../images/' . $item->img_path) ?>" alt="<?= $item -> name ?>" title="<?= $item -> name ?>" />
				</div>
				<div class="card-content">
		      		<span class="card-title activator grey-text text-darken-4"><?= $item -> name ?><i class="material-icons right">more_vert</i></span>
		      		<p class="truncate flow-text"><?= $item -> description ?></p>
		    	</div>
		    	 
		    	<div class="card-action">
		    		<i class="tiny material-icons">file_download</i>
              		<a href="<?php echo site_url('../../download/' . $item -> file_path); ?>">Pobierz</a>
              		<?php if (!$this->session->userdata('logged_in')): ?>
              		<a href="#click" onclick="Materialize.toast('Aby móc dodawać komentarze musisz się zalogować!', 4000)"><i class="tiny material-icons">comment</i>Dodaj komentarz</a>
              		<?php else: ?>
              		<a class="waves-effect waves-light modal-trigger" href='#modalprog<?php echo $item -> id; ?>'><i class="tiny material-icons">comment</i>Dodaj komentarz</a>	
				  	<?php endif; ?>
              	</div>            
              	
              	<div class="card-reveal">
		      		<span class="card-title grey-text text-darken-4"><?= $item -> name ?><i class="material-icons right">close</i></span>
		      		<p class="flow-text"><?= $item -> description ?></p>
		      		<?php if (isset($comments[$i])): ?>
		      			<h5>Komentarze</h5>
						<?php foreach ($comments[$i] as $com): ?>
							
							<div class="divider"></div>
							<div class="row">
								<div class="col s6">
								<?= $com -> username ?>
								</div>
								<div class="col s6">
									<?= $com -> date ?>
								</div>
								<div class="col s12">
									<?= $com -> comment ?>
								</div>
							</div>
													
						<?php endforeach; $i++; ?>
					<?php endif; ?>
		    	</div>	
			</div>
		</div>
		<?php if (($i%2) == 0): ?>
			</div>
		<?php endif; ?>
		<div id='modalprog<?php echo $item -> id; ?>' class="modal">
			<?php echo validation_errors(); ?>
			<?php echo form_open('programs/'); ?>
		<div class="modal-content input-field">
		 	<i class="material-icons prefix">mode_edit</i>
			<textarea name="comment" class="materialize-textarea" rows="3"></textarea>
			<label for="comment" class="control-label">Twój komentarz</label>
			<?php echo form_hidden('id_prog', $item -> id); ?> <br />
		</div>
		<div class="modal-footer">
		    <button data-target="modal_prog_<?php echo $item -> id; ?>" class="modal-action modal-close waves-effect waves-green btn-flat" name="submit"><i class="material-icons prefix">done</i>Wyślij</button>
		</div>				
			<?php echo form_close(); ?>    
		</div>
	<?php endforeach; ?>
</div>

<script>
	$(document).ready(function() {
		$('.modal-trigger').leanModal();
	});

</script>