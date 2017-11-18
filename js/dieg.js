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
  	console.log(jQuery(".tab-content.current a[id^='dieg_copy_']"), "fnuma")
  	jQuery(".tab-content.current a[id^='dieg_copy_']").show();
  	var fnuma = [];
  	jQuery(".tab-content.current .dieg-input").each(function(i, field) {
		var input = jQuery(this);
		var name = jQuery(this).attr("name");
		if(input.val()) {
			fnuma.push(name + input.val());
		}
	});
   var fnumb = jQuery("#dieg_utm_source").val();
   fnuma = fnuma.join("");
   jQuery(".tab-content.current span[id^='dieg_utm_block_']").text(fnumb + fnuma);
   
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
	/*var element = "#dieg_utm_block";*/
	var $temp = jQuery("<input>");
	jQuery("#dieg_utm_block").append($temp);
	$temp.val(jQuery(element).text()).select();
	document.execCommand("copy");
	$temp.remove();
};
