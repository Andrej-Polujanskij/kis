<?php
/* Template name: Pagalba */
get_header(); ?>
  <section class="inner-hero contacts-hero help---hero">
    <div class="container">
      <div class="inner-hero__decor contacts-hero__decor"></div>

      <div class="inner-hero__top help">
        <div class="inner-hero__btn contacts-hero__btn">
          <span class="inner-hero__btn___arrow"></span>
          <span class="inner-hero__btn___arrow inner-hero__btn___arrow---white"></span>
          <a href="<?php echo get_option("siteurl"); ?>">Atgal</a>
        </div>

        <div class="help-item help-item---content">
          <div class="help-item__title">
            <h1><?php the_field('puslapio_antraste'); ?></h1>
          </div>
          <div class="help-item__sub-title">
              <?php the_field('puslapio_poraste'); ?>
          </div>

          <div class="help-form">
            <form method="post" id="contacts__page-form" action="">
              <div class="help-form__item">
                <input name="Tema" type="text" class="text-input required" placeholder=" ">
                <span class="floating-label">Tema</span>
              </div>
              <div class="help-form__item">
                <input name="Vardas" type="text" class="text-input required" placeholder=" ">
                <span class="floating-label">Vardas</span>
              </div>
              <div class="help-form__item">
                <input name="El. paštas" type="text" class="text-input requiredemail" placeholder=" ">
                <span class="floating-label">El. paštas</span>
              </div>
              <div class="help-form__item">
                <input type="text" name="Tel. numeris" class="text-input number" placeholder=" ">
                <span class="floating-label">Telefono numeris</span>
              </div>
              <div class="help-form__item help-form__item---full">
                <textarea class="text-input mintnine" name="Žinutė" id="" cols="30" rows="10" placeholder=" "></textarea>
                <span class="floating-label">Jūsų žinutė</span>
              </div>
              <div class="help-form__item help-form__item---check">
                <label for="check">
                  <span class="checkbox"></span>
                  <input type="checkbox"  name="p-policy" id="check" class="checkVal">
                  <span class="checkbox-text"> Sutinku su <a href="" target="_blank">Privatumo politika.</a></span>
                </label>
              </div>
              <div class="help-form__item help-form__item---full">
                <div class="g-recaptcha" data-sitekey="6Lf3HdYZAAAAAAzGVFVIWDRw1zEgiFAxXwLau3jb"></div>
              </div>

              <div class="help-form__item help-form__item---btn">
                <input class="submit-input" type="submit" value="SIŲSTI">
              </div>

            </form>
          </div>
        </div>

        <div class="help-item help-item---image"
             style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('puslapio_nuotrauka'), 'full'); ?>)"
        ></div>


      </div>
  </section>

<?php get_footer(); ?>