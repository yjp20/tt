<a href="<?php the_permalink() ?>">
	<div class="box has-background-dark has-text-white article-featured">
		<p class="article-featured-label"> <span class="section-label"> FEATURED </span> <span class="article-featured-date"> <?php echo get_the_date() ?> </span> </p>
		<h2 class="article-featured-title title has-text-white"> <?php the_title() ?> </h2>
		<p class="article-featured-subtitle subtitle has-text-white-ter"> <?php echo get_the_excerpt() ?> </h2>
		<p class="article-featured-author"> By <span><?php the_author() ?></span> </h2>
		<div class="article-featured-image">
			<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ?>" />
		</div>
	</div>
</a>
