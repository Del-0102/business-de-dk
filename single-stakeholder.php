<?php
/**
 * single-stakeholder.php – Profilseite (übersetzt).
 * @package business-de-dk
 */
get_header();
while ( have_posts() ) : the_post();
	$name    = get_the_title();
	$role    = bdk_meta('role');
	$company = bdk_meta('company');
	$loc     = bdk_meta('location');
	$country = strtolower( bdk_meta('country') );
	$sectors = wp_get_post_terms( get_the_ID(), 'sector', array('fields'=>'names') );
?>

<section class="hero hero-inner" style="padding-bottom:40px;">
	<div class="container" style="display:block;">
		<a class="back-link" href="<?php echo esc_url( bdk_page_url('network') ); ?>"><?php echo esc_html( bdk_t('back_network') ); ?></a>
		<div class="profile-head">
			<span class="avatar"><?php echo esc_html( bdk_initials($name) ); ?></span>
			<div style="flex:1;">
				<h1><?php echo esc_html($name); ?><?php if($country): ?> <span class="flag <?php echo esc_attr($country); ?>" style="font-size:.7rem;"><?php echo esc_html(strtoupper($country)); ?></span><?php endif; ?></h1>
				<p class="role"><?php echo esc_html( trim( $role.' · '.$company.' · '.$loc, ' ·' ) ); ?></p>
			</div>
		</div>
		<div class="profile-actions">
			<a class="btn btn-light" href="#connect"><?php echo esc_html( bdk_t('btn_connect') ); ?></a>
			<a class="btn btn-outline" href="#contact"><?php echo esc_html( bdk_t('btn_contact') ); ?></a>
		</div>
	</div>
</section>

<section class="section">
	<div class="container profile-layout">
		<div>
			<h2><?php echo esc_html( bdk_t('about_label') ); ?></h2>
			<div class="about-text"><?php the_content(); ?></div>

			<?php if ( ! empty( $sectors ) ) : ?>
				<h2 style="margin-top:34px;"><?php echo esc_html( bdk_t('sectors_interests') ); ?></h2>
				<div class="tag-list">
					<?php foreach ( $sectors as $s ) : ?>
						<span class="tag"><?php echo esc_html( $s ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<aside class="details-box">
			<h3><?php echo esc_html( bdk_t('details_label') ); ?></h3>
			<dl>
				<dt><?php echo esc_html( bdk_t('member_since') ); ?></dt><dd><?php echo esc_html( bdk_meta('member_since') ?: '—' ); ?></dd>
				<dt><?php echo esc_html( bdk_t('location_label') ); ?></dt><dd><?php echo esc_html( $loc ?: '—' ); ?></dd>
				<dt><?php echo esc_html( bdk_t('language_label') ); ?></dt><dd><?php echo esc_html( bdk_meta('languages') ?: '—' ); ?></dd>
			</dl>
		</aside>
	</div>
</section>

<?php endwhile; get_footer(); ?>
