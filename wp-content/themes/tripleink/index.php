<?php get_header(); ?>

  <!-- HERO IMAGE -->
  <section id="home-hero">
    <div class="home-hero-holder" style="background-image:url('<?php the_field('hero_image'); ?>');"></div>
    <div class="container">
      <div class="mobile-hero-copy-holder">
        <div class="mobile-hero-copy">
          <h1><?php the_field('hero_h1'); ?></h1>
        </div>
        <a class="heroBtn focus" href="#"><?php the_field('hero_btn_text'); ?></a>
      </div>
    </div>
  </section>

  <!-- PAGE CONTENT BEGINS HERE -->
  <section class="content-section">
    <div class="animate-element l1 blue-line"></div>
    <div class="animate-element l2 blue-line"></div>
    <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="intro-quote-container">
          <p class="intro-quote"><?php the_field('services_quote', false, false); ?><br/><span class="gunter">- <?php the_field('services_quote_author'); ?></span></p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="intro-container">
          <p class="intro-header"><?php the_field('services_heading'); ?></p>
          <p><?php the_field('services_description', false, false); ?></p>
        </div>
        <a class="btn-global servicesBtn focus" href="<?php echo home_url(); ?>/services/"><?php the_field('services_label'); ?></a>
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
        <div class="col-sm-5 col-md-4">
          <div class="intro-container-middle">
            <p class="intro-header"><?php the_field('work_heading'); ?></p>
            <p><?php the_field('work_description', false, false); ?></p>
          </div>
          <a class="btn-global workBtn focus" href="<?php echo home_url(); ?>/our-work/"><?php the_field('work_label'); ?></a>
        </div>
        <div class="col-sm-7 col-md-8 no-padding">
          <div class="desk-img-holder">
            <?php query_posts('showposts=3&post_type=case-study&cat=3'); if ( have_posts() ): ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <div class="thumbnail">
                  <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" >
                    <div class="full-hover float-right">
                      <img class="img-responsive work-images" src="<?php the_field('mobile_thumbnail'); ?>" alt="<?php the_title(); ?>">
                      <img class="img-responsive hide-img" src="<?php the_field('desktop_thumbnail'); ?>" alt="<?php the_title(); ?>">
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
              <?php endwhile; wp_reset_query(); ?>
            <?php else: ?>
              <h2>No posts found</h2>
            <?php endif; ?>
          </div>
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
      <div class="col-sm-6 col-sm-push-6">
        <div class="video-text-container">
          <p class="intro-header"><?php the_field('about_heading'); ?></p>
          <p><?php the_field('about_description', false, false); ?></p>
        </div>
        <a class="btn-global aboutBtn focus" href="<?php echo home_url(); ?>/about/"><?php the_field('about_label'); ?></a>
      </div>
      <div class="col-sm-6 col-sm-pull-6">
        <div class="video-holder">
          <iframe class="video-responsive" src="<?php the_field('about_video', false, false); ?>" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    </div>
  </section>

<?php get_footer(); ?>
