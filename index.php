<?php
/**
 * Plugin Name: Rename WC Subscriptions Pending Cancellation Status
 * Description: Change the name of the "Pending Cancellation" status in WooCommerce Subscriptions to be "Renewal cancelled".
 * Author: Zubair Rauf
 * Version: 1.0
 * Author URI: https://zubairrauf.com
 */

function eg_change_pending_cancellation_status( $subscription_statuses ) {
	$subscription_statuses['wc-pending-cancel'] = _x( 'Renewal cancelled', 'Subscription status', 'woocommerce-subscriptions' );
	return $subscription_statuses;
}

add_action( 'wcs_subscription_statuses', 'eg_change_pending_cancellation_status', 0 );

function eg_change_pending_cancellation_status_admin( $subscription_statuses ) {
	$subscription_statuses['wc-pending-cancel'] = _nx_noop( 'Renewal cancelled <span class="count">(%s)</span>', 'Renewal cancelled <span class="count">(%s)</span>', 'post status label including post count', 'woocommerce-subscriptions' );
	return $subscription_statuses;
}

add_action( 'woocommerce_subscriptions_registered_statuses', 'eg_change_pending_cancellation_status_admin', 0 );