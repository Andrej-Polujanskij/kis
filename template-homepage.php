<?php
//
//$file = getcwd() . "\wp-content\\themes\kis\adresai1236.txt";
//
//$myfile = fopen($file, "r") or die("Unable to open file!");
//
//while (!feof($myfile)) {
//    $line = str_replace(PHP_EOL, '', fgets($myfile));
//    $arr = explode(',',$line);
////    $wpdb->insert('wp_addresses', array(
////        'address' => $arr[0],
////        'street_number' => $arr[1],
////    ));
//}
//die(var_dump($arr));
//fclose($myfile);


$allAddresses = $wpdb->get_results( "SELECT * FROM wp_addresses");
$addresses = [];

foreach($allAddresses as $value)
{
    if(!array_key_exists($value->address, $addresses)){
        $addresses[$value->address]=[];
    }
    $addresses[$value->address][]=$value->street_number;
}
?>
  <script>
      var allAddresses = <?php echo json_encode($addresses); ?>
  </script>


<?php
/* Template name: Homepage */
get_header(); ?>
  <section class="hero">
    <div class="hero-bg">
      <div class="hero-bg---left"></div>
      <div class="hero-bg---right"></div>
    </div>

    <div class="container">
      <div class="hero__content">

        <div class="slider__arrow slider__arrow---right"></div>
        <div class="slider__arrow slider__arrow---left"></div>

        <div class="slider slider__text">

            <?php
            if (have_rows('pormos_sekcijos_karusele')):
                while (have_rows('pormos_sekcijos_karusele')): the_row();
                    ?>
                  <div class="slider__text___item">
                    <div class="slider__text___decor"></div>
                    <div class="slider__text___title">
                        <?php the_sub_field('karuseles_antraste'); ?>
                    </div>
                    <div class="slider__text___subtitle">
                        <?php the_sub_field('karuseles_poraste'); ?>
                    </div>
                    <div class="slider__text___btn">
                      <a href="<?php the_sub_field('karuseles_migtuko_nuoroda'); ?>">
                          <?php the_sub_field('karuseles_migtuko_tekstas'); ?>
                      </a>
                    </div>
                  </div>
                <?php
                endwhile;
            endif;
            ?>

        </div>

        <div class="slider slider__image">
            <?php
            if (have_rows('pormos_sekcijos_karusele')):
                while (have_rows('pormos_sekcijos_karusele')): the_row();
                    ?>
                  <div class="slider__image___item"
                       style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('karuseles_nuotrauka'), 'slide'); ?>)"
                  >
                  </div>
                <?php
                endwhile;
            endif;
            ?>

        </div>

      </div>
    </div>

  </section>

  <section class="offers">
    <div class="container">
      <div class="white-decor white-decor---offers"></div>
      <div class="offers-title">
        <ul class="offers-list">
            <?php
            if (have_rows('pasiulymu_antraste')):
                $i = 1;
                while (have_rows('pasiulymu_antraste')): the_row();
                    if ($i == 1) {
                        ?>
                      <li class="current" data-title="<?php echo $i; ?>"><?php the_sub_field('pasiulymas'); ?></li>
                    <?php } else { ?>
                      <li class="" data-title="<?php echo $i; ?>"><?php the_sub_field('pasiulymas'); ?></li>
                    <?php } ?>
                    <?php
                    $i++;
                endwhile;
            endif;
            ?>
        </ul>
      </div>
      <div class="offers-subtitle">
          <?php the_field('pasiulymu_poraste'); ?>
      </div>

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

      <div class="offers-container---wrapper" id="2">
        <div class="offers-container">

            <?php
            if (have_rows('pasiulymai_tik_internetas', 'option')):
            $i2 = 1;
            while (have_rows('pasiulymai_tik_internetas', 'option')):
            the_row();
            ?>
          <div class="offers-single">
            <div class="offers-single__title offers-single__title---small">
                <?php the_sub_field('pasiulymo_pavadinimas'); ?>
            </div>
            <div class="offers-single__content">

              <div class="offers-single__plans">
                <div class="offers-single__plans___heading">
                    <?php the_sub_field('plano_apibudinimo_antraste'); ?>
                </div>
                <ul>
                  <li><?php the_sub_field('planas_apibudinimo_eilute'); ?></li>
                </ul>
                <div class="offers-single__plans___subtext">
                    <?php the_sub_field('plano_apibudinimo_poraste'); ?>
                </div>
              </div>
                <?php if ($i2 == 1){ ?>
              <div data-plan="100" data-money="<?php the_sub_field('plano_kaina'); ?>"
                   class="offers-single__price active">
                  <?php }elseif ($i2 == 2){ ?>
                <div data-plan="300" data-money="<?php the_sub_field('plano_kaina'); ?>"
                     class="offers-single__price active">
                    <?php }else{ ?>
                  <div data-plan="600" data-money="<?php the_sub_field('plano_kaina'); ?>"
                       class="offers-single__price active">
                      <?php } ?>
                      <?php the_sub_field('plano_kaina'); ?> <span>EUR</span>
                    <span class="month">per mėn.</span>
                  </div>
                  <div class="offers-single__note">
                      <?php the_sub_field('kokia_sutartis_eilute'); ?>
                  </div>
                  <div class="offers-single__btn">
                    <a class="plan-btn" href="<?php echo get_order_url() . '?category=only_net&' ?>">
                        <?php the_sub_field('migtuko_tekstas'); ?>
                    </a>
                  </div>
                </div>
              </div>
                <?php
                $i2++;
                endwhile;
                endif;
                ?>

            </div>
          </div>

          <div class="offers-container---wrapper" id="3">
            <div class="offers-container">

                <?php
                if (have_rows('pasiulymai_tik_televizija', 'option')):
                $i3 = 1;
                while (have_rows('pasiulymai_tik_televizija', 'option')):
                the_row();
                ?>
              <div class="offers-single">
                <div class="offers-single__title offers-single__title---small">
                    <?php the_sub_field('pasiulymo_pavadinimas'); ?>
                </div>
                <div class="offers-single__content">

                  <div class="offers-single__plans">
                    <div class="offers-single__plans___heading">
                        <?php the_sub_field('plano_apibudinimo_antraste'); ?>
                    </div>
                    <ul>
                      <li><?php the_sub_field('planas_apibudinimo_eilute'); ?></li>
                    </ul>
                    <div class="offers-single__plans___subtext">
                        <?php the_sub_field('plano_apibudinimo_poraste'); ?>
                    </div>
                  </div>

                    <?php if ($i3 == 1){ ?>
                  <div data-plan="42" data-money="<?php the_sub_field('plano_kaina'); ?>"
                       class="offers-single__price active">
                      <?php }elseif ($i3 == 2){ ?>
                    <div data-plan="91" data-money="<?php the_sub_field('plano_kaina'); ?>"
                         class="offers-single__price active">
                        <?php }else{ ?>
                      <div data-plan="97" data-money="<?php the_sub_field('plano_kaina'); ?>"
                           class="offers-single__price active">
                          <?php } ?>
                          <?php the_sub_field('plano_kaina'); ?> <span>EUR</span>

                        <span class="month">per mėn.</span>
                      </div>

                      <div class="offers-single__note">
                          <?php the_sub_field('kokia_sutartis_eilute'); ?>
                      </div>
                      <div class="offers-single__btn">
                        <a class="plan-btn" href="<?php echo get_order_url() . '?category=only_TV' ?>">
                            <?php the_sub_field('migtuko_tekstas'); ?>
                        </a>
                      </div>
                    </div>
                  </div>
                    <?php
                    $i3++;
                    endwhile;
                    endif;
                    ?>

                </div>
              </div>

            </div>
  </section>

  <section class="checker">
    <div class="checker-bg">
      <div class="checker-bg---left"></div>
      <div class="checker-bg---right"></div>
    </div>

    <div class="container">
      <div class="checker__content">
        <div class="checker__item checker__item---image"
             style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('trecios_sekcijos_nuotrauka'), 'slide'); ?>)"
        >
        </div>
        <div class="checker__item checker__item---text">
          <div class="checker__title">
            <h2><?php the_field('trecios_sekcijos_antraste'); ?></h2>
          </div>
          <div class="checker__subtitle">
              <?php the_field('trecios_sekcijos_poraste'); ?>
          </div>
          <div class="">
            <form id="checker__form" class="checker__form" action="">
              <select class="checker__input home-select checker__input---50" type="text">
                <option class="optInvisible" value="">Pasirinkite gatvę</option>
              </select>
              <select class="checker__input street-select checker__input---25" type="text">
                <option class="optInvisible" value="">Namo nr.</option>
              </select>
              <input class="checker__input checker__input---btn checker__input---25" type="submit" value="TIKRINTI">
            </form>
          </div>
          <div class="checker__message">
            <div class="checker__message___good">
                <?php the_field('taikiame_paslaugas_tekstas'); ?>
            </div>
<!--            <div class="checker__message___bad">-->
<!--                --><?php //the_field('netaikiame_paslaugas_tekstas'); ?>
<!--            </div>-->
          </div>

        </div>
      </div>
    </div>

  </section>


<?php get_footer(); ?>