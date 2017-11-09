<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="C++, game, programming, code, surorce, kod, źródłowy, gry, programowanie, obiektowe">
    <meta name="author" content="Bartosz Ujazdowski" />
    
    <!--AMP-->
    <!--<link rel="canonical" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUESTURI'];?>">-->
    <!--<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">-->
    <!-- <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script> -->
    <!-- <script async src="https://cdn.ampproject.org/v0.js"></script> -->
    <!-- <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript> -->
    
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../assets/css/materialize.min.css"  media="screen, projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <title><?php print $title; ?></title>
   	<?= $_scripts ?>
  	<?= $_styles ?>
	<script type="text/javascript">
   		<?php if (isset($script)) { print $script;} ?>
	</script>
  	<style type="text/css">
   		<?php if (isset($style)) { print $style;} ?>
	</style>
</head>
<body>
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../..//assets/js/materialize.min.js"></script>
	
	<div class="container">
		<div class="row">
	   		<?php print $header ?>
	   	</div>
	   	<?php print $menu ?>
	    <?php print $content ?>
	    <?php print $footer ?>
   </div>  
</body>
</html>