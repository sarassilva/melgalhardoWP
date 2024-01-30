<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header() ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/wc.css" type="text/css" media="screen" />

	<div class="woocommerce products__list">

		<section class="container">	
			<?php
				defined( 'ABSPATH' ) || exit;
				get_header( 'shop' );
				do_action( 'woocommerce_before_main_content' );
			?>

				<h1><?php woocommerce_page_title(); ?></h1>	

				<?php if( is_product_category()) :?>
					<div class="category__information">
						<div class="text">
							<?php echo category_description(); ?>
						</div>

						<div class="image__destaq">
							<?php
								$queriedObject=get_queried_object();
								$image = get_field('imagem_destaque','product_cat_'.$queriedObject->term_id);

								echo '<img src="'. $image .'" />';
							?>
						</div>
					</div>
				<?php endif; ?>

				<div class="filter">
					<div class="title">Filtros</div>
					<?php if(is_active_sidebar('wdg6')){ dynamic_sidebar('wdg6'); } ?>
				</div>

			
			<?php if ( woocommerce_product_loop() ) {
				do_action( 'woocommerce_before_shop_loop' ); ?>

				<div class="woocommerce columns-4" id="products">
					<?php woocommerce_product_loop_start();
						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();
								do_action( 'woocommerce_shop_loop' );
								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();
						do_action( 'woocommerce_after_shop_loop' );

						} else {
							do_action( 'woocommerce_no_products_found' );
						}

						do_action( 'woocommerce_after_main_content' ); ?>
				</div>

		</section>
	</div>

	<div class="bar__benefits">
		<section class="container">
			<?php if(is_active_sidebar('wdg5')){ dynamic_sidebar('wdg5'); } ?>
		</section>
	</div>


<?php get_footer(); ?>