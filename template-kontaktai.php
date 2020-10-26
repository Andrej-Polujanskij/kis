<?php
/* Template name: Kontaktai */
get_header(); ?>

  <section class="inner-hero contacts-hero">
    <div class="container">
      <div class="inner-hero__decor contacts-hero__decor"></div>

      <div class="inner-hero__top contacts">
        <div class="inner-hero__btn contacts-hero__btn">
          <span class="inner-hero__btn___arrow"></span>
          <span class="inner-hero__btn___arrow inner-hero__btn___arrow---white"></span>
          <a href="<?php echo get_option("siteurl"); ?>">Atgal</a>
        </div>

        <div class="contacts_column contacts_column---text">
          <?php the_field('kontaktu_puslapis_tekstas'); ?>
        </div>
        <div class="contacts_column contacts_column---contacts">
          <div class="contacts_column__heading">
            <?php the_field('kontaktu_bloko_antraske'); ?>
          </div>
          <?php $tel = get_field('telefono_kontaktas');
            if ($tel): ?>
          <div class="contacts-item">
            <div class="contacts-item__icon"
                 style="background-image: url(<?php echo get_correct_image_link_thumb($tel['ikona'], 'small'); ?>)"
            ></div>

            <div class="contacts-item__text">
              <div class="contacts-item__text___title">
                <?php echo $tel['antraste'] ?>
              </div>
              <div class="contacts-item__text___content">
                <a href="tel:<?php echo $tel['turinys'] ?>">
                    <?php echo $tel['turinys'] ?>
                </a>
              </div>
            </div>
          </div>
            <?php endif; ?>

            <?php $mail = get_field('el_pasto_kontaktas');
            if ($mail): ?>
          <div class="contacts-item">
            <div class="contacts-item__icon"
                 style="background-image: url(<?php echo get_correct_image_link_thumb($mail['ikona'], 'small'); ?>)"
            ></div>

            <div class="contacts-item__text">
              <div class="contacts-item__text___title">
                <?php echo $mail['antraste'] ?>
              </div>
              <div class="contacts-item__text___content">
                <a href="mailto:<?php echo $mail['turinys'] ?>">
                    <?php echo $mail['turinys'] ?>
                </a>
              </div>
            </div>
          </div>
            <?php endif; ?>

            <?php $clock = get_field('darbo_laiko_kontaktas');
            if ($clock): ?>
          <div class="contacts-item">
            <div class="contacts-item__icon"
                 style="background-image: url(<?php echo get_correct_image_link_thumb($clock['ikona'], 'small'); ?>)"
            ></div>

            <div class="contacts-item__text">
              <div class="contacts-item__text___title">
                <?php echo $clock['antraste'] ?>
              </div>
              <div class="contacts-item__text___content">
                  <?php echo $clock['turinys'] ?>
              </div>
            </div>
          </div>
            <?php endif; ?>

            <?php $requisite = get_field('rekvizitu_kontaktas');
            if ($requisite): ?>
          <div class="contacts-item">
            <div class="contacts-item__icon"
                 style="background-image: url(<?php echo get_correct_image_link_thumb($requisite['ikona'], 'small'); ?>)"
            ></div>

            <div class="contacts-item__text">
              <div class=" contacts-item__text___content">
                <?php echo $requisite['antraste'] ?>
              </div>
              <div class="contacts-item__text___title">
                    <?php echo $requisite['turinys'] ?>
              </div>
            </div>
          </div>
            <?php endif; ?>

        </div>
        <div class="contacts_column contacts_column---form">
          <div class="contacts_column__heading">
              <?php the_field('formos_antraste'); ?>
          </div>

          <form method="post" id="contacts__page-form" action="">

            <div class="form__item">
              <input name="Tema" type="text" class="text-input required" placeholder=" ">
              <span class="floating-label">Tema</span>
            </div>
            <div class="form__item">
              <input name="Vardas" class="text-input required" type="text" placeholder=" ">
              <span class="floating-label">Vardas</span>
            </div>
            <div class="form__item">
              <input name="El. paštas" type="text" class="text-input requiredemail" placeholder=" ">
              <span class="floating-label">El. paštas</span>
            </div>
            <div class="form__item">
              <textarea class="text-input mintnine" name="Žinutė" id="" cols="30" rows="3" placeholder=" "></textarea>
              <span class="floating-label">Jūsų žinutė</span>
            </div>

            <div class="g-recaptcha" data-sitekey="6Lf3HdYZAAAAAAzGVFVIWDRw1zEgiFAxXwLau3jb"></div>

            <div class="help-form__item help-form__item---btn">
              <input class="submit-input" type="submit" value="SIŲSTI">
            </div>
          </form>

        </div>



    </div>
  </section>

<?php get_footer(); ?>