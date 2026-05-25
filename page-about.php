<?php
/**
 * page-about.php – About Us (Slug "about"), übersetzt.
 * @package business-de-dk
 */
get_header();
// Öffnungszeiten: im Wörterbuch mit "|" getrennt -> hier zu Zeilen umbauen
$hours = array_map( 'esc_html', explode( '|', bdk_t('ic_hours_val') ) );
?>

<section class="hero hero-inner" style="padding-bottom:48px;">
	<div class="container" style="display:block;">
		<p class="eyebrow"><?php echo esc_html( bdk_t('nav_about') ); ?></p>
		<h1 style="max-width:520px;"><?php echo esc_html( bdk_t('about_h1') ); ?></h1>
		<p style="max-width:680px;"><?php echo esc_html( bdk_t('about_hero_desc') ); ?></p>
	</div>
</section>

<section class="section">
	<div class="container mission">
		<div>
			<p class="eyebrow"><?php echo esc_html( bdk_t('mission_label') ); ?></p>
			<h2><?php echo esc_html( bdk_t('mission_h2') ); ?></h2>
			<p><?php echo esc_html( bdk_t('mission_p1') ); ?></p>
			<p><?php echo esc_html( bdk_t('mission_p2') ); ?></p>
		</div>
		<div class="about-stats">
			<div><div class="num">3</div><div class="lbl"><?php echo esc_html( bdk_t('stat_countries') ); ?></div></div>
			<div><div class="num">240+</div><div class="lbl"><?php echo esc_html( bdk_t('stat_members') ); ?></div></div>
			<div><div class="num">18</div><div class="lbl"><?php echo esc_html( bdk_t('stat_sectors') ); ?></div></div>
			<div><div class="num">10+</div><div class="lbl"><?php echo esc_html( bdk_t('stat_years') ); ?></div></div>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<p class="eyebrow"><?php echo esc_html( bdk_t('wwd_label') ); ?></p>
		<div class="wwd-grid">
			<div class="wwd-card">
				<span class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path d="M4 12h16M14 6l6 6-6 6"/></svg></span>
				<h3><?php echo esc_html( bdk_t('wwd_share_t') ); ?></h3>
				<p><?php echo esc_html( bdk_t('wwd_share_d') ); ?></p>
			</div>
			<div class="wwd-card">
				<span class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><circle cx="7" cy="12" r="3"/><circle cx="17" cy="12" r="3"/><path d="M10 12h4"/></svg></span>
				<h3><?php echo esc_html( bdk_t('wwd_connect_t') ); ?></h3>
				<p><?php echo esc_html( bdk_t('wwd_connect_d') ); ?></p>
			</div>
			<div class="wwd-card">
				<span class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path d="M12 21s-7-4.5-7-10a7 7 0 0 1 14 0c0 5.5-7 10-7 10z"/></svg></span>
				<h3><?php echo esc_html( bdk_t('wwd_support_t') ); ?></h3>
				<p><?php echo esc_html( bdk_t('wwd_support_d') ); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<p class="eyebrow"><?php echo esc_html( bdk_t('git_label') ); ?></p>
		<h2 style="margin-bottom:28px;"><?php echo esc_html( bdk_t('git_h2') ); ?></h2>
		<div class="info-grid">
			<div class="info-card"><h4><?php echo esc_html( bdk_t('ic_address') ); ?></h4><p>Vestergade 9<br>6270 Tønder, Denmark</p></div>
			<div class="info-card"><h4><?php echo esc_html( bdk_t('ic_hours') ); ?></h4><p><?php echo implode( '<br>', $hours ); ?></p></div>
			<div class="info-card"><h4><?php echo esc_html( bdk_t('ic_contact') ); ?></h4><p>+45 21 77 59 16<br>info@business-region.eu</p></div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
