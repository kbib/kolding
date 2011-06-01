<?php

function kolding_ting_search_form($form){
	$form['submit']['#type'] 	= "image_button" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','kolding')."/images/search-btn.png";
	$form['submit']['#attributes']['class'] 	= "";

	return drupal_render($form);	
}

function kolding_preprocess(&$variables){

$variables['rsslink'] = l(theme('image',path_to_theme('kolding').'/images/rssknap.png'),'<front>',array('html' => true, 'attributes' => array('class' => 'rsslink	')));
}
function kolding_user_login_block($form){
/*  $form['submit']['#type'] = "submit" ;

  $name = drupal_render($form['name']);
  $pass = drupal_render($form['pass']);
  $submit = drupal_render($form['submit']);
  $remember = drupal_render($form['remember_me']);

  $before = '<h3>'.t('Login &rsaquo;').'</h3>';//.l(t('> NemLog-in'),'/nemlogin',array('attributes' => array('class' => 'nemlogin')));
  return $before . $name . '<div>' . $pass . $submit . '</div>' . $remember . drupal_render($form);*/
}