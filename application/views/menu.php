<nav>
	<div class="nav-wrapper light-green">
		<div class="hide-on-med-and-down">
			<a href="<?php echo site_url('/') ?>" class="brand-logo">
			<!--<img src="../../images/logo.webp" width=512 height=64 alt="C++ Game Programming" title="C++ Game Programming" /> -->
			</a>
		</div>
		<ul id="nav" class="right hide-on-med-and-down">
			<li>
				<a href='<?php echo site_url('/') ?>'>O mnie</a>
			</li>
			<li>
				<a href='<?php echo site_url('/curriculum_vitae/') ?>'>Curriculum Vitae</a>
			</li>
			<li>
				<a href='<?php echo site_url('/programs/') ?>'>Programy</a>
			</li>
			<li>
				<a href='<?php echo site_url('/rankings/') ?>'>Rankingi</a>
			</li>

			<?php if (!$logged):
			?>
			<li>
				<a href='<?php echo site_url('/register/') ?>'>Zarejestruj się</a>
			</li>
			<li>
				<a href='<?php echo site_url('/login/'); ?>'>Zaloguj się</a>
			</li>
			<?php else: ?>
			<li>
				<a href='<?php echo site_url('/login/logout/'); ?>'>Wyloguj się</a>
			</li>
			<?php if($user_role == 2):
			?>
			<li>
				<a href='<?php echo site_url('/admin/'); ?>'>Panel administratora</a>
			</li>
			<?php endif; ?>
			<?php endif; ?>
		</ul>
		<ul id="slide-out" class="side-nav">
			<li>
				<a href='<?php echo site_url('/') ?>'> O mnie </a>
			</li>
			<li>
				<a href='<?php echo site_url('/programs/') ?>'>Programy</a>
			</li>
			<li>
				<a href='<?php echo site_url('/rankings/') ?>'>Rankingi</a>
			</li>

			<?php if (!$logged):
			?>
			<li>
				<a href='<?php echo site_url('/register/') ?>'>Zarejestruj się</a>
			</li>
			<li>
				<a href='<?php echo site_url('/login/'); ?>'>Zaloguj się</a>
			</li>
			<?php else: ?>
			<li>
				<a href='<?php echo site_url('/login/logout/'); ?>'>Wyloguj się</a>
			</li>
			<?php if($user_role == 2):
			?>
			<li>
				<a href='<?php echo site_url('/admin/'); ?>'>Panel administratora</a>
			</li>
			<?php endif; ?>
			<?php endif; ?>
		</ul>
		<a href="#" data-activates="slide-out" class="button-collapse"><i class="large material-icons">menu</i><i class="mdi-navigation-menu"></i></a>
	</div>
</nav>

<div class="slider hide-on-med-and-down">
    <ul class="slides">
		<li>
        <img alt=" " src="<?php echo site_url('../../images/banner.png')?>"> <!-- random image -->
      </li>
      <li>
        <img alt=" " src="<?php echo site_url('../../images/tetris_screen.png')?>" /> <!-- random image -->
        <div class="caption left-align">
          <h3>Tetris!</h3>
          <h5 class="light grey-text text-lighten-3">Kultowy tetris. Układaj klocki i wejdź na szczyt rankingu.</h5>
        </div>
      </li>
      <li>
        <img alt=" " src="<?php echo site_url('../../images/KosmicznaPodroz.jpg')?>"> <!-- random image -->
        <div class="caption right-align">
          <h3>Kosmiczna podróż!</h3>
          <h5 class="light grey-text text-lighten-3">Poczuj się jak prawdziwy bohater w kosmosie.</h5>
        </div>
      </li>
      <li>
        <img alt=" " src="<?php echo site_url('../../images/TheWorldOfBoro.jpg')?>"> <!-- random image -->
        <div class="caption center-align">
          <h3>The World of Boro!</h3>
          <h5 class="light grey-text text-lighten-3">Pozbądź się wszystkich pingwinków.</h5>
        </div>
      </li>
      <li>
        <img alt=" " src="<?php echo site_url('../../images/szachy.jpg')?>">
        <div class="caption right-align">
          <h3>Szachy!</h3>
          <h5 class="light grey-text text-lighten-3">Trenuj swój umysł grając w ponad wiekową grę.</h5>
        </div>
      </li>
    </ul>
  </div>

<script>
	$('.button-collapse').sideNav({
		menuWidth : 300, // Default is 240
		edge : 'left', // Choose the horizontal origin
		closeOnClick : true // Closes side-nav on <a> clicks, useful for Angular/Meteor
	}); 
	$(document).ready(function(){
      $('.slider').slider({full_width: true, indicators: false});
    });
</script>