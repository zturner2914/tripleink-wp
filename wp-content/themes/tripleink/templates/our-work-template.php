<?php
/*
 * Template Name: Our Work Page
 * Description: Our Work page template
 */

get_header(); ?>

  <!-- PAGE CONTENT BEGINS HERE -->
  <section class="content-section">
    <div class="animate-element l1 blue-line"></div>
    <div class="animate-element l2 blue-line"></div>
    <div class="container">
      <div class="portfolio-container">
        <?php query_posts('showposts=6&post_type=case-study&cat=9'); if ( have_posts() ): $count = 0; while ( have_posts() ) : the_post(); if ($count % 3 == 0) { ?>
            <div class="row">
              <?php } ?>
                <div class="col-sm-4 work-buffer">
                  <div class="thumbnail">
                    <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
                      <div class="full-hover">
                        <img class="img-responsive mobile-work-images" src="<?php the_field('mobile_thumbnail'); ?>" alt="<?php the_title(); ?>">
                        <img class="img-responsive hide-work-img" src="<?php the_field('desktop_thumbnail'); ?>" alt="<?php the_title(); ?>">
                        <span class="overlay">
                          <span class="text">
                            <div><?php the_title(); ?></div>
                              <div class="sub-overlay-text"><?php the_field('subheading'); ?></div>
                          </span>
                        </span>
                      </div>
                    </a>
                    <div class="mobile-descript">
                      <h2><?php the_title(); ?></h2>
                      <p><?php the_field('mobile_title'); ?></p>
                    </div>
                  </div>
                </div>
              <?php if ($count % 3 == 2) { ?>
            </div>
        <?php } $count++; endwhile; wp_reset_query(); endif;?>
      </div>
    </div>
  </section>

  <section class="content-section">
    <span class="animate-element logo-l1 black-line"></span>
    <span class="animate-element logo-l2 black-line"></span>
    <span class="animate-element logo-l3 black-line"></span>
    <div class="container">
      <div class="row">
        <div class="logo-container">
          <?php if( have_rows('clients') ): $count = 0; while ( have_rows('clients') ) : the_row(); if ($count % 3 == 0) { ?>
            <div class="row">
              <?php } ?>
                <div class="col-sm-4 col-md-3">
                  <img src="<?php the_sub_field('client_logo'); ?>" />
                </div>
              <?php if ($count % 3 == 2) { ?>
            </div>
          <?php } $count++; endwhile; endif;?>
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
      <div class="col-sm-6 col-sm-push-6 content-box">
        <div class="testimonials-intro-container">
          <p class="intro-header"><?php the_field('testimonials_heading'); ?></p>
          <?php if( have_rows('testimonials') ): while ( have_rows('testimonials') ) : the_row();?>
            <p><i>"<?php the_sub_field('testimonial', false, false); ?>"</i><br/><span class="author-test">-<?php the_sub_field('author'); ?></span></p>
          <?php endwhile; endif; ?>
        </div>
        <a class="btn-global surveyBtn focus" href="<?php echo home_url(); ?>/our-work/survey-results/"><?php the_field('testimonials_button_text'); ?></a>
      </div>
      <div class="col-sm-6 col-sm-pull-6">
        <div class="hands-holder">
          <img class="img-responsive" src="<?php the_field('testimonials_image'); ?>" alt="">
        </div>
      </div>
    </div>
    </div>
  </section>
<?php get_footer(); ?>
