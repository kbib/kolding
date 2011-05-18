<?php

function kolding_ting_search_form($form){
	$form['submit']['#type'] 	= "image_button" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','kolding')."/images/searchbutton.png";
	$form['submit']['#attributes']['class'] 	= "";

	return drupal_render($form);	
}

function kolding_preprocess(&$variables){

$variables['rsslink'] = l(theme('image',path_to_theme('kolding').'/images/rssknap.png'),'<front>',array('html' => true, 'attributes' => array('class' => 'rsslink	')));
}