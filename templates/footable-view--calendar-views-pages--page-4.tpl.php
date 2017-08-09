<?php
/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
 
   #### defs
  // call a global variable every time the template is called
  global $static;
  // be aware of the key_name for the global variable to keep it 
  // unique for every display
  // I call the same view in one panel several times with 
  // different arguments 
  $key_name = $view->name . '_' . $view->current_display ;
  foreach ($view->args as $value) {
    $key_name .= '_' . $value;
  }
  // init classes array
  $group_classes = array();
  ## groups counter - store in global variable 
  if (!isset($static[$key_name]['gc'])) {
    $static[$key_name]['gc'] = 1;
  }
  else {
    $static[$key_name]['gc']++;
  }
  #### classes
  ## counter
  $group_classes[] = 'group-' . $static[$key_name]['gc'];
  ## first
  if ($static[$key_name]['gc'] == 1) {
    $group_classes[] = 'first';
  }
  ## last
  // get max row "id" per group
  foreach ($rows as $id => $row) {
    $max_id = $id;
  }
  // count results (-1 because $id starts with 0)
  $count_results = count($view->result) - 1;
  //
  if ($max_id == $count_results) {
    $group_classes[] = 'last';
  }
  ## ret
  $group_class = implode(' ', $group_classes);
?>

<?php
	/*
	$remove = false;
	foreach ($view->result as $key => $item) {
	  if (date('w', strtotime($item->field_field_show_date['0']['raw']['value'])) != 6) {
		unset($rows[$key]);
	  }
	}
	$rows = array_values($rows);
	*/
?>
<div class="views-group <?php print $group_class; ?> <?php print $title; ?>" >
<table class="table-group" <?php print $attributes; ?>>
  <?php if (!empty($title)) : ?>
  <p></p>
    <div class="table-header"><?php print $title; ?></div>
  <?php endif; ?>
  <?php if (!empty($header)) : ?>
    <thead>
      <tr>
        <?php foreach ($header as $field => $label): ?>
          <th <?php if (!empty($data_toggle[$field])): print 'data-toggle="'. $data_toggle[$field] . '" '; endif; ?><?php if (!empty($data_hide[$field])): print 'data-hide="'. $data_hide[$field] . '" '; endif; ?><?php if ($header_classes[$field]): print 'class="'. $header_classes[$field] . '" '; endif; ?>>
            <?php print $label; ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>
  <?php endif; ?>
  <tbody>
    <?php foreach ($rows as $row_count => $row): ?>
      <tr <?php if ($row_classes[$row_count]): print 'class="' . implode(' ', $row_classes[$row_count]) .'"';  endif; ?>>
        <?php foreach ($row as $field => $content): ?>
          <td <?php if ($field_classes[$field][$row_count]): print 'class="'. $field_classes[$field][$row_count] . '" '; endif; ?><?php print drupal_attributes($field_attributes[$field][$row_count]); ?>>
            <?php print $content; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
