<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<title>
	  		<?php wp_title( $sep = '»', $display = true, $seplocation = 'right' );?>
	  		<?php bloginfo( $show = 'name' ); ?>		
	  	</title>
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
		<?php 
			wp_head();
		?>

		
		<script type="text/javascript">
		    window.addEventListener('DOMContentLoaded', function() {
		        QueryLoader2(document.querySelector(".section"), {
		            barColor: "#efefef",
		            backgroundColor: "#111",
		            percentage: true,
		            barHeight: 1,
		            minimumTime: 1000,
		            fadeOutTime: 1000
		        });
		    });
		</script>

	</head>

	<body>
	  	<img id="preload" src="http://musicforyou.cekuj.net/wp-content/uploads/2018/09/cave.jpg" />
	  	<img id="preload" src="http://musicforyou.cekuj.net/wp-content/uploads/2018/09/play.png" />
	  	<img id="preload" src="http://musicforyou.cekuj.net/wp-content/uploads/2018/09/pauza.png" />
	  	<img id="preload" src="http://musicforyou.cekuj.net/wp-content/uploads/2018/09/turnoff.png" />
	  	<img id="preload" src="http://musicforyou.cekuj.net/wp-content/uploads/2018/09/cross.png" />
	  	<img id="preload" src="http://musicforyou.cekuj.net/wp-content/uploads/2018/09/fbUvodniFotka.jpg" />