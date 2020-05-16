<?php
wp_enqueue_script( 'single', get_theme_file_uri('scripts/single.js') );
get_header();
?>

<section id="primary" class="section article-section">
	<div class="container">
		<?php
		the_post();
		get_template_part( 'template-parts/content');
		?>
	</div>
</section>

<?php get_footer(); ?>

