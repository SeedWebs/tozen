<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seed
 */

if ( ! is_active_sidebar( 'leftbar_product' ) ) {
	return;
}
?>

<aside id="leftbar_product" class="widget-area -leftbar_product">
	<?php dynamic_sidebar( 'leftbar_product' ); ?>
</aside><!-- #secondary -->
