<?php
/**
 * Footer – CTA-Band + Seitenfuß. Auf jeder Seite identisch.
 * @package business-de-dk
 */
?>
</main><!-- #content -->

<!-- CTA-Band "Ready to connect?" (übersetzt) -->
<section class="cta-band">
	<div class="container">
		<p class="eyebrow"><?php echo esc_html( bdk_t('cta_eyebrow') ); ?></p>
		<h2><?php echo esc_html( bdk_t('cta_h2') ); ?></h2>
		<p><?php echo esc_html( bdk_t('cta_sub') ); ?></p>
		<a class="btn btn-light" href="<?php echo esc_url( bdk_page_url('join') ); ?>"><?php echo esc_html( bdk_t('cta_btn') ); ?></a>
	</div>
</section>

<!-- Footer mit Wortmarke -->
<footer class="site-footer">
	<div class="container">
		<div class="footer-top">
			<div class="footer-brand">
				<img class="footer-wordmark"
				     src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Wordmark_Branding.png' ); ?>"
				     alt="Business region" style="height:30px;width:auto;display:block;margin-bottom:6px;">
				<small>business-region.eu</small>
			</div>
			<div class="social">
				<a href="https://www.facebook.com/" aria-label="Facebook" target="_blank" rel="noopener">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M14 9h3V6h-3c-1.7 0-3 1.3-3 3v2H8v3h3v6h3v-6h3l1-3h-4V9c0-.6.4-1 1-1z"/></svg>
				</a>
				<a href="https://www.youtube.com/" aria-label="YouTube" target="_blank" rel="noopener">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M22 8.2a3 3 0 0 0-2.1-2.1C18 5.6 12 5.6 12 5.6s-6 0-7.9.5A3 3 0 0 0 2 8.2 31 31 0 0 0 1.6 12 31 31 0 0 0 2 15.8a3 3 0 0 0 2.1 2.1c1.9.5 7.9.5 7.9.5s6 0 7.9-.5A3 3 0 0 0 22 15.8 31 31 0 0 0 22.4 12 31 31 0 0 0 22 8.2zM10 15V9l5.2 3L10 15z"/></svg>
				</a>
				<a href="https://www.linkedin.com/" aria-label="LinkedIn" target="_blank" rel="noopener">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M6.5 8.5h-3v9h3v-9zM5 4a1.7 1.7 0 1 0 0 3.4A1.7 1.7 0 0 0 5 4zm6.5 4.5h-3v9h3v-4.8c0-2.5 3-2.7 3 0V17.5h3v-5.6c0-4.3-4.5-4.1-6-2v-1.4z"/></svg>
				</a>
			</div>
		</div>
		<p class="footer-copy">&copy; <?php echo esc_html( date( 'Y' ) ); ?> Business DE-DK &middot; <?php echo esc_html( bdk_t('footer_rights') ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
