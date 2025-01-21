<?php
/**
 * Plugin Name:     Client Customization
 * Plugin URI:      https://www.yogh.com.br/
 * Description:     Plugin with Project Customization
 * Author:          Yogh Soluções
 * Author URI:      https://www.yogh.com.br/
 * Text Domain:     client-customization
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Client_Customization
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

function client_customization_add_message_to_content( $content ) {
    if ( is_singular( 'post' ) ) {
        $message = '<p><b>This content is created by: ' . esc_html( get_bloginfo( 'name' ) ) . ' (' . esc_url( get_bloginfo( 'url' ) ) . ')</b></p>';
        return $content . $message;
    }

    return $content;
}
add_filter( 'the_content', 'client_customization_add_message_to_content', 10 );
