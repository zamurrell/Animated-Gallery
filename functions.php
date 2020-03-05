<?php

// Add the following to your functions.php file

// Create /assets/js folder and gallery.js inside it
wp_register_script( 'project-gallery', get_stylesheet_directory_uri() . '/assets/js/gallery.js' );

// Within your site scripts and hook, enqueue the following files
wp_enqueue_script( 'project-gallery', get_stylesheet_directory_uri() . '/assets/js/gallery.js', array('jquery') );

// If you haven't already brought in gsap, do so (Green Sock Animation Platform) - still within site scripts
wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.1.1/gsap.min.js', array(), false, true );

// Directly below the add_action for your scripts, paste the following

// Query post and pass number of repeater rows (images) to gallery.js
$post1 = new WP_Query( array(
        'post_type'         => 'gallery',
        'orderby'           => 'menu_order',
        'order'             => 'ASC',
));

if( !$post1->have_posts() ) {
		return false;
	}

while( $post1->have_posts() ) {
	$post1 ->the_post();

	$ImageCount = count( get_field( 'gallery2' ) );
	$Interval = get_field( 'interval');

	$dataToBePassed = array(
		'repeater'            => $ImageCount,
		'interval' 			  => $Interval
	);

	wp_localize_script( 'project-gallery', 'php_vars', $dataToBePassed );

}

// Add the following as well to enable shortcodes and specify which callback function to call
function register_shortcodes() {
	add_shortcode('gallery1', 'gallery1_callback');
}
add_action('init', 'register_shortcodes');

// Finally, add the callback function.
/* Gallery Shortcode Callback Function */
function gallery1_callback() {

	$post = new WP_Query( array(
		'posts_per_page'    => 4,
        'post_type'         => 'gallery',
        'orderby'           => 'menu_order',
        'order'             => 'ASC',
	));

	if( !$post->have_posts() ) {
		return false;
	}

	while( $post->have_posts() ) {
		$post ->the_post();
		
		// Get the repeater field
		$repeater = get_field('gallery2');
		

		// Get random rows. Change the second parameter in array_rand() to the number of rows desired.
		$random_rows = array_rand( $repeater, 4);

		function random_replacements( $repeater ) {
			$random_replacements = array_rand( $repeater, 1);
			return $random_replacements;
		}

		$random_replacements = random_replacements( $repeater );

		

		function reload(){
			// <div class ="gallery-image',$i,'" style="display: none; background-image: url(', $repeater[$random_row]['gallery-image'],');">

			$i = 1;

			// Get repeater
			$repeater = get_field('gallery2');

			// Get number of images/rows in repeater
			$ImageCount = count( get_field( 'gallery2' ) );

			// Get images/rows
			$random_rows = array_rand( $repeater, $ImageCount);

			// Display images/rows
			echo '<div class="gallery">';

			if( is_array( $random_rows )) {

				foreach( $random_rows as $random_row) {

					// Output data here.
					echo '
		 					
		 				<a href=',$repeater[$random_row]['gallery-image'],' class="gallery-image',$i,'" data-rel="lightbox" style="display: none; background-image: url(', $repeater[$random_row]['gallery-image'],');"></a>';

		 			$i++;
				}
			}
			echo '</div>';
		}
		reload();
	}
}

// If you named your fields as instructed in the README file, you should be good to go!
// Install "Responsive Lighbox and Gallery" for lightbox use with gallery (the purpose of 'data-rel="lightbox" on line 106')