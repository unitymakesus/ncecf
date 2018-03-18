<?php

namespace App;

function create_post_type() {

  $argsIssues = array(
    'labels' => array(
			'name' => 'Issues',
			'singular_name' => 'Issue',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Issue',
			'edit' => 'Edit',
			'edit_item' => 'Edit Issue',
			'new_item' => 'New Issue',
			'view_item' => 'View Issue',
			'search_items' => 'Search Issues',
			'not_found' =>  'Nothing found in the Database.',
			'not_found_in_trash' => 'Nothing found in Trash',
			'parent_item_colon' => ''
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-paperclip',
    'capability_type' => 'page',
    'hierarchical' => true,
    'supports' => array(
      'title',
      'editor',
      'author',
      'revisions',
      'page-attributes',
      'thumbnail'
    ),
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'issue'
    )
  );
  register_post_type( 'ncecf-issue', $argsIssues );


  $argsInitiatives = array(
    'labels' => array(
			'name' => 'Initiatives',
			'singular_name' => 'Initiative',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Initiative',
			'edit' => 'Edit',
			'edit_item' => 'Edit Initiative',
			'new_item' => 'New Initiative',
			'view_item' => 'View Initiative',
			'search_items' => 'Search Initiatives',
			'not_found' =>  'Nothing found in the Database.',
			'not_found_in_trash' => 'Nothing found in Trash',
			'parent_item_colon' => ''
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
    'rewrite' => array(
      'slug' => 'initiative'
    )
  );
  register_post_type( 'ncecf-initiative',  $argsInitiatives );

  $argsEvents = array(
    'labels' => array(
			'name' => 'Events',
			'singular_name' => 'Event',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Event',
			'edit' => 'Edit',
			'edit_item' => 'Edit Event',
			'new_item' => 'New Event',
			'view_item' => 'View Event',
			'search_items' => 'Search Events',
			'not_found' =>  'Nothing found in the Database.',
			'not_found_in_trash' => 'Nothing found in Trash',
			'parent_item_colon' => ''
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
    'has_archive' => 'events',
    'rewrite' => array(
      'slug' => 'event'
    )
  );
  register_post_type( 'ncecf-event', $argsEvents );


  $argsResources = array(
    'labels' => array(
				'name' => 'Resources',
				'singular_name' => 'Resource',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Resource',
				'edit' => 'Edit',
				'edit_item' => 'Edit Resource',
				'new_item' => 'New Resource',
				'view_item' => 'View Resource',
				'search_items' => 'Search Resources',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
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
      'author',
      'revisions',
      'page-attributes'
    ),
    'has_archive' => 'resources',
    'rewrite' => array(
      'slug' => 'resource'
    )
  );
  register_post_type( 'ncecf-resource', $argsResources );


  $argsStaff = array(
    'labels' => array(
				'name' => 'People',
				'singular_name' => 'Person',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Person',
				'edit' => 'Edit',
				'edit_item' => 'Edit Person',
				'new_item' => 'New Person',
				'view_item' => 'View Person',
				'search_items' => 'Search People',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-groups',
    'capability_type' => 'page',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'revisions',
      'page-attributes',
      'thumbnail'
    ),
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'bio'
    )
  );
  register_post_type( 'ncecf-person', $argsStaff );

}

add_action( 'init', __NAMESPACE__.'\\create_post_type' );
