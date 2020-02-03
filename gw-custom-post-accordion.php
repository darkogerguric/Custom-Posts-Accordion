<?php

/**
 * Plugin Name: Custom Posts Accordion
 * Plugin URI: http://geniusworks.xyz
 * Description: This plugin creates Bootstrap accordion from custom posts.
 * Version: 1.0.0
 * Author: Darko Gerguric
 * Author URI: http://geniusworks.xyz
 * License: GPL2
 */

// add our  js script
add_action( 'wp_enqueue_scripts', 'add_gw_accordion_script' );

function add_gw_accordion_script() {
	wp_enqueue_script( 'gw_accordion_script', plugin_dir_url( __FILE__ ) . '/assets/gw_accordion.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_style( 'gw_accordion_fa', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	
	wp_enqueue_style( 'gw_accordion_style', plugin_dir_url( __FILE__ ) . '/assets/style.css');
}


// Create  Shortcode
function gw_accordion_generate( $atts ) {

	// Attributes from shortcode
	$atts = shortcode_atts(
		array(
			'post_type' => 'foo',
      		'class' => '',
			'order_by' => 'ID',
			'order' => 'asc'
			),
			$atts
	);



$accordion=''; // start output
$collapse_count = 1; //start value for counter

	//Define our custom post type name in the arguments

	$args = array('post_type' => esc_attr($atts['post_type']),'orderby' => esc_attr($atts['order_by']),'order' => esc_attr($atts['order']));

	//Define the loop based on arguments
	ob_start();
	$loop = new WP_Query( $args );

	//Display the contents


		while ( $loop->have_posts() ) : $loop->the_post() 

		?>

			<div class="dg_acc_wrap">
				<div class="dg_acc_title">
					<h3><?php  the_title() ;?></h3>
					<span class="fa fa-angle-right">
				</div>
					<div class="dg_acc_cont">
						<p><?php echo  get_the_content(); ?></p>
					</div>
			</div>



<?php 
	endwhile;
			return ob_get_clean();wp_reset_postdata();
}
add_shortcode( 'gw_accordion', 'gw_accordion_generate' );
