<?php
/* Template name:  Verslo klientams */
get_header(); ?>
  <section class="inner-hero">
    <div class="container">
      <div class="inner-hero__decor"></div>

      <div class="inner-hero__top">
        <div class="inner-hero__btn">
          <span class="inner-hero__btn___arrow"></span>
          <span class="inner-hero__btn___arrow inner-hero__btn___arrow---white"></span>
          <a href="<?php echo get_option("siteurl"); ?>">Atgal</a>
        </div>

        <div class="inner-hero__text">
          <h2><?php the_field('pirmos_sekcijos_antraste'); ?></h2>
            <?php the_field('pirmos_sekcijos_poraste'); ?>
        </div>
        <div class="inner-hero__image"
             style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('pirmos_sekcijos_nuotrauka'), 'slide'); ?>)"
        ></div>
      </div>

      <div class="inner-hero__bottom">


        <div class="section-image_left">

          <div class="container">
            <div class="section-item section-item---image"
                 style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('antros_sekcijos_nuotrauka'), 'section'); ?>)"
            ></div>

            <div class="section-item section-item-text_right">

              <div class="section-item__title">
                  <?php the_field('antros_sekcijos_antraste'); ?>
              </div>
              <div class="section-item__subtitle">
                  <?php the_field('antros_sekcijos_poraste'); ?>
              </div>
              <div class="slider__text___btn section-item__btn">
                <a href="<?php the_permalink(); ?>">
                  DAUGIAU
                </a>
              </div>

            </div>
          </div>
        </div>


      </div>

    </div>
  </section>

  <section class="business-section">
    <div class="container">
      <div class="business-wrapper">
        <div class="business__image"
             style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('trecios_sekcijos_nuotrauka'), 'slide'); ?>)"
        ></div>

        <div class="business__content">
          <div class="section-item__title">
              <?php the_field('trecios_sekcijos_antraste'); ?>
          </div>
          <div class="section-item__subtitle">
              <?php the_field('trecios_sekcijos_poraste'); ?>
          </div>
          <div class="slider__text___btn business-section---btn">
            <a href="<?php echo get_all_pagalba_url(); ?>">
              DAUGIAU
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>
<?php get_footer(); ?>