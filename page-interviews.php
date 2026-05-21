<?php
/**
 * page-interviews.php – Media Channel (Seite mit Slug "interviews").
 * @package business-de-dk
 */
get_header();

$demo = array(
	array('title'=>'Bridging Opportunities Across Borders','speaker'=>'John Doe','company'=>'ABC Company','dur'=>'18 min','cat'=>'Business'),
	array('title'=>'Innovation Beyond Borders','speaker'=>'Anna Möller','company'=>'TechNord GmbH','dur'=>'22 min','cat'=>'Innovation'),
	array('title'=>'Building Strong Partnerships','speaker'=>'Lars Nielsen','company'=>'Nielsen ApS','dur'=>'15 min','cat'=>'Business'),
	array('title'=>'Cross-Border Markets in 2026','speaker'=>'Petra Schulz','company'=>'Schulz GmbH','dur'=>'26 min','cat'=>'Cross-border'),
);
?>

<section class="hero hero-inner">
	<div class="container">
		<div>
			<p class="eyebrow">Media Channel</p>
			<h1>Interviews</h1>
			<p>In-depth conversations with stakeholders from the DE-DK border region.</p>
		</div>
		<div class="stat-box"><div><div class="num">24</div><div class="lbl">Videos</div></div></div>
	</div>
</section>

<div class="filter-bar" data-filter-group data-target="#videoGrid">
	<div class="container">
		<div class="pills">
			<button class="pill active" data-value="all">All</button>
			<button class="pill" data-value="Business">Business</button>
			<button class="pill" data-value="Innovation">Innovation</button>
			<button class="pill" data-value="Labour Market">Labour Market</button>
			<button class="pill" data-value="Cross-border">Cross-border</button>
		</div>
		<select class="sort-select"><option>Latest</option><option>Oldest</option></select>
	</div>
</div>

<section class="section">
	<div class="container">
		<div class="video-grid" id="videoGrid">
			<?php
			$q = new WP_Query( array( 'post_type' => 'interview', 'posts_per_page' => 8 ) );
			if ( $q->have_posts() ) :
				while ( $q->have_posts() ) : $q->the_post();
					$cats = wp_get_post_terms( get_the_ID(), 'interview_cat', array('fields'=>'names') ); ?>
					<a class="video-card" href="<?php the_permalink(); ?>" data-cats="<?php echo esc_attr( implode(',',$cats) ); ?>">
						<div class="video-thumb">
							<?php if ( has_post_thumbnail() ) the_post_thumbnail('large', array('style'=>'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;')); ?>
							<span class="play-btn"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
							<span class="video-dur"><?php echo esc_html( bdk_meta('duration') ); ?></span>
						</div>
						<div class="video-body">
							<h3><?php the_title(); ?></h3>
							<div class="video-foot"><span class="meta"><?php echo esc_html( bdk_meta('speaker').' · '.bdk_meta('company') ); ?></span><span class="link-arrow" style="margin:0;">Watch &rarr;</span></div>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata();
			else :
				foreach ( $demo as $v ) : ?>
					<a class="video-card" href="#" data-cats="<?php echo esc_attr($v['cat']); ?>">
						<div class="video-thumb">
							<span class="play-btn"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
							<span class="video-dur"><?php echo esc_html($v['dur']); ?></span>
						</div>
						<div class="video-body">
							<h3><?php echo esc_html($v['title']); ?></h3>
							<div class="video-foot"><span class="meta"><?php echo esc_html($v['speaker'].' · '.$v['company']); ?></span><span class="link-arrow" style="margin:0;">Watch &rarr;</span></div>
						</div>
					</a>
				<?php endforeach;
			endif; ?>
		</div>
		<div class="load-more"><button class="btn btn-white" style="border:1px solid var(--line);">Load more &darr;</button></div>
	</div>
</section>

<?php get_footer(); ?>
