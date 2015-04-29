// Create an pool of running ajax get requests
(function ($) {

  Drupal.behaviors.SearchAutoComplete = {
    attach: function (context, settings) {
      var $body = $('body');
      var ajaxCalls = [];
      var autoCompleteTimer;

      // Reset the ajaxCalls stack when all ajax requests are done to prevent memory/speed issues
      $(document).ajaxStop(function() {
        ajaxCalls = [];
      });

      $('.-search-input').once('auto-complete').each( function () {
        var $input = $(this);
        var $form = $input.parents('form');
        var $suggestionsWrapper = $('.suggestions-wrapper', $form);
        var $ulSuggestions = $suggestionsWrapper.find('ul').first();

        // Make sure that we only select suggestions that are direct descendants,
        // because contextual links also contain li-elements
        var $suggestions = $ulSuggestions.children('li');

        // Create placeholder <div> for search suggestions.
        $suggestionsWrapper.prepend('<div class="search-suggestions-wrapper" />').hide();

        // Accessibility and usability.
        $input.attr({'autocomplete':'off', 'aria-autocomplete':'list'});
        $input.data('selected', -1);

        // Respond on all action concerning user input. (Warning: may result in firing this event multiple times)
        $input.on('input change paste keyup mouseup', function (e) {

          // Ignore enter, key up and key down.
          switch (e.keyCode) {
            case 13: // enter.
            case 40: // down arrow.
            case 38: // up arrow.
              return false;
          }

          // Get the search term without leading and trailing whitespace (prevents unnecessary searches)
          var values = $input.val().trim();

          // Call Drupal pagecallback to return suggestion for search term.
          // Act only when search term is at least three characters AND the last search isn't the same as the new search (prevent multiple identical calls)
          if (values.length > 2 && $input.data('last-search') != values) {
            // Set timeout for the third character to 0
            var searchTimeout = 0;
            // New searches have a longer timeout to relieve the API
            if (values.length > 3) {
              searchTimeout = 500;
            }
            autoCompleteTimer = setTimeout(
              function() {
                var ajaxCallsCount = ajaxCalls.length;
                ajaxCalls.push(
                  $.get(Drupal.settings.basePath + Drupal.settings.pathPrefix + "search_autocomplete/" + values, function (data) {
                    $suggestionsWrapper.html(data);
                    if (data.length > 0) {
                      $suggestionsWrapper.show();

                      var $ulSuggestions = $suggestionsWrapper.find('ul').first();

                      // Make sure that we only select suggestions that are direct descendants,
                      // because contextual links also contain li-elements
                      $suggestions = $ulSuggestions.children('li');

                      $input.data('selected', -1);

                      // Abort older ajax calls
                      ajaxCalls.forEach(function(call, ajaxCallId) {
                        if(ajaxCallId < ajaxCallsCount) {
                          ajaxCalls[ajaxCallId].abort();
                        }
                      });

                      // On click of a suggestion change the input text to the clicked suggestion
                      $suggestions.find('a').click(function() {
                        $input.val($(this).text());
                      });

                      // Change the selected item when hovering
                      // This works together with using up and down keys
                      $suggestions.hover(function() {
                        var $this = $(this);
                        var selected = $input.data('selected');
                        var hovered = $this.index();
                        if (hovered != selected) {
                          var delta = hovered - selected;
                          $input.SearchHighlight($suggestions, delta, $input);
                        }
                      });
                    }
                    else {
                      // @todo no results feedback
                      $suggestionsWrapper.hide();
                    }
                  })
                );
              }, searchTimeout
            );
          }
          // Show previous suggestions when the last search was the same and the suggestions are hidden
          else if (values.length > 2 && $input.data('last-search') == values && $suggestionsWrapper.not(':visible')) {
            $suggestionsWrapper.show();
          }
          // Hide the search results when there are not enough search characters
          else if (values.length < 3) {
            $suggestionsWrapper.hide();
          }
          $input.data('last-search', values);
        });

        $input.keydown(function (e) {
          var $this = $(this);
          switch (e.keyCode) {
            case 13: // enter.
              if ($this.data('selected') == -1) {
                // Nothing is selected, so do the default.
                return true;
              }
              $this.SearchEnter($suggestions);
              return false;
            case 40: // down arrow.
              $this.SearchSelectDown($suggestions, $input);
              return false;
            case 38: // up arrow.
              $this.SearchSelectUp($suggestions, $input);
              return false;
            default: // All other keys.
              return true;
          }
        });
      });

      // Focus and blur events are triggered on all inputs of the search form.
      $('.-search-form input').once('auto-complete-focus-blur').focus(function(){
        $(this).parents('.-search-form').addClass('focused');
      }).blur(function() {
        var $this = $(this);

        // Restore input value
        $this.val($this.data('last-search'));

        $this.parents('.-search-form').removeClass('focused');
        // If there was a click, we want to capture that click
        // So wait just a bit with hiding everything
        setTimeout(function(){
          $('.suggestions-wrapper').hide();
          clearTimeout(autoCompleteTimer);
        }, 250);
      });

    }
  };

  $.fn.SearchSelectDown = function($suggestions, $input) {
    var selected = this.data('selected');
    if ($suggestions.length  > (selected + 1)) {
      this.SearchHighlight($suggestions, 1, $input);
    }
    return this;
  };

  $.fn.SearchSelectUp = function($suggestions, $input) {
    var selected = this.data('selected');
    if (selected != -1) {
      this.SearchHighlight($suggestions, -1, $input);
    }
    return this;
  };

  /**
   * Follow a suggestion link.
   */
  $.fn.SearchEnter = function($suggestions) {
    var selected = this.data('selected');
    window.location.href = $suggestions.eq(selected).find('a').filter(function(){
      return !($(this).parent().parent().hasClass('contextual-links'));
    }).attr('href');
    return this;
  };

  /**
   * Highlights a suggestion.
   */
  $.fn.SearchHighlight = function($suggestions, delta, $input) {
    var selected = this.data('selected');
    var next = selected + delta;
    $suggestions.eq(selected).removeClass('selected');
    this.data('selected', next);

    if (next != -1) {
      var $next = $suggestions.eq(next);
      $next.addClass('selected');
    }

    // Set input text to selection if it is a search suggestion or restore otherwise
    if (next < $suggestions.length - 1 && next > -1) {
      $input.val($next.text());
    }
    else {
      $input.val($input.data('last-search'));
    }
    return this;
  };

}(jQuery));
