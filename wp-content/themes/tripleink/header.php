<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title><?php wp_title(''); ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php wp_head(); ?>
  </head>
  <body>
    <!-- HEADER BEGINS HERE -->
    <!-- <?php global $template; print_r($template); ?> -->
    <header>
      <div class="navigationBar">
        <div class="container-fluid">
            <div class="row">
              <div class="col-xs-6">
                <div class="top-header">
                  <a href="<?php echo home_url(); ?>"><img src="<?php the_field('logo', 'option'); ?>" alt="triple ink" /></a>
                </div>
              </div>
              <!-- <div class="client-login">
                <span><?php /* the_field('client_login_label', 'option'); */ ?></span>
                <img src="<?php /* echo get_stylesheet_directory_uri(); */ ?>/assets/images/global.png" alt="">
              </div> -->
              <div class="col-xs-6">
                <div class="mobile-menu">
                  <a href="#" class="menu-icon"><span></span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="bar">
                <?php
                  wp_nav_menu( array(
                    'menu_class'=> 'header-dropdown'
                  ));
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 mobile-bar"></div>
            </div>
        </div>
      </div>
    </header>
    <!-- HEADER ENDS HERE -->
