<div class="search-block">
  <div class="search-bg">
    <div class="row">
      <div class="block-padding">
        <div class="columns small-12">
          <div class="support-partials hide">
            <li class="hide all_results ui-menu-item" data-role="all_results">
              <?php print t('See all search results'); ?>
            </li>
            <div class="hide" data-role="all-guides-text">
              <?php print t('All audio guides'); ?>
            </div>
          </div>
          <div class="search-form idle" data-role="search-form">
<!--            <form accept-charset="UTF-8" action="/en/search" data-role="search_form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" value="✓" type="hidden"><input name="authenticity_token" value="M82PV90XaStQWPKUc9l1Jg6vfvhSz7BZIopErLilM+0=" type="hidden"></div>-->
<!--              <div class="search-form-input">-->
<!--                <input data-lang="any" data-locale="en" data-query="null" data-role="search_ac" id="q" name="q" placeholder="Search our audio guide collection (enter location or keyword)" type="text"><input name="commit" value="" type="submit">-->
<!--              </div></form>-->
            <?php print render($search_form); ?>
          </div>
          <div class="browse-container">
            <?php if (empty($search_string)) : ?>
              <div class="search-choose-location tac">
                <?php print t('or choose location below') ?>
              </div>
            <?php else : ?>
              <div class="search-filters clearfix" data-role="search-filters">
                <div class="pull-left">
                  <div class="show_filters ml20" data-role="show_filters" data-text-toggle="<?php print t('Show filters') ?>">
                    <?php print t('Choose location') ?>
                  </div>
                </div>
                <div class="choose-location-descr" data-role="choose-location-descr">
                  <?php print t('or choose location below') ?>
                </div>
                <div class="pull-right mr20 base-filters">
                <?php if (!empty($filters['lang'])) : ?>
                  <div class="base-filters-item base-filters-language">
                    <div class="value r-arr-down" data-role="filter-dropdown base-filter-language">
                      <span class="filter-label"><?php print t('Audio guide language') ?>:</span><span class="text"><?php print $filters['lang']['current_hrn'] ?></span>
                      <div class="select">
                        <?php print $filters['lang']['list'] ?>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                  <div class="base-filters-item base-filters-type">
                    <div class="value r-arr-down" data-role="filter-dropdown base-filter-type" data-value="default">
                      <span class="filter-label"><?php print t('Guide type') ?>:</span><span class="text"><?php print $filters['types']['current_hrn'] ?></span>
                      <div class="select">
                        <?php print $filters['types']['list'] ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif ?>
            <div data-role="fr-wrp" style="height:<?php empty($search_string) ? print '394px' : print '0px' ?>;overflow:hidden;zoom:1;">
              <div class="fotorama-countries-cities-container">
                <?php
                foreach ($slides as $slide) {
                  print drupal_render($slide);
                }
                ?>
              </div>
            </div>
            <div class="browse-cities-per-country-hidden" style="display: none;">
              <?php
              foreach ($countries_with_cities as $cities) {
                print drupal_render($cities);
              }
              ?>
            </div>
          </div>
          <?php /*
          <div class="search-choose-location tac">
            or choose location below
          </div>
          <div class="search-filters clearfix" data-role="search-filters" style="display:none">
            <div class="pull-left">
            </div>
            <div class="choose-location-descr" data-role="choose-location-descr">
              or choose location below
            </div>
            <div class="pull-right mr20">
              <div class="base-filters-item base-filters-type">
                <div class="value r-arr-down" data-role="filter-dropdown base-filter-type" data-value="default">
                  <span class="filter-label">Guide type:</span><span class="text">All types</span>
                  <div class="select">
                    <div class="option default" data-value="/en/search">
                      All types
                    </div>
                    <div class="option" data-value="/en/search">
                      Museums
                    </div>
                    <div class="option" data-value="/en/search">
                      Tours
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div data-role="fr-wrp" style="height:394px;overflow:hidden;zoom:1;">
            <div class="fotorama-countries-cities-container">
              <div class="menu-slider-one">
                <div class="fotorama-countries-container">
                  <div class="arr lft" style="display:none"></div>
                  <div class="arr rgt" style="display:none"></div>
                  <div class="search-fotorama countries-fotorama" data-auto="false" data-height="330px" data-role="fotorama countries-fotorama" data-width="100%">
                    <div class="fotorama__select">
                      <div class="countries-container">
                        <div class="countries-block">
                          <ul class="countries-col col_1">
                            <li class="country">
                              <a data-code="al" data-name="Albania" data-url="/en/tourguides-in-albania" data-uuid="e8e56380-d805-493e-9e1a-f07bd46942da"><span class="name">Albania</span></a>
                            </li>
                            <li class="country">
                              <a data-code="ar" data-name="Argentina" data-url="/en/tourguides-in-argentina" data-uuid="6d4e7752-3c61-4cd8-afc2-9da76c60a2f6"><span class="name">Argentina</span></a>
                            </li>
                            <li class="country">
                              <a data-code="am" data-name="Armenia" data-url="/en/tourguides-in-armenia" data-uuid="c5a0e491-a17b-4a02-8735-fc6b8ce90f54"><span class="name">Armenia</span></a>
                            </li>
                            <li class="country">
                              <a data-code="au" data-name="Australia" data-url="/en/tourguides-in-australia" data-uuid="9850bb18-d3bf-4d32-88f5-a717c3d31cfa"><span class="name">Australia</span></a>
                            </li>
                            <li class="country">
                              <a data-code="at" data-name="Austria" data-url="/en/tourguides-in-austria" data-uuid="03477bcf-ce04-496e-ad3b-03cc2c6ff73f"><span class="name">Austria</span></a>
                            </li>
                            <li class="country">
                              <a data-code="by" data-name="Belarus" data-url="/en/tourguides-in-belarus" data-uuid="394cc2ef-7236-464f-8625-d14c4751210a"><span class="name">Belarus</span></a>
                            </li>
                            <li class="country">
                              <a data-code="be" data-name="Belgium" data-url="/en/tourguides-in-belgium" data-uuid="8665ab70-69ec-4fc7-92e9-7f26e3eb8d3d"><span class="name">Belgium</span></a>
                            </li>
                            <li class="country">
                              <a data-code="br" data-name="Brazil" data-url="/en/tourguides-in-brazil" data-uuid="9c68f0b7-9c7d-4cdb-8ce2-690adbeefb6f"><span class="name">Brazil</span></a>
                            </li>
                            <li class="country">
                              <a data-code="bg" data-name="Bulgaria" data-url="/en/tourguides-in-bulgaria" data-uuid="5431a8eb-ee77-4701-af8c-a410d65dd347"><span class="name">Bulgaria</span></a>
                            </li>
                          </ul>
                          <ul class="countries-col col_2">
                            <li class="country">
                              <a data-code="hr" data-name="Croatia" data-url="/en/tourguides-in-croatia" data-uuid="ad53dcb0-c128-48b4-8251-c4f6cd9c9de5"><span class="name">Croatia</span></a>
                            </li>
                            <li class="country">
                              <a data-code="cy" data-name="Cyprus" data-url="/en/tourguides-in-cyprus" data-uuid="eefb521d-4d04-4c5b-83b6-8b92725d2615"><span class="name">Cyprus</span></a>
                            </li>
                            <li class="country">
                              <a data-code="cz" data-name="Czech Republic" data-url="/en/tourguides-in-czech-republic" data-uuid="47fd550d-8e85-4ece-9b51-b051ff3e9a80"><span class="name">Czech Republic</span></a>
                            </li>
                            <li class="country">
                              <a data-code="dk" data-name="Denmark" data-url="/en/tourguides-in-denmark" data-uuid="1887c4fa-10b3-4125-b316-5e1936a52ec4"><span class="name">Denmark</span></a>
                            </li>
                            <li class="country">
                              <a data-code="ee" data-name="Estonia" data-url="/en/tourguides-in-estonia" data-uuid="783007e4-e4ab-4ae0-a0be-919d5ae4f537"><span class="name">Estonia</span></a>
                            </li>
                            <li class="country">
                              <a data-code="fi" data-name="Finland" data-url="/en/tourguides-in-finland" data-uuid="14f1fe04-5ae8-445f-8fc6-e840b80065a5"><span class="name">Finland</span></a>
                            </li>
                            <li class="country">
                              <a data-code="fr" data-name="France" data-url="/en/tourguides-in-france" data-uuid="1204cada-f918-49cd-8483-81795d69e2bd"><span class="name">France</span></a>
                            </li>
                            <li class="country">
                              <a data-code="de" data-name="Germany" data-url="/en/tourguides-in-germany" data-uuid="a5d4eda2-1fd0-4fa9-bfd4-73c9ba1fcb06"><span class="name">Germany</span></a>
                            </li>
                            <li class="country">
                              <a data-code="gr" data-name="Greece" data-url="/en/tourguides-in-greece" data-uuid="9fe9aad7-d379-4c87-b188-e13436824d3c"><span class="name">Greece</span></a>
                            </li>
                          </ul>
                          <ul class="countries-col col_3">
                            <li class="country">
                              <a data-code="hk" data-name="Hong Kong" data-url="/en/tourguides-in-hong-kong" data-uuid="301f840b-1518-4d18-8324-61b04134e3f6"><span class="name">Hong Kong</span></a>
                            </li>
                            <li class="country">
                              <a data-code="hu" data-name="Hungary" data-url="/en/tourguides-in-hungary" data-uuid="479b2407-d9eb-4191-a74e-f37857c7b54b"><span class="name">Hungary</span></a>
                            </li>
                            <li class="country">
                              <a data-code="is" data-name="Iceland" data-url="/en/tourguides-in-iceland" data-uuid="89c849ea-4ca9-4900-a52c-2a5577597fd5"><span class="name">Iceland</span></a>
                            </li>
                            <li class="country">
                              <a data-code="ie" data-name="Ireland" data-url="/en/tourguides-in-ireland" data-uuid="17f65fa7-b3f6-4d96-9447-81b15ec8a7be"><span class="name">Ireland</span></a>
                            </li>
                            <li class="country">
                              <a data-code="it" data-name="Italy" data-url="/en/tourguides-in-italy" data-uuid="a86219ac-eb5e-47c7-8a34-94183eab6a08"><span class="name">Italy</span></a>
                            </li>
                            <li class="country">
                              <a data-code="kz" data-name="Kazakhstan" data-url="/en/tourguides-in-kazakhstan" data-uuid="2b6de2d2-71c5-4d64-b8a6-cd8c79d92805"><span class="name">Kazakhstan</span></a>
                            </li>
                            <li class="country">
                              <a data-code="lv" data-name="Latvia" data-url="/en/tourguides-in-latvia" data-uuid="2ddbb849-6205-4efc-88eb-9106041cce80"><span class="name">Latvia</span></a>
                            </li>
                            <li class="country">
                              <a data-code="li" data-name="Liechtenstein" data-url="/en/tourguides-in-liechtenstein" data-uuid="aff03cfb-8cc5-4b9e-9a71-d313f27822fd"><span class="name">Liechtenstein</span></a>
                            </li>
                            <li class="country">
                              <a data-code="lt" data-name="Lithuania" data-url="/en/tourguides-in-lithuania" data-uuid="d3da027d-46a0-41d9-8947-5fb728a5baa6"><span class="name">Lithuania</span></a>
                            </li>
                          </ul>
                          <ul class="countries-col col_4">
                            <li class="country">
                              <a data-code="lu" data-name="Luxembourg" data-url="/en/tourguides-in-luxembourg" data-uuid="49031cc3-1544-478d-b614-a82b6210a263"><span class="name">Luxembourg</span></a>
                            </li>
                            <li class="country">
                              <a data-code="mk" data-name="Macedonia [FYROM]" data-url="/en/tourguides-in-macedonia-fyrom" data-uuid="302a904f-142d-4ded-bca5-b318e787cbc6"><span class="name">Macedonia [FYROM]</span></a>
                            </li>
                            <li class="country">
                              <a data-code="my" data-name="Malaysia" data-url="/en/tourguides-in-malaysia" data-uuid="e0209e78-177f-4d68-91d7-dae31986d214"><span class="name">Malaysia</span></a>
                            </li>
                            <li class="country">
                              <a data-code="mt" data-name="Malta" data-url="/en/tourguides-in-malta" data-uuid="58f59e93-230e-42a8-8062-515b8b74660f"><span class="name">Malta</span></a>
                            </li>
                            <li class="country">
                              <a data-code="mc" data-name="Monaco" data-url="/en/tourguides-in-monaco" data-uuid="e86159b1-2291-4d63-aeb9-69f46f2b2e78"><span class="name">Monaco</span></a>
                            </li>
                            <li class="country">
                              <a data-code="nl" data-name="Netherlands" data-url="/en/tourguides-in-netherlands" data-uuid="15845ecf-4274-4286-b086-e407ff8207de"><span class="name">Netherlands</span></a>
                            </li>
                            <li class="country">
                              <a data-code="ni" data-name="Nicaragua" data-url="/en/tourguides-in-nicaragua" data-uuid="d0ad53e7-4125-469d-8653-210f28318f58"><span class="name">Nicaragua</span></a>
                            </li>
                            <li class="country">
                              <a data-code="no" data-name="Norway" data-url="/en/tourguides-in-norway" data-uuid="78d1711b-7c4f-4269-903b-b3debfea4828"><span class="name">Norway</span></a>
                            </li>
                            <li class="country">
                              <a data-code="pa" data-name="Panama" data-url="/en/tourguides-in-panama" data-uuid="5b0d12f3-78f9-4e74-9b6f-f2c53d579dee"><span class="name">Panama</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="fotorama__select">
                      <div class="countries-container">
                        <div class="countries-block">
                          <ul class="countries-col col_1">
                            <li class="country">
                              <a data-code="pl" data-name="Poland" data-url="/en/tourguides-in-poland" data-uuid="24536dec-0843-46c6-8955-c0f45f93444b"><span class="name">Poland</span></a>
                            </li>
                            <li class="country">
                              <a data-code="pt" data-name="Portugal" data-url="/en/tourguides-in-portugal" data-uuid="d88220b0-79bf-4b1a-9ba3-9d84c7c6d28e"><span class="name">Portugal</span></a>
                            </li>
                            <li class="country">
                              <a data-code="ro" data-name="Romania" data-url="/en/tourguides-in-romania" data-uuid="2900b248-e71f-4e57-b167-3061211926ce"><span class="name">Romania</span></a>
                            </li>
                            <li class="country">
                              <a data-code="ru" data-name="Russia" data-url="/en/tourguides-in-russia" data-uuid="fa67b72f-615a-42d9-bed4-f6899e2679bc"><span class="name">Russia</span></a>
                            </li>
                          </ul>
                          <ul class="countries-col col_2">
                            <li class="country">
                              <a data-code="sm" data-name="San Marino" data-url="/en/tourguides-in-san-marino" data-uuid="53aedbb0-aa2f-4d2d-94b6-84bb1a54964c"><span class="name">San Marino</span></a>
                            </li>
                            <li class="country">
                              <a data-code="rs" data-name="Serbia" data-url="/en/tourguides-in-serbia" data-uuid="0f32acc6-5f9a-451e-8b18-308714d89ec7"><span class="name">Serbia</span></a>
                            </li>
                            <li class="country">
                              <a data-code="sk" data-name="Slovakia" data-url="/en/tourguides-in-slovakia" data-uuid="23cf4869-8f44-4a27-853d-af52d3ed975b"><span class="name">Slovakia</span></a>
                            </li>
                            <li class="country">
                              <a data-code="si" data-name="Slovenia" data-url="/en/tourguides-in-slovenia" data-uuid="923263f9-dab6-4da7-8d49-5941348633a8"><span class="name">Slovenia</span></a>
                            </li>
                          </ul>
                          <ul class="countries-col col_3">
                            <li class="country">
                              <a data-code="es" data-name="Spain" data-url="/en/tourguides-in-spain" data-uuid="ecf15373-84fe-436d-a556-b119f43fa41c"><span class="name">Spain</span></a>
                            </li>
                            <li class="country">
                              <a data-code="se" data-name="Sweden" data-url="/en/tourguides-in-sweden" data-uuid="e1f097b6-db16-4629-92f6-c34bd1d587ad"><span class="name">Sweden</span></a>
                            </li>
                            <li class="country">
                              <a data-code="ch" data-name="Switzerland" data-url="/en/tourguides-in-switzerland" data-uuid="7b044dfa-9b54-4e8e-9f1e-0cdf78a0409a"><span class="name">Switzerland</span></a>
                            </li>
                            <li class="country">
                              <a data-code="tr" data-name="Turkey" data-url="/en/tourguides-in-turkey" data-uuid="2e797602-3305-47e2-abcc-44fd59585bad"><span class="name">Turkey</span></a>
                            </li>
                          </ul>
                          <ul class="countries-col col_4">
                            <li class="country">
                              <a data-code="ua" data-name="Ukraine" data-url="/en/tourguides-in-ukraine" data-uuid="69929d8f-ba82-49b2-88fe-e5a0c687caca"><span class="name">Ukraine</span></a>
                            </li>
                            <li class="country">
                              <a data-code="gb" data-name="United Kingdom" data-url="/en/tourguides-in-united-kingdom" data-uuid="7caffa20-cf3e-4149-81db-bb0b0a0e435c"><span class="name">United Kingdom</span></a>
                            </li>
                            <li class="country">
                              <a data-code="us" data-name="United States" data-url="/en/tourguides-in-united-states" data-uuid="cbdbad93-08d3-4ce9-bcbd-8d9cee7ca35c"><span class="name">United States</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="menu-slider-two">
                <div class="menu-slider-two-wrp">
                  <div class="btn back">
                    <p class="all_countries">
                      all countries
                    </p>
                  </div>
                  <div class="fotorama-cities-container">
                    <div class="arr lft" style="display:none"></div>
                    <div class="arr rgt" style="display:none"></div>
                    <div class="search-fotorama cities-fotorama" data-auto="false" data-height="400px" data-role="cities-fotorama" data-width="100%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          */ ?>
        </div>
      </div>
    </div>
  </div>
</div>

