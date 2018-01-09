<?php

register_nav_menus( array(
  'primary' => __( '主菜单',      'twentyfifteen' ),
) );

function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function disable_wp_emojicons() {

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

add_action( 'init', 'disable_wp_emojicons' );


// Filtering a Class in Navigation Menu Item
add_filter('nav_menu_css_class' , 'special_nav_class');
function special_nav_class($classes){
	$filterClasses = array('mdl-navigation__link');
	if (in_array('current-menu-item', $classes)) {
		$filterClasses[] = 'mdl-navigation__link--current';
	}
	return $filterClasses;
}

?>
