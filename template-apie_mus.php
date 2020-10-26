<?php
/* Template name: Apie mus */

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
        <!--          <div class="section section-gray section-image_right">-->

        <div class="container">
          <div class="section-item section-item---image"
               style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('antros_sekcijos_nuotrauka'), 'section'); ?>)"
          ></div>

          <div class="section-item section-item-text_right">
            <!--                <div class="section-item section-item-text_left">-->

            <div class="section-item__title">
                <?php the_field('antros_sekcijos_antraste'); ?>
            </div>
            <div class="section-item__subtitle">
                <?php the_field('antros_sekcijos_poraste'); ?>
            </div>

          </div>
        </div>
      </div>


    </div>

  </div>
</section>

<section>
  <div class="container">
    <!--    <div class="section section-image_left">-->
    <div class="section section-image_right">

      <div class="container">
        <div class="section-item section-item---image"
             style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('trecios_sekcijos_nuotrauka'), 'section'); ?>)"
        ></div>

        <!--        <div class="section-item section-item-text_right">-->
        <div class="section-item section-item-text_left">

          <div class="section-item__title">
              <?php the_field('trecios_sekcijos_antraste'); ?>
          </div>
          <div class="section-item__subtitle">
              <?php the_field('trecios_sekcijos_poraste'); ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="why">
  <div class="container">
    <div class="why-title">
        <?php the_field('ketvirtos_sekcijos_antraste'); ?>
    </div>

    <div class="why-content">
        <?php
        if (have_rows('kodel_mes_sarasas')):
            ?>
          <ul>
              <?php
              while (have_rows('kodel_mes_sarasas')): the_row();
                  ?>

                <li>
                  <div class="why-content__icon"
                       style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('ikona'), 'small'); ?>)"
                  ></div>
                  <div class="why-content__text">
                      <?php the_sub_field('tekstas'); ?>
                  </div>
                </li>

              <?php
              endwhile;
              ?>
          </ul>
        <?php
        endif;
        ?>
    </div>

  </div>
</section>

<section class="section-gray why---gray">
  <div class="container">
    <div class=" section-image_left">

      <div class="container">
        <div class="section-item section-item---image why---image"
             style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('penktos_sekcijos_nuotrauka'), 'section'); ?>)"
        ></div>

        <div class="section-item section-item-text_right">

          <div class="section-item__title">
              <?php the_field('penktos_sekcijos_antraste'); ?>
          </div>
          <div class="section-item__subtitle">
              <?php the_field('antros_sekcijos_poraste'); ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
