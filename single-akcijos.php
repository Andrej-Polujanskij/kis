<?php get_header(); ?>

  <section class="inner-hero">
    <div class="container">
      <div class="inner-hero__decor"></div>

      <div class="inner-hero__top">
        <div class="inner-hero__btn">
          <span class="inner-hero__btn___arrow"></span>
          <span class="inner-hero__btn___arrow inner-hero__btn___arrow---white"></span>
          <a href="<?php echo get_option("siteurl"); ?>">Atgal</a>
        </div>
        <div class="center"><h1><?php the_title(); ?></h1></div>

      </div>
    </div>
  </section>

<?php get_footer(); ?>