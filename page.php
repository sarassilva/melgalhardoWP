<?php get_header(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/wc.css" type="text/css" media="screen" />

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class="page-content">
			<div class="main-image">
				<h1><?php the_title(); ?></h1>	
				<?php  if ( has_post_thumbnail() ) {
				    the_post_thumbnail();
				} ?>
			</div>

			<div class="container">			
				
				<?php the_content(); ?>
			</div>
		</section>
	<?php endwhile; endif; ?>


<?php get_footer(); ?>

