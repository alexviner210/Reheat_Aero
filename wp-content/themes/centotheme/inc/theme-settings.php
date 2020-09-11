<?php
/**
 * Check and setup theme's default settings
 *
 * @package centotheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'centotheme_setup_theme_default_settings' ) ) {
	function centotheme_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$centotheme_posts_index_style = get_theme_mod( 'centotheme_posts_index_style' );
		if ( '' == $centotheme_posts_index_style ) {
			set_theme_mod( 'centotheme_posts_index_style', 'default' );
		}

		// Sidebar position.
		$centotheme_sidebar_position = get_theme_mod( 'centotheme_sidebar_position' );
		if ( '' == $centotheme_sidebar_position ) {
			set_theme_mod( 'centotheme_sidebar_position', 'right' );
		}

		// Container width.
		$centotheme_container_type = get_theme_mod( 'centotheme_container_type' );
		if ( '' == $centotheme_container_type ) {
			set_theme_mod( 'centotheme_container_type', 'container' );
		}
	}
}
