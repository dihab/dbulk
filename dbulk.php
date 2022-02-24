<?php


/**
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * Plugin Name:       Dbulk: bulk editor for woo products 
 * Plugin URI:        
 * Description:       Edit multiple product with a few click and save your time
 * Version:           1.0.0
 * Author:            Efthakhar Bin Alam
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dbulk
 * Domain Path:       /languages
* */


require_once('admin/edit-products.php');

/**
* 
* enquing script 
* 
**/
function dbulk_admin_scripts($hook){

    wp_enqueue_script( 'jquery' );    
    if('toplevel_page_dbulk-edit-products'== $hook){       
    wp_enqueue_style('create_quiz-style', plugins_url('/admin/CSS/edit_products.css',__FILE__),time());
    wp_enqueue_script('create_quiz-script',  plugins_url('/admin/JS/edit_products.js',__FILE__),null,time(),true); 
    // wp_localize_script('create_quiz-script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

    }  

      
}
add_action( 'admin_enqueue_scripts', 'dbulk_admin_scripts' );


function dbulk_create_pages(){

    add_menu_page(__('dbulk','dbulk'),__('DBULK','dbulk'),'manage_options','dbulk-edit-products','dbulk_edit_products_page_html','dashicons-list-view',2);

}

add_action('admin_menu','dbulk_create_pages');



?>