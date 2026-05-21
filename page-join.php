<?php
/**
 * page-join.php – "Join the Network" (Seite mit Slug "join").
 * @package business-de-dk
 */
get_header();
?>

<section class="hero hero-inner">
	<div class="container">
		<div>
			<p class="eyebrow">Network</p>
			<h1>Join the Network</h1>
			<p>Become part of the cross-border business community connecting entrepreneurs across Germany and Denmark.</p>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="form-card">
			<h2>Join our network</h2>
			<p class="sub">Connect with businesses across borders.</p>

			<form method="post" action="#">
				<div class="field">
					<label for="jn-name">Full name</label>
					<input type="text" id="jn-name" name="full_name" placeholder="Full name" required>
				</div>
				<div class="field">
					<label for="jn-company">Company / Organisation</label>
					<input type="text" id="jn-company" name="company" placeholder="Company/Organisation">
				</div>
				<div class="field">
					<label for="jn-email">E-mail</label>
					<input type="email" id="jn-email" name="email" placeholder="E-Mail" required>
				</div>
				<div class="field">
					<label for="jn-msg">Message (optional)</label>
					<textarea id="jn-msg" name="message" placeholder="Message"></textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
