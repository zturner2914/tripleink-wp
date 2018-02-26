<?php get_header(); ?>

  <!-- HERO IMAGE -->
  <section class="staff-hero targetDiv">
    <div class="staff-hero-holder" style="background-image:url(<?php the_field('hero_image'); ?>);"></div>
  </section>

  <!-- PAGE CONTENT BEGINS HERE -->
  <section class="content-section internal-padding">
    <div class="animate-element staff-l1 blue-line"></div>
    <div class="animate-element staff-l2 blue-line"></div>
    <div class="container">
      <div class="row">
        <div class="staff-bio-holder">
          <div class="col-sm-7 col-sm-push-5 col-md-9 col-md-push-3 content-box">
            <div class="row">
              <div class="staff-container clearfix">
                <div class="col-md-4 staff-image-holder clearfix">
                  <div class="staff-image-holder">
                    <img class="img-responsive work-images" src="<?php the_field('mobile_image'); ?>" alt="<?php the_title(); ?>">
                    <img class="img-responsive hide-img" src="<?php the_field('desktop_image'); ?>" alt="<?php the_title(); ?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <p class="staff-header"><?php the_title(); ?></p>
                  <p class="staff-title"><?php the_field('title'); ?></p>
                  <?php the_field('bio'); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-5 col-sm-pull-7 col-md-3 col-md-pull-9 ">
            <div class="side-bar">
              <?php
                $args = array(
                  'post_type' => 'team-member',
                  'cat' => '-8'
                );

                global $wp_query;
                $current_id = $wp_query->get_queried_object_id();

                // Custom query.
                $query = new WP_Query( $args );

                if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) { $query->the_post(); ?>
                    <a class="staffBtn <?php if( $current_id == get_the_ID() ) { ?>current<?php } ?>" href="<?php the_permalink(); ?>"><?php echo strtok(get_the_title(), " "); ?></a>
                  <?php }
                }

                wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>
