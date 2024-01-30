<?php 
/* Template Name: Serviços */ 
?>

<?php acf_form_head(); get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class="page-content">
			<div class="main-image">
				<h1><?php the_title(); ?></h1>	
				<?php  if ( has_post_thumbnail() ) {
				    the_post_thumbnail();
				} ?>
			</div>
			
			<div class="call">
			    <div class="container">	
			    <h2><?php the_field('titulo') ?></h2>
			    <?php the_field('texto') ?>
			    </div>
			</div>

			<div class="container milpx">				
				<?php the_content(); ?>
			</div>
			
			<div class="testimonials">
				<section class="container">
					<?php echo do_shortcode(get_field('depoimentos')); ?>
				</section>
			</div>
			
			<div class="instagram">
				<section class="container">
					<?php echo do_shortcode(get_field('instagram')); ?>
				</section>
			</div>
		</section>
	<?php endwhile; endif; ?>


<?php get_footer(); ?>