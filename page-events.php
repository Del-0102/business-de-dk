<?php
/**
 * page-events.php – Events (Slug "events"), übersetzt.
 * @package business-de-dk
 */
get_header();

$demo = array(
	array('title'=>'Cross-Border Business Forum','loc'=>'Flensburg, DE','date'=>'2026-05-15','cat'=>'Forum'),
	array('title'=>'Networking Breakfast','loc'=>'Kolding, DK','date'=>'2026-06-10','cat'=>'Networking'),
	array('title'=>'Innovation Workshop','loc'=>'Hamburg, DE','date'=>'2026-06-24','cat'=>'Workshop'),
	array('title'=>'DE-DK Trade Summit','loc'=>'Aarhus, DK','date'=>'2026-07-03','cat'=>'Business'),
);
?>

<section class="hero hero-inner">
	<div class="container">
		<div>
			<p class="eyebrow"><?php echo esc_html( bdk_t('nav_events') ); ?></p>
			<h1><?php echo esc_html( bdk_t('nav_events') ); ?></h1>
			<p><?php echo esc_html( bdk_t('events_desc') ); ?></p>
		</div>
		<div class="stat-box"><div><div class="num">12</div><div class="lbl"><?php echo esc_html( bdk_t('stat_events') ); ?></div></div></div>
	</div>
</section>

<div class="filter-bar" data-filter-group data-target="#eventsGrid">
	<div class="container">
		<div class="pills">
			<button class="pill active" data-value="all"><?php echo esc_html( bdk_t('filter_all') ); ?></button>
			<button class="pill" data-value="Business"><?php echo esc_html( bdk_t('cat_business') ); ?></button>
			<button class="pill" data-value="Networking"><?php echo esc_html( bdk_t('cat_networking') ); ?></button>
			<button class="pill" data-value="Forum"><?php echo esc_html( bdk_t('cat_forum') ); ?></button>
			<button class="pill" data-value="Workshop"><?php echo esc_html( bdk_t('cat_workshop') ); ?></button>
		</div>
		<select class="sort-select"><option><?php echo esc_html( bdk_t('sort_latest') ); ?></option><option><?php echo esc_html( bdk_t('sort_oldest') ); ?></option></select>
	</div>
</div>

<section class="section">
	<div class="container">
		<div class="events-grid" id="eventsGrid">
			<?php
			$q = new WP_Query( array( 'post_type' => 'event', 'posts_per_page' => 8 ) );
			if ( $q->have_posts() ) :
				while ( $q->have_posts() ) : $q->the_post();
					$d    = strtotime( bdk_meta('event_date') );
					$cats = wp_get_post_terms( get_the_ID(), 'event_cat', array('fields'=>'names') ); ?>
					<article class="event-card" data-cats="<?php echo esc_attr( implode(',',$cats) ); ?>">
						<?php if(!empty($cats)): ?><span class="cat"><?php echo esc_html($cats[0]); ?></span><?php endif; ?>
						<div class="m"><?php echo $d ? esc_html(date('M',$d)) : 'TBA'; ?></div>
						<div class="d"><?php echo $d ? esc_html(date('d',$d)) : '–'; ?></div>
						<h3><?php the_title(); ?></h3>
						<div class="loc"><?php echo esc_html( bdk_meta('location') ); ?></div>
						<a class="reg" href="<?php the_permalink(); ?>"><?php echo esc_html( bdk_t('register') ); ?></a>
					</article>
				<?php endwhile; wp_reset_postdata();
			else :
				foreach ( $demo as $e ) : $d = strtotime($e['date']); ?>
					<article class="event-card" data-cats="<?php echo esc_attr($e['cat']); ?>">
						<span class="cat"><?php echo esc_html($e['cat']); ?></span>
						<div class="m"><?php echo esc_html(date('M',$d)); ?></div>
						<div class="d"><?php echo esc_html(date('d',$d)); ?></div>
						<h3><?php echo esc_html($e['title']); ?></h3>
						<div class="loc"><?php echo esc_html($e['loc']); ?></div>
						<a class="reg" href="#"><?php echo esc_html( bdk_t('register') ); ?></a>
					</article>
				<?php endforeach;
			endif; ?>
		</div>
		<div class="load-more"><button class="btn btn-white" style="border:1px solid var(--line);"><?php echo esc_html( bdk_t('load_more') ); ?></button></div>
	</div>
</section>

<?php get_footer(); ?>
