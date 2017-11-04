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



function dieg_showup() { 

global $post;
$fullval = get_permalink($post->ID);
$val = str_replace(home_url(), '', get_permalink()); 

echo '<div method="get" action="'. $val .'?utm_source=wp" name="dieg_utm">'; 
echo 'URL страницы записи : <p class="howto">'. $fullval .'</p>'; 
echo '<input id="dieg_utm_source" class="dieg-hide '. $post_id .'" type="text" name="url" value="'. $val .'?utm_source=wp">'; 
echo '<span id="dieg_utm_block"></span>'; 
echo '<a id="dieg_utm" href="https://dieg.info/" class="dieg-btn" target="_blank">Отправить</a>'; 
echo '</div>'; 
} 


$version = '0.0.1';
$plugin_name = 'dieg_utm';
$plugin_real_name = 'dieg-utm-url-builder';


wp_enqueue_style($plugin_name, plugin_dir_url( __FILE__ ) . 'css/dieg.css?v=' . rand(), array(), $version, 'all');
wp_enqueue_script($plugin_name, plugin_dir_url( __FILE__ ) . 'js/dieg.js?v=' . rand(), array(), $version, 'all');


function dieg_init($dieg, $diegtitle, $diegcallback) 
{ 	
	print $diegtitle;
	$post_id = get_the_ID();
	$post_type = get_post_type( $post->ID );

	add_meta_box( $dieg, 'UTM-метки поста', 'dieg_showup', $post_type, 'side', 'default'); 
} 

add_action('add_meta_boxes', 'dieg_init'); 

?> 

<?php
    # Если кнопка нажата
    if( isset( $_POST['DiegSubmit'] ) )
    {
        # Тут пишете код, который нужно выполнить.
        # Пример:
        echo 'Кнопка нажата!';
    }
?>
