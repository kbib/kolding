jQuery(function($) {
  // Simulate active menu based on breadcrumb trail.
  // This is a decidedly unpretty way to go around this, but its the
  // best we can do without refactoring the entire menu structure.
  if (Drupal.settings.kolding && Drupal.settings.kolding.breadcrumbURLs) {
    var primaryMenuLinks = $('#navigation .links a'),
        pathMatcher = /https?:\/\/[^/]+(\/.+)/;

    primaryMenuLinks.each(function () {
      var matches = this.href.match(pathMatcher);

      if (matches && $.inArray(matches[1], Drupal.settings.kolding.breadcrumbURLs) !== -1) {
        $(this).parent().addClass('active-trail');
      }
    });
  }


  $("table.sticky-header").remove();

  $("#flap").stickySidebar();

  $('.select-type-field').selectmenu({
    'width' : '149',
    'style' : 'dropdown'
  });

  Drupal.kolding.pageWidth();
  $(window).resize(Drupal.kolding.pageWidth);

});

Drupal.kolding = {};
Drupal.kolding.pageWidth = function() {
  var width = $(window).width();
  if (width > 1280) {
    $('body').removeClass('kolding-narrow').addClass('kolding-wide');
  } else if (width <= 1024) {
    $('body').removeClass('kolding-wide').addClass('kolding-narrow');
  } else {
    $('body').removeClass('kolding-narrow').removeClass('kolding-wide');
  }
};
