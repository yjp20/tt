<?php get_header(); ?>

<section id="primary" class="section">
	<div class="container">
		<h1 class="title"> <?php wp_title( ">" ) ?> </h1>
		<?php
		if ( have_posts() ):
			while ( have_posts() ):
				the_post();
				if ( is_singular() ):
					get_template_part( 'template-parts/content/content');
				else:
					get_template_part( 'template-parts/article', 'horizontal');
				endif;
			endwhile;
		endif;
		?>
	</div>
</section>

<?php get_footer(); ?>

