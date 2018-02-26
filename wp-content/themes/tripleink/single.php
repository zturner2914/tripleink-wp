<?php get_header(); ?>

<section class="content-section internal-padding">
    <div class="animate-element staff-l1 blue-line"></div>
    <div class="animate-element staff-l2 blue-line"></div>
    <div class="container">
      <div class="row single-style">
      	<div class="col-sm-7 col-sm-push-5 col-md-9 col-md-push-3 content-box">
      		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article>
					<h1><?php the_title(); ?></h1>
          <p><?php echo get_the_date(); ?></p>
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="staff-image-holder">
              <img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
            </div>
          <?php endif; ?>
					<?php the_content(); ?>
				</article>
			<?php endwhile; endif; ?>
		</div>
		<div class="col-sm-5 col-sm-pull-7 col-md-3 col-md-pull-9 ">
        <div class="side-bar">
          <?php $categories = get_categories('exclude=1,3,4,8,9,'); ?>
          <?php foreach ($categories as $category):?>
            <a href="<?php echo get_category_link($category->term_id); ?>" class="staffBtn" id="<?php echo $category->name;?>"><?php echo $category->name;?></a>
          <?php endforeach; ?>
        </div>
      </div>
	</div>
</section>

<?php get_footer(); ?>
