<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
 
  /*-------------Adding Google Fonts - Open Sans-----------*/
 
 function omega_preprocess_html(&$variables) {
  drupal_add_css('http://fonts.googleapis.com/css?family=Open+Sans:400,600',array('type' => 'external'));
}
 
 /*-------------Changing the Language Swithcer Block to display EN instead of English-----------*/

function fresh_paint_omega_links__locale_block(&$vars) {
  foreach($vars['links'] as $language => $langInfo) {
    $abbr = $langInfo['language']->language;
    $name = $langInfo['language']->name;
    $vars['links'][$language]['title'] = '<abbr title="' . $name . '">' . $abbr . '</abbr>';
    $vars['links'][$language]['html'] = TRUE;
  }
  $content = theme_links($vars);
  return $content;
}

 /*-------------Changing the Search Button (added Colon to Search)-----------*/

function fresh_paint_omega_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    //$form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    //$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    //$form['search_block_form']['#size'] = 40;  // define size of the textfield
    $form['search_block_form']['#default_value'] = t(''); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t('search:'); // Change the text on the submit button
    //$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search-button.png');

    // Add extra attributes to the text box
    //$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    //$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    // Prevent user from searching the default text
    //$form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
    //$form['search_block_form']['#attributes']['placeholder'] = t('Search');
  }
}

 /*-------------Changing the Viewport (for mobile and tablet)-----------*/

// function fresh_paint_omega_page_alter($page) {
// // 
// $viewport = array(
// '#type' => 'html_tag',
// '#tag' => 'meta',
// '#attributes' => array(
// 'name' =>  'viewport',
// 'content' =>  'width=1024'
// )
// );
// drupal_add_html_head($viewport, 'viewport');
// }

// ?>


