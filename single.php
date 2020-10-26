<?php get_header();
$kindOfPost = $post->post_type;

$date = ( new \DateTime($post->post_date))->format("Y.m.d");
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
            <?php if($kindOfPost == 'post'){ ?>
            <div class="section-item---image single---image"
                 style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('naujienos_posto_nuotrauka'), 'section'); ?>)"
            >
              <?php }else{ ?>
              <div class="section-item---image single---image"
                   style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('akcijos_posto_nuotrauka'), 'section'); ?>)"
              >
              <?php } ?>
              <div class="single-date">
                <?php echo $date; ?>
              </div>
            </div>
            <div class="single__title">
              <h1><?php the_title(); ?></h1>
            </div>
            <div class="single__text">
                <?php the_field('akcijos_posto_trumpas_aprasymas'); ?>
                <?php the_field('naujienos_posto_trumpas_aprasymas'); ?>
            </div>


          </div>

          <div class="single-content__bottom">
              <?php the_field('akcijos_posto_pagrindinis_aprasymas'); ?>
              <?php the_field('naujienos_posto_pagrindinis_aprasymas'); ?>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php get_footer(); ?>