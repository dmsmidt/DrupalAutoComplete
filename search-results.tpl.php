<?php print render($search_block) ?>
<div class="s-output clearfix" data-role="s-output">
  <?php if(!empty($title)) : ?>
    <h1 class="h1 tac mt70 mb50">
      <?php print $title ?>
    </h1>
  <?php else : ?>
    <div class="mb40"></div>
  <?php endif ?>
  <div class="s-output-block" data-role="s-output-block">
    <?php
    if (!empty($results)) : ?>
      <div class="s-output-results-wrapper">
        <?php print $results; ?>
      </div>
    <?php else : ?>
      <div class="no-results mt100 tac">
        <div class="mt100">
          <div class="no-results-holder tac iblock">
            <span class="h2"><?php print t('No match for your request was found') ?></span>
            <div class="no-results-reasons">
              <ul class="no_results_list iblock">
                <li>
                  <?php print t('Try to use other keywords') ?>
                </li>
                <li>
                  <?php print t('Go to change location - select alternative filter') ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <?php if(!empty($load_more)): ?>
    <div class="text-center mb25" data-role="s-output-show-more-block">
      <a class="btn-primary btn-show-more"
         data-role="s-output-show-more"
         data-search-type="<?php print $load_more['search-type'] ?>"
         data-search-string="<?php print $load_more['search-string'] ?>"
         data-search-offset="<?php print $load_more['search-offset'] ?>"
         data-filter-type="<?php print $load_more['filter-type'] ?>"
         data-filter-lang="<?php print $load_more['filter-lang'] ?>">
        <?php print t('Load more') ?>
      </a>
    </div>
  <?php endif ?>
</div>