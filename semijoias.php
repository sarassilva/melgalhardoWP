<?php 
/* Template Name: Semijoias */ 
?>

<?php acf_form_head(); get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/wc.css" type="text/css" media="screen" />


	<div class="slider">
		<?php echo do_shortcode('[smartslider3 slider="7"]');?>
	</div>
	<div class="bar__benefits">
		<section class="container">
			<?php if(is_active_sidebar('wdg5')){ dynamic_sidebar('wdg5'); } ?>
		</section>
	</div>

	<div class="products__list">
		<section class="container">
			<h2>Novidades</h2>
			<?php echo do_shortcode('[products limit="4" columns="4" orderby="id" order="DESC" visibility="visible"]'); ?>

			<a class="link" title="Ver mais produtos" href="<?php echo get_home_url(); ?>/semijoias/loja">Descubra todas as novidades</a>
		</section>
	</div>

	<div class="curadoria">
			<section class="container">
				<?php if( have_rows('destaque') ):
		        while( have_rows('destaque') ) : the_row();
		        ?> 
		        	<div class="hold">
		        		<div class="image">
			        		<img src="<?php the_sub_field('imagem') ?>" />
			        	</div>
			        	<div class="content">
			        		<h2><?php the_sub_field('titulo') ?></h2>
			        		<?php the_sub_field('texto') ?>
			        		<div class="btns">
			        			<a class="btn outline" title="Serviços on-line" target="_blank" href="<?php the_sub_field('link') ?>">Descubra mais</a>
			        		</div>
			        	</div>
		        	</div>
	        <?php endwhile; else : endif; ?>
			</section>
		</div>

		<div class="products__list">
			<section class="container">
				<h2>Favoritos</h2>
				<?php echo do_shortcode('[products limit="4" columns="4" orderby="id" order="DESC" visibility="visible"]'); ?>

				<a class="link" title="Ver mais produtos" href="<?php echo get_home_url(); ?>/semijoias/loja">Descubra nossos produtos favoritos</a>
			</section>
		</div>

		<div class="curadoria">
			<section class="container">	
				<div class="categories scroll">
	        		<h3>descubra por categoria</h3>
	        		<ul>
						<?php
						$taxonomyName = "product_cat";
						$prod_categories = get_terms($taxonomyName, array(
						    'orderby'=> 'name',
						    'order' => 'ASC',
						    'hide_empty' => false,
						));  

						foreach( $prod_categories as $prod_cat ) :
						    if ( $prod_cat->parent != 0 )
						        continue;
						    $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
						    $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
						    $term_link = get_term_link( $prod_cat, 'product_cat' );
						    ?>
						    <li>    
							    <a class="button" href="<?php echo $term_link; ?>"> 
							    	<img  src="<?php echo $cat_thumb_url; ?>" alt="" /> 
							    	<?php echo $prod_cat->name; ?> 
							    </a> 
							</li>
						    <?php endforeach; 
						wp_reset_query(); ?>
					</ul>
	        	</div>
			</section>
		</div>

<?php get_footer(); ?>