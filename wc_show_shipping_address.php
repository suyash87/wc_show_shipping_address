<?php
/*
*Plugin Name: WC Show Shipping address
*Plugin URI: https://www.freelancer.com/u/Suyash87
*Description:Using this plugin you can set the shipping address to be always visible on checkout page. Please Go to Settings-> WC Show Shipping address
*Version: 1.0
*Author: Suyash
*Author URI: https://www.freelancer.com/u/Suyash87
*License: GPL2
*/

$plugin_url = WP_PLUGIN_URL.'/wc_show_shipping_address';

function wc_show_shipping_address()
{
  /*add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
 IT ADDS MENU UNDER SETTINGS LINK IN ADMIN
 */ 
 
 add_options_page('wc_show_shipping_address Plugin', 
 'WC Show Shipping address', 
 'manage_options' , 
 'wc_show_shipping_address', 
 'wc_show_shipping_address_function' );
}

add_action('admin_menu','wc_show_shipping_address'); // this will call main function and 
// main function will execute above code to add menu option under settings


function wc_show_shipping_address_function(){

	if(!current_user_can('manage_options'))/*CHECK PERMISSIONS*/
 		 {
  		  		wp_die('do not have permission to access page');
 		 } 

 		 echo "<br />Go to checkout page of your store and '<b>Ship to a different address?</b>' will always be checked and
 		 fields would be visible all the time.";
}

add_action('wp_head', 'show_shipping_fields');
function show_shipping_fields(){
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true', 1050 );
}

?>