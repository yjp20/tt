<div class="related-posts">
<p class="section-label"> Related Posts </p>
<?php
$i = 0;
if (have_posts()):
	while (have_posts()) {
		the_post();
		$i ++;
		echo '<div class="related-posts-item">';
		echo '<p class="related-posts-number"> 0'.$i.'. </p>';
		echo '<a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a>';
		echo '</div>';
	}
else:?>

<p>No related posts.</p>

<?php endif; ?>
</div>
