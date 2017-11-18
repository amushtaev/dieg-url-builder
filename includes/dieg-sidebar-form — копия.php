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



<div> 
URL страницы записи : <p class="howto"><?php echo  $fullval ?></p> 
<p class="howto">Наш Сервис : <a href="https://dieg.info" class="" target="_blank">Engine IP SEO</a></p> 

<input id="dieg_utm_source" class="dieg-hide dieg-input" type="text" name="" value="<?php echo  $fullval ?>"> 

<ul class="tabs">
	<li class="tab-link current" data-tab="tab-1">Facebook</li>
	<li class="tab-link" data-tab="tab-2">Google</li>
</ul>

<div id="tab-1" class="tab-content current">
	<label style="width: 85px;display: inline-block;">


<?php 

if (array_key_exists('fb_tolstelka', $metas) ) {
    echo "The 'first' element is in the array";
}

if (array_key_exists('fb_tolstelka', $metas) !== 'fb_tolstelka') {

	$arr=array('fb_tolstelka'=>'fb_tolstelka');
	print_r($metas['fb_tolstelka']);
	print_r($arr['fb_tolstelka']);

}
if (array_key_exists('google', $metas) !== 'google') {

	$arr=array('google'=>'google');
	print_r($metas['google']);
	print_r($arr['google']);

}

?>
	 	
	 </label>
	<label style="width: 85px;display: inline-block;">utm_source</label>
	<input id="dieg_utm_source_fb" class="dieg-input" type="text" name="?utm_source=" value="<?php echo $meta_key_fb ?>"> 
	<label style="width: 85px;display: inline-block;">utm_medium</label> 
	<input id="dieg_utm_medium_fb" class="dieg-input" type="text" name="&utm_medium=" value="<?php echo $val ?>"> 
	<label style="width: 85px;display: inline-block;">utm_campaign</label> 
	<input id="dieg_utm_campaign_fb" class="dieg-input" type="text" name="&utm_campaign=" value="<?php echo  $val ?>"> 
	<label style="width: 85px;display: inline-block;">utm_term</label> 
	<input id="dieg_utm_term_fb" class="dieg-input" type="text" name="&utm_term=" value="<?php
			echo  $meta_value_term_fb;
		if ( ! empty( $meta_value_term_fb ) ) { 
			echo  $meta_value_term_fb;
		}
		?>"> 
	<label style="width: 85px;display: inline-block;">utm_content</label> 
	<input id="dieg_utm_content_fb" class="dieg-input" type="text" name="&utm_content=" value="<?php echo  $meta_value_content_fb
	 ?>"> 
<input type="submit" name="submit" value="submit" class="btn btn-primary"/><br/>
 
</div>

<div id="tab-2" class="tab-content">
	<label style="width: 85px;display: inline-block;">utm_source</label>
	<input id="dieg_utm_source_go" class="" type="text" name="?utm_source=" value="<?php echo  $meta_key_google ?>"> 
	<label style="width: 85px;display: inline-block;">utm_medium</label> 
	<input id="dieg_utm_medium_go" class="" type="text" name="&utm_medium=" value="<?php echo  $val ?>"> 
	<label style="width: 85px;display: inline-block;">utm_campaign</label> 
	<input id="dieg_utm_campaign_go" class="" type="text" name="&utm_campaign=" value="<?php echo  $val ?>"> 
	<label style="width: 85px;display: inline-block;">utm_term</label> 
	<input id="dieg_utm_term_go" class="" type="text" name="&utm_term_go=" value="<?php echo  $meta_value_term_go ?>"> 
	<label style="width: 85px;display: inline-block;">utm_content</label> 
	<input id="dieg_utm_content_go" class="" type="text" name="&utm_content=" value="<?php echo  $meta_value_content_go
	 ?>"> 
</div>


<span id="dieg_utm_block" style="display: block;padding-top: 20px;width:100%;word-wrap: break-word;"></span> 
<div style="display:block;margin-top:20px;"><a id="dieg_copy" onclick="copyToClipboard('#dieg_utm_block')" style="cursor:pointer;display:none;padding-top:10px;">Копировать ссылку</a></div>
<a id="dieg_utm" class="dieg-btn" style="display: block; margin-top: 20px;    text-align: center;">Сгенерировать ссылку</a> 
</div> 



<?php
session_start();
if(isset($_POST["submit"])) { 

	$utm_term = $_POST['&utm_term='];
	update_post_meta($post->ID, 'utm_term', $utm_term);
}
?>

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