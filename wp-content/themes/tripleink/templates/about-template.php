<?php
/*
 * Template Name: About Page
 * Description: About page template
 */

get_header(); global $pageID; $pageID = $post->ID; ?>

  <section class="content-section">
    <div class="animate-element l1 blue-line"></div>
    <div class="animate-element l2 blue-line"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="story-img-holder">
            <img class="img-responsive" src="<?php the_field('story_image'); ?>" alt="">
          </div>
        </div>
        <div class="col-sm-6 content-box">
          <div class="about-intro-container">
            <p class="intro-header"><?php the_field('story_heading'); ?></p>
            <p><?php the_field('story_description'); ?></p>
          </div>
          <a class="btn-global servicesBtn focus" href="<?php echo home_url(); ?>/about/our-story/"><?php the_field('story_label'); ?></a>
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
        <div class="col-sm-6 col-sm-push-6 white-bkg-images">
          <div class="desk-white-images">
            <div class="img-container">
              <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/consulting.png" alt="" />
            </div>
            <span><?php the_field('consulting_label'); ?></span>
          </div>
          <div class="desk-white-images ">
            <div class="img-container">
              <img class="img-responsive multimedia-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/multimedia.png" alt="" />
            </div>
            <span><?php the_field('multimedia_label'); ?></span>
          </div>
          <div class="desk-white-images ">
            <div class="img-container">
              <img class="img-responsive language-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/language.png" alt="" />
            </div>
            <span><?php the_field('language_label'); ?></span>
          </div>
        </div>
        <div class="col-sm-6 col-sm-pull-6">
          <div class="services-container-middle">
            <p class="intro-header"><?php the_field('services_heading'); ?></p>
            <p><?php the_field('services_description'); ?></p>
          </div>
          <a class="btn-global learnBtn focus" href="<?php echo home_url(); ?>/services/"><?php the_field('services_label'); ?></a>
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
        <div class="col-sm-5 col-md-8  desk-img-holder no-padding">
          <?php query_posts('showposts=3&post_type=team-member&cat=3&order=ASC'); if ( have_posts() ): ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <div class="thumbnail">
                <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" >
                  <div class="full-hover float-left">
                    <img class="img-responsive work-images" src="<?php the_field('mobile_image'); ?>" alt="<?php the_title(); ?>">
                    <img class="img-responsive hide-img" src="<?php the_field('desktop_image'); ?>" alt="<?php the_title(); ?>">
                    <span class="overlay">
                      <span class="text">
                        <div><?php the_title(); ?></div>
                          <div class="sub-overlay-text"><?php the_field('title'); ?></div>
                      </span>
                    </span>
                  </div>
                </a>
                <div class="mobile-descript">
                  <h2><?php the_title(); ?></h2>
                  <p><?php the_field('mobile_title'); ?></p>
                </div>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          <?php else: ?>
            <h2>No posts found</h2>
          <?php endif; ?>
        </div>
        <div class="col-sm-7 col-md-4 ">
          <div class="staff-container-middle">
            <p class="intro-header"><?php the_field('team_heading'); ?></p>
            <p><?php the_field('team_description', false, false); ?></p>
          </div>
          <a class="btn-global seemoreBtn focus" href="<?php echo home_url(); ?>/team-member/christa-tiefenbacher-hudson/"><?php the_field('team_label'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="content-section">
    <span class="animate-element l3 blue-line"></span>
    <span class="animate-element l4 blue-line"></span>
    <span class="animate-element l5 blue-line"></span>
    <div class="container">
      <div class="row">
        <div class="col-sm-7 col-md-4 ">
          <div class="global-container-middle">
            <p class="intro-header"><?php the_field('global_team_heading'); ?></p>
            <p><?php the_field('global_team_description', false, false); ?></p>
          </div>
          <a class="btn-global talkBtn focus" href="<?php echo home_url(); ?>/contact/"><?php the_field('global_team_label'); ?></a>
        </div>
        <div class="col-sm-5 col-md-8 desk-img-holder">
          <?php query_posts('showposts=3&post_type=team-member&cat=8&order=ASC'); if ( have_posts() ): ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <div class="thumbnail">
                  <div class="global-hover float-right">
                    <img class="img-responsive work-images" src="<?php the_field('mobile_image'); ?>" alt="<?php the_title(); ?>">
                    <img class="img-responsive hide-img" src="<?php the_field('desktop_image'); ?>" alt="<?php the_title(); ?>">
                    <span class="overlay">
                      <span class="text">
                        <div><?php the_title(); ?></div>
                          <div class="sub-overlay-text"><?php the_field('title'); ?></div>
                      </span>
                    </span>
                  </div>
                <div class="mobile-descript">
                  <h2><?php the_title(); ?></h2>
                  <p><?php the_field('mobile_title'); ?></p>
                </div>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          <?php else: ?>
            <h2>No posts found</h2>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="content-section">
    <div class="animate-element l8 black-line"></div>
    <div class="animate-element l6 black-line"></div>
    <div class="animate-element l7 black-line"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-push-6 content-box">
          <div class="about-readmore-container">
            <p class="intro-header"><?php the_field('news_heading'); ?></p>
            <?php query_posts('showposts=1&post_type=post&cat=4'); if ( have_posts() ): ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <h4><?php the_title(); ?></h4>
              <p><?php the_excerpt(); ?></p>
          </div>
          <a class="btn-global readBtn focus" href="<?php the_permalink(); ?>"><?php the_field('news_label', $pageID); ?></a>
        </div>
        <div class="col-sm-6 col-sm-pull-6">
          <div class="readmore-holder">
            <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
            } else { ?>
            <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/post-default.jpg" alt="" />
            <?php } ?>
          </div>
        </div>
        <?php endwhile; wp_reset_query(); endif; ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
