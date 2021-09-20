<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seed
 */

if ( ! is_active_sidebar( 'leftbar_solution' ) ) {
	return;
}
?>

<aside id="leftbar_solution" class="widget-area -leftbar_solution">
	<?php dynamic_sidebar( 'leftbar_solution' ); ?>
</aside><!-- #secondary -->