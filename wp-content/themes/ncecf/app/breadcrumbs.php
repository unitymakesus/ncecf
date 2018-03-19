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
    array_splice($breadcrumbs->items, 1, 0, '<a href="/issues/">Issues</a>');
  }

  if ($post_type == "ncecf-initiative") {
    array_splice($breadcrumbs->items, 1, 0, '<a href="/initiatives/">Initiatives</a>');
  }

  // var_dump($breadcrumbs);
  return $breadcrumbs;
});
