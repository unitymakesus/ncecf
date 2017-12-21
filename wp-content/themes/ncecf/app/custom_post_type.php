<?php

namespace App;

function create_post_type() {

  $argsIssues = array(
    'labels' => array(
      'name' => __( 'Issues' ),
      'singular_name' => __( 'Issue' )
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-paperclip',
    'capability_type' => 'page',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'author',
      'revisions',
      'page-attributes'
    ),
    // 'query_var' => true,
    // rewrite (issue)
    'has_archive' => false,
    'rewrite' => true
  );
  register_post_type( 'ncecf-issue', $argsIssues );


  $argsInitiatives = array(
    'labels' => array(
      'name' => __( 'Initiatives' ),
      'singular_name' => __( 'Initiative' )
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'menu_position' => 21,
    'menu_icon' => 'dashicons-lightbulb',
    'capability_type' => 'page',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'author',
      'revisions',
      'page-attributes'
    ),
    'has_archive' => false,
    'rewrite' => true
  );
  register_post_type( 'ncecf-initiative',  $argsInitiatives );

  $argsEvents = array(
    'labels' => array(
      'name' => __( 'Events' ),
      'singular_name' => __( 'Event' )
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 22,
    'menu_icon' => 'dashicons-store',
    'capability_type' => 'page',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'author',
      'revisions',
      'page-attributes'
    ),
    'has_archive' => true,
    'rewrite' => false
  );
  register_post_type( 'ncecf-event', $argsEvents );


  $argsResources = array(
    'labels' => array(
      'name' => __( 'Resources' ),
      'singular_name' => __( 'Resource' )
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 23,
    'menu_icon' => 'dashicons-media-document',
    'capability_type' => 'page',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'author',
      'revisions',
      'page-attributes'
    ),
    'has_archive' => true,
    'rewrite' => true
  );
  register_post_type( 'ncecf-resource', $argsResources );

}

add_action( 'init', __NAMESPACE__.'\\create_post_type' );
