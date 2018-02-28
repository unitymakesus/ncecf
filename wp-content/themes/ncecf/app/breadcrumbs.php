<?php

namespace App;

/**
 * Customize Breadcrumbs plugin
 */

add_filter('breadcrumb_trail_object', function() {
  global $post;

  $breadcrumbs = new \Breadcrumb_Trail($args);
  $post_type = $post->post_type;

  if ($post_type == "ncecf-issue") {
    array_splice($breadcrumbs->items, 1, 0, '<a href="#">Issues</a>');
  }

  // var_dump($breadcrumbs);
  return $breadcrumbs;
});
