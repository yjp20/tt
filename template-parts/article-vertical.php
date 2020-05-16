<a href="<?php the_permalink() ?>">
	<div class="box article-vertical">
		<div class="article-vertical-image">
			<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ?>" />
		</div>
		<div class="article-vertical-headline-container">
			<p class="article-vertical-author"> By <span><?php the_author() ?></span></p>
			<h2 class="article-vertical-title title"> <?php the_title() ?> </h2>
		</div>
	</div>
</a>
