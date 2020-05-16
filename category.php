<?php
get_header();
$category_id = get_cat_ID(single_cat_title('', false));
$category = get_category( $category_id );
?>

<section id="primary" class="section">
	<div class="container">
		<main id="main" class="site-main">
			<p class="title section-label"><a href="<?php echo get_category_link( $category ) ?>"><?php echo $category->name ?></a></p>
			<div class="columns has-vdivider-desktop">
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
					));

					foreach ($subcat as $cat):
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
					?>
				</div>
			</div>
		</main>
		<nav class="pagination is-centered">
			<?php bulma_pagination(); ?>
		</nav>
	</div>
</section>

<?php get_footer(); ?>

