<?php
/**
 * Header – auf jeder Seite identisch.
 * @package business-de-dk
 */
?>
<!DOCTYPE html>
<html lang="<?php echo esc_attr( bdk_html_lang() ); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container">

		<!-- Logo / Wortmarke -->
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img class="brand-logo"
			     src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Wordmark_Branding.png' ); ?>"
			     alt="Business region" style="height:30px;width:auto;display:block;">
		</a>

		<!-- Hauptnavigation (übersetzt) -->
		<nav class="main-nav" id="mainNav" aria-label="Hauptnavigation">
			<ul>
				<li><a class="<?php echo bdk_is_active('home') ? 'active' : ''; ?>"       href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( bdk_t('nav_home') ); ?></a></li>
				<li><a class="<?php echo bdk_is_active('network') ? 'active' : ''; ?>"    href="<?php echo esc_url( bdk_page_url('network') ); ?>"><?php echo esc_html( bdk_t('nav_network') ); ?></a></li>
				<li><a class="<?php echo bdk_is_active('interviews') ? 'active' : ''; ?>" href="<?php echo esc_url( bdk_page_url('interviews') ); ?>"><?php echo esc_html( bdk_t('nav_interviews') ); ?></a></li>
				<li><a class="<?php echo bdk_is_active('events') ? 'active' : ''; ?>"     href="<?php echo esc_url( bdk_page_url('events') ); ?>"><?php echo esc_html( bdk_t('nav_events') ); ?></a></li>
				<li><a class="<?php echo bdk_is_active('about') ? 'active' : ''; ?>"      href="<?php echo esc_url( bdk_page_url('about') ); ?>"><?php echo esc_html( bdk_t('nav_about') ); ?></a></li>
			</ul>
		</nav>

		<!-- Tools rechts: Sprach-Umschalter + Hamburger -->
		<div class="header-tools">
			<div class="lang-switch">
				<button class="lang-btn" id="langBtn" aria-haspopup="true" aria-expanded="false"><?php echo esc_html( strtoupper( bdk_current_lang() ) ); ?></button>
				<ul class="lang-menu" id="langMenu">
					<?php
					$labels = array( 'en' => 'English', 'de' => 'Deutsch', 'dk' => 'Dansk' );
					foreach ( $labels as $code => $label ) :
						$is = ( bdk_current_lang() === $code ) ? ' style="font-weight:800;color:var(--navy);"' : '';
					?>
						<li><a href="<?php echo esc_url( add_query_arg( 'lang', $code ) ); ?>"<?php echo $is; ?>><?php echo esc_html( $label ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<button class="menu-toggle" id="menuToggle" aria-label="Menü öffnen" aria-controls="mainNav" aria-expanded="false">
				<span></span><span></span><span></span>
			</button>
		</div>

	</div>
</header>

<main id="content">
