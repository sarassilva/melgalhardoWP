<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">
	<ul>
		<li>
			<a href="<?php echo get_home_url(); ?>/minha-conta/orders/">
				<span class="icon icon-box"></span>
				<span>Meus pedidos <p class="small">Veja e rastreie seus pedidos</p> </span>
			</a>
		</li>
		<li>
			<a href="<?php echo get_home_url(); ?>/lista-de-desejos">
				<span class="icon icon-heart"></span>
				<span>Meus desejos <p class="small">Os seus produtos preferidos</p> </span>
			</a>
		</li>
		<li>
			<a href="<?php echo get_home_url(); ?>/minha-conta/edit-address/">
				<span class="icon icon-house"></span>
				<span>Meus endereços <p class="small">Veja seus endereços</p> </span>
			</a>
		</li>
		<li>
			<a href="<?php echo get_home_url(); ?>/minha-conta/edit-account/">
				<span class="icon icon-user"></span>
				<span>Meus dados <p class="small">Veja e edite suas informações</p> </span>
			</a>
		</li>
		<li>
			<a href="<?php echo get_home_url(); ?>/minha-conta/alterar-senha/">
				<span class="icon icon-locker"></span>
				<span>Alterar senha <p class="small">Altere a senha da sua conta</p> </span>
			</a>
		</li>
		<li class="logout">
			<a href="<?php echo get_home_url(); ?>/minha-conta/customer-logout/?_wpnonce=32eea297f6">
				<span class="icon icon-out"></span>
				<span>Sair</span>
			</a>
		</li>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
