	<section class="section has-background-primary">
		<div class="container">
			<p class="title"> Archives </p>
			<div class="select">
				<select onchange="document.location.href=this.options[this.selectedIndex].value;">
					<?php
					$archives = wp_get_archives( array(
						"format" => "option",
					) ); 
					?>
				</select>
			</div>
		</div>
	</section>
	<section class="section has-background-dark has-text-white">
		<div class="container">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ) : ?>
			<?php endif;?>
		</div>
	</section>
  <?php wp_footer(); ?>
  </body>
</html>
