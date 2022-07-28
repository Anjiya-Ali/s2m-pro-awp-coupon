<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function awp_s2m_pro_cc_menu_pages( $add_divider = true, $vars = [] ) {
	remove_filter( 'ws_plugin__s2member_during_add_admin_options_add_divider_2', 'c_ws_plugin__s2member_pro_menu_pages::add_coupon_codes_page', 10 );

	add_submenu_page( $vars['menu'], 's2Member Pro / Coupon Codes', 'Pro Coupon Codes', 'create_users', 'ws-plugin--s2member-pro-coupon-codes', 'awp_s2m_pro_cc_menu_pages_oupon_codes_page' );

	return $add_divider;
}

function awp_s2m_pro_cc_menu_pages_oupon_codes_page() {
	c_ws_plugin__s2member_menu_pages::update_all_options(); // Updates options.

	/**
     * For some reason after saving all the changes, the updated values
     * do not appear until next reload, hence force double reload here
     */
    if ( 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		wp_redirect( $_SERVER['REQUEST_URI'] );
		exit;
	}

	include_once 'coupon-codes.php';
}
