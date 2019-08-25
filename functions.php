<?php

/**
 * Google Analytics
 */
add_action( 'wp_head', function () {

	$ga_tag_id = 'UA-000-1';
	?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $ga_tag_id; ?>"></script>
	<script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }

      gtag('js', new Date());
      gtag('config', '<?= $ga_tag_id; ?>');
	</script>
	<?php

}, 99 );

/**
 * Enqueue Stylesheets & JS
 */
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i' );
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/styles/styles.css' );

	// JS
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'custom_scripts', get_template_directory_uri() . '/assets/js/theme.js', '', '1.0', true );
} );

/**
 * Prevent pasting weird formatting into TinyMCE
 */
add_filter( 'tiny_mce_before_init', function ( $init ) {
	$init['paste_as_text'] = true;

	return $init;
} );

/**
 * Remove useless stuff from <head>
 */
add_action( 'init', function () {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );          // https://kinsta.com/knowledgebase/disable-embeds-wordpress/
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'feed_links_extra', 3 );            // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links', 2 );                  // Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'wlwmanifest_link' );               // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link' );                 // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );    // prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );     // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'wp_generator' );                   // Display the XHTML generator that is generated on the wp_head hook, WP version

	add_filter( 'gform_display_add_form_button', '__return_false' );
}, 2 );

/**
 * Footer credits in admin dashboard
 */
add_filter( 'admin_footer_text', function () {
	_e( '<a href="https://hitwp.com/?utm_source=magister&utm_medium=theme">Theme by HitWP</a>' );
} );


add_action( 'after_setup_theme', function () {
	// No hard-coded <title> in the doc's head
	add_theme_support( 'title-tag' );

	// Enable Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'magister-featured-image', 800, 800, array( 'center', 'center' ) );

	// Register Navs
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
		)
	);
} );
