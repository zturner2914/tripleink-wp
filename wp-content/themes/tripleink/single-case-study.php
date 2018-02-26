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
          <div class="col-sm-7 col-sm-push-5 col-md-9 col-md-push-3">
            <div class="row">
              <div class="case-study-container">
                <div class="col-md-4">
                  <?php if( have_rows('case_study_images') ): while ( have_rows('case_study_images') ) : the_row();?>
                    <img class="img-responsive image-max" src="<?php the_sub_field('image'); ?>" />
                  <?php endwhile; endif; ?>
                </div>
                <div class="col-md-8">
                  <?php the_field('case_study_content'); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-5 col-sm-pull-7 col-md-3 col-md-pull-9 ">
            <div class="side-bar">
              <?php
                $args = array(
                  'post_type' => 'case-study',
                  'posts_per_page' => 9
                );

                global $wp_query;
                $current_id = $wp_query->get_queried_object_id();

                // Custom query.
                $query = new WP_Query( $args );

                if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) { $query->the_post(); ?>
                    <a class="staffBtn <?php if( $current_id == get_the_ID() ) { ?>current<?php } ?>" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
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
