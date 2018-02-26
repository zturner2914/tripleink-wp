<?php
/*
 * Template Name: Services Page
 * Description: Services page template
 */

get_header(); ?>

  <section id="quote-hero">
    <div class="quote-hero-holder" style="background-image:url(<?php the_field('hero_image'); ?>);"> </div>
  </section>

  <section class="content-section">
    <div class="animate-element l1 blue-line"></div>
    <div class="animate-element l2 blue-line"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 white-bkg-single">
          <div class="language-holder">
            <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/services/chatbox.jpg" alt="">
          </div>
        </div>
        <div class="col-sm-6 content-box">
          <div class="language-container">
            <p class="intro-header"><?php the_field('language_heading'); ?></p>
            <p><?php the_field('language_content', false, false); ?></p>
          </div>
          <a class="largeBtns languageBtn focus" href="<?php echo home_url(); ?>/services/language"><?php the_field('language_button_text'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="content-section">
    <span class="animate-element l3 black-line"></span>
    <span class="animate-element l4 black-line"></span>
    <span class="animate-element l5 black-line"></span>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-push-6 white-bkg-single">
          <div class="multimedia-holder">
            <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/services/monitor.jpg" alt="">
          </div>
        </div>
        <div class="col-sm-6 col-sm-pull-6">
          <div class="language-container">
            <p class="intro-header"><?php the_field('production_heading'); ?></p>
            <p><?php the_field('production_content', false, false); ?></p>
          </div>
          <a class="largeBtns learnBtn focus" href="<?php echo home_url(); ?>/services/localization-production"><?php the_field('production_button_text'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="content-section">
    <div class="animate-element l8 orange-line"></div>
    <div class="animate-element l6 orange-line"></div>
    <div class="animate-element l7 orange-line"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 white-bkg-single">
          <div class="language-holder">
            <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/services/head.jpg" alt="">
          </div>
        </div>
        <div class="col-sm-6 content-box">
          <div class="language-container">
            <p class="intro-header"><?php the_field('consulting_heading'); ?></p>
            <p><?php the_field('consulting_content', false, false); ?></p>
          </div>
          <a class="largeBtns consultingBtn focus" href="<?php echo home_url(); ?>/services/consulting-creative"><?php the_field('consulting_button_text'); ?></a>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>