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
<div class="load"></div>
<script type="text/javascript">
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
  	jQuery("#dieg_copy").show();
  	var fnuma = [];
  	jQuery(".dieg-input").each(function(i, field) {
		var input = jQuery(this);
		var name = jQuery(this).attr("name");
		if(input.val()) {
			fnuma.push(name + input.val());
		}
	})
	console.log(fnuma, "fnuma")
   var fnumb = jQuery("#dieg_utm_source").val();
   fnuma = fnuma.join("");
   jQuery("#dieg_utm_block").text(fnuma);
   
   /*jQuery.post(window.location.href + fnumb, {a:fnumb}, function(data){
    jQuery("#dieg_utm_block").text(window.location.href + fnumb);
    });*/
   });
});
// tabs
 jQuery(document).ready(function(){
	
	jQuery('ul.tabs li').click(function(){
		var tab_id = jQuery(this).attr('data-tab');

		jQuery('ul.tabs li').removeClass('current');
		jQuery('.tab-content').removeClass('current');
		jQuery('.tab-content input').removeClass('dieg-input');

		jQuery(this).addClass('current');
		jQuery("#"+tab_id).addClass('current');
		jQuery("#"+tab_id).find("input").addClass('dieg-input');
	})

})

function copyToClipboard(element) {
	var element = "#dieg_utm_block";
	var $temp = jQuery("<input>");
	jQuery("#dieg_utm_block").append($temp);
	$temp.val(jQuery(element).text()).select();
	document.execCommand("copy");
	$temp.remove();
};

</script>