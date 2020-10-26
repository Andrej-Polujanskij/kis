<?php
/* Template name: Akcijos */
get_header(); ?>

  <section class="inner-hero">
    <div class="container">
      <div class="inner-hero__decor inner-hero__decor---short"></div>

      <div class="inner-hero__top">
        <div class="inner-hero__btn">
          <span class="inner-hero__btn___arrow"></span>
          <span class="inner-hero__btn___arrow inner-hero__btn___arrow---white"></span>
          <a href="<?php echo get_option("siteurl"); ?>">Atgal</a>
        </div>

        <div class="inner-hero__text">
          <h2><?php the_field('pirmos_sekcijos_antraste'); ?></h2>
          <p><?php the_field('pirmos_sekcijos_poraste'); ?></p>
        </div>
        <div class="inner-hero__image"
             style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('pirmos_sekcijos_nuotrauka'), 'slide'); ?>)"
        ></div>
      </div>

      <div class="inner-hero__bottom">

      </div>

    </div>
  </section>

  <section class="section-wrapper">
      <?php

      $argument = array(
          'post_type' => 'akciju_sarasas',
          'posts_per_page' => 4,
      );
      $query = new WP_Query($argument);

      if ($query->have_posts()) :
      $i = 1;
      while ($query->have_posts()) :
      //
      //            if ($i & 1) {
      //                echo 'odd';
      //            } else {
      //                echo 'even';
      //            }
      $query->the_post();
      ?>

      <?php if ($i & 1){ ?>
    <div class="section section-image_left">
        <?php }else{ ?>
      <div class="section section-gray section-image_right">
          <?php } ?>
        <div class="container">
          <div class="section-item section-item---image"
               style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('akcijos_posto_nuotrauka'), 'section'); ?>)"
          ></div>
            <?php if ($i & 1){ ?>
          <div class="section-item section-item-text_right">
              <?php }else{ ?>
            <div class="section-item section-item-text_left">
                <?php } ?>
              <div class="section-item__title">
                  <?php the_title(); ?>
              </div>
              <div class="section-item__subtitle">
                  <?php the_field('akcijos_posto_trumpas_aprasymas'); ?>
              </div>

              <div class="section-item__list">
                <ul>
                    <?php
                    if (have_rows('nuotrauku_sarasass')):
                        while (have_rows('nuotrauku_sarasass')): the_row();
                            ?>
                          <li>
                            <img
                                src="<?php echo get_correct_image_link_thumb(get_sub_field('kanalo_nuotrauka'), 'small'); ?>"
                                alt="">
                          </li>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
              </div>

              <div class="slider__text___btn section-item__btn">
                <a href="<?php the_permalink(); ?>">
                  DAUGIAU
                </a>
              </div>
            </div>
          </div>
        </div>
          <?php
          $i++;
          endwhile;
          endif;
          wp_reset_query(); ?>
  </section>


<?php get_footer(); ?>