<?php
/**
 * index.php – Standard-Fallback (von WordPress vorgeschrieben).
 * @package business-de-dk
 */
get_header();
?>
<section class="hero hero-inner"><div class="container" style="display:block;"><h1><?php echo esc_html( get_the_title() ?: get_bloginfo('name') ); ?></h1></div></section>
<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article style="margin-bottom:40px;">
				<h2><?php the_title(); ?></h2>
				<div><?php the_content(); ?></div>
			</article>
		<?php endwhile; else : ?>
			<p>Noch kein Inhalt vorhanden.</p>
		<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>
