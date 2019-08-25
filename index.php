<?php
/**
 * This handles every single page on the site which is using this theme
 */
get_header();

query_posts( array(
	'post_type'      => 'page',
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'posts_per_page' => 9999
) );

while ( have_posts() ) : the_post(); ?>

	<div class="section" id="<?php _e( get_post_field( 'post_name' ) ); ?>">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</div>

<?php
endwhile;

get_footer();
