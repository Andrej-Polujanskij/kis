<?php
/* Template name: Privatumo politika */
get_header();
?>
  <section class="inner-hero">
    <div class="container">

      <div class="inner-hero__top single---inner">
        <div class="inner-hero__btn single---btn">
          <span class="inner-hero__btn___arrow"></span>
          <span class="inner-hero__btn___arrow inner-hero__btn___arrow---white"></span>
          <a href="<?php echo get_option("siteurl"); ?>">Atgal</a>
        </div>

        <div class="single-content">

          <div class="single-content---top">

            <div class="single__title">
              <h1><?php the_title(); ?></h1>
            </div>
            <div class="single__text">
            </div>


          </div>

          <div class="single-content__bottom">
              <?php the_field('privatumo_politikos_tekstas'); ?>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php get_footer(); ?>