<?php

namespace App;

/**
 * Customize Breadcrumbs plugin
 */

add_filter('breadcrumb_trail_object', function($args) {
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

 function __construct( $args = array() ) {
    $defaults = array(
      'container'       => 'nav',
      'before'          => '',
      'after'           => '',
      'browse_tag'      => 'div',
      'list_tag'        => 'ul',
      'item_tag'        => 'li',
      'show_on_front'   => true,
      'network'         => false,
      'show_title'      => true,
      'show_browse'     => true,
      'labels'          => array(),
      'post_taxonomy'   => array(),
      'echo'            => true
    );
  };
});
