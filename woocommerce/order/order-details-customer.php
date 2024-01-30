<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */

defined( 'ABSPATH' ) || exit;

$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<section class="woocommerce-customer-details">

	<div class="order__shippiment">
		<h3 class="woocommerce-column__title">Entrega</h3>

		<div>
			<p>A entrega será realizada em:</p>
			<?php echo wp_kses_post( $order->get_formatted_shipping_address( esc_html__( 'N/A', 'woocommerce' ) ) ); ?>

			<?php if ( $order->get_shipping_phone() ) : ?>
				<p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_shipping_phone() ); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<div class="order__resume">
		<h3 class="woocommerce-column__title">Resumo da compra</h3>

		<p><span>Subtotal</span> <?php echo '' . $order->get_subtotal_to_display() . ''; ?></p>
		<p><span>Método de entrega</span> <?php echo '' . $order->get_shipping_method() . ''; ?></p>
		<p><span>Frete</span> <?php echo '' . $order->get_shipping_total() . ''; ?></p>
		<p><span>Total</span> <?php echo '' . $order->get_formatted_order_total() . ''; ?></p>
	</div>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

</section>
