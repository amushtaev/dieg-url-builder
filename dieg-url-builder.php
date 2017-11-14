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
$post_id = $post->ID;

$version = '0.0.1';
$plugin_name = 'dieg_utm';
$plugin_real_name = 'dieg-utm-url-builder';


$custom_fields = get_post_custom($post->ID);
  print "$custom_fields";
  print $custom_fields;


function dieg_showup() { 

global $post;
$fullval = get_permalink($post->ID);
$val = str_replace(home_url(), '', get_permalink()); 
$val = str_replace("/", "", $val);

$meta_key_term_fb;

$meta_key_content_fb;
$meta_value_content_fb;
$meta_key_term_go;
$meta_value_term_go;
$meta_key_content_go;
$meta_value_content_go;
// хранить дефолтные значения как в произвольных полях

$metas = get_post_meta( $post->ID ); // все мета поля

/*$meta_key_fb = Array(
    'post_id' => $this->post_id,
    'fb_tolstelka' => $this->fb_tolstelka
    );*/

//Update inserts a new entry if it doesn't exist, updates otherwise
//update_post_meta($post->ID, 'fb_tolstelka', $meta_key_fb);

/*$meta_key_fb = 'fb_tolstelka';
$meta_key_google = 'google';*/
$meta_value_term_fb = get_post_meta($post->ID,'utm_term', true);

if( array_key_exists('fb_tolstelka', $metas) !== 0 ) {
	update_post_meta($post->ID, 'fb_tolstelka', $meta_key_fb);
} elseif( array_key_exists('fb_tolstelka', $metas) === 0) {
    add_post_meta( $post->ID, 'fb_tolstelka', 'fb_tolstelka', false );
} 

if( array_key_exists('google', $metas) ) {
	update_post_meta($post->ID, 'google', $meta_key_google);
} else {
    add_post_meta( $post->ID, 'google', 'google', false );
}

if( array_key_exists('utm_term', $metas) ) {
	update_post_meta($post->ID, 'utm_term', $meta_value_term_fb);
} else {
    add_post_meta( $post->ID, 'utm_term', $meta_value_term_fb, false );
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

function array_fill_keys($array, $values) {
    if(is_array($array)) {
        foreach($array as $key => $value) {
            $arraydisplay[$array[$key]] = $values;
        }
    }
    return $arraydisplay;
}

?> 

