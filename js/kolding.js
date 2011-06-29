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

  $("#flap").stickySidebar();

  $('.select-type-field').selectmenu({
	  'width' : '180',
  });

	if($(window).width() < (1281)){
		$('#page-inner').css({'margin':'0','left':'0'});
	}else if($(window).width() > (1500)){
		$('#page-inner').css({'left':'0'});
	}
	else{
		$('#page-inner').css({'margin':'0 auto','left':'-120px'});
	}

  $(window).resize(function(){
    if($(window).width() < (1281)){
      $('#page-inner').css({'margin':'0','left':'0'});
    }else if($(window).width() > (1500)){
      $('#page-inner').css({'left':'0'});
    }
    else{
      $('#page-inner').css({'margin':'0 auto','left':'-120px'});
    }
  });
});

