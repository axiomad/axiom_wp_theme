<?php wp_head(); ?>
<div class="site-container">
<?php get_header(); ?>
<?php if (have_posts()): ?>

		<main id="main" class="site-main" role="main">
			<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
								the_content();
				// End of the loop.
				endwhile;
			?>
		</main>

<?php endif; ?>
<?php get_footer(); ?>
</div>