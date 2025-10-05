<?php
/*
Plugin Name: Quote API Plugin
Plugin URI: https://example.com/quote-api-plugin
Description: A simple plugin that provides a custom REST API endpoint returning a random quote.
Version: 1.0
Author: Your Name
Author URI: https://example.com
License: GPL2
*/

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Register REST API endpoint: /wp-json/quote-api/v1/quotes
add_action( 'rest_api_init', function() {
    register_rest_route( 'quote-api/v1', '/quotes', array(
        'methods'  => 'GET',
        'callback' => 'get_random_quote',
    ));
});

// Callback function
function get_random_quote() {
    $quotes = array(
        "The best way to get started is to quit talking and begin doing. – Walt Disney",
        "Success is not the key to happiness. Happiness is the key to success. – Albert Schweitzer",
        "In the middle of every difficulty lies opportunity. – Albert Einstein",
        "It always seems impossible until it's done. – Nelson Mandela",
        "Dream big and dare to fail. – Norman Vaughan"
    );

    $random_quote = $quotes[ array_rand( $quotes ) ];

    return array(
        'quote' => $random_quote,
        'timestamp' => current_time( 'mysql' )
    );
}
