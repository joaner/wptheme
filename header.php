<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css"/>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/material.min.css">
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/material.min.js"></script>
<title><?php is_home() ? bloginfo( 'name' ) : wp_title(''); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header is-upgraded">
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
                         id="fixed-header-drawer-exp" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>">
                </div>
              </div>
      </form>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <div class="mdl-layout-title sitename mdl-navigation__link">
      <a class="mdl-typography--subhead mdl-color-text--grey-600" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    </div>
    <div class="mdl-layout-title">
       <img src="<?php echo get_site_icon_url(); ?>" width="96" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" class="siteicon" />
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
    		    'menu_class'     => 'nopadding',
                'menu_id'        => '',
    			'theme_location' => 'primary',
    			'items_wrap'     => '%3$s',
    			'depth'          => 0,
                'container_class'=> 'mdl-navigation',
                'container_id'   => 'navbar',
    		) );

            // remove <li> tag and keep attributes
    		echo str_ireplace(array('><a', '<li', '</li>'), array('', '<a', ''), $menu);
          endif;
        ?>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
