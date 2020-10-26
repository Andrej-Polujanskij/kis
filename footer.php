<footer>
  <div class="footer">
    <div class="footer-left">
      <div class="footer-left__content"
           style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('footer_logo', 'option'), 'slug'); ?>)"
      ></div>
    </div>
    <div class="footer-right">
      <div class="footer-right__content">

        <div class="footer-right__item">
          <div class="footer-right__heading">
              <?php the_field('pirmo_bloko_kontaktu_antraste', 'option'); ?>
          </div>
          <nav>
              <?php wp_nav_menu(array(
                  'container' => '<ul></ul>',
                  'menu_class' => 'meniuitem menu-menu',
                  'theme_location' => 'footer-menu'
              )); ?>
          </nav>
        </div>

        <div class="footer-right__item">
          <div class="footer-right__heading">
              <?php the_field('antro_bloko_kontaktu_antraste', 'option'); ?>
          </div>
            <?php
            $tel = get_field('telefono_kontaktas', 'option');
            if ($tel): ?>
              <div class="footer-contact__item">
                <div class="footer-contact__title">
                    <?php echo $tel['telefono_kontakto_antraste']; ?>
                </div>
                <a href="tel:<?php echo $tel['telefono_kontakto_numeris']; ?>">
                    <?php echo $tel['telefono_kontakto_numeris']; ?>
                </a>
              </div>
            <?php endif; ?>

            <?php
            $tel = get_field('el_pasto_kontaktas', 'option');
            if ($tel): ?>
              <div class="footer-contact__item">
                <div class="footer-contact__title">
                    <?php echo $tel['el_pasto_kontakto_antraste']; ?>
                </div>
                <a href="mailto:<?php echo $tel['el_pastas']; ?>">
                    <?php echo $tel['el_pastas']; ?>
                </a>
              </div>
            <?php endif; ?>

          <?php
          $getOffer = get_field('gauti_pasiulyma_tekstas', 'option');
          if($getOffer){
            ?>
          <div class="footer-contact__title">
            <a href="<?php echo get_all_pagalba_url(); ?>">
              <?php echo $getOffer; ?>
            </a>
          </div>
            <?php } ?>
        </div>

        <div class="footer-right__item">
          <div class="footer-right__heading">
              <?php the_field('trecio_bloko_kontaktu_antraste', 'option'); ?>
          </div>
          <a target="_blank" href="<?php the_field('facebooko_linkas', 'option'); ?>">
            <div class="footer-right__soc-icon">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="footer-bottom__item">
          <?php the_field('copyright_tekstas', 'option'); ?>
      </div>
      <a href="<?php echo get_p_policy_url(); ?>">
        <div class="footer-bottom__item">
            <?php the_field('privatumo_politika_tekstas', 'option'); ?>
        </div>
      </a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>