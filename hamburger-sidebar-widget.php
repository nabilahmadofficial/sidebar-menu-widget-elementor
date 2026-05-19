<?php
/**
 * Plugin Name:  Hamburger Sidebar Widget
 * Description:  Elementor widget that renders a hamburger button + slide-in sidebar powered by any saved Elementor template.
 * Version:      1.0.0
 * Author:       Nabil Ahmad
 * Author URI:   https://nabilahmad.com
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'plugins_loaded', function () {
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', function () {
            echo '<div class="notice notice-warning"><p><strong>Hamburger Sidebar Widget</strong> requires Elementor to be installed and active.</p></div>';
        } );
        return;
    }

    add_action( 'elementor/widgets/register', function ( $manager ) {
        require_once plugin_dir_path( __FILE__ ) . 'class-widget.php';
        $manager->register( new Hamburger_Sidebar_Widget() );
    } );

    add_action( 'wp_enqueue_scripts', function () {
        wp_enqueue_style(
            'hamburger-sidebar',
            plugin_dir_url( __FILE__ ) . 'hamburger-sidebar.css',
            [],
            '1.0.0'
        );

        wp_enqueue_script(
            'hamburger-sidebar',
            plugin_dir_url( __FILE__ ) . 'hamburger-sidebar.js',
            [],
            '1.0.0',
            true
        );
    } );
} );
