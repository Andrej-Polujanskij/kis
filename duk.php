<?php
/* Template name: DUK */
get_header(); ?>
<section class="inner-hero duk---inner-hero">
  <div class="container">
    <div class="inner-hero__decor duk---decor"></div>

    <div class="inner-hero__top duk">
      <div class="inner-hero__btn">
        <span class="inner-hero__btn___arrow"></span>
        <span class="inner-hero__btn___arrow inner-hero__btn___arrow---white"></span>
        <a href="<?php echo get_option("siteurl"); ?>">Atgal</a>
      </div>

      <div class="duk-header">
        <div class="duk-header__title">
            <?php the_field('puslapio_antraste'); ?>
        </div>
        <div class="duk-header__note">
          Jei nerandate atsakymo į savo klausimą – <a
              href="<?php echo get_all_pagalba_url(); ?>"><span>susisiekite!</span></a>
        </div>
      </div>

      <div class="duk-content">

        <div class="duk-content__questions">
          <ul class="questions-list">
              <?php
              if (have_rows('duk')):
                  $i = 1;
                  while (have_rows('duk')): the_row();
                      if ($i == 1) {
                          ?>
                        <li data-title="<?php echo $i; ?>"
                            class="active"><?php the_sub_field('duk_klausimo_pavadinimas'); ?></li>
                      <?php } else { ?>
                        <li data-title="<?php echo $i; ?>"
                            class=""><?php the_sub_field('duk_klausimo_pavadinimas'); ?></li>
                          <?php
                      }
                      $i++;
                  endwhile;
              endif;
              ?>
          </ul>
        </div>

        <div class="duk-content__answers">
            <?php
            if (have_rows('duk')):
            $i = 1;
            while (have_rows('duk')):
            the_row();
            if ($i == 1){
            ?>
          <ul class="answers-list active" id="<?php echo $i; ?>">
              <?php }else{ ?>
            <ul class="answers-list" id="<?php echo $i; ?>">
                <?php
                }
                if (have_rows('duk_atasakymai')):
                    while (have_rows('duk_atasakymai')): the_row();
                        ?>
                      <li>
                        <div class="duk-content__title">
                            <?php the_sub_field('atsakymo_antraste'); ?>
                        </div>
                        <div class="duk-content__text">
                            <?php the_sub_field('atasakymo_tekstas_'); ?>
                        </div>
                      </li>
                    <?php
                    endwhile;
                endif;
                ?>
            </ul>
              <?php
              $i++;
              endwhile;
              endif;
              ?>
        </div>

      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>


