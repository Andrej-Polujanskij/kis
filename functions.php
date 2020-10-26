<?php
// enquee scripts and styles
include('includes/scripts.php');
include('includes/disable_comments.php');

// create post types and taxonomies if needed
include('includes/post_types.php');

// add post thumbnails with sizes
add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
  add_image_size('thumbas', 500, 500, false);
  add_image_size('slide', 1000, 650, false);
  add_image_size('logo', 250, 100, false);
  add_image_size('slug', 400, 200, false);
  add_image_size('section', 700, 550, false);
  add_image_size('small', 100, 100, false);
}

// custom function for returning excerpt from post
function excerpt($limit)
{
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt) >= $limit) {
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt) . '...';
  } else {
    $excerpt = implode(" ", $excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
  return $excerpt;
}

// get image url from attachment id
function get_correct_image_link_thumb($thumb_id = '', $size = 'large')
{

  if ($thumb_id != '') {
    $imagepermalink = wp_get_attachment_image_src($thumb_id, $size, true);
  } else {
    $imagepermalink[0] = get_stylesheet_directory_uri() . '/images/cover.jpg';
  }
  return $imagepermalink[0];
}

// disable admin bar if needed
show_admin_bar(false);
// get url by page template

function get_all_pagalba_url(){
    $page_var = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-pagalba.php'
    ));
    return get_permalink($page_var[0]->ID);
}
function get_order_url(){
    $page_var = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-paslaugu_uzklausa.php'
    ));
    return get_permalink($page_var[0]->ID);
}
function get_p_policy_url(){
    $page_var = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-policy.php'
    ));
    return get_permalink($page_var[0]->ID);
}

// Create ACF options page
if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page('Options');
}

// Create wordpress menu locations
function register_theme_menus()
{
  register_nav_menus(array(
    'main-menu' => __('Main menu'),
    'top-menu' => __('Top menu'),
    'footer-menu' => __('Footer menu')
  ));
}

add_action('init', 'register_theme_menus');

// AJAX function
add_action('wp_ajax_send_contact_form_message',        'send_contact_form_message');
add_action('wp_ajax_nopriv_send_contact_form_message', 'send_contact_form_message');
function send_contact_form_message(){
    $to = get_option('admin_email');
//     print_r($_POST);

    $message ='
        Tema: '.$_POST['Tema'].' <br />
        Vardas: '.$_POST['Vardas'].' <br />
        El__paštas: '.$_POST['El__paštas'].' <br />
        Žinutė: '.$_POST['Žinutė'].' <br />
    ';

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From:  '.$_POST['El__paštas'].'',
        'Reply-To: <'.$_POST['El__paštas'].'>'
    );

    $subject = 'Kis kontaktu žinutė';

    wp_mail($to, $subject, $message, $headers);

    die();
}
add_action('wp_ajax_servicies_form_message',        'servicies_form_message');
add_action('wp_ajax_nopriv_servicies_form_message', 'servicies_form_message');
function servicies_form_message(){
    $to = get_option('admin_email');
//     print_r($_POST);

    $message ='
      Paslaugos užsakymas:
        Planas: '.$_POST['tv__internetas'].' <br />
        Interneto greitis: '.$_POST['tv__interneto__greitis'].' <br />
      
      Kontaktai:  
        Vardas: '.$_POST['Vardas'].' <br />
        El. paštas: '.$_POST['El__paštas'].' <br />
        Telefono numeris: '.$_POST['Tel__numeris'].' <br />
        
      Adresas:  
        Gatvė: '.$_POST['gatve'].' <br />
        Namas: '.$_POST['namas'].' <br />
        Butas: '.$_POST['Buto_nr_'].' <br />  
        
    ';

    if($_POST['news-agree'] == 'on'){
        $sub_message = 'Noriu gauti naujausius pasiūlymus el. paštu.';
    }

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From:  '.$_POST['El__paštas'].'',
        'Reply-To: <'.$_POST['El__paštas'].'>'
    );

    $subject = 'Paslaugų užklausos žinutė';

    wp_mail($to, $subject, $message, $headers, $sub_message);

    die();
}


if(isset($_POST['g-recaptcha-response'])) {
    // RECAPTCHA SETTINGS
    $captcha = $_POST['g-recaptcha-response'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $key = '6Lf3HdYZAAAAAFwY_Ga4pp_STMb6xvXUOPAi3PHz';
    $url = 'https://www.google.com/recaptcha/api/siteverify';

    // RECAPTCH RESPONSE
    $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
    $data = json_decode($recaptcha_response);

    if(isset($data->success) &&  $data->success === true) {
    }
    else {
        die('Your account has been logged as a spammer, you cannot continue!');
    }
}

