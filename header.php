<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Material_Side
 * @since Material Side 0.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css"/>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/material.min.js"></script>
    <title><?php wp_title( '', true, 'right' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout-icon"></div>
        <div class="mdl-layout__header-row">
            <span class="mdl-layout__title"><?php wp_title(''); ?></span>
            <div class="mdl-layout-spacer"></div>
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                          mdl-textfield--floating-label mdl-textfield--align-right">
                    <label class="mdl-button mdl-js-button mdl-button--icon"
                           for="fixed-header-drawer-exp">
                        <i class="material-icons">search</i>
                    </label>
                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input" type="search"
                               value="<?php echo get_search_query(); ?>" name="s"
                               id="fixed-header-drawer-exp">
                    </div>
                </div>
            </form>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <div class="mdl-layout-title sitename mdl-navigation__link">
            <a class="mdl-typography--subhead mdl-color-text--grey-600" href="<?php echo esc_url( home_url( '/' ) ); ?>"
               rel="home"><?php bloginfo( 'name' ); ?></a>
        </div>
        <div class="mdl-layout-title">
            <?php if ($siteicon = get_site_icon_url()): ?>
                <img src="<?php echo esc_url( $siteicon ); ?>" width="96" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>"
                     class="siteicon"/>
            <?php endif; ?>
            <?php $description = get_bloginfo( 'description', 'display' ); ?>
            <?php if ($description): ?>
            <p class="mdl-typography--body-1 mdl-color-text--grey-500"><?php echo $description; ?></p>
            <?php endif; ?>
        </div>

        <?php
		if ( has_nav_menu( 'primary' ) ):
    	    // Primary navigation menu.
    		$menu = wp_nav_menu( array(
    		    'echo'           => false,
		        'menu_class' => 'nopadding',
		        'menu_id' => '',
		        'theme_location' => 'primary',
		        'items_wrap' => '%3$s',
		        'depth' => 0,
		        'container_class'=> 'mdl-navigation',
		        'container_id' => 'navbar',
        	) );

        	// remove <li> tag and keep attributes
            echo str_ireplace(array('><a', '<li', '</li>'), array('', '<a', ''), $menu);
        endif;
        ?>

        <div class="mdl-layout-title footer-text">
            <p class="mdl-typography--caption">
                <a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>">WordPress</a>
                &
                <a href="https://github.com/joaner/wptheme" rel="nofollow">Material Lite Theme</a>
            </p>
        </div>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
