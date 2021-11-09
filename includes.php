<?php 
/**
 * Include all styles and js files
 */
function solarc_enqueue_script(){

    // Enque styles
    wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'vendor/bootstrap/css/bootstrap.min.css', array(), '1.0.0', false );
    wp_enqueue_style( 'material-icon', plugin_dir_url( __FILE__ ) . 'fonts/material-icon/css/material-design-iconic-font.min.css', array(), '1.0.0', false );
    wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'vendor/font-awesome/css/font-awesome.css', array(), '1.0.0', false );
    wp_enqueue_style( 'main_style', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), '1.0.0', false );
    wp_enqueue_style( 'datepicker-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap-datepicker.min.css', array(), '1.0.0', false );

    // Enque Scripts
    wp_enqueue_script( 'jquery-validation', plugin_dir_url( __FILE__ ) . 'vendor/jquery-validation/dist/jquery.validate.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'additional-methods', plugin_dir_url( __FILE__ ) . 'vendor/jquery-validation/dist/additional-methods.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery-steps', plugin_dir_url( __FILE__ ) . 'vendor/jquery-steps/jquery.steps.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'datepicker-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap-datepicker.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'mainjs', plugin_dir_url( __FILE__ ) . 'js/main.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'scriptjs', plugin_dir_url( __FILE__ ) . 'js/script.js', array('jquery'), '1.0.0', true );

}

add_action('wp_enqueue_scripts', 'solarc_enqueue_script');


