<?php

register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'material-side' ),
) );


// Change ClassName in Navigation Menu Item
add_filter('nav_menu_css_class' , 'special_nav_class');
function special_nav_class($classes){
	$filterClasses = array('mdl-navigation__link');
	if (in_array('current-menu-item', $classes)) {
		$filterClasses[] = 'mdl-navigation__link--current';
	}
	return $filterClasses;
}


add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    add_theme_support( 'automatic-feed-links' );
}

if ( ! isset( $content_width ) ) $content_width = 900;

?>
