<?php
function get_item_html($id, $item) {
  $output = "<li><a href='#'><img src='"
      . $item["img"] . "' alt='"
      . $item['title'] . "' />"
      . "<p>View details</p>"
      . "</a></li>";
      return $output;
}

function array_category($catalog, $category) {
  // if($category == null) {
  //   return array_keys($catalog);
  // }
  $output = array();

  foreach ($catalog as $id => $item) {
    if($category == null || strtolower($category) == strtolower($item['category'])) {
      $sort = $item['title'];
      // Remove or trim any of the words "and", "the". The clean code should just be clean code for ex.
      $sort = ltrim($sort, "The ");
      $sort = ltrim($sort, "A ");
      $sort = ltrim($sort, "An ");
      $output[$id] = $sort;
    }
  }


  asort($output);
  return array_keys($output);
}
