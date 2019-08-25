<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<noscript>
		<style>
			.section {
				display: block;
			}
		</style>
	</noscript>
</head>
<body <?php body_class(); ?>>
<nav class="menu-container">
	<label for="menu-toggler">
		<input type="checkbox" class="menu-toggler" id="menu-toggler">
		<span class="menu-bars"><span></span><span></span><span></span></span>
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'dropdown' ) ); ?>
	</label>
</nav>

