<?php 
/* Template Name: Home */ 
?>


<?php acf_form_head(); get_header(); ?>

	<div class="slider">
		<?php echo do_shortcode('[smartslider3 slider="6"]');?>
	</div>

	<div class="services_mobile">
		<section class="container">
			<?php if( have_rows('servicos') ):
	        while( have_rows('servicos') ) : the_row();
	        ?> 

        		<h2><?php the_sub_field('titulo') ?></h2>
        		<p><?php the_sub_field('mini_descricao') ?></p>
        		<div class="btns">
        			<a class="btn" title="Serviços on-line" target="_blank" href="<?php the_sub_field('online') ?>">On-line</a>
        			<a class="btn" title="Serviços presenciais" target="_blank" href="<?php the_sub_field('presencial') ?>">Presencial</a>
        		</div>

        <?php endwhile; else : endif; ?>
		</section>
	</div>

	<div class="reverse">
		<div class="curadoria">
			<section class="container">
				<?php if( have_rows('destaque_1') ):
		        while( have_rows('destaque_1') ) : the_row();
		        ?> 
		        	<div class="hold">
		        		<div class="image">
			        		<img src="<?php the_sub_field('imagem') ?>" />
			        	</div>
			        	<div class="content">
			        		<h2><?php the_sub_field('titulo') ?></h2>
			        		<div class="btns">
			        			<a class="btn outline" title="Serviços on-line" target="_blank" href="<?php the_sub_field('link') ?>">Descubra mais</a>
			        		</div>
			        	</div>
		        	</div>
	        <?php endwhile; else : endif; ?>

	        	<div class="categories scroll">
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

		<div class="about">
			<section class="container">
				<?php if( have_rows('sobre') ):
		        while( have_rows('sobre') ) : the_row();
		        ?> 
					<div class="image">
		        		<img src="<?php the_sub_field('imagem') ?>" />
		        	</div>
		        	<div class="content">
		        		<h3>Sobre mim</h3>
		        		<?php the_sub_field('texto') ?>
		        	</div>
		        <?php endwhile; else : endif; ?>
			</section>
		</div>
	</div>

	<div class="instagram-feed">
		<section class="container">
			<?php echo do_shortcode(get_field('instagram')); ?>
		</section>
	</div>

	<div class="services">
		<section class="container">
			<?php if( have_rows('servicos_2') ):
	        while( have_rows('servicos_2') ) : the_row();
	        ?>
		        <div class="hold">
		        	<div class="content">
			        	<h2><?php the_sub_field('titulo') ?></h2>
			        	<?php the_sub_field('texto') ?>
			        </div>
			        <div class="list">
			        	<ul>
			        		<?php if( have_rows('mulheres') ):
					        while( have_rows('mulheres') ) : the_row();
					        ?>
			        		<li>
			        			<div class="img">
			        				<img src="<?php the_sub_field('imagem') ?>" ?>
			        			</div>
			        			<div class="text">
						        	<h3><?php the_sub_field('titulo') ?></h3>
						        	<p><?php the_sub_field('mini_descricao') ?></p>
						        </div>
			        		</li>
			        		<?php endwhile; else : endif; ?>
			        		<?php if( have_rows('empresas') ):
					        while( have_rows('empresas') ) : the_row();
					        ?>
			        		<li>
			        			<div class="img">
			        				<img src="<?php the_sub_field('imagem') ?>" ?>
			        			</div>
					        	<div class="text">
						        	<h3><?php the_sub_field('titulo') ?></h3>
						        	<p><?php the_sub_field('mini_descricao') ?></p>
						        </div>
			        		</li>
			        		<?php endwhile; else : endif; ?>
			        	</ul>
			        </div>
		        </div>
			<?php endwhile; else : endif; ?>
		</section>
	</div>


<?php get_footer(); ?>