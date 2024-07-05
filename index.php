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
    add_action( 'rest_api_init',array($this,'niceEventRoutes'));
  }


  function niceEventStyles() {
    wp_enqueue_script('nice_js', plugin_dir_url(__FILE__) . 'src/index.js', array('jquery'), '1.0', false);
    wp_enqueue_style('nice_styles', plugin_dir_url(__FILE__) . 'src/style.css');

  }

  function event_calendar(){
    showProgrammaHTML();
  }

  function niceEventRoutes(){
    register_rest_route( 'event/v1', 'showEvents', array(
         'methods'=> WP_REST_Server::READABLE,
         'callback'=>array($this,'fetchEvents')
    ));
}

function fetchEvents(){
  return "Data will be here";
}


}

$niceEventsCalendarPlugin = new NiceEventsCalendarPlugin();