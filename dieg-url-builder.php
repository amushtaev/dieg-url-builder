<?php 
/**
 * JS Post
 * Plugin Name:       Dieg UTM URL Builder
 * Plugin URI:        
 * Description:       Generates UTM links.
 * Version:           0.0.1
 * Author:            Alex Musshtaev
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       utm
 */  

$dieg = 'dieg';
$diegtitle = 'UTM-метки поста';
$diegcallback = 'dieg_showup';

$version = '0.0.1';
$plugin_name = 'dieg_utm';
$plugin_real_name = 'dieg-utm-url-builder';


$custom_fields = get_post_custom($post->ID);
  print "$custom_fields";
  print $custom_fields;


function dieg_showup() { 

global $post;
$fullval = get_permalink($post_id);
$val = str_replace(home_url(), '', get_permalink()); 
$val = str_replace("/", "", $val);


// хранить дефолтные значения как в произвольных полях

$metas = get_post_meta( $post->ID ); // все мета поля
$meta_value_term_fb = get_post_meta($post->ID,'utm_term_fb', true);
$meta_key_fb = get_post_meta($post->ID,'fb_tolstelka', true);
$meta_key_google = get_post_meta($post->ID,'google', true);

//echo '<string>' . $meta_key_fb . '</string>';
//echo '<string>' . $meta_key_google . '</string>';
//echo '<string>' . $metas['fb_tolstelka'] . '</string>';

if( array_key_exists('fb_tolstelka', $metas) !== 0 ) {
	update_post_meta($post->ID, 'fb_tolstelka', 'fb_tolstelka');
	//echo '<string>1</string>';
	//print_r(get_post_meta($post->ID,'fb_tolstelka', false));
	//print array_key_exists('fb_tolstelka', $metas);
} else if( array_key_exists('fb_tolstelka', $metas) === 0 ) {
    add_post_meta( $post->ID, 'fb_tolstelka', 'fb_tolstelka', false );
    //echo '<string>2</string>';
} else {
	update_post_meta($post->ID, 'fb_tolstelka', $meta_key_fb);
	//echo '<string>3</string>';
}

if( array_key_exists('google', $metas !== 0) ) {
	update_post_meta($post->ID, 'google', $meta_key_google);
	//echo '<string>1g</string>';
	//print_r(get_post_meta($post->ID,'google', false));
	print array_key_exists('google', $metas);
} else if( array_key_exists('google', $metas) === 0 ) {
	//echo '<string>2g</string>';
    add_post_meta( $post->ID, 'google', 'google', false );
} else {
	//echo '<string>3g</string>';
	update_post_meta($post->ID, 'google', 'google');
}

if( array_key_exists('utm_term_fb', $metas !== 0) ) {
	update_post_meta($post->ID, 'utm_term_fb', $meta_value_term_fb);
	echo '<string>1f</string>';
	print_r(get_post_meta($post->ID,'utm_term_fb', false));
	print array_key_exists('utm_term_fb', $metas);
} else if( array_key_exists('utm_term_fb', $metas) === 0 ) {
	echo '<string>2f</string>';
    add_post_meta( $post->ID, 'utm_term_fb', '', false );
} else {
	echo '<string>3f -- '.$meta_value_term_fb. '</string>';
	print array_key_exists('utm_term_fb', $metas);
	//update_post_meta($post->ID, 'utm_term_fb', $meta_value_term_fb);
}


//
include_once('includes/dieg-sidebar-form.php');
include_once('includes/dieg-call-class.php');
include_once('includes/dieg-call-class-js.php');
} 


wp_enqueue_style($plugin_name, plugin_dir_url( __FILE__ ) . 'css/dieg.css?v=' . rand(), array(), $version, 'all');


function dieg_init($dieg, $diegtitle, $diegcallback) 
{ 	
	print $diegtitle;
	$post_id = get_the_ID();
	$post_type = get_post_type( $post->ID );

	add_meta_box( $dieg, 'UTM-метки поста', 'dieg_showup', $post_type, 'side', 'default'); 
} 

add_action('add_meta_boxes', 'dieg_init'); 

?> 

