<?php

// enqueue scripts and styles
function triple_ink_scripts() {
  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
  wp_enqueue_style( 'select2', get_template_directory_uri() . '/css/select2.css' );
  wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/css/stylesheet.css' );
  wp_enqueue_style( 'body-styles', get_template_directory_uri() . '/css/body_styles.css' );
  wp_enqueue_style( 'font', get_template_directory_uri() . '/css/font.css' );
  wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto' );
  wp_register_script( 'modernizer', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', array('jquery'), '2.8.3', true );
  wp_enqueue_script( 'modernizer' );
  wp_enqueue_script( 'select2', get_template_directory_uri() . '/js/select2.min.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'select2' );
  wp_enqueue_script( 'header', get_template_directory_uri() . '/js/header.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'header' );
  wp_localize_script( 'header', 'theme', array('templateDir' => get_bloginfo('template_url')));
}

add_action( 'wp_enqueue_scripts', 'triple_ink_scripts' );

// register menu
function register_header_nav() {
  register_nav_menu('nav-menu',__( 'Nav Menu' ));
}
add_action( 'init', 'register_header_nav' );

// case study custom post type
function case_study_posttype() {
  register_post_type( 'case-study',
    array(
      'labels' => array(
        'name' => __( 'Case Studies' ),
        'singular_name' => __( 'Case Study' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'case-study'),
      'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
      'menu_position' => 5,
      'menu_icon' => 'dashicons-format-aside',
      'taxonomies' => array('category')
    )
  );
}

add_action( 'init', 'case_study_posttype' );

// team custom post type
function team_member_posttype() {
  register_post_type( 'team-member',
    array(
      'labels' => array(
        'name' => __( 'Team Members' ),
        'singular_name' => __( 'Team Member' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'team-member'),
      'supports' => array('title', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'page-attributes', 'custom-fields'),
      'menu_position' => 5,
      'menu_icon' => 'dashicons-universal-access',
      'taxonomies' => array('category')
    )
  );
}

add_action( 'init', 'team_member_posttype' );

// WPML language switcher
// function language_selector_flags(){
//     $languages = icl_get_languages('skip_missing=0&orderby=code');
//     if(!empty($languages)){
//         foreach($languages as $l){
//             if(!$l['active']) echo '<a href="'.$l['url'].'">';
//             echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
//             if(!$l['active']) echo '</a>';
//         }
//     }
// }

// footer contact form
function mail_content_type() {
    return 'text/html';
}
add_filter( 'wp_mail_content_type', 'mail_content_type' );

add_action('wp', 'submit_form'); function submit_form() {
	if($_POST && isset($_POST['submitform'])) {

    // get the info from the from the form
    $name = trim($_POST['fullname']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $note = trim($_POST['note']);
    $poster = (isset($_POST['free-poster-checkbox'])) ? 'Yes' : 'No';
    $currenturl = trim($_POST['currenturl']);

    // do all my required fields have a value?
    if ( $name == '' AND $email == '' AND $address == '' ) {
      $error = $currenturl.'?status=error-empty';
      wp_redirect($error); exit;
    }

    //validate the email addess
    if ( !is_email( $email )) {
      $error = $currenturl.'?status=error-email';
      wp_redirect($error); exit;
    }

    // build the message
    $message  = "<h3>Personal Information</h3>";
    $message .= "<strong>Name:</strong> " . stripslashes($name) ."<br/>";
    $message .= "<strong>Company/Address:</strong> " . stripslashes($address) ."<br/>";
    $message .= "<strong>Email:</strong> " . $email ."<br/>";
    $message .= "<strong>Note:</strong> " . stripslashes($note) ."<br/>";
    $message .= "<strong>Free Poster:</strong> " . $poster . "<br/>";

    // set form headers
    $headers = 'From: TripleInk <info@tripleink.com>';
    $subject = 'Contact Form Submission';
    $send_to = get_field('footer_contact_e-mail','option');

    if (wp_mail($send_to, $subject, $message, $headers)) {
      wp_redirect( $currenturl.'?status=success' ); exit;
    }
	}
}

// add ACF options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// enable thumbnails
add_theme_support('post-thumbnails');

// exclude categories from meta
function exclude_these_categories($thelist, $separator=' ') {
  $exclude = array('Uncategorized', 'About Featured', 'Featured');
  $cats = explode($separator, $thelist);
  $newlist = array();
  foreach($cats as $cat) {
      $catname = trim(strip_tags($cat));
      if(!in_array($catname, $exclude))
          $newlist[] = $cat;
  }
  return implode($separator, $newlist);

}
//add_filter('the_category','exclude_these_categories', 10, 2);

// replace the excerpt "Read More" text by a link
function new_excerpt_more($more) {
  global $post;
  return '<br/><a class="moretag" href="'. get_permalink($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// exclude categories from news category listing
add_filter('get_the_categories', 'exc_cat');

function exc_cat($cats) {
  if(!is_admin()){
    $exc = array('About Featured', 'Featured Global Talent', 'Uncategorized', 'Featured', 'Our Work');
    foreach ($cats as $i=>$cat){
      if(in_array($cat->name, $exc)){
        unset($cats[$i]);
      }
    }
  }
  return $cats;
}

// disable admin bar
show_admin_bar(false);

?>
