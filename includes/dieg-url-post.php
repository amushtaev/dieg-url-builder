<?php 
/**
 * Plugin Name:       Dieg UTM URL Builder
 * Plugin URI:        
 * Description:       Generates links for Analytics tools and short link. Enter your UTM link) to generate a full link and a short link (trough the Google URL Shortener API) all in once
 * Version:           0.0.1
 * Author:            Alex Musshtaev
 * Author URI:        https://#
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       utm
 * Domain Path:       /languages
 */ 


?>

<?php
if(isset($_GET['q'])) {
	header("Content-type: text/txt; charset=UTF-8");
	if($_GET['q']=='1') {
		echo 'запрос GET успешно обработан, q = 1';
	}
	else {
		echo 'ошибка GET запрос';
	}
}
if(isset($_POST['z'])) {
	header("Content-type: text/txt; charset=UTF-8");
	if($_POST['z']=='1') {
		echo 'запрос POST успешно обработан, z = 1';
	}
	else {
		echo 'ошибка POST запрос';
	}
}
?>
