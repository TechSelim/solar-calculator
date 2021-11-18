<?php 

/**
 * Plugin Name:       Solar Calculator
 * Description:       Calculate equipmet prices by this plugin.
 * Version:           1.1.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Selim Ahmad
 * Author URI:        https://selimahmad.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       solar-calculator
 * Domain Path:       /languages
 */

require_once plugin_dir_path( __FILE__ ) . '/includes.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/shortcodes.php';
require_once plugin_dir_path( __FILE__ ) . '/includes/list-table.php';

class SolarCalculator {
	
	use shortcodeTrait;
    public function __construct() {
        
        register_activation_hook( __FILE__, [ $this, 'plugin_activation_function' ] );

        add_shortcode('solar_calculator', array($this, 'solarc_shortcode'));
        add_action('admin_menu', [ $this, 'create_menu' ]);
        add_action( 'wp_ajax_solarc_action', [ $this, 'submit_solar_form'] );
        add_action( 'wp_ajax_nopriv_solarc_action', [ $this, 'submit_solar_form'] );
        add_action('admin_post_request_delete', [ $this, 'request_delete' ]);
    }

    function submit_solar_form(){

        global $wpdb;
        
        $installation = ( $_POST['installation'] == 'yes' ) ? 1 : 0;

        $data = array(
            'name'              => sanitize_text_field( $_POST['name'] ), 
            'email'             => sanitize_text_field( $_POST['email'] ),
            'phone'             => sanitize_text_field( $_POST['phone'] ),
            'address'           => sanitize_text_field( $_POST['address'] ),
            'post_code1'        => sanitize_text_field( $_POST['postcode'] ),
            'post_code2'        => sanitize_text_field( $_POST['postcode2'] ),
            'message'           => sanitize_text_field( $_POST['message'] ),
            'panel'             => sanitize_text_field( $_POST['panel_no'] ),
            'property'          => sanitize_text_field( $_POST['property_details'] ),
            'elevation'         => sanitize_text_field( $_POST['elevation_no'] ),
            'is_install'        => $installation,
            'installation_date' => sanitize_text_field( $_POST['installation_date'] ),
            'shading'           => sanitize_text_field( $_POST['shading'] ),
        );

        $format = array(
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s'
        );

        $wpdb->insert( $wpdb->prefix.'calculate', $data, $format );
        
        if( $wpdb->insert_id ){
            echo 1;
        }else {
            echo 0;
        }

        wp_die(); 
    }

    function solarc_shortcode($atts = [], $content = null){
        
        define('SOLARC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        
        $content = $this->panelWrapBegin();
        
        $content .= $this->panelOne();
        $content .= $this->panelTwo();
        $content .= $this->needIntallation();
        $content .= $this->panelThree();
        $content .= $this->panelFour();
        $content .= $this->panelFive();

        $content .= $this->panelWrapEnd();

        return $content; 
    }

    function create_menu(){

        add_menu_page( __( 'Pricing Requests', 'solar-calculator' ), __( 'Pricing Requests', 'solar-calculator'), 'manage_options', 'price-requests', [ $this, 'price_requests'], 'dashicons-email-alt2', 16 );
        add_submenu_page('price-requests', __( 'Pricing Requests', 'solar-calculator' ), __( 'All Requests', 'solar-calculator' ), 'manage_options', 'price-requests', [ $this, 'price_requests']);
        add_submenu_page('price-requests', __( 'Help', 'solar-calculator' ), __( 'Help', 'solar-calculator' ), 'manage_options', 'price-requests-help', [ $this, 'price_requests_help']);

    }

    function price_requests_help(){
        include __DIR__ . '/views/help.php';
        exit(); 
    }

    function price_requests(){

        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';
        $id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
        
        global $wpdb;

        if( $action == 'view' ){
            $requests = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}calculate WHERE `id` = $id");
            include __DIR__ . '/views/view.php';
        }else{
            echo '<h1>Pricing Requests</h1>';
            if( isset( $_GET['request-delete']) && $_GET['request-delete'] == 'true' ){
                echo '<div style="color: green; text-align: center; padding: 15px;background: #9fdc00;
                font-size: 16px;">Data deleted successfully! </div>';
            }else if( isset( $_GET['request-delete']) && $_GET['request-delete'] == 'false' ){
                echo '<div style="color: red; text-align: center; padding: 15px; background: #e4e4e4f7;
                font-size: 16px;">Something went wrong!</div>';
            }
            $request = new WPlist_table();
            $request->prepare_items();
            $request->display();
        }
        
    }

    function request_delete(){
        
        if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'solar-delete' ) ) {
            wp_die( 'Are you cheating?' );
        }
        
        $id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
        global $wpdb;                           
        $num = $wpdb->delete(
            $wpdb->prefix . 'calculate',     
            ['id' => $id],                      
            ['%d']                           
        );

        if ( $num ) {
            $redirected_to = admin_url( 'admin.php?page=price-requests&request-delete=true' );
        } else {
            $redirected_to = admin_url( 'admin.php?page=price-requests&request-delete=false' );
        }

        wp_redirect( $redirected_to );
        exit;
    }

    function plugin_activation_function(){

        global $wpdb;
        $dbcolate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}calculate` (
            `id` int(20) NOT NULL,
            `name` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `phone` varchar(255) NOT NULL,
            `post_code1` varchar(255) NOT NULL,
            `post_code2` varchar(255) NOT NULL,
            `address` text NOT NULL,
            `message` text NOT NULL,
            `panel` int(11) NOT NULL,
            `is_install` int(11) NOT NULL DEFAULT 0,
            `property` text NOT NULL,
            `elevation` varchar(255) NOT NULL,
            `installation_date` varchar(255) NOT NULL,
            `shading` text NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp()
          ) $dbcolate";

        if( ! function_exists('dbDelta') ){
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $schema );

        $alter = "ALTER TABLE `{$wpdb->prefix}calculate`
        ADD PRIMARY KEY (`id`)";
        $wpdb->query( $alter );
        
        $alter = "ALTER TABLE `{$wpdb->prefix}calculate`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";
        $wpdb->query( $alter );

    }

}

$SolarCalculator = new SolarCalculator();
