<?php 
/**
 * Functions template
 * 
 * @package Aquila
 */

//  Create a variable for storing template directory path
if ( ! defined( 'AQUILA_DIR_PATH' )){
    define('AQUILA_DIR_PATH', untrailingslashit( get_template_directory() ));
}
//  Create a variable for storing template directory URI
if ( ! defined( 'AQUILA_DIR_URI' )){
    define('AQUILA_DIR_URI', untrailingslashit( get_template_directory_uri() ));
}

// Include all the classes using autoloader
require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';

function aquila_get_theme_instance(){
    \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
}

aquila_get_theme_instance();

?>