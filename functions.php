<?php

register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'material-side' ),
) );


// Change ClassName in Navigation Menu Item
add_filter('nav_menu_css_class' , 'materialside_special_nav_class');
function materialside_special_nav_class($classes){
	$filterClasses = array('mdl-navigation__link');
	if (in_array('current-menu-item', $classes)) {
		$filterClasses[] = 'mdl-navigation__link--current';
	}
	return $filterClasses;
}


add_action( 'after_setup_theme', 'materialside_theme_setup' );
function materialside_theme_setup() {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    add_theme_support( 'automatic-feed-links' );
}


// register assets
function materialside_enqueue_style() {
	wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css', false );
	wp_enqueue_style( 'material', get_template_directory_uri() . '/css/material.min.css', false );
	wp_enqueue_style( 'icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', false );
}

function materialside_enqueue_script() {
	wp_enqueue_script( 'material', get_template_directory_uri() . '/js/material.min.js', false );
}

add_action( 'wp_enqueue_scripts', 'materialside_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'materialside_enqueue_script' );


if ( ! isset( $content_width ) ) $content_width = 900;

?>
