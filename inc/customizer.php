<?php
/**
 * Myprecious Theme Customizer
 *
 * @package Myprecious
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function myprecious_customize_register( $wp_customize ) {
    $wp_customize->getMypreciousetting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->getMypreciousetting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->getMypreciousetting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'myprecious_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function myprecious_customize_preview_js() {
    wp_enqueueMypreciouscript( 'myprecious_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'myprecious_customize_preview_js' );
