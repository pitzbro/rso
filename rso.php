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
 
 function traintheater_views_pre_render(&$view) {
 //order field collection view correctly
  if ($view->name == 'field_collection_view') {
    $args = explode('+', $view->args[0]);
    if (!empty($args)) {
      $order_results = $view->result;
      $aflip = array_flip($args);
      usort($order_results, function($a, $b) use($aflip) {
        if (isset($aflip[$a->item_id]) && isset($aflip[$b->item_id])) {
          return $aflip[$a->item_id] > $aflip[$b->item_id] ? 1 : -1;
        }
        return 0;
      });
      $view->result = $order_results;
    }
  }
}