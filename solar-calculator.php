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

require_once('includes.php');
require_once('includes/shortcodes.php');

class SolarCalculator {
	
	use shortcodeTrait;
    public function __construct() {

        add_shortcode('solar_calculator', array($this, 'solarc_shortcode'));
    }

    function solarc_shortcode($atts = [], $content = null){
        
        define('SOLARC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        
        $content = $this->panelWrapBegin();
        
        $content .= $this->panelOne();
        $content .= $this->panelTwo();
        $content .= $this->panelThree();
        $content .= $this->panelFour();
        $content .= $this->panelFive();

        $content .= $this->panelWrapEnd();

        return $content; 
    }

}

$SolarCalculator = new SolarCalculator();
