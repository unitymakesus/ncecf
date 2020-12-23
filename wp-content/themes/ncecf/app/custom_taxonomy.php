<?php

namespace App;

function create_taxonomies() {

	$argsResourceType = array(
		'labels' => array(
			'name' => __( 'Resource Types' ),
			'singular_name' => __( 'Resource Type' )
		),
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'hierarchical' => true,
		'rewrite' => true
	);
	register_taxonomy('resource-type', 'ncecf-resource', $argsResourceType);

	$argsIssueCategories = array(
		'labels' => array(
			'name' => __( 'Issue Categories' ),
			'singular_name' => __( 'Issue Category' )
		),
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'hierarchical' => true,
		'rewrite' => true
	);
    register_taxonomy('issue-category', 'ncecf-issue', $argsIssueCategories);


    $argsActionmapExpectations = array(
        'labels' => array(
            'name'          => __( 'Expectation Assignment' ),
            'singular_name' => __( 'Expectation Assignment' )
        ),
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=ncecf-actionmap',
        'show_in_nav_menus'  => true,
        'hierarchical'       => true,
        'rewrite'            => true
    );
    register_taxonomy('ncecf-expectations-assignment', 'ncecf-expectations', $argsActionmapExpectations);

    $argsActionmapAction = array(
        'labels' => array(
            'name'          => __( 'Action Assignment' ),
            'singular_name' => __( 'Action Assignment' ),
            'menu_name'     => __( 'Action Assignment' )
        ),
        'publicly_queryable' => true,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=ncecf-actions',
        'show_admin_column'  => true,
        'show_in_nav_menus'  => true,
        'hierarchical'       => true,
        'rewrite'            => true
        // 'rewrite' => array( 'slug' => 'actions' ),
    );
    register_taxonomy('ncecf-action-assignment', 'ncecf-actions', $argsActionmapAction);
}

add_action( 'init', __NAMESPACE__.'\\create_taxonomies' );
