<?php
get_header();
$category = $wp_query->get_queried_object();
?>

<section id="primary" class="section">
	<div class="container">
		<main id="main" class="site-main">
			<p class="title section-label"><a href="<?php echo get_category_link( $category ) ?>"><?php echo $category->name ?></a></p>
			<?php if ( $category->name != "Former Columns" ) : ?>
				<div class="columns">
					<div class="column is-8">
						<?php
						while (have_posts()):
							the_post();
							get_template_part( 'template-parts/article', 'horizontal');
						endwhile;
						?>
					</div>
					<div class="column is-4">
						<?php
						$subcat = get_categories( array(
							"parent" => $category->cat_ID,
							'orderby'=>'id',
							'order'=>'DSC'
						));

						foreach ($subcat as $cat):
							if ($cat->name == "Former Columns") continue;
						?>
						<div class="section-header">
							<p class="section-label"> <a href="<?php echo get_category_link( $cat ); ?>"><?php echo $cat->name ?></p>
						</div>
						<?php
							$sub_query = new WP_Query(
							array(
								'cat' => $cat->cat_ID,
								'post_type' => 'post',
								'posts_per_page' => 4,
							));
							while ($sub_query->have_posts()):
								$sub_query->the_post();
								get_template_part( 'template-parts/article', 'vertical');
							endwhile;
						endforeach;

						foreach ($subcat as $cat):
							if ($cat->name == "Former Columns"):
								echo $cat->ID;
								echo '<a href="'.esc_url( get_term_link( $cat ) ).'"> Former Columns </a>';
							endif;
						endforeach;
						?>
					</div>
				</div>
				<nav class="pagination is-centered">
					<?php bulma_pagination(); ?>
				</nav>
			<?php else : ?>
				<?php
				$subcat = get_categories( array(
					"parent" => $category->cat_ID,
					'orderby'=>'id',
					'order'=>'DSC'
				));

				foreach ($subcat as $cat): ?>
				<p class="title is-4"><a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"> <?php echo $cat->name ?> </a></p>
				<div class="columns">
				<?php
					$sub_query = new WP_Query(
					array(
						'cat' => $cat->cat_ID,
						'post_type' => 'post',
						'posts_per_page' => 4,
					));

					while ($sub_query->have_posts()): ?>
						<div class="column is-3">
						<?php
						$sub_query->the_post();
						get_template_part( 'template-parts/article', 'vertical');
						echo "</div>";
					endwhile;
					echo "</div>";
				endforeach; ?>
			<?php endif; ?>
		</main>
	</div>
</section>

<?php get_footer(); ?>

