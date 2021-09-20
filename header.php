<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-17803672-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-17803672-1');
</script>
	
</head>

<?php $bodyClass = ''; if (is_active_sidebar( 'headbar' )) { $bodyClass = 'has-headbar'; } ?>

<body <?php body_class($bodyClass); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'seed' ); ?></a>



	


	<div id="page" class="site -header-desktop-overlay">
		<div class="top-bar-page">
			<div class="container">

				<div class="user-m">




					<?php if (get_locale() == 'th') { ?>

						<?php
						if ( is_user_logged_in() ) {

							$current_user = wp_get_current_user();

							echo '<a href="/my-account" class="i-cart"> <i class="si-user"></i>  ' . $current_user->display_name;  ?> </a> 




							<?php
							
						} else {
							echo '<a href="/my-account" >เข้าสู่ระบบ / ลงทะเบียน</a>';
						}
						?>


					<?php } else { ?>


						<?php



						if ( is_user_logged_in() ) {

							$current_user = wp_get_current_user();

							echo '<a href="/my-account" class="i-cart"> <i class="si-user"></i>  ' . $current_user->display_name;  ?> </a> 




							<?php
							
						} else {
							echo '<a href="/my-account" >Login / Register</a>';
						}
						?>


					<?php } ?>
					<a href="<?php echo wc_get_cart_url(); ?>" class="i-cart">
						<span class="site-cart-number-d ">

							<i class="fas fa-shopping-cart"></i>
							<?php
							$cart_count = WC()->cart->get_cart_contents_count();
							if ($cart_count) {
								echo '<b id="cart-count">' . $cart_count . '</b>';
							} else {
								echo '<b id="cart-count" class="hide"></b>';
							}
							?>
						</span>

						<span class="p-subtotal-d ">



							<?php  $product = WC()->cart->get_cart_subtotal();

							echo '<b id="p-subtotal">' . $product . '</b>';

							?>

						</span>

					</a>


					<div class="wpml-flag">

						<?php echo do_action('wpml_add_language_selector'); ?>
					</div>


				</div>
			</div>
		</div>
		<header id="masthead" class="site-header _heading">



			
			
			<div class="container">
				
				<div class="site-branding">
					<div class="site-logo">
						<?php 
						if($GLOBALS['s_logo_path'] != 'none') {
							echo '<a href="' . esc_url( home_url( '/' ) ) .'" rel="home"><img src="' . get_stylesheet_directory_uri() . '/'. $GLOBALS['s_logo_path']. '" width="'. $GLOBALS['s_logo_width'] . '"  height="'. $GLOBALS['s_logo_height'] . '" alt="Logo"></a>';
						} else {
							the_custom_logo();
						} ?>

					</div>
					<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
					<?php endif; ?>

					<?php 
					$description = get_bloginfo( 'description', 'display' ); 
					if ( $description || is_customize_preview() ) : ?><p class="site-description"><?php echo $description; ?></p><?php endif; ?>
				</div>


				<div class="site-cart _mobile">

					<span class="site-cart-number">
						<a href="/cart/" class="i-cart">
							<i class="fas fa-shopping-cart"></i>
							<?php
							$cart_count = WC()->cart->get_cart_contents_count();
							if ($cart_count) {
								echo '<b id="cart-count">' . $cart_count . '</b>';
							} else {
								echo '<b id="cart-count" class="hide"></b>';
							}
							?>
						</a>
					</span>
				</div>


				<a class="site-toggle _mobile">



					<i><span></span><span></span><span></span><span></span></i>


					<?php if (get_locale() == 'th') { ?>

						<b>เมนู</b>

					<?php } else { ?>

						<b>Menu</b>

					<?php } ?>

				</a>

				<?php if ($bodyClass == 'has-headbar'): ?>
					<div id="headbar" class="_desktop"><?php dynamic_sidebar( 'headbar' ); ?></div>
					<?php else: ?>
						<?php if($GLOBALS['s_member_url'] != 'none'): ?>
							<div class="site-member">
								<a href="<?php echo $GLOBALS['s_member_url']; ?>" class="m-user">
									<span class="m-user-icon">
										<?php 
										$current_user = wp_get_current_user(); 
										if( 0 != $current_user->ID) { echo get_avatar($current_user->ID, 48 );} else { echo '<i class="si-user"></i>';} 
										?>
									</span>
									<span class="m-user-text"><?php if($GLOBALS['s_member_label'] == 'Member') { _e( 'Member', 'seed' );} else {echo $GLOBALS['s_member_label'];} ?></span>
								</a>
							</div>
						<?php endif; ?>
						<?php if (is_active_sidebar( 'top_right' )) : ?>
							<div class="site-top-right _desktop"><?php dynamic_sidebar( 'top_right' ); ?></div>
						<?php endif; ?>
						<nav id="site-nav-d" class="site-nav-d _desktop">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );?>
						</nav>
					<?php endif; ?>

				</div>
				<nav id="site-nav-m" class="site-nav-m _mobile">
					<div class="container">


						<div class="search-f">
							<?php get_search_form(); ?>
						</div>
						<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
					</div>
				</nav>
			</header>


			<div class="site-header-space"></div>
			<?php 
			if (is_front_page()) {
				if (is_active_sidebar( 'home_banner' )) {
					echo '<div class="home-banner">'; dynamic_sidebar( 'home_banner' ); echo '</div>';
				} 
			} else {
				if (is_active_sidebar( 'page_banner' )) {
					echo '<div class="page-banner">'; dynamic_sidebar( 'page_banner' ); echo '</div>';
				}
			}
			?>
			<div id="content" class="site-content">