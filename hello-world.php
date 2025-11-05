<?php
/**
 * Plugin Name: Hello World Plugin
 * Plugin URI:  https://example.com/plugins/hello-world
 * Description: A tiny demo plugin that says Hello World.
 * Version:     0.1.0
 * Author:      Your Name
 * License:     GPL-2.0+
 * Text Domain: hello-world-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class HW_Hello_World {
    public function __construct() {
        add_action( 'admin_notices', array( $this, 'admin_notice' ) );
        add_shortcode( 'hello_world', array( $this, 'shortcode' ) );
    }

    public function admin_notice() {
        if ( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        echo '<div class="notice notice-success is-dismissible"><p>Hello World Plugin active ✅</p></div>';
    }

    public function shortcode() {
        return '<div class="hello-world">Hello, world! 👋</div>';
    }
}

new HW_Hello_World();
