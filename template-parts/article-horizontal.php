<a href="<?php the_permalink() ?>">
	<div class="article-horizontal box">
		<div class="columns">
			<div class="column is-5">
				<div class="article-horizontal-image">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ?>" />
				</div>
			</div>
			<div class="article-horizontal-headline-container column">
				<h2 class="article-horizontal-title title"> <?php the_title() ?> </h2>
				<p class="article-horizontal-author"> By <span><?php the_author() ?></span> - <?php echo get_the_date() ?> </p>
			</div>
		</div>
	</div>
</a>

