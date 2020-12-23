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
      'page-attributes',
      'thumbnail'
    ),
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'initiative'
    )
  );
  register_post_type( 'ncecf-initiative',  $argsInitiatives );
  //
  // $argsEvents = array(
  //   'labels' => array(
	// 		'name' => 'Events',
	// 		'singular_name' => 'Event',
	// 		'add_new' => 'Add New',
	// 		'add_new_item' => 'Add New Event',
	// 		'edit' => 'Edit',
	// 		'edit_item' => 'Edit Event',
	// 		'new_item' => 'New Event',
	// 		'view_item' => 'View Event',
	// 		'search_items' => 'Search Events',
	// 		'not_found' =>  'Nothing found in the Database.',
	// 		'not_found_in_trash' => 'Nothing found in Trash',
	// 		'parent_item_colon' => ''
  //   ),
  //   'public' => true,
  //   'exclude_from_search' => false,
  //   'publicly_queryable' => true,
  //   'show_ui' => true,
  //   'show_in_nav_menus' => false,
  //   'menu_position' => 22,
  //   'menu_icon' => 'dashicons-store',
  //   'capability_type' => 'page',
  //   'hierarchical' => false,
  //   'supports' => array(
  //     'title',
  //     'editor',
  //     'author',
  //     'revisions',
  //     'page-attributes'
  //   ),
  //   'has_archive' => 'events',
  //   'rewrite' => array(
  //     'slug' => 'event'
  //   )
  // );
  // register_post_type( 'ncecf-event', $argsEvents );


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
      'page-attributes',
      'thumbnail'
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

    $argsActionMapExpect = array(
        'labels' => array(
            'name'          => 'Action Map',
            'singular_name' => 'Initiative',
            //'add_new' => 'Add New Expectation',
            'add_new_item'       => 'Add New Initiatives',
            'all_items'          => 'Initiatives',
            'edit'               => 'Edit',
            'edit_item'          => 'Edit Initiative',
            'new_item'           => 'New Initiative',
            'view_item'          => 'View Initiative',
            'search_items'       => 'Search Initiative',
            'not_found'          => 'Nothing found in the Database.',
            'not_found_in_trash' => 'Nothing found in Trash',
            'parent_item_colon'  => ''
        ),
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'menu_position'       => 21,
        'menu_icon'           => 'dashicons-location-alt',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array(
            'title',
            'editor',
            'author',
            'revisions',
            'page-attributes',
            'thumbnail',
            'excerpt'
        ),
        'has_archive' => false,
        'rewrite'     => array(
            'slug' => 'pathways/initiatives'
        )
    );
    register_post_type( 'ncecf-actionmap',  $argsActionMapExpect );

    $argsActionmapExpectation = array(
        'labels' => array(
            'name'               => 'Expectations',
            'singular_name'      => 'Expectation',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Expectation',
            'edit'               => 'Edit',
            'edit_item'          => 'Edit Expectations',
            'new_item'           => 'New Expectation',
            'view_item'          => 'View Expectation',
            'search_items'       => 'Search Expectations',
            'not_found'          => 'Nothing found in the Database.',
            'not_found_in_trash' => 'Nothing found in Trash',
            'parent_item_colon'  => ''
        ),
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => 'edit.php?post_type=ncecf-actionmap',
        'show_in_nav_menus'   => true,
        //'menu_position' => 20,
        //'menu_icon' => 'dashicons-groups',
        'capability_type' => 'post',
        'hierarchical'    => false,
        'supports'        => array(
            'title',
            'editor',
            'revisions',
            'page-attributes',
            'thumbnail'
        ),
        'has_archive' => false,
        'rewrite'     => array(
            'slug' => 'pathways/expectations'
        )
    );
    register_post_type( 'ncecf-expectations', $argsActionmapExpectation );

    $argsActionmapStrategy = array(
        'labels' => array(
            'name'               => 'Strategies',
            'singular_name'      => 'Strategy',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Strategy',
            'edit'               => 'Edit',
            'edit_item'          => 'Edit Strategy',
            'new_item'           => 'New Strategy',
            'view_item'          => 'View Strategy',
            'search_items'       => 'Search Strategy',
            'not_found'          => 'Nothing found in the Database.',
            'not_found_in_trash' => 'Nothing found in Trash',
            'parent_item_colon'  => ''
        ),
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => 'edit.php?post_type=ncecf-actionmap',
        'show_in_nav_menus'   => false,
        //'menu_position' => 20,
        //'menu_icon' => 'dashicons-groups',
        'capability_type' => 'post',
        'hierarchical'    => false,
        'supports'        => array(
            'title',
            'editor',
            'revisions',
            'page-attributes',
            'thumbnail'
        ),
        'has_archive' => false,
        'rewrite'     => array(
            'slug' => 'pathways/strategies'
        )
    );
    register_post_type( 'ncecf-strategies', $argsActionmapStrategy );

    $argsActionmapActions = array(
        'labels' => array(
            'name'               => 'Actions',
            'singular_name'      => 'Action',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Action',
            'edit'               => 'Edit',
            'edit_item'          => 'Edit Action',
            'new_item'           => 'New Action',
            'view_item'          => 'View Action',
            'search_items'       => 'Search Actions',
            'not_found'          => 'Nothing found in the Database.',
            'not_found_in_trash' => 'Nothing found in Trash',
            'parent_item_colon'  => ''
        ),
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => 'edit.php?post_type=ncecf-actionmap',
        'show_in_nav_menus'   => true,
        //'menu_position' => 20,
        //'menu_icon' => 'dashicons-groups',
        'capability_type' => 'post',
        'hierarchical'    => false,
        'supports'        => array(
            'title',
            'editor',
            'revisions',
            'page-attributes',
            'thumbnail'
        ),
        'has_archive' => false,
        'rewrite'     => array(
            'slug' => 'pathways/actions'
        )
    );
    register_post_type( 'ncecf-actions', $argsActionmapActions );
}

add_action( 'init', __NAMESPACE__.'\\create_post_type' );

// Redirect all resources single templates to their actual resource
add_action( 'template_redirect', function() {
  if ( is_singular('ncecf-resource') ) {
    $id = get_the_id();
    $link = (get_field('uploaded_file', $id) == 1) ? wp_get_attachment_url(get_field('file', $id)) : get_field('link', $id);

    wp_redirect( $link, 301 );
    exit;
  }
});
