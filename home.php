<?php
wp_enqueue_script( 'home', get_theme_file_uri('scripts/home.js') );
get_header();
?>

<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column is-8">
			<?php
				global $do_not_duplicate;
				$the_query = new WP_Query( 'tag=featured&posts_per_page=1' );
				$the_query -> the_post();
				$do_not_duplicate[] = $post->ID;
				get_template_part( 'template-parts/article', 'featured');
			?>
				<div class="section-header">
					<p class="section-label"> School News </p>
				</div>
				<?php
					global $do_not_duplicate;
					$the_query = new WP_Query(
						array(
							'category_name' => 'School News',
							'post_type' => 'post',
							'posts_per_page' => 4,
						)
					);
					while ($the_query->have_posts()):
						$the_query -> the_post();
						if( $post->ID == $do_not_duplicate ) continue;
						$do_not_duplicate[] = $post->ID;
						get_template_part( 'template-parts/article', 'horizontal');
					endwhile;
				?>
				<div class="section-header">
					<p class="section-label"> Lifestyle </p>
				</div>
				<?php
					global $do_not_duplicate;
					$the_query = new WP_Query(
						array(
							'category_name' => 'Lifestyle',
							'post_type' => 'post',
							'posts_per_page' => 4,
						)
					);
					while ($the_query->have_posts()):
						$the_query -> the_post();
						if( $post->ID == $do_not_duplicate ) continue;
						$do_not_duplicate[] = $post->ID;
						get_template_part( 'template-parts/article', 'horizontal');
					endwhile;
				?>
				<div class="section-header">
					<p class="section-label"> Entertainment </p>
				</div>
				<?php
					global $do_not_duplicate;
					$the_query = new WP_Query(
						array(
							'category_name' => 'Entertainment',
							'post_type' => 'post',
							'posts_per_page' => 4,
						)
					);
					while ($the_query->have_posts()):
						$the_query -> the_post();
						if( $post->ID == $do_not_duplicate ) continue;
						$do_not_duplicate[] = $post->ID;
						get_template_part( 'template-parts/article', 'horizontal');
					endwhile;
				?>
				<div class="section-header">
					<p class="section-label"> Sports </p>
				</div>
				<?php
					global $do_not_duplicate;
					$the_query = new WP_Query(
						array(
							'category_name' => 'School News',
							'post_type' => 'post',
							'posts_per_page' => 4,
						)
					);
					while ($the_query->have_posts()):
						$the_query -> the_post();
						if( $post->ID == $do_not_duplicate ) continue;
						$do_not_duplicate[] = $post->ID;
						get_template_part( 'template-parts/article', 'horizontal');
					endwhile;
				?>
			</div>
			<div class="column is-4">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Sidebar") ) : ?>
				<?php endif;?>

				<div class="section-header">
					<p class="section-label"> Opinion </p>
				</div>
				<?php
					global $do_not_duplicate;
					$the_query = new WP_Query(
						array(
							'category_name' => 'Opinion',
							'post_type' => 'post',
							'posts_per_page' => 4,
						)
					);
					while ($the_query->have_posts()):
						$the_query -> the_post();
						if( $post->ID == $do_not_duplicate ) continue;
						$do_not_duplicate[] = $post->ID;
						get_template_part( 'template-parts/article', 'vertical');
					endwhile;
				?>
				<div class="section-header">
					<p class="section-label"> News </p>
				</div>
				<?php
					global $do_not_duplicate;
					$the_query = new WP_Query(
						array(
							'category_name' => 'Global News',
							'post_type' => 'post',
							'posts_per_page' => 4,
						)
					);
					while ($the_query->have_posts()):
						$the_query -> the_post();
						if( $post->ID == $do_not_duplicate ) continue;
						$do_not_duplicate[] = $post->ID;
						get_template_part( 'template-parts/article', 'vertical');
					endwhile;
				?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>

