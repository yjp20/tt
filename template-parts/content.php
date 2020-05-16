<article class="article" id="single">
	<div class="article-image">
		<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ?>" />
	</div>
	<div class="columns">
		<div class="column is-8">
			<main id="main" class="site-main">
				<div class="article-container">
					<div class="article-header">
						<?php
						$setcats = get_the_category();
						$setcat = end($setcats);
						?>
						<p class="section-label"><a href="<?php echo get_category_link($setcat) ?>"> <?php echo $setcat->name ?></a></p>
						<h2 class="article-title title"> <?php the_title() ?> </h2>
						<p class="article-subtitle subtitle"> <?php echo get_the_excerpt() ?> </p>
						<p class="article-meta">
							<span class="article-author"> By <?php echo get_the_author_posts_link() ?> </span>
							<span class="article-date"> <?php the_date() ?> </span>
						</p>
					</div>
					<div class="article-content content" id="content">
						<?php the_content() ?>
					</div>
					<?php comments_template() ?>
				</div>
			</main>
		</div>
		<div class="column is-4">
			<?php get_template_part( 'template-parts/author' ) ?>
			<?php related_posts() ?>
		</div>
	</div>
</article>
