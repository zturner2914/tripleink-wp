<?php
/*
 * Template Name: 404 page
 * Description: 404 page template
 */

get_header(); ?>


  <section class="content-section">
    <div class="animate-element l1 blue-line"></div>
    <div class="animate-element l2 blue-line"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="story-img-holder">
            <img class="img-responsive error-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404.png" alt="404">
          </div>
        </div>
        <div class="col-sm-6 content-box">
          <div class="error-contatiner">
            <p class="intro-header">Page Not Found</p>
            <p>We're sorry, but the page you were looking for couldn't be found. Please check your URL or return to our home page.</p>
          </div>
          <a class="btn-global servicesBtn focus" href="<?php echo home_url(); ?>">back to home</a>
        </div>
      </div>
    </div>
  </section>


<?php get_footer(); ?>
