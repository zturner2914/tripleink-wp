<?php
/*
 * Template Name: Contact Page
 * Description: Contact page template
 */

get_header(); ?>

  <section id="quote-hero">
    <div class="quote-hero-holder" style="background-image:url(<?php the_field('hero_image'); ?>);"> </div>
  </section>

  <section class="content-section">
    <div class="animate-element l1 blue-line "></div>
    <div class="animate-element l2 blue-line "></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-4 intro-quote-container hidden-xs"></div>
        <div class="col-sm-8">
          <div class="content-box">

            <div class="quote-intro-container">
              <p class="intro-header"><?php the_field('visit_heading'); ?></p>
              <p><?php the_field('visit_description', false, false); ?></p>
            </div>
            <a id="letsMeet" class="btn-global servicesBtn focus" href="#"><?php the_field('visit_label'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="quote-form" class="content-section">
    <span class="animate-element l3 black-line"></span>
    <span class="animate-element l4 black-line"></span>
    <span class="animate-element l5 black-line"></span>
    <form enctype="multipart/form-data">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="quote-form-container">
              <p class="intro-header"><?php the_field('quote_heading'); ?></p>
              <p><?php the_field('quote_description', false, false); ?></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7">
            <div class="accordian-holder">
              <div class="accordian-btn-spacer">
                <button class="accordion"><?php the_field('your_information_label'); ?></button>
                <div class="panel">
                  <div class="row">
                    <div class="col-sm-5 form-margin">
                      <input type="text" name="7683128551597956" placeholder="<?php the_field('form_name'); ?>" data-name="fullname" required>
                      <div class="form-error"><?php the_field('name_error'); ?></div>
                    </div>
                    <div class="col-sm-7">
                      <input type="email" name="1641629984548740" placeholder="<?php the_field('form_email'); ?>" data-name="email" required>
                      <div class="form-error"><?php the_field('email_error'); ?></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="text" name="5050631426729860" placeholder="<?php the_field('form_address'); ?>" data-name="company" required>
                      <div class="form-error"><?php the_field('company_error'); ?></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="text" name="3893429798233988" placeholder="<?php the_field('form_phone'); ?>" data-name="phone">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <select id="hear-about" name="8397029425604484" data-name="hear-about">
                        <option></option>
                        <?php if(have_rows('form_hear')): while (have_rows('form_hear')) : the_row();?>
                          <option value="<?php the_sub_field('option'); ?>"><?php the_sub_field('option'); ?></option>
                        <?php endwhile; endif; ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordian-btn-spacer">
                <button class="accordion"><?php the_field('project_details_label'); ?></button>
                <div class="panel">
                  <div class="row">
                    <div class="col-sm-5 form-margin">
                      <input type="text" name="4190667304920964" placeholder="<?php the_field('form_project_name'); ?>" data-name="project-name">
                    </div>
                    <div class="col-sm-7">
                      <input type="text" name="3330479844812676" placeholder="<?php the_field('form_project_count'); ?>" data-name="project-scope">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <select id="services-requested" name="5582279658497924" data-name="services-requested">
                          <option></option>
                          <?php if(have_rows('form_project_services')): while (have_rows('form_project_services')) : the_row();?>
                            <option value="<?php the_sub_field('option'); ?>"><?php the_sub_field('option'); ?></option>
                          <?php endwhile; endif; ?>
                        </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="text" name="7834079472183172" placeholder="<?php the_field('source_languages_heading'); ?>" data-name="source-languages">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <textarea type="text" name="2204579937970052" rows="2" class="form-box" placeholder="<?php the_field('target_languages_heading'); ?>" data-name="target-languages"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <textarea type="text" name="6708179565340548" rows="2" class="form-box" placeholder="<?php the_field('source_formats_heading'); ?>" data-name="source-file-format"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <textarea type="text" name="7147537539852164" rows="2" class="form-box" placeholder="<?php the_field('target_formats_heading'); ?>" data-name="target-deliverables"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 ">
                        <p><?php the_field('start_date_heading'); ?>:</p>
                        <input type="date" name="6021637633009540" data-name="start-date"/>
                    </div>
                    <div class="col-sm-6 ">
                        <p><?php the_field('due_date_heading'); ?>:</p>
                        <input type="date" name="1518038005639044" data-name="due-date"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordian-btn-spacer">
                <button class="accordion"><?php the_field('attachments_label'); ?></button>
                <div class="panel">
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="file" id="attachment" name="attachment" />
                      <?php the_field('multiple_files_text'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <textarea class="form-box" name="8273643605124996" rows="3" placeholder="<?php the_field('notes_placeholder_text'); ?>" data-name="client-notes"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input class="btn-global learnBtn focus" name="submitform" value="<?php the_field('submit_button_text'); ?>" type="submit" disabled />
          </div>
        </div>
      </div>
    </form>
    <div class="thank-you">
      <div class="container">
        <div class="row">
          <div class="col-sm-7">
            <h2><?php the_field('thank_you_text'); ?></h2>
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
          <div class="content-box">
            <div class="intro-container">
              <p class="intro-header"><?php the_field('freelance_heading'); ?></p>
              <p><?php the_field('freelance_description', false, false); ?></p>
            </div>
            <a class="btn-global aboutBtn focus" href="<?php the_field('freelance_url'); ?>" target="_blank"><?php the_field('freelance_label'); ?></a>
          </div>
          </div>
        <div class="col-sm-6 col-sm-pull-6">
          <div class="freelance-holder">
            <img  class="img-responsive" src="<?php the_field('freelance_image'); ?>" alt="Freelance">
          </div>
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
        <div class="col-sm-6">
          <div class="content-box">
            <div class="employ-container">
              <p class="intro-header"><?php the_field('employment_heading'); ?></p>
              <p><?php the_field('employment_description'); ?></p>
            </div>
            <a class="btn-global jobsBtn focus" href="<?php the_field('employment_url'); ?>" target="_blank"><?php the_field('employment_label'); ?></a>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="employ-holder">
            <img class="img-responsive" src="<?php the_field('employment_image'); ?>" align="right" alt="Employment">
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>
