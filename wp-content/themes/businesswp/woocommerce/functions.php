<?php 
// Refresh Woocommerce cart count instantly in navigation primary menu.
function businesswp_woocommerce_navigation_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	$cart_value = sprintf ( __( '<span class="cart-value">%d</span>', 'businesswp'), WC()->cart->get_cart_contents_count() );
	$cart_inner_tag = sprintf('<a class="cart-total" href="%1$s" title="%2$s"><i class="fa fa-shopping-cart"></i>%3$s</a>',
        		esc_url( wc_get_cart_url() ),
        		esc_attr('View cart', 'businesswp'),
        		$cart_value
        	);

	ob_start();
	echo $cart_inner_tag;
	$fragments['a.cart-total'] = ob_get_clean();
	return $fragments;
}