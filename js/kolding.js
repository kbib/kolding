jQuery(function($) {
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

