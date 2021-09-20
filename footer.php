</div>

<?php if (is_active_sidebar( 'footbar' ) ) : ?>

	<aside id="footbar" class="site-footbar">
		<div class="container">
			<?php dynamic_sidebar( 'footbar' ); ?>
		</div>
	</aside><!--site-footbar-->

<?php else: ?>
	
	<div class="site-footer-space"></div>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info">
				Copyright &copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
			</div><!--site-info-->
		</div><!--container-->
	</footer><!--site-footer-->

<?php endif; ?>

</div><!--#page-->

<?php wp_footer(); ?>

</body>
</html>
