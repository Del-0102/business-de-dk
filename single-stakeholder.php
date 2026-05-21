<?php
/**
 * single-stakeholder.php – Profilseite eines Netzwerk-Mitglieds.
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

<!-- HERO -->
<section class="hero hero-inner" style="padding-bottom:40px;">
	<div class="container" style="display:block;">
		<a class="back-link" href="<?php echo esc_url( bdk_page_url('network') ); ?>">&larr; Back to Network</a>
		<div class="profile-head">
			<span class="avatar"><?php echo esc_html( bdk_initials($name) ); ?></span>
			<div style="flex:1;">
				<h1><?php echo esc_html($name); ?><?php if($country): ?> <span class="flag <?php echo esc_attr($country); ?>" style="font-size:.7rem;"><?php echo esc_html(strtoupper($country)); ?></span><?php endif; ?></h1>
				<p class="role"><?php echo esc_html( trim( $role.' · '.$company.' · '.$loc, ' ·' ) ); ?></p>
			</div>
		</div>
		<div class="profile-actions">
			<a class="btn btn-light" href="#connect">Connect</a>
			<a class="btn btn-outline" href="#contact">Contact</a>
		</div>
	</div>
</section>

<!-- INHALT -->
<section class="section">
	<div class="container profile-layout">
		<div>
			<h2>About</h2>
			<div class="about-text"><?php the_content(); ?></div>

			<?php if ( ! empty( $sectors ) ) : ?>
				<h2 style="margin-top:34px;">Sectors &amp; Interests</h2>
				<div class="tag-list">
					<?php foreach ( $sectors as $s ) : ?>
						<span class="tag"><?php echo esc_html( $s ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<aside class="details-box">
			<h3>Details</h3>
			<dl>
				<dt>Member since</dt><dd><?php echo esc_html( bdk_meta('member_since') ?: '—' ); ?></dd>
				<dt>Location</dt><dd><?php echo esc_html( $loc ?: '—' ); ?></dd>
				<dt>Language</dt><dd><?php echo esc_html( bdk_meta('languages') ?: '—' ); ?></dd>
			</dl>
		</aside>
	</div>
</section>

<?php endwhile; get_footer(); ?>
