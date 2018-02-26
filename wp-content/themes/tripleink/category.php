<?php
  get_header();
  $currentCat = get_category(get_query_var('cat'));
  $catID = $currentCat->term_id;
?>

  <section class="staff-hero">
    <div class="staff-hero-holder" style="background-image:url(<?php the_field('hero_image', 23); ?>);" /></div>
  </section>

  <section class="content-section">
    <div class="animate-element staff-l1 blue-line"></div>
    <div class="animate-element staff-l2 blue-line"></div>
    <div class="container">
      <div class="row">
        <div class="staff-bio-holder">
          <div class="col-sm-7 col-sm-push-5 col-md-9 col-md-push-3 content-box">
            <div  class="staff-container">
              <?php
                $args = array('post_type' => 'post', 'cat' => $catID, 'posts_per_page' => 10);
                $query = new WP_Query($args);
              ?>
              <?php if ($query->have_posts()) : while ( $query->have_posts()) : $query->the_post(); ?>
                <article>
                  <div class="row">
                    <?php if (has_post_thumbnail()) { ?>
                      <div class="col-md-4 staff-image-holder">
                        <div class="staff-image-holder">
                          <a href="<?php the_permalink() ?>"><img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" /></a>
                        </div>
                      </div>
                    <?php } ?>
                    <?php if (has_post_thumbnail()) { ?>
                      <div class="col-md-8">
                    <?php } else { ?>
                      <div class="col-sm-12">
                    <?php } ?>
                      <p class="staff-header"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
                      <p class="staff-title"><?php echo get_the_date(); ?></p>
                      <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
                      <p class="excerpt"><?php the_excerpt(); ?></p>
                    </div>
                  </div>
                </article>

              <?php endwhile; wp_reset_postdata(); else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
              <?php endif; ?>
            </div>
            <a class="btn-global storyBtn focus" href="<?php echo home_url(); ?>/?feed=rss2"><?php the_field('subscribe_button_text', 'option'); ?></a>
          </div>
          <div class="col-sm-5 col-sm-pull-7 col-md-3 col-md-pull-9 ">
            <div class="side-bar">
              <?php $categories = get_categories('exclude=1,3,4,8,9'); ?>
              <?php foreach ($categories as $category):?>
                <a href="<?php echo get_category_link($category->term_id); ?>" class="staffBtn <?php if ($catID == $category->term_id) { ?>current<?php } ?>" id="<?php echo $category->name;?>"><?php echo $category->name;?></a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
