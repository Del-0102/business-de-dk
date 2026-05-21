<?php
/**
 * Header – auf jeder Seite identisch.
 * @package business-de-dk
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container">

		<!-- Logo / Marke -->
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="brand-badge">BR</span>
			<span class="brand-name">Business region</span>
		</a>

		<!-- Hauptnavigation -->
		<nav class="main-nav" id="mainNav" aria-label="Hauptnavigation">
			<ul>
				<li><a class="<?php echo bdk_is_active('home') ? 'active' : ''; ?>"       href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
				<li><a class="<?php echo bdk_is_active('network') ? 'active' : ''; ?>"    href="<?php echo esc_url( bdk_page_url('network') ); ?>">Network</a></li>
				<li><a class="<?php echo bdk_is_active('interviews') ? 'active' : ''; ?>" href="<?php echo esc_url( bdk_page_url('interviews') ); ?>">Interviews</a></li>
				<li><a class="<?php echo bdk_is_active('events') ? 'active' : ''; ?>"     href="<?php echo esc_url( bdk_page_url('events') ); ?>">Events</a></li>
				<li><a class="<?php echo bdk_is_active('about') ? 'active' : ''; ?>"      href="<?php echo esc_url( bdk_page_url('about') ); ?>">About</a></li>
			</ul>
		</nav>

		<!-- Tools rechts -->
		<div class="header-tools">
			<div class="lang-switch">
				<button class="lang-btn" id="langBtn" aria-haspopup="true" aria-expanded="false">EN</button>
				<ul class="lang-menu" id="langMenu">
					<li><a href="#en">English</a></li>
					<li><a href="#de">Deutsch</a></li>
					<li><a href="#dk">Dansk</a></li>
				</ul>
			</div>
			<button class="menu-toggle" id="menuToggle" aria-label="Menü öffnen" aria-controls="mainNav" aria-expanded="false">
				<span></span><span></span><span></span>
			</button>
		</div>

	</div>
</header>

<main id="content">
