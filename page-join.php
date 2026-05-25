<?php
/**
 * page-join.php – "Join the Network" (Slug "join"), übersetzt.
 * @package business-de-dk
 */
get_header();
?>

<section class="hero hero-inner">
	<div class="container">
		<div>
			<p class="eyebrow"><?php echo esc_html( bdk_t('nav_network') ); ?></p>
			<h1><?php echo esc_html( bdk_t('join_h1') ); ?></h1>
			<p><?php echo esc_html( bdk_t('join_desc') ); ?></p>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="form-card">
			<h2><?php echo esc_html( bdk_t('join_card_title') ); ?></h2>
			<p class="sub"><?php echo esc_html( bdk_t('join_card_sub') ); ?></p>

			<form method="post" action="#">
				<div class="field">
					<label for="jn-name"><?php echo esc_html( bdk_t('f_fullname') ); ?></label>
					<input type="text" id="jn-name" name="full_name" placeholder="<?php echo esc_attr( bdk_t('f_fullname') ); ?>" required>
				</div>
				<div class="field">
					<label for="jn-company"><?php echo esc_html( bdk_t('f_company') ); ?></label>
					<input type="text" id="jn-company" name="company" placeholder="<?php echo esc_attr( bdk_t('f_company') ); ?>">
				</div>
				<div class="field">
					<label for="jn-email"><?php echo esc_html( bdk_t('f_email') ); ?></label>
					<input type="email" id="jn-email" name="email" placeholder="<?php echo esc_attr( bdk_t('f_email') ); ?>" required>
				</div>
				<div class="field">
					<label for="jn-msg"><?php echo esc_html( bdk_t('f_message') ); ?></label>
					<textarea id="jn-msg" name="message" placeholder="<?php echo esc_attr( bdk_t('f_message') ); ?>"></textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-block"><?php echo esc_html( bdk_t('f_submit') ); ?></button>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
