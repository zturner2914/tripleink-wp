<?php
/*
 * Template Name: Generic Page
 * Description: Generic page template
 */

get_header(); ?>

	<section id="quote-hero">
		<div class="quote-hero-holder" style="background-image:url(<?php the_field('hero_image'); ?>);"> </div>
	</section>

	<section class="content-section internal-padding">
	    <div class="container">
	    	<div class="col-sm-12 col-md-9">
				<?php if (have_posts()) :
					while (have_posts()) :
						the_post();
						the_content();
					endwhile;
				endif; ?>
	    	</div>
	    </div>
	  </section>

<?php get_footer(); ?>
