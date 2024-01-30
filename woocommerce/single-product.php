<?php get_header() ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/wc.css" type="text/css" media="screen" />

<div class="single__product">
	<section class="container">

		<?php
			do_action( 'woocommerce_before_main_content' );
		?>

		<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		
		<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
			<div>
				<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
				<div class="summary entry-summary">	
					<?php echo do_shortcode('[wlfmc_add_to_wishlist]'); ?>			
					<?php do_action( 'woocommerce_single_product_summary' ); ?>
				</div>	
			</div>
			<?php do_action( 'woocommerce_after_single_product_summary' );	?>
			<?php do_action( 'woocommerce_after_single_product' ); ?>
			<?php endwhile;  ?>
			<?php do_action( 'woocommerce_after_main_content' );?>
		</div>	

	</section>
</div>


<?php get_footer(); ?>