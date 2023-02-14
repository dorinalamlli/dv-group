<?php
/**
* @see https://codex.wordpress.org/Function_Reference/register_post_type
*/
add_action( 'init', 'news', 20 );

function news() {
	register_post_type( 'news', array(
		    'labels'              => array(
			'name'                => __( 'News' 	  	    	  , 'dvg' ),
			'singular_name'       => __( 'News'		 	  	      , 'dvg' ),
			'all_items'           => __( 'All items'  	 		  , 'dvg' ),
			'new_item'            => __( 'New item'				  , 'dvg' ),
			'add_new'             => __( 'Add New'				  , 'dvg' ),
			'add_new_item'        => __( 'Add New item'			  , 'dvg' ),
			'edit_item'           => __( 'Edit item'			  , 'dvg' ),
			'view_item'           => __( 'View item'			  , 'dvg' ),
			'search_items'        => __( 'Search items'			  , 'dvg' ),
			'not_found'           => __( 'No item found'		  , 'dvg' ),
			'not_found_in_trash'  => __( 'No item found in trash' , 'dvg' ),
			'parent_item_colon'   => __( 'Parent item'			  , 'dvg' ),
			'menu_name'           => __( 'News'		  	  	      , 'dvg' ),
		),
		'public'            => true,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => false,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'   => 'dashicons-format-aside',
	) );
}