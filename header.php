<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if (is_singular()) echo "has-navbar-fixed-top" ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php // wp_body_open(); ?>
	<header id="masthead">
		<?php if (is_singular()) : ?>
		<nav class="navbar is-fixed-top">
			<div class="container">
				<div class="navbar-brand">
					<a href="<?php echo get_home_url() ?>" class="navbar-item"> <?php echo get_bloginfo( 'name' ); ?> </a>
					<div class="navbar-item is-hidden-desktop navbar-social-touch"> <?php echo social_buttons() ?> </div>
				</div>
				<div class="navbar-item is-hidden-touch"> <?php the_title() ?> </div>
				<div class="navbar-end is-hidden-touch">
					<div class="navbar-item"> <?php echo social_buttons() ?> </div>
				</div>
			</div>
		</nav>
		<progress class="progress is-primary" id="reading-progress" value="0"/>
		<?php else : ?>
		<nav class="navbar has-shadow">
			<div class="container">
				<div class="navbar-brand">
					<a href="<?php echo get_home_url() ?>" class="navbar-item"> <?php echo get_bloginfo( 'name' ); ?> </a>
					<a class="navbar-burger burger" data-target="primary-menu">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>
				<div class="navbar-menu" id="primary-menu">
					<div class="navbar-end">
						<?php echo preg_replace('/<a /', '<a class="navbar-item"',
						strip_tags(
							wp_nav_menu(
								array(
									'theme_location' => 'nav-menu',
									'depth' => 0,
									'container' => false,
									'echo' => false,
									'items_wrap' => '%3$s',
								)
							), '<a>')
							)
						?>
						<div class="navbar-item navbar-search has-dropdown is-hoverable is-hidden-touch">
							<div class="navbar-link"><i class="fa fa-search"></i></div>
							<div class="navbar-dropdown is-right">
								<div class="navbar-item">
									<?php get_search_form() ?>
								</div>
							</div>
						</div>
						<div class="navbar-item is-hidden-desktop">
							<?php get_search_form() ?>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<?php endif ?>
	</header>
