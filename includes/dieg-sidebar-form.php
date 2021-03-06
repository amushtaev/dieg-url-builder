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
	<label style="width: 85px;display: none;">


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
	<input id="dieg_utm_term_fb" class="dieg-input" type="text" name="&utm_term=" value="<?php echo  $meta_value_term_fb ?>"> 
	<label style="width: 85px;display: inline-block;">utm_content</label> 
	<input id="dieg_utm_content_fb" class="dieg-input" type="text" name="&utm_content=" value="<?php echo  $meta_value_content_fb
	 ?>"> 
 	<span id="dieg_utm_block_1" style="padding-top: 20px;width:100%;word-wrap: break-word;"></span> 
	<div style="display:block;margin-top:20px;"><a id="dieg_copy_1" onclick="copyToClipboard('#dieg_utm_block_1')" style="cursor:pointer;display:none;padding-top:10px;">Копировать ссылку для Facebook</a></div>
</div>

<div id="tab-2" class="tab-content">
	<label style="width: 85px;display: inline-block;">utm_source</label>
	<input id="dieg_utm_source_go" class="" type="text" name="?utm_source=" value="<?php echo  $meta_key_google ?>"> 
	<label style="width: 85px;display: inline-block;">utm_medium</label> 
	<input id="dieg_utm_medium_go" class="" type="text" name="&utm_medium=" value="<?php echo  $val ?>"> 
	<label style="width: 85px;display: inline-block;">utm_campaign</label> 
	<input id="dieg_utm_campaign_go" class="" type="text" name="&utm_campaign=" value="<?php echo  $val ?>"> 
	<label style="width: 85px;display: inline-block;">utm_term</label> 
	<input id="dieg_utm_term_go" class="" type="text" name="&utm_term=" value="<?php echo  $meta_value_term_go ?>"> 
	<label style="width: 85px;display: inline-block;">utm_content</label>
	<input id="dieg_utm_content_go" class="" type="text" name="&utm_content=" value="<?php echo  $meta_value_content_go
	 ?>"> 

	<span id="dieg_utm_block_2" style="padding-top: 20px;width:100%;word-wrap: break-word;"></span> 
	<div style="display:block;margin-top:20px;"><a id="dieg_copy_2" onclick="copyToClipboard('#dieg_utm_block_2')" style="cursor:pointer;display:none;padding-top:10px;">Копировать ссылку для Google</a></div>
</div>

<a id="dieg_utm" class="dieg-btn" style="display: block; margin-top: 20px;    text-align: center;">Сгенерировать ссылку</a> 
</div> 

 Example value: <input type='text' name='utm_term_fb[<?php echo $post->ID; ?>]' value='<?php echo isset($meta_value_term_fb) ? $meta_value_term_fb : ''; ?>' />
  <input type='submit' value='save' name="submit"/>

  <?php
if ( isset( $_POST['utm_term_fb'] ) ){  
// verify nounce prob a good idea 
    foreach($_POST['utm_term_fb'] as $item=>$key) {
        $id= sanitize_text_field($item);
        update_post_meta( $post->ID, 'utm_term_fb', sanitize_text_field( $key ) );
    }   
}


/*add_action( 'save_post', 'dieg_updated_metas');
function dieg_updated_metas($post_id) {
	if( array_key_exists('utm_term_fb', $metas !== 0) ) {
		update_post_meta($post->ID, 'utm_term_fb', $meta_value_term_fb);
	} else if( array_key_exists('utm_term_fb', $metas) === 0 ) {
	    add_post_meta( $post->ID, 'utm_term_fb', '', false );
	} else {
		update_post_meta($post->ID, 'utm_term_fb', sanitize_text_field( $_REQUEST['example'] ));
	}
}*/

?>


<script type="text/javascript">
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
	jQuery(".tab-content.current span[id^='dieg_utm_block_']").append($temp);
	$temp.val(jQuery(element).text()).select();
	document.execCommand("copy");
	$temp.remove();
};

</script>