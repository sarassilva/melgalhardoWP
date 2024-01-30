<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" class="no-ie" <?php language_attributes(); ?>>
<head>
<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="<?php bloginfo('description'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
	<div class="bar__destaq">
		<?php if(is_active_sidebar('wdg4')){ dynamic_sidebar('wdg4'); } ?>
	</div>
	<section class="container">

		<div class="hold">
			<button class="mobile-menu" id="mobile-menu" onclick="menuMobile()" title="Menu de navegação" name="Menu de navegação">Abrir</button>

			<a class="logo" title="Mel Galhardo" href="<?php echo get_home_url(); ?>" rel="Home">Mel Galhardo</a>

			<div class="main-menu">
				<div class="site__menu">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
				</div>
				<div class="shop__menu">
					<?php wp_nav_menu( array( 'theme_location' => 'semijoias-menu' ) ); ?>
				</div>
			</div>

			<div class="wc-menu">
				<div class="desktop search">
					<?php echo do_shortcode('[fibosearch]'); ?>
				</div>

				<a href="<?php echo get_home_url(); ?>/minha-conta" title="Minha conta" class="option desktop user">
					<span class="icon icon-user"></span>
				</a>

				<a href="<?php echo get_home_url(); ?>/wishlist" title="Lista de desejos" class="option wishlist">
					<span class="icon icon-heart"></span>
				</a>
				<a href="<?php echo wc_get_cart_url() ?>" title="Carrinho" class="cart option xoo-wsc-cart-trigger">
					<span class="icon icon-cart"></span> <div class="number"><?php echo WC()->cart->get_cart_contents_count() ?></div>
				</a>
				<span title="Help Center" class="option help-link">
					<span class="icon icon-help"></span>
				</span>
			</div>
		</div>
		<div class="mobile search">
			<?php echo do_shortcode('[fibosearch]'); ?>
		</div>
	</section>

</header>

<main>