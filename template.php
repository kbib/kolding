<?php

/**
 * Override theme_ting_search_form().
 */
function kolding_ting_search_form($form){
  jquery_ui_add('ui.dialog');
  jquery_ui_theme_load();
  drupal_add_js(drupal_get_path('theme', 'kolding').'/js/selectmenu.js', 'module', 'footer', TRUE);

  $form['submit']['#type'] 	= "image_button" ;
  $form['submit']['#src'] 	= drupal_get_path('theme','kolding')."/images/search-btn.png";
  $form['submit']['#attributes']['class'] = "";

  return drupal_render($form);
}

/**
 * Override theme_user_login_block().
 */
function kolding_user_login_block($form){
  // We use a different image for the login button.
  // The rest is same as dynamo_user_login_block().
  $form['submit']['#type'] = "image_button" ;
  $form['submit']['#src'] = drupal_get_path('theme','kolding')."/images/logindknap.png";
  $form['submit']['#attributes']['class'] = '';

  $name = drupal_render($form['name']);
  $pass = drupal_render($form['pass']);
  $submit = drupal_render($form['submit']);
  $remember = drupal_render($form['remember_me']);

  return  $name . $pass . $submit . $remember . drupal_render($form);
}

/**
 * Preprocess variables for the page template.
 */
function kolding_preprocess_page(&$variables){
  $variables['rsslink'] = l(theme('image',path_to_theme('kolding').'/images/rssknap.png'),'<front>', array('html' => true, 'attributes' => array('class' => 'rsslink')));

  // Remove help from wiki page revision page
  if (arg(2) == 'revisions' &&
      ($variables['node']->type == 'wiki_page')) {
    unset($variables['help']);
  }
}

/**
 * Override of theme_breadcrumb().
 */
function kolding_breadcrumb($breadcrumb) {
  // Static variable to make sure we only set_js once.
  static $once;

  // Okay, we need to fudge the active trail on the top menu, since it's.
  // not really connected to many of the underlying pages. For this, we
  // extract the URLs from the breadcrumb trail.
  if (count($breadcrumb) > 1 && !$once) {
    $urls = array();
    foreach ($breadcrumb as $item) {
      $matches = array();
      if (preg_match('/href="([^"]+)"/', $item, $matches)) {
        $urls[] = $matches[1];
      }
    }

    drupal_add_js(array('kolding' => array('breadcrumbURLs' => $urls)), 'setting');

    $once = TRUE;
  }

  // Fall back on the breadcrumb provided by Dynamo.
  return dynamo_breadcrumb($breadcrumb);
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
      // Support translation of panel panes.
      // Inspired by http://drupal.org/node/568740#comment-3479074.
      $content->title = t($content->title);

      // Added title wrapper to support sliding doors in both directions.
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

/**
 * Override theming for the availability box.
 *
 * Add additional wrappers to mirror Kolding panels output and support sliding doors.
 */
function kolding_ting_availability_box($object) {
  return '<div class="ding-box-pane">' .
            '<div class="panel-pane ding-box-wide ting-availability">' .
              '<div class="pane-title">' .
                '<h3>' .
                  t('%title is available at the following libraries:', array('%title' => check_plain($object->title))) .
                '</h3>' .
              '</div>' .
              '<div class="pane-content">' .
                '<ul class="library-list">' .
                  '<li class="ting-status waiting even">' . t('waiting for data') .'</li>' .
                '</ul>' .
              '</div>' .
             '</div>' .
         '</div>';
}
