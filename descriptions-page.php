<?php 
/* Template Name: Descrição de serviços */ 
?>

<?php acf_form_head(); get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class="page-content services">
			<div class="main-image">
				<h1><?php the_title() ?></h1>
				<?php  if ( has_post_thumbnail() ) {
				    the_post_thumbnail();
				} ?>
			</div>

			<div class="container milpx">				
				<?php the_content(); ?>
			</div>
			
			<div class="testimonials">
				<section class="container regular">
				<?php
					$field = get_field('depoimentos');

					$new_loop = new WP_Query( array(
					'post_type' => 'depoimento',
					'posts_per_page' => 10,
					'tax_query' => array(
						array(
							'taxonomy' => 'area-do-depoimento',
							'field' => 'term_id',
							'terms' => array( $field ),
						),
					),
					) ); ?>
						<?php if ( $new_loop->have_posts() ) : ?>
						<?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
						<div>
							<div class="testimonial">
								<p><?php the_content(); ?></p>
								<div class="name"><?php the_title(); ?></div>
							</div>
						</div>
						<?php endwhile; else: endif;?>
						<?php wp_reset_query(); ?>

				</section>
			</div>

            <?php if( have_rows('banner') ): ?>
            <?php while( have_rows('banner') ): the_row(); ?>
                <?php
                if( get_sub_field('ativar_banner') == 'true' ) { ?>
                    <div class="banner">
						<div class="container">
							<div class="image">
								<img src="<?php the_sub_field('imagem'); ?>" />
							</div>
							<div class="chamada">
								<?php the_sub_field('chamada'); ?>
							</div>
						</div>
                    </div>
                <?php } ?>
            <?php endwhile; ?>
            <?php endif; ?>
			
			<?php if( have_rows('banner_semijoias') ): ?>
            <?php while( have_rows('banner_semijoias') ): the_row(); ?>
                <?php
                if( get_sub_field('ativar_banner') == 'true' ) { ?>
                    <div class="banner-mel">
						<div class="container">
							<div class="image">
								<img src="<?php the_sub_field('imagem'); ?>" />
							</div>
							<div class="chamada">
								<?php the_sub_field('chamada'); ?>
							</div>
						</div>
                    </div>
                <?php } ?>
            <?php endwhile; ?>
            <?php endif; ?>


		</section>
	<?php endwhile; endif; ?>

	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<?php get_footer(); ?>

