$(function () {
  $("#flap").stickySidebar();
  
  $('.select-type-field').selectmenu({
	  'width' : '180',
  });
  
  
/*	$('.view-id-Ingredients').ajaxComplete(function() {
		$('#edit-tid option:eq(0)').html('Alle');
	//IE has trouble if we try to set at width, so don't
	var attr = (jQuery.browser.msie) ? {} : {width:'253px'};
		$('.views-exposed-widget #edit-tid').selectmenu(attr);
	});
	
	$('#edit-tid option:eq(0)').html('Alle');
	//IE has trouble if we try to set at width, so don't
	  var attr = (jQuery.browser.msie) ? {} : {width:'253px'};
	$('.views-exposed-widget #edit-tid').selectmenu(attr);
	
	$('.view-id-Ingredients').ajaxStart(function(){
		$('.views-view-grid').css({'opacity':'0.2','position':'relative'}).after('<div class="ajax_loader">&nbsp;</div>');
		
	});

  */
  
	if($(window).width() < (1281)){
		$('#page-inner').css({'margin':'0','left':'0'});
	}else if($(window).width() > (1500)){
		$('#page-inner').css({'left':'0'});
	}
	else{
		$('#page-inner').css({'margin':'0 auto','left':'-120px'});
	}
  
  
});

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
