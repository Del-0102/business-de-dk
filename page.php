<?php
/**
 * page.php – generisches Template für normale Seiten.
 * @package business-de-dk
 */
get_header();
while ( have_posts() ) : the_post(); ?>
<section class="hero hero-inner"><div class="container" style="display:block;"><h1><?php the_title(); ?></h1></div></section>
<section class="section">
	<div class="container" style="max-width:760px;">
		<?php the_content(); ?>
	</div>
</section>
<?php endwhile; get_footer(); ?>
