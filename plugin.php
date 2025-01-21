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

function client_customization_load_textdomain() {
    load_plugin_textdomain( 'client-customization', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'client_customization_load_textdomain' );

function client_customization_add_message_to_content( $content ) {
    if ( is_singular( 'post' ) ) {
        $message = sprintf(
            /* 1: Site name, 2: Site URL */
            __( 'This content is created by: %1$s (%2$s)', 'client-customization' ),
            esc_html( get_bloginfo( 'name' ) ),
            esc_url( get_bloginfo( 'url' ) )
        );
        return $content . '<p><b>' . $message . '</b></p>';
    }

    return $content;
}
add_filter( 'the_content', 'client_customization_add_message_to_content', 10 );
