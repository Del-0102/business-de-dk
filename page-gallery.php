<?php
/**
 * page-gallery.php – Photo Gallery (Seite mit Slug "gallery").
 * Tipp: Boxen später durch echte Bilder aus der Mediathek ersetzen.
 * @package business-de-dk
 */
get_header();
?>

<section class="hero hero-inner" style="padding-bottom:40px;">
	<div class="container" style="display:block;">
		<h1>Photo Gallery</h1>
		<p>Moments from events, forums, and network meetings across the DE-DK region.</p>
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
