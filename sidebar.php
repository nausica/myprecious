<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Myprecious
 */

if ( ! is_activeMypreciousidebar( 'sidebar-1' ) ) {
    return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
    <?php dynamicMypreciousidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
