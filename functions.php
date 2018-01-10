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

?>
