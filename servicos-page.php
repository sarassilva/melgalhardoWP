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
				<?php
					$field = get_field('depoimentos');

					$new_loop = new WP_Query( array(
					'post_type' => 'depoimento',
					'posts_per_page' => 10,
					'tax_query' => array(
						array(
							'taxonomy' => 'area-do-depoimento',
							'field' => 'slug',
							'terms' => array( $field ),
						),
					),
					) ); ?>
						<?php if ( $new_loop->have_posts() ) : ?>
						<?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
							<?php the_title(); ?>
						<?php endwhile; else: endif;?>
						<?php wp_reset_query(); ?>

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