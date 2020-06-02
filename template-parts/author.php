<div class="author-box card ">
	<div class="card-content">
		<div class="media">
			<div class="author-avatar media-left">
				<?php echo get_avatar(get_the_author_meta('ID')) ?>
			</div>
			<div class="media-content">
				<p class="author-name title"> <?php echo get_the_author_posts_link() ?> </p>
				<p class="subtitle"> <?php echo get_the_author_meta('tt_job') ?> </p>
			</div>
		</div>
		<div class="author-desc">
			<?php echo the_author_meta( 'description' ) ?>
		</div>
	</div>
</div>
