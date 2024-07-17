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
    $button_for_update;
    $url_for_update;
  }
 

  function niceEventStyles() {
    wp_enqueue_script('nice_js', plugin_dir_url(__FILE__) . 'src/index.js', array('jquery'), '1.0', false);
    wp_enqueue_style('nice_styles', plugin_dir_url(__FILE__) . 'src/style.css');

    wp_localize_script('nice_js', 'niceEventData', array(
      'root_url' => get_site_url(),
      'buttonForUpdate' => $this->button_for_update ?? true ,
      'urlForUpdate' =>$this->url_for_update ?? true 
  
    ));

  }

  function event_calendar($atts){
    $a = shortcode_atts( array(
      'button_for_update' =>'true',
      'url_for_update' =>'true',
    ), $atts );
  
    $this->button_for_update = "{$a['button_for_update']}";
    $this->url_for_update = "{$a['url_for_update']}";
    showProgrammaHTML();
  }

  function niceEventRoutes(){
    register_rest_route( 'event/v1', 'showEvents', array(
         'methods'=> WP_REST_Server::READABLE,
         'callback'=>array($this,'fetchEvents')
    ));
}

function fetchEvents(){
  $request = wp_remote_get( 'https://poppodiumdemeester.nl/event_feed_json' );

  if( is_wp_error( $request ) ) {
    return false; 
  }
  
  $body = wp_remote_retrieve_body( $request );
  
  $data = json_decode($body);
  
  return $data;
  }

}

$niceEventsCalendarPlugin = new NiceEventsCalendarPlugin();