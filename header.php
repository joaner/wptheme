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
<script src="./material.min.js"></script>
<title><?php is_home() ? bloginfo( 'name' ) : wp_title(''); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <input type="checkbox" id="navbar-toggle-cbox">
      <div class="navbar-header">
        <label for="navbar-toggle-cbox" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </label>
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <?php $description = get_bloginfo( 'description', 'display' ); ?>
        <?php if ($description): ?>
        <span class="navbar-text hidden-xs"><?php echo $description; ?></span>
        <?php endif; ?>
      </div>
      <?php
      if ( has_nav_menu( 'primary' ) ):
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav navbar-nav',
            'menu_id'        => '',
						'theme_location' => 'primary',
            'container_class'=> 'collapse navbar-collapse navbar-right hidden-xs',
            'container_id'   => 'navbar',
					) );
       endif;
       ?>
    </div>
  </nav>
</header>

<div class="container">
  <article>
