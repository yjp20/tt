<?php
if (!is_admin()):
	wp_enqueue_style( 'style', get_theme_file_uri('tt.css') );
endif;
wp_enqueue_script( 'navbar', get_theme_file_uri('scripts/navbar.js') );
wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

// SETUP
if ( ! function_exists( 'tt_setup' ) ) :
function tt_setup() {
	$yarrp_options = get_option( "yarpp" );
	$yarrp_options->template = "yarpp-template-tt.php";
	$yarrp_options->auto_display_post_types = array();
	update_option( $yarrp );
}
endif;

// Default menus provided by the theme
function tttheme_register_my_menus() {
	register_nav_menus(
		array(
			'nav-menu' => __( 'Navigation Menu' ),
			'extra-menu' => __( 'Extra Menu' )
		)
	);
}
add_action( 'init', 'tttheme_register_my_menus');


// Set excerpt length
function tttheme_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'tttheme_custom_excerpt_length', 999 );


// Add classes to navbar <a> links
function add_menuclass($ulclass) {
	return preg_replace('/<a /', '<a class="list-group-item"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

// Pagination
function bulma_pagination() {
	global $wp_query;
	$big = 999999999; //I trust StackOverflow.
	$total_pages = $wp_query->max_num_pages; //you can set a custom int value to this var
	$pages = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $total_pages,
		'prev_next' => false,
		'type'  => 'array',
		'prev_next'   => true,
		'prev_text'    => __( 'Previous', 'text-domain' ),
		'next_text'    => __( 'Next', 'text-domain'),
	) );

	if ( is_array( $pages ) ):
		//Get current page
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var( 'paged' );

		//Disable Previous button if the current page is the first one
		if ($paged == 1):
			echo '<a class="pagination-previous" disabled>Previous</a>';
		else:
			echo '<a class="pagination-previous" href="' . get_previous_posts_page_link() . '">Previous</a>';
		endif;

		//Disable Next button if the current page is the last one
		if ($paged<$total_pages):
			echo '<a class="pagination-next" href="' . get_next_posts_page_link() . '">Next</a>
			<ul class="pagination-list">';
		else:
			echo '<a class="pagination-next" disabled>Next</a>
			<ul class="pagination-list">';
		endif;

		for ($i=1; $i<=$total_pages; $i++):
			if ($i == $paged):
				echo '<li><a class="pagination-link is-current" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
			else:
				echo '<li><a class="pagination-link" href="'. get_pagenum_link($i) . '">' . $i . '</a></li>';
			endif;
		endfor;

		echo '</ul>';
	endif;
}

// Share buttons
function social_buttons() {
	$url = urlencode(get_permalink());
	// Get current page title
	$title = str_replace(' ', '%20', get_the_title());
	$blog_title = get_bloginfo('name');
	$sharebuttons ='
	<div id="social-share">
		<a href="https://www.facebook.com/sharer.php?u='.$url.'" target="_blank"><i class="fab fa-facebook-f"></i></a>
		<a href="https://www.twitter.com/share?url='.$url.'" target="_blank"><i class="fab fa-twitter"></i></a>
	</div>';
	return $sharebuttons;
}


// Widgets Sidebar
register_sidebar(
	array(
		'name' => 'Home Sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="section-header"><div class="section-label">',
		'after_title' => '</div></div>',
	)
);

register_sidebar(
	array(
		'name' => 'Footer',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title has-text-white">',
		'after_title' => '</h2>',
	)
);

// Job field
add_action( 'show_user_profile', 'tt_user_profile_fields' );
add_action( 'edit_user_profile', 'tt_user_profile_fields' );

function tt_user_profile_fields( $user ) { ?>
    <h3><?php _e("TT Theme", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="tt_job"><?php _e("Job"); ?></label></th>
        <td>
            <input type="text" name="tt_job" id="tt_job" value="<?php echo esc_attr( get_the_author_meta( 'tt_job', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your job and graduating class like Graphics Editor, 2019-'20"); ?></span>
        </td>
    </tr>
    </table>
<?php }

add_action( 'personal_options_update', 'save_tt_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_tt_user_profile_fields' );

function save_tt_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'tt_job', $_POST['tt_job'] );
}

?>
