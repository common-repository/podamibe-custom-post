<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/*
 Plugin Name:       Podamibe Custom Post Type
 Plugin URI:        http://podamibenepal.com/wordpress-plugins/
 Description:       This plugin is used for creating custom post type.
 Version:           1.0.5
 Author:            Podamibe Nepal
 Author URI:        http://podamibenepal.com/
 Domain Path:       /languages/
 Text Domain:       pcpt
 License:           GPLv2 or later
*/


//Decleration of the necessary constants for plugin

if ( !defined( 'PNCP_PLUGIN_DIR' ) ) {
	define( 'PNCP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( !defined( 'PNCP_LANG_DIR' ) ) {
	define( 'PNCP_LANG_DIR', basename( dirname( __FILE__ ) ) . '/languages/' );
}

if ( !defined( 'PNCP_VERSION' ) ) {
	define( 'PNCP_VERSION', '1.0.3' );
}

if ( !defined( 'PNCP_TEXT_DOMAIN' ) ) {
	define( 'PNCP_TEXT_DOMAIN', 'pcpt' );
}

/**
 * 
 * Decleration of the class for necessary configuration of a plugin
 * @package     PN 
 * @subpackage  admin
 * @copyright   Copyright (c) 2016, PN
 * @since       1.0  
 */
  
if (!class_exists('PN_Custom_Post')) {
    class PN_Custom_Post{
        
        /**
    	 * The one true instance.
    	 *
    	 * @var PN_Custom_Post
    	 */
    	private static $instance;
        
        /**
         * Initializes the plugin functions 
         */
         function __construct() {        
            
            add_action('init',  'init_custom_post_types');
            add_action('add_meta_boxes', array($this, 'cpt_add_meta_boxes'));
            add_action('save_post', 'cpt_save_postdata');
            
            $this->_includes();
            add_filter("plugin_row_meta", array($this, 'get_extra_meta_links'), 10, 4);
                        
            return self::$instance = $this;
            
         }
         
        /**
    	 * Get singleton instance.
    	 *
    	 * @since 1.0
    	 */
    	 public static function get_instance() {
    	    if ( ! isset( self::$instance ) ) {
    			self::$instance = new self();
    		}
    
    		return self::$instance;
    	 }
        public function cpt_add_meta_boxes() {
            add_meta_box('pcpt_meta_id', esc_html__( 'Custom Post Type Settings', PNCP_TEXT_DOMAIN ), 'cpt_inner_custom_box', esc_html__( 'CPT', PNCP_TEXT_DOMAIN ), 'normal');
        }
        
        public function _includes(){
            include_once(PNCP_PLUGIN_DIR . 'inc/init_custom_post.php');
            include_once(PNCP_PLUGIN_DIR . 'inc/inner_custom_box.php');
            include_once(PNCP_PLUGIN_DIR . 'inc/custom_post_save.php');
        }


        /**
         * Adds extra links to the plugin activation page
         */
        public function get_extra_meta_links($meta, $file, $data, $status) {

            if (plugin_basename(__FILE__) == $file) {
                $meta[] = "<a href='http://shop.podamibenepal.com/forums/forum/support/' target='_blank'>" . __('Support', 'pn-sfwarea') . "</a>";
                $meta[] = "<a href='http://shop.podamibenepal.com/downloads/podamibe-custom-post-type/' target='_blank'>" . __('Documentation  ', 'pn-sfwarea') . "</a>";
                $meta[] = "<a href='https://wordpress.org/support/plugin/podamibe-custom-post-type/reviews#new-post' target='_blank' title='" . __('Leave a review', 'pn-sfwarea') . "'><i class='ml-stars'><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg></i></a>";
            }
            return $meta;
        }

    
    }
    PN_Custom_Post::get_instance();
    $pncp_object = new PN_Custom_Post(); //initialization of plugin
}

