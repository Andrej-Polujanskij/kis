<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta http-equiv="X-UA-Compatible" content="IE=9;IE=10;IE=Edge,chrome=1"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">


  <title>
      <?php if (is_front_page()) {
          echo get_bloginfo('name');
      } else {
          echo get_bloginfo('name') . ' | ';
          wp_title('', true, 'right');
      } ?>
  </title>
  <script src="https://www.google.com/recaptcha/api.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
  <div class="header-row header-row---top">
    <div class="container">
      <div class="top-menu">
        <nav>
            <?php wp_nav_menu(array(
                'container' => '<ul></ul>',
                'menu_class' => 'meniuitem menu-menu',
                'theme_location' => 'top-menu'
            )); ?>
        </nav>

        <div class="fast-contact">
          <div class="fast-contact__icon"></div>
          <div class="fast-contact__number">
            <a href="tel:<?php the_field('virsutinio_meniu_numeris', 'option'); ?>">
                <?php the_field('virsutinio_meniu_numeris', 'option'); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="header-row header-row---main">
    <div class="container">
      <a href="<?php echo get_option("siteurl"); ?>">
        <div class="logo  header-logo"
             style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('header_logo', 'option'), 'logo'); ?>)"
        >
        </div>
      </a>

      <div class="header-main_menu">
        <nav>
            <?php wp_nav_menu(array(
                'container' => '<ul></ul>',
                'menu_class' => 'meniuitem menu-menu',
                'theme_location' => 'main-menu'
            )); ?>
        </nav>
      </div>


      <div class="mobile-menu---block">
        <div class="mobile-menu">
          <div class="mobile-menu__main">
            <nav>
                <?php wp_nav_menu(array(
                    'container' => '<ul></ul>',
                    'menu_class' => 'meniuitem menu-menu',
                    'theme_location' => 'main-menu'
                )); ?>
            </nav>
          </div>
          <div class="mobile-menu__sub">
            <nav>
                <?php wp_nav_menu(array(
                    'container' => '<ul></ul>',
                    'menu_class' => 'meniuitem menu-menu',
                    'theme_location' => 'footer-menu'
                )); ?>
            </nav>
          </div>
          <div class="mobile-menu__soc">
            <a target="_blank" href="<?php the_field('facebooko_linkas', 'option'); ?>">
              <div class="footer-right__soc-icon">
              </div>
          </div>

          <div class="mobile-menu__bottom">
            <a href="">Gaukite KIS pasiūlymą!</a>
          </div>
        </div>
      </div>

      <div class="mobile">
        <div class="mobile-wrapper">
          <a href="tel:<?php the_field('virsutinio_meniu_numeris', 'option'); ?>">
            <div class="mobile_fast-contact">
            </div>
          </a>

          <div class="hamburger">
            <input class="mobile-btn" type="checkbox"/>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>

    </div>
  </div>


</header>

