<?php
/**
 * front-page.php – Startseite (entspricht dem Home-Design).
 * @package business-de-dk
 */
get_header();
?>

<!-- HERO -->
<section class="hero hero-home">
	<div class="container">
		<h1>Connecting Businesses</h1>
		<p class="lead">Together for a stronger region.</p>

		<form class="hero-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3-3"/></svg>
			<input type="search" name="s" placeholder="Search stakeholders, events, interviews…">
		</form>

		<div class="hero-actions">
			<a class="btn btn-primary" href="<?php echo esc_url( bdk_page_url('network') ); ?>">Explore Network</a>
			<a class="btn btn-outline" href="<?php echo esc_url( bdk_page_url('about') ); ?>">About us</a>
		</div>
	</div>
</section>

<!-- WHAT WE OFFER -->
<section class="section">
	<div class="container">
		<p class="eyebrow">What we offer</p>
		<div class="offer-grid">

			<a class="offer-card" href="<?php echo esc_url( bdk_page_url('interviews') ); ?>">
				<span class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
				<h3>Interviews</h3>
				<p>In-depth conversations with stakeholders from across the border region.</p>
			</a>

			<a class="offer-card" href="<?php echo esc_url( bdk_page_url('network') ); ?>">
				<span class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><circle cx="6" cy="12" r="2.2"/><circle cx="18" cy="6" r="2.2"/><circle cx="18" cy="18" r="2.2"/><path d="M8 11l8-4M8 13l8 4" stroke="currentColor" stroke-width="1.4"/></svg></span>
				<h3>Network</h3>
				<p>Connect with businesses, consultants, and professionals across DE &amp; DK.</p>
			</a>

			<a class="offer-card" href="<?php echo esc_url( bdk_page_url('events') ); ?>">
				<span class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 9h18M8 3v4M16 3v4"/></svg></span>
				<h3>Events</h3>
				<p>Cross-border forums, workshops, and networking breakfasts near you.</p>
			</a>

		</div>
	</div>
</section>

<!-- FEATURED + UPCOMING -->
<section class="section section-soft">
	<div class="container home-two">

		<!-- Featured Interviews -->
		<div>
			<p class="eyebrow">Featured Interviews</p>
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
			<a class="link-arrow" href="<?php echo esc_url( bdk_page_url('interviews') ); ?>">See all interviews &rarr;</a>
		</div>

		<!-- Upcoming Events -->
		<div>
			<p class="eyebrow">Upcoming Events</p>
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
			<a class="link-arrow" href="<?php echo esc_url( bdk_page_url('events') ); ?>">See all events &rarr;</a>
		</div>

	</div>
</section>

<!-- NEWSLETTER -->
<section class="section">
	<div class="container">
		<div class="newsletter">
			<div>
				<h3>Stay Updated</h3>
				<p>Subscribe to our newsletter.</p>
			</div>
			<form method="post" action="#">
				<input type="email" name="newsletter_email" placeholder="Enter your email address" required>
				<button class="btn btn-white" type="submit">Subscribe</button>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
