<?php
/*
 * Template Name: Individual Service Page
 * Description: Individidual Service page template
 */

get_header(); ?>

  <section class="staff-hero">
    <div class="staff-hero-holder" style="background-image:url(<?php the_field('hero_image'); ?>);"> </div>
  </section>

  <section class="content-section">
    <div class="animate-element staff-l1 blue-line"></div>
    <div class="animate-element staff-l2 blue-line"></div>
    <div class="container">
      <div class="row">
        <div class="staff-bio-holder">
          <div class="col-sm-7 col-sm-push-5 col-md-9 col-md-push-3">
            <div class="row">
              <div  class="staff-container">
                <div class="staff-image-holder">
                  <div class="col-md-4">
                    <?php if( have_rows('images') ): while ( have_rows('images') ) : the_row();?>
                      <img class="img-responsive image-max" src="<?php the_sub_field('image'); ?>" />
                    <?php endwhile; endif; ?>
                  </div>
                </div>
                <div class="col-md-8">
                  <?php if (have_posts()) :
                     while (have_posts()) :
                        the_post();
                           the_content();
                     endwhile;
                  endif; ?>
                </div>
              </div>
            </div>
            <a class="btn-global ourworkBtn focus" href="<?php echo home_url(); ?>/our-work"><?php the_field('work_button_text'); ?></a>
          </div>
          <div class="col-sm-5 col-sm-pull-7 col-md-3 col-md-pull-9 ">
            <div class="side-bar">
              <?php
                $args = array(
                  'post_type' => 'page',
                  'post_parent' => 25
                );

                global $wp_query;
                $current_id = $wp_query->get_queried_object_id();

                // Custom query.
                $query = new WP_Query( $args );

                if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) { $query->the_post(); ?>
                    <a class="staffBtn <?php if( $current_id == get_the_ID() ) { ?>current<?php } ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
