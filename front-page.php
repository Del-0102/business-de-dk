<?php
/**
 * front-page.php – Startseite (übersetzt).
 * @package business-de-dk
 */
get_header();
?>

<!-- HERO -->
<section class="hero hero-home">
	<div class="container">
		<h1><?php echo esc_html( bdk_t('home_h1') ); ?></h1>
		<p class="lead"><?php echo esc_html( bdk_t('home_sub') ); ?></p>

		<form class="hero-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3-3"/></svg>
			<input type="search" name="s" placeholder="<?php echo esc_attr( bdk_t('search_ph') ); ?>">
		</form>

		<div class="hero-actions">
			<a class="btn btn-primary" href="<?php echo esc_url( bdk_page_url('network') ); ?>"><?php echo esc_html( bdk_t('btn_explore') ); ?></a>
			<a class="btn btn-outline" href="<?php echo esc_url( bdk_page_url('about') ); ?>"><?php echo esc_html( bdk_t('btn_about') ); ?></a>
		</div>
	</div>
</section>

<!-- WHAT WE OFFER -->
<section class="section">
	<div class="container">
		<p class="eyebrow"><?php echo esc_html( bdk_t('offer_label') ); ?></p>
		<div class="offer-grid">

			<a class="offer-card" href="<?php echo esc_url( bdk_page_url('interviews') ); ?>">
				<span class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
				<h3><?php echo esc_html( bdk_t('nav_interviews') ); ?></h3>
				<p><?php echo esc_html( bdk_t('offer_interviews_d') ); ?></p>
			</a>

			<a class="offer-card" href="<?php echo esc_url( bdk_page_url('network') ); ?>">
				<span class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><circle cx="6" cy="12" r="2.2"/><circle cx="18" cy="6" r="2.2"/><circle cx="18" cy="18" r="2.2"/><path d="M8 11l8-4M8 13l8 4" stroke="currentColor" stroke-width="1.4"/></svg></span>
				<h3><?php echo esc_html( bdk_t('nav_network') ); ?></h3>
				<p><?php echo esc_html( bdk_t('offer_network_d') ); ?></p>
			</a>

			<a class="offer-card" href="<?php echo esc_url( bdk_page_url('events') ); ?>">
				<span class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 9h18M8 3v4M16 3v4"/></svg></span>
				<h3><?php echo esc_html( bdk_t('nav_events') ); ?></h3>
				<p><?php echo esc_html( bdk_t('offer_events_d') ); ?></p>
			</a>

		</div>
	</div>
</section>

<!-- FEATURED + UPCOMING -->
<section class="section section-soft">
	<div class="container home-two">

		<div>
			<p class="eyebrow"><?php echo esc_html( bdk_t('featured_label') ); ?></p>
			<?php
			$feat = new WP_Query( array( 'post_type' => 'interview', 'posts_per_page' => 1 ) );
			if ( $feat->have_posts() ) :
				while ( $feat->have_posts() ) : $feat->the_post(); ?>
					<a class="feat-card" href="<?php the_permalink(); ?>">
						<span class="feat-thumb"><svg width="20" height="20" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span>
						<div>
							<h4><?php the_title(); ?></h4>
							<p class="meta"><?php echo esc_html( bdk_meta('speaker') . ' · ' . bdk_meta('company') ); ?></p>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata();
			else : ?>
				<a class="feat-card" href="#">
					<span class="feat-thumb"><svg width="20" height="20" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span>
					<div>
						<h4>Bridging Opportunities Across Borders</h4>
						<p class="meta">John Doe · CEO, ABC Company</p>
					</div>
				</a>
			<?php endif; ?>
			<a class="link-arrow" href="<?php echo esc_url( bdk_page_url('interviews') ); ?>"><?php echo esc_html( bdk_t('see_all_interviews') ); ?></a>
		</div>

		<div>
			<p class="eyebrow"><?php echo esc_html( bdk_t('upcoming_label') ); ?></p>
			<?php
			$ev = new WP_Query( array( 'post_type' => 'event', 'posts_per_page' => 2 ) );
			if ( $ev->have_posts() ) :
				while ( $ev->have_posts() ) : $ev->the_post();
					$d = strtotime( bdk_meta('event_date') ); ?>
					<a class="event-row" href="<?php the_permalink(); ?>">
						<span class="date-badge"><span class="m"><?php echo $d ? esc_html( date('M',$d) ) : 'TBA'; ?></span><span class="d"><?php echo $d ? esc_html( date('d',$d) ) : '–'; ?></span></span>
						<span><h4><?php the_title(); ?></h4><span class="loc"><?php echo esc_html( bdk_meta('location') ); ?></span></span>
					</a>
				<?php endwhile; wp_reset_postdata();
			else : ?>
				<a class="event-row" href="#"><span class="date-badge"><span class="m">May</span><span class="d">15</span></span><span><h4>Cross-Border Business Forum</h4><span class="loc">Flensburg, DE</span></span></a>
				<a class="event-row" href="#"><span class="date-badge"><span class="m">Jun</span><span class="d">10</span></span><span><h4>Networking Breakfast</h4><span class="loc">Kolding, DK</span></span></a>
			<?php endif; ?>
			<a class="link-arrow" href="<?php echo esc_url( bdk_page_url('events') ); ?>"><?php echo esc_html( bdk_t('see_all_events') ); ?></a>
		</div>

	</div>
</section>

<!-- NEWSLETTER -->
<section class="section">
	<div class="container">
		<div class="newsletter">
			<div>
				<h3><?php echo esc_html( bdk_t('nl_title') ); ?></h3>
				<p><?php echo esc_html( bdk_t('nl_sub') ); ?></p>
			</div>
			<form method="post" action="#">
				<input type="email" name="newsletter_email" placeholder="<?php echo esc_attr( bdk_t('nl_ph') ); ?>" required>
				<button class="btn btn-white" type="submit"><?php echo esc_html( bdk_t('nl_btn') ); ?></button>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
