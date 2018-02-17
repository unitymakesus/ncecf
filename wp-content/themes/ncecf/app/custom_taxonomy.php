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
		'hierarchical' => false,
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
		'hierarchical' => false,
		'rewrite' => true
	);
	register_taxonomy('issue-category', 'ncecf-issue', $argsIssueCategories);

}

add_action( 'init', __NAMESPACE__.'\\create_taxonomies' );
