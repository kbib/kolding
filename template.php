<?php

function kolding_ting_search_form($form){
  
  jquery_ui_add('ui.dialog');
  jquery_ui_theme_load();
  drupal_add_js(drupal_get_path('theme', 'kolding').'/js/selectmenu.js', 'module', 'footer', TRUE);
  
  
	$form['submit']['#type'] 	= "image_button" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','kolding')."/images/search-btn.png";
	$form['submit']['#attributes']['class'] 	= "";
	//$form['submit']['#prefix'] = '<select id="search_type"><option>vælg materiale</option><option value="bog">bøger</option><option value="cd">musik</option></select>';
	

	return drupal_render($form);	
}

function kolding_preprocess(&$variables){

  //drupal_add_js(drupal_get_path('theme', 'kolding').'/js/selectmenu.js');
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

/**
 * Theming panels panes. Overrides Dynamo to add additional wrappers to support sliding doors.
 */
function kolding_panels_pane($content, $pane, $display) {
  if (!empty($content->content)) {
    $idstr = $classstr = '';
    if (!empty($content->css_id)) {
      $idstr = ' id="' . $content->css_id . '"';
    }
    if (!empty($content->css_class)) {
      $classstr = ' ' . $content->css_class;
    }

    $output = "<div class=\"panel-pane pane-$pane->subtype $classstr \"$idstr>\n";

    if (!empty($content->title)) {
      // Added title wrapper to support sliding doors in both directions
      $output .= '<div class="pane-title">'."\n";
      
      if($pane->subtype == "event_list-panel_pane_1"  OR $pane->subtype == "recommendation_list"){
        $output .= "<h1>$content->title</h1>\n";
      }
      elseif(
        $pane->subtype == "topic_list" OR
        $pane->subtype == "event_list" OR
        $pane->subtype == "library_feature_detail_list" OR
        $pane->subtype == "node_content"
      ) {
        $output .= '<h2 class="panel-title">'. $content->title .'</h2>';
      }
      else {
        $output .= "<h3>$content->title</h3>\n";
      }
      
      // End title wrapper
      $output .= '</div>'."\n";
    }
    
    // Added content wrapper to support sliding doors in both directions
    $output .= '<div class="pane-content">'."\n";
    
    if (!empty($content->feeds)) {
      $output .= "<div class=\"feed\">" . implode(' ', $content->feeds) . "</div>\n";
    }

    $output .= $content->content;

    if (!empty($content->links)) {
      $output .= "<div class=\"links\">" . theme('links', $content->links) . "</div>\n";
    }

    if (!empty($content->more)) {
      if (empty($content->more['title'])) {
        $content->more['title'] = t('more');
      }
      $output .= "<div class=\"panels more-link\">" . l($content->more['title'], $content->more['href']) . "</div>\n";
    }
    if (user_access('view pane admin links') && !empty($content->admin_links)) {
      $output .= "<div class=\"admin-links panel-hide\">" . theme('links', $content->admin_links) . "</div>\n";
    }

    // End content wrapper
    $output .= '</div>'."\n";
    
    $output .= "</div>\n";
    return $output;
  }
}