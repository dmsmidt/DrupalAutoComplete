'use strict';

(function ($) {

  Drupal.behaviors.SearchLoadMore = {
    attach: function (context, settings) {
      $('.s-output .btn-show-more').once().each(function () {
        var $link = $(this);
        var $resultsWrapper = $(this).parents('.s-output').find('.s-output-results-wrapper');

        // Search options
        var searchString = $link.data('search-string');

        // Load more click event
        $link.click(function (event) {
          // Prevent default
          event.preventDefault ? event.preventDefault() : event.returnValue = false;

          // Get the search offset, after every load more action this value differs
          var searchOffset = $link.data('search-offset');

          $link.addClass('show-more-rotate-sign');

          // Get the extra search results
          $.get(Drupal.settings.basePath + Drupal.settings.pathPrefix + 'search_load_more/' + searchString + '/' + searchOffset, function (data) {
            // Get the new results
            var $newResults = $(data.results);

            // Hide the new results
            $newResults.hide().appendTo($resultsWrapper);

            // Fade in the extra results
            $newResults.animate({opacity: 'show'}, 500);

            // Show and update load more button, with new offset value, if we still have results
            // Otherwise hide the link
            if (data.load_more == true) {
              $link.data('search-offset', data.offset).removeClass('show-more-rotate-sign');
            }
            else {
              $link.hide();
            }

            // Re-attach behaviors in order to get the new load more link to work as well
            Drupal.attachBehaviors();
          });

        });
      });
    }
  };

})(jQuery);
