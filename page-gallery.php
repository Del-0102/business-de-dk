<?php
/**
 * page-gallery.php – Photo Gallery (Slug "gallery"), übersetzt.
 * Tipp: Boxen später durch echte Bilder ersetzen.
 * @package business-de-dk
 */
get_header();
?>

<section class="hero hero-inner" style="padding-bottom:40px;">
	<div class="container" style="display:block;">
		<h1><?php echo esc_html( bdk_t('gallery_h1') ); ?></h1>
		<p><?php echo esc_html( bdk_t('gallery_desc') ); ?></p>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="gallery-grid">
			<div class="g wide"></div>
			<div class="g tall"></div>
			<div class="g"></div>
			<div class="g"></div>
			<div class="g"></div>
			<div class="g"></div>
			<div class="g wide"></div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
