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
?>

<?php

  $custom_fields = get_post_custom($post->ID);
  $my_custom_field = $custom_fields['utm_term'];
  foreach ( $my_custom_field as $key => $value ) {
    echo $key . " => " . $value . "<br />";
  }

?>

