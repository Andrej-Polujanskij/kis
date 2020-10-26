<?php
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
/* Template name: Paslaugu uzklausa */
get_header(); ?>
  <section class="inner-hero contacts-hero servicies---hero">
    <div class="container">
      <div class="inner-hero__decor contacts-hero__decor"></div>

      <div class="inner-hero__top help">
        <div class="inner-hero__btn contacts-hero__btn">
          <span class="inner-hero__btn___arrow"></span>
          <span class="inner-hero__btn___arrow inner-hero__btn___arrow---white"></span>
          <a href="<?php echo get_option("siteurl"); ?>">Atgal</a>
        </div>

        <div class="help-item servicies-item servicies-item---top help-item---content">

          <div class="servicies-item---white">
            <div class="help-item__title">
              <h1><?php the_field('puslapio_antraste'); ?></h1>
            </div>

            <div  class="help-item__title hidden active">
                <div id="" class="offers-single__price servicies---price">
                  <?php echo $_GET['price'] ?> <span>EUR</span>
                  <span class="month">per mėn.</span>
                </div>
            </div>

              <?php if($_GET['category'] == 'only_net'){ ?>
                  <?php
                  if (have_rows('pasiulymai_tik_internetas', 'option')):
                      $i2 = 1;
                      while (have_rows('pasiulymai_tik_internetas', 'option')): the_row();
                          ?>
                    <?php if($i2== 1){ ?>
                       <div id="100" class="help-item__title hidden">
                        <?php }elseif ($i2 == 2){ ?>
                      <div id="300" class="help-item__title hidden">
                        <?php }else{ ?>
                      <div id="600" class="help-item__title hidden">
                    <?php } ?>
                        <div id="show-100" data-plan="100" class="offers-single__price servicies---price">
                            <?php the_sub_field('plano_kaina'); ?> <span>EUR</span>
                          <span class="month">per mėn.</span>
                        </div>
                      </div>
                          <?php
                        $i2++;
                    endwhile;
                endif;
                ?>
              <?php } ?>

                          <?php if($_GET['category'] == 'only_TV'){ ?>
                  <?php
                  if (have_rows('pasiulymai_tik_televizija', 'option')):
                      $i2 = 1;
                      while (have_rows('pasiulymai_tik_televizija', 'option')): the_row();
                          ?>
                    <?php if($i2== 1){ ?>
                       <div id="42" class="help-item__title hidden">
                        <?php }elseif ($i2 == 2){ ?>
                      <div id="91" class="help-item__title hidden">
                        <?php }else{ ?>
                      <div id="97" class="help-item__title hidden">
                    <?php } ?>
                        <div id="show-100" data-plan="100" class="offers-single__price servicies---price">
                            <?php the_sub_field('plano_kaina'); ?> <span>EUR</span>
                          <span class="month">per mėn.</span>
                        </div>
                      </div>
                          <?php
                        $i2++;
                    endwhile;
                endif;
                ?>
              <?php } ?>


              <?php if($_GET['category'] == 'both'){ ?>
                <?php
                if (have_rows('pasiulymai', 'option')):
                    $ii = 1;
                    while (have_rows('pasiulymai', 'option')): the_row();
                        ?>
                    <?php if($ii == 1){ ?>
                        <div id="MINI" class="help-item__title hidden">
                    <?php }elseif ($ii == 2){ ?>
                        <div id="MIDI" class="help-item__title hidden">
                    <?php }else{ ?>
                        <div id="MAXI" class="help-item__title hidden">
                    <?php } ?>

                        <div id="show-100" data-plan="100" class="offers-single__price servicies---price hidden">
                            <?php the_sub_field('plano_kaina_100mb'); ?> <span>EUR</span>
                          <span class="month">per mėn.</span>
                        </div>
                        <div id="show-300" data-plan="300" class="offers-single__price servicies---price hidden">
                            <?php the_sub_field('plano_kaina_300mb'); ?> <span>EUR</span>
                          <span class="month">per mėn.</span>
                        </div>
                        <div id="show-600" data-plan="600" class="offers-single__price servicies---price hidden">
                            <?php the_sub_field('plano_kaina_600mb'); ?> <span>EUR</span>
                          <span class="month">per mėn.</span>
                        </div>
                      </div>
                        <?php
                        $ii++;
                    endwhile;
                endif;
                }
                ?>


              <div class="help-item__sub-title servicies---note">
                  <?php the_field('sutarties_tipas'); ?>
              </div>
            </div>

            <div class="help-form">
              <form method="post" class="servicies-form" id="servicies-form">

                <div class="servicies-form__column help-form__item margin-left">
                  <div class="servicies-form__title margin-left">
                      <?php the_field('formos_plano_antraste'); ?>
                  </div>

                    <?php if ($_GET['category'] == 'both') { ?>
                      <div class="help-form__item help-form__item---full margin-left">
                        <select class="text-input tv__internetas servicies--select" name="tv__internetas">
                          <option class=" optInvisible"
                                  value="<?php echo $_GET['plan'] ?>"><?php echo $_GET['plan'] ?></option>
                          <option class=""  value="MINI">MINI</option>
                          <option class=""  value="MIDI">MIDI</option>
                          <option class=""  value="MAXI">MAXI</option>
                        </select>
                      </div>
                      <div class="help-form__item help-form__item---full margin-left">
                        <select class="text-input net__speed servicies--select" name="tv__interneto__greitis">
                          <option class=" optInvisible"
                                  value="<?php echo $_GET['planID'] ?>"><?php echo $_GET['planID'] ?> mb/s interneto
                            greitis
                          </option>
<!--                          <option class="" title="100" value="100">100 mb/s interneto greitis</option>-->
<!--                          <option class="" title="300" value="300">300 mb/s interneto greitis</option>-->
<!--                          <option class="" title="600" value="600">600 mb/s interneto greitis</option>-->
                        </select>
                      </div>

                    <?php } elseif ($_GET['category'] == 'only_net') { ?>
                      <div class="help-form__item help-form__item---full margin-left">
                        <select class="text-input only_net servicies--select" name="tik__interetas">
                          <option class=" optInvisible"
                                  value="<?php echo $_GET['planID'] ?>"><?php echo $_GET['planID'] ?> mb/s interneto
                            planas
                          </option>
                          <option class="" value="100">100 mb/s interneto planas</option>
                          <option class="" value="300">300 mb/s interneto planas</option>
                          <option class="" value="600">600 mb/s interneto planas</option>
                        </select>
                      </div>

                    <?php } elseif ($_GET['category'] == 'only_TV') { ?>
                      <div class="help-form__item help-form__item---full margin-left">
                        <select class="text-input only_tv servicies--select" name="tik__tv">
                          <option class=" optInvisible"
                                  value="<?php echo $_GET['planID'] ?>"><?php echo $_GET['planID'] ?> TV kanalu planas
                          </option>
                          <option class="" value="42">42 TV kanalu planas</option>
                          <option class="" value="91">91 TV kanalu planas</option>
                          <option class="" value="97">97 TV kanalu planas</option>
                        </select>
                      </div>
                    <?php } ?>
                </div>

                <div class="servicies-form__column help-form__item">
                  <div class="servicies-form__title">
                      <?php the_field('formos_kontaktu_antraste'); ?>
                  </div>
                  <div class="help-form__item help-form__item---full">
                    <input name="Vardas" type="text" class="text-input required" placeholder=" ">
                    <span class="floating-label">Vardas</span>
                  </div>
                  <div class="help-form__item help-form__item---full">
                    <input name="El. paštas" type="text" class="text-input requiredemail" placeholder=" ">
                    <span class="floating-label">El. paštas</span>
                  </div>
                  <div class="help-form__item help-form__item---full">
                    <input type="text" name="Tel. numeris" class="text-input number" placeholder=" ">
                    <span class="floating-label">Telefono numeris</span>
                  </div>
                </div>


                <div class="help-form__item help-form__item---full flex-container margin-0 servicies---help-form__item">
                  <div class="servicies-form__title margin-left">
                      <?php the_field('formos_adreso_antraste'); ?>
                  </div>

                  <div class="help-form__item margin-left">
                    <select class="text-input home-select servicies--select" name="gatve">
                      <option class="optInvisible" value="">Pasirinkite gatvę</option>
                    </select>
                  </div>
                  <div class="help-form__item flex-container  servicies__block---small">
                    <div class="help-form__item margin-0">
                      <select class="text-input street-select servicies--select" name="namas">
                        <option class="optInvisible" value="">Namo nr.</option>
                      </select>
                    </div>
                    <div class="help-form__item margin-0">
                      <input type="text" name="Buto nr." class="flat_number__input text-input " placeholder=" ">
                      <span class="floating-label">Buto nr.</span>
                    </div>
                  </div>

                </div>

                <div class="help-form__item help-form__item---check servicies---check">
                  <label for="news-agree">
                    <span class="checkbox"></span>
                    <input type="checkbox" name="news-agree" id="news-agree" class="">
                    <span class="checkbox-text"> Noriu gauti naujausius pasiūlymus el. paštu.</span>
                  </label>
                </div>
                <div class="help-form__item help-form__item---check">
                  <label for="check">
                    <span class="checkbox"></span>
                    <input type="checkbox" name="p-policy" id="check" class="checkVal">
                    <span class="checkbox-text"> Sutinku su <a href="" target="_blank">Privatumo politika.</a></span>
                  </label>
                </div>
                <div class="help-form__item help-form__item---full">
                  <div class="g-recaptcha" data-sitekey="6Lf3HdYZAAAAAAzGVFVIWDRw1zEgiFAxXwLau3jb"></div>
                </div>

                <div class="help-form__item help-form__item---btn">
                  <input class="submit-input input_submit" type="submit" value="UŽSISAKYKITE DABAR">
                </div>

              </form>
            </div>
          </div>

          <div class="help-item servicies-item help-item---image"
               style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('puslapio_nuotrauka'), 'full'); ?>)"
          ></div>

          <div class="inner-hero__bottom--text servicies-item servicies-item---last servicies---bottom--text">
              <?php the_field('tekstas_sekcijos_pacioje'); ?>

          </div>

        </div>
  </section>

<?php get_footer(); ?>