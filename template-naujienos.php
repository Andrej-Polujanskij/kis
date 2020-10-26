<?php
/* Template name:  Naujienos */
get_header(); ?>
  <section class="inner-hero">
    <div class="container">
      <div class="inner-hero__top news">
        <div class="inner-hero__btn">
          <span class="inner-hero__btn___arrow"></span>
          <span class="inner-hero__btn___arrow inner-hero__btn___arrow---white"></span>
          <a href="<?php echo get_option("siteurl"); ?>">Atgal</a>
        </div>

        <div class="news-title">
          <h1>
            Naujienos
          </h1>
        </div>

        <div class="news-wrapper">
            <?php

            $argument = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
            );
            $query = new WP_Query($argument);

            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    ?>
                  <div class="news-single">
                    <a href="<?php the_permalink(); ?>">
                      <div class="news-single__image"
                           style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('naujienos_posto_nuotrauka'), 'section'); ?>)"
                      ></div>
                    </a>
                    <a href="<?php the_permalink(); ?>">
                      <div class="news-single__title">
                          <?php the_title(); ?>
                      </div>
                    </a>

                    <div class="news-single__text">
                        <?php the_field('naujienos_posto_trumpas_aprasymas'); ?>
                    </div>
                    <div class="slider__text___btn section-item__btn">
                      <a href="<?php the_permalink(); ?>">
                        DAUGIAU
                      </a>
                    </div>
                  </div>
                <?php

                endwhile;
            endif;
            wp_reset_query(); ?>
        </div>

      </div>
    </div>
  </section>
<?php get_footer(); ?>