<?php
/* Template name: Internetas + TV */

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
          <p><?php the_field('pirmos_sekcijos_poraste'); ?></p>
        </div>
        <div class="inner-hero__image"
             style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('pirmos_sekcijos_nuotrauka'), 'slide'); ?>)"
        ></div>
      </div>

      <div class="inner-hero__bottom">
        <div class="offers-container---wrapper current" id="1">
          <div class="offers-container">
              <?php
              if (have_rows('pasiulymai', 'option')):
                  $ii = 1;
                  while (have_rows('pasiulymai', 'option')): the_row();
                      ?>
                    <div class="offers-single">
                      <div class="offers-single__title">
                          <?php the_sub_field('pasiulymo_pavadinimas'); ?>
                          <?php if (get_sub_field('akcija_')) { ?>
                            <div class="offers-single__discount">
                              <div class="icon-star icon-star---margin"></div>
                              akcija
                            </div>
                          <?php } ?>
                      </div>
                      <div class="offers-single__content">
                        <div class="offers-single__heading">
                          <div class="offers-single__heading___item offers-single__heading___item---mix">
                              <?php the_sub_field('kanalu_skaicius_eilute'); ?>
                          </div>
                          <div class="offers-single__heading___item">
                              <?php the_sub_field('hd_kanalu_skaicius_eilute'); ?>
                          </div>
                        </div>
                        <div class="offers-single__plans any__prices">
                          <div class="offers-single__plans___heading">
                              <?php the_sub_field('plano_apibudinimo_antraste'); ?>
                          </div>
                          <ul>
                              <?php if ($ii == 2) { ?>
                                <li data-price="1"><?php the_sub_field('planas_iki_100mb_eilute'); ?></li>
                                <li data-price="2" class="active"><?php the_sub_field('planas_iki_300mb_eilute'); ?></li>
                                <li data-price="3"><?php the_sub_field('planas_iki_600mb_eilute'); ?></li>
                              <?php } else { ?>
                                <li data-price="1" class="active"><?php the_sub_field('planas_iki_100mb_eilute'); ?></li>
                                <li data-price="2"><?php the_sub_field('planas_iki_300mb_eilute'); ?></li>
                                <li data-price="3"><?php the_sub_field('planas_iki_600mb_eilute'); ?></li>
                              <?php } ?>
                          </ul>
                          <div class="offers-single__plans___subtext">
                              <?php the_sub_field('plano_apibudinimo_poraste'); ?>
                          </div>
                        </div>
                          <?php if ($ii == 2) { ?>
                            <div id="show-1" data-plan="100" data-money="<?php the_sub_field('plano_kaina_100mb'); ?>"
                                 class="offers-single__price">
                                <?php the_sub_field('plano_kaina_100mb'); ?> <span>EUR</span>
                              <span class="month">per mėn.</span>
                            </div>
                            <div id="show-2" data-plan="300" data-money="<?php the_sub_field('plano_kaina_300mb'); ?>"
                                 class="offers-single__price active">
                                <?php the_sub_field('plano_kaina_300mb'); ?> <span>EUR</span>
                              <span class="month">per mėn.</span>
                            </div>
                            <div id="show-3" data-plan="600" data-money="<?php the_sub_field('plano_kaina_600mb'); ?>"
                                 class="offers-single__price">
                                <?php the_sub_field('plano_kaina_600mb'); ?> <span>EUR</span>
                              <span class="month">per mėn.</span>
                            </div>
                          <?php } else { ?>
                            <div id="show-1" data-plan="100" data-money="<?php the_sub_field('plano_kaina_100mb'); ?>"
                                 class="offers-single__price active">
                                <?php the_sub_field('plano_kaina_100mb'); ?> <span>EUR</span>
                              <span class="month">per mėn.</span>
                            </div>
                            <div id="show-2" data-plan="300" data-money="<?php the_sub_field('plano_kaina_300mb'); ?>"
                                 class="offers-single__price ">
                                <?php the_sub_field('plano_kaina_300mb'); ?> <span>EUR</span>
                              <span class="month">per mėn.</span>
                            </div>
                            <div id="show-3" data-plan="600" data-money="<?php the_sub_field('plano_kaina_600mb'); ?>"
                                 class="offers-single__price">
                                <?php the_sub_field('plano_kaina_600mb'); ?> <span>EUR</span>
                              <span class="month">per mėn.</span>
                            </div>
                          <?php } ?>
                        <div class="offers-single__note">
                            <?php the_sub_field('kokia_sutartis_eilute'); ?>
                        </div>
                        <div class="offers-single__btn">

                          <a class="plan-btn"
                             href="<?php echo get_order_url() . '?category=both&plan=' . get_sub_field('pasiulymo_pavadinimas'); ?>">
                              <?php the_sub_field('migtuko_tekstas'); ?>
                          </a>
                        </div>
                      </div>
                    </div>
                      <?php
                      $ii++;
                  endwhile;
              endif;
              ?>

          </div>
        </div>
      </div>

      <div class="inner-hero__bottom--text">
          <?php the_field('pirmos_sekcijos_tekstas_apacioje'); ?>
      </div>

    </div>
  </section>


  <section class="section-wrapper">
      <?php
      $product_ID =  get_queried_object()->post_title;
      //      var_dump($product_ID);
      $termID = get_term_by('name', $product_ID, 'categories');
      $argument = array(
          'post_type' => 'akciju_sarasas',
          'posts_per_page' => 2,
          'tax_query' => array(
              array(
                  'taxonomy' => 'categories',
                  'field' => 'term_id',
                  'terms' => $termID->term_id

              )
          )
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

      <?php if($i & 1){ ?>
    <div class="section section-image_left">
        <?php }else{?>
      <div class="section section-gray section-image_right">
          <?php }?>
        <div class="container">
          <div class="section-item section-item---image"
               style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('akcijos_posto_nuotrauka'), 'section'); ?>)"
          ></div>
            <?php if($i & 1){ ?>
          <div class="section-item section-item-text_right">
              <?php }else{?>
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