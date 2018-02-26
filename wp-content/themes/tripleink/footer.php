  <section class="content-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <form method="POST" action="<?php the_permalink(); ?>" enctype="multipart/form-data">
            <div class="input-container">
              <input class="form-box" type="text" name="fullname" placeholder="<?php the_field('name_form', 'option'); ?>"><br/><br/>
              <input class="form-box" type="text" name="address" placeholder="<?php the_field('company_address_form', 'option'); ?>"><br/><br/>
              <input class="form-box" type="text" name="email" placeholder="<?php the_field('email_form', 'option'); ?>"><br/><br/>
              <textarea class="form-box" name="note" rows="3"  placeholder="<?php the_field('note_form', 'option'); ?>" ></textarea>
            </div>
            <div class="row form-btn-chbx">
              <div class="col-sm-6">
                <input type="hidden" name="currenturl" value="<?php esc_url(the_permalink()); ?>">
                <input class="form-button" name="submitform" type="submit" value="<?php the_field('send_label', 'option'); ?>">
              </div>
              <div class="col-sm-6">
                <div class="free-poster-container">
                  <input type="checkbox" name="free-poster-checkbox" class="label-checkbox" id="free-poster-checkbox">
                  <label for="free-poster-checkbox" class="label-checkbox">
                    <a class="free-poster" ><?php the_field('poster_link', 'option'); ?></a>
                  </label>
                  <a class="info-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/info-icon.png" alt="" /></a>
                </div>
              </div>
            </div>
            <div id="pop-up-container" class="container">
              <div class="row">
                <div class="pop-up">
                  <div class="row ">
                    <div class="col-sm-12">
                      <span class="close bottom-buffer-two">X</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="poster-body clearfix">
                    <div class="col-sm-4">
                      <div class="poster">
                        <img src="<?php the_field('footer_poster_image', 'option'); ?>" alt="free poster">
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <p class="poster-title"><?php the_field('footer_poster_title', 'option'); ?></p>
                      <?php the_field('footer_poster_text', 'option'); ?>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="call-quote-spacing">
              <div class="col-sm-12">
                <h2 class="call-quote-header"><?php the_field('call_heading', 'option'); ?></h2>
                <div><?php the_field('call_description', 'option', false, false); ?></div>
                <p><?php the_field('phone_number', 'option'); ?></p>
              </div>
              <div class="col-sm-12">
                <h2 class="call-quote-header"><?php the_field('get_quote_heading', 'option'); ?></h2>
                <div><?php the_field('get_quote_description', 'option', false, false); ?></div>
                <a class="form-button quote-btn" href="<?php echo home_url(); ?>/contact#quote-form"><?php the_field('get_quote_label', 'option'); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <div class="row">
      <div class="footer-container">
        <div class="col-sm-4">
          <div class="contact-info">
            <p><?php the_field('footer_company_address', 'option'); ?></p>
            <p><?php the_field('footer_phone_number', 'option'); ?></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="social-container">
            <div class="social-icons">
              <a href="<?php the_field('twitter_link', 'option'); ?>" target="_blank" class="twitter-icon" title="TripleInk Twitter">twitter</a>
            </div>
            <div class="social-icons">
              <a href="<?php the_field('linkedin_link', 'option'); ?>" target="_blank" class="linkedin-icon" title="TripleInk LinkedIn">linked in</a>
            </div>
            <div class="social-icons">
              <a href="<?php the_field('facebook_link', 'option'); ?>" target="_blank" class="facebook-icon" title="TripleInk Facebook">facebook</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
            <a class="footerButton" href="<?php echo home_url(); ?>/contact/"><?php the_field('footer_label', 'option'); ?></a>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>
