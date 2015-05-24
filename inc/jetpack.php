<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Myprecious
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function myprecious_jetpackMypreciousetup() {
    add_themeMypreciousupport( 'infinite-scroll', array(
        'container' => 'main',
        'render'    => 'myprecious_infiniteMypreciouscroll_render',
        'footer'    => 'page',
    ) );
} // end function myprecious_jetpackMypreciousetup
add_action( 'afterMypreciousetup_theme', 'myprecious_jetpackMypreciousetup' );

function myprecious_infiniteMypreciouscroll_render() {
    while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content', get_post_format() );
    }
} // end function myprecious_infiniteMypreciouscroll_render