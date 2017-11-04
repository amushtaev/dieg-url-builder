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
 console.log("load")

 jQuery(document).ready(function(){
  jQuery("#dieg_utm").click(function(){
   var fnumb = jQuery("#dieg_utm_source").val();
   jQuery.post('https://dieg.info/?utm_source=fb-mypage&utm_medium=fb-mypage-kak-pohudet-v-dushe-retsept-super-skrab&utm_campaign=fb-mypage-kak-pohudet-v-dushe-retsept-super-skrab', {a:fnumb}, function(data){
    jQuery("#dieg_utm_block").text(data);
    });
   });
});