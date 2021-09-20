<?php 
/**
 * Template Name: Left Sidebar Solution
 */
get_header(); ?>

<div class="main-header">
	<div class="container">
		<h2 class="main-title"><?php the_title(); ?></h2>

		<div class="breadcrumbs" typeof="BreadcrumbList">
			<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
		</div>


	</div>
</div>

<div class="container -leftbar_solution">

	<div id="primary" class="content-area -leftbar_solution">
		<main id="main" class="site-main -hide-title">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar('left_solution'); ?>
</div><!--container-->
<?php get_footer(); ?>
