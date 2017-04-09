<?php

namespace Company;

class RegisterPlugin {

    public function init() {
        
        // Register menu
        add_action('admin_menu', 'Company\RegisterPlugin::admin_menu');
        
        // Add assets
        add_action('admin_enqueue_scripts', 'Company\RegisterPlugin::admin_enqueue_scripts');
        
        // Register textdomain
        add_action( 'init', 'Company\RegisterPlugin::load_textdomain' );
        
    }
    
    public function admin_menu() {
        add_menu_page ( 
            __('Just a demo', 'pbl'), 
            __('Demo'), 
            'edit_pages', 
            'demo-composer', 
            'Company\ServerInfo::showInfo'
        );
    }
    
    public function admin_enqueue_scripts() {
        wp_enqueue_style (
            'admin-styles', 
            PBL_PLUGIN_URL . 'assets/css/demo.css'
        );
    }
    
    public function load_textdomain() {
        load_plugin_textdomain( 'pbl', false, PBL_PLUGIN_DIR . '/languages' ); 
    }
    
}
