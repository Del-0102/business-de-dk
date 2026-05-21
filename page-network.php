<?php
/**
 * page-network.php – Network Database (Seite mit Slug "network").
 * @package business-de-dk
 */
get_header();

// Beispieldaten, falls noch keine Stakeholder im Backend angelegt wurden.
$demo = array(
	array('name'=>'Anna Schultz','role'=>'CEO & Founder','company'=>'NordTech GmbH','country'=>'DE','bio'=>'Building cross-border digital infrastructure connecting northern German SMEs with Scandinavian partners.','tag'=>'Technology'),
	array('name'=>'Lars Mikkelsen','role'=>'Research Director','company'=>'Univ. of Southern Denmark','country'=>'DK','bio'=>'Leading research into sustainable agriculture and food innovation in the Jutland-Funen region.','tag'=>'Education'),
	array('name'=>'Petra Hansen','role'=>'Export Manager','company'=>'MariTime Logistics A/S','country'=>'DK','bio'=>'Specialising in Baltic-North Sea freight corridors and port logistics between Esbjerg and Hamburg.','tag'=>'Maritime'),
	array('name'=>'Klaus Bremer','role'=>'Policy Advisor','company'=>'Schleswig-Holstein Ministry','country'=>'DE','bio'=>'Advising on EU cross-border funding programmes and regional development strategy for the INTERREG zone.','tag'=>'Government'),
	array('name'=>'Sofie Andersen','role'=>'Head of Innovation','company'=>'Region Syddanmark','country'=>'DK','bio'=>'Driving green transition projects and startup ecosystem development across Southern Denmark.','tag'=>'Public Sector'),
	array('name'=>'Henrik Wolf','role'=>'Managing Partner','company'=>'Borderland Ventures','country'=>'DE','bio'=>'Investing in early-stage companies with a cross-border DE-DK market strategy and sustainable potential.','tag'=>'Finance'),
);
?>

<!-- HERO -->
<section class="hero hero-inner">
	<div class="container">
		<div>
			<p class="eyebrow">Network</p>
			<h1>Business Network</h1>
			<p>Connect with entrepreneurs, institutions and cross-border stakeholders from the DE-DK border region.</p>
		</div>
		<div class="stat-box">
			<div><div class="num">240+</div><div class="lbl">Members</div></div>
			<div><div class="num">3</div><div class="lbl">Countries</div></div>
			<div><div class="num">18</div><div class="lbl">Sectors</div></div>
		</div>
	</div>
</section>

<!-- FILTER -->
<div class="filter-bar" data-filter-group data-target="#memberGrid">
	<div class="container">
		<label class="search-field">
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3-3"/></svg>
			<input type="search" placeholder="Search by name, company…" data-search-target="#memberGrid">
		</label>
		<div class="pills">
			<button class="pill active" data-value="all">All</button>
			<button class="pill" data-value="Technology">Technology</button>
			<button class="pill" data-value="Agriculture">Agriculture</button>
			<button class="pill" data-value="Maritime">Maritime</button>
			<button class="pill" data-value="Energy">Energy</button>
			<button class="pill" data-value="Education">Education</button>
		</div>
	</div>
</div>

<section class="section" style="padding-top:0;">
	<div class="container">
		<div class="results-info"><span>Showing 240 members</span><span>Sort by: Relevance</span></div>

		<div class="member-grid" id="memberGrid">
			<?php
			$q = new WP_Query( array( 'post_type' => 'stakeholder', 'posts_per_page' => 12 ) );
			if ( $q->have_posts() ) :
				while ( $q->have_posts() ) : $q->the_post();
					$name    = get_the_title();
					$role    = bdk_meta('role');
					$company = bdk_meta('company');
					$country = strtolower( bdk_meta('country') );
					$sectors = wp_get_post_terms( get_the_ID(), 'sector', array('fields'=>'names') );
					$cats    = implode(',', $sectors);
					?>
					<a class="member-card" href="<?php the_permalink(); ?>" data-cats="<?php echo esc_attr($cats); ?>" data-search="<?php echo esc_attr($name.' '.$company); ?>">
						<div class="member-top">
							<span class="avatar"><?php echo esc_html( bdk_initials($name) ); ?></span>
							<div>
								<h3><?php echo esc_html($name); ?></h3>
								<p class="role"><?php echo esc_html($role); ?><br><span class="company"><?php echo esc_html($company); ?></span></p>
							</div>
							<?php if ($country): ?><span class="flag <?php echo esc_attr($country); ?>"><?php echo esc_html(strtoupper($country)); ?></span><?php endif; ?>
						</div>
						<p class="bio"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
						<div class="member-foot">
							<?php if(!empty($sectors)): ?><span class="tag"><?php echo esc_html($sectors[0]); ?></span><?php else: ?><span></span><?php endif; ?>
							<span class="link-arrow" style="margin:0;">View Profile &rarr;</span>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata();
			else :
				// Fallback: Beispiel-Cards
				foreach ( $demo as $m ) : ?>
					<a class="member-card" href="#" data-cats="<?php echo esc_attr($m['tag']); ?>" data-search="<?php echo esc_attr($m['name'].' '.$m['company']); ?>">
						<div class="member-top">
							<span class="avatar"><?php echo esc_html( bdk_initials($m['name']) ); ?></span>
							<div>
								<h3><?php echo esc_html($m['name']); ?></h3>
								<p class="role"><?php echo esc_html($m['role']); ?><br><span class="company"><?php echo esc_html($m['company']); ?></span></p>
							</div>
							<span class="flag <?php echo esc_attr(strtolower($m['country'])); ?>"><?php echo esc_html($m['country']); ?></span>
						</div>
						<p class="bio"><?php echo esc_html($m['bio']); ?></p>
						<div class="member-foot">
							<span class="tag"><?php echo esc_html($m['tag']); ?></span>
							<span class="link-arrow" style="margin:0;">View Profile &rarr;</span>
						</div>
					</a>
				<?php endforeach;
			endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
