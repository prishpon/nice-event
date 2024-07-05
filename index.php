<?php
/*
  Plugin Name: Nice Event
  Description:Plugin for displaying music events
  Version: 1.0
  Author:Olga
  Author URI: 
*/

if( ! defined( 'ABSPATH' ) ) exit; 

require_once plugin_dir_path(__FILE__) . 'inc/programmaHTML.php';

class NiceEventsCalendarPlugin {
  function __construct() {
    add_action('wp_enqueue_scripts', array($this,'niceEventStyles'));
    add_shortcode('event_calendar',array($this,'event_calendar'));
  }


  function niceEventStyles() {
    wp_enqueue_script('nice_js', plugin_dir_url(__FILE__) . 'src/index.js', array('jquery'), '1.0', false);
    wp_enqueue_style('nice_styles', plugin_dir_url(__FILE__) . 'src/style.css');

  }

  function event_calendar(){
    showProgrammaHTML();
  }

}

$niceEventsCalendarPlugin = new NiceEventsCalendarPlugin();