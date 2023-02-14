<?php 
/**
* @see https://codex.wordpress.org/Function_Reference/register_taxonomy
*/

add_action( 'init', 'product_category', 20 );

function product_category() {
	$labels = array(
		'name'                       => _x( 'Product Category'				, 'dvg' ),
		'singular_name'              => _x( 'Product Category'				, 'dvg' ),
		'menu_name'                  => __( 'Product Category'				, 'dvg' ),
		'all_items'                  => __( 'All items'						, 'dvg' ),
		'parent_item'                => __( 'Parent item'					, 'dvg' ),
		'parent_item_colon'          => __( 'Parent item:'					, 'dvg' ),
		'new_item_name'              => __( 'New item'						, 'dvg' ),
		'add_new_item'               => __( 'Add New item'					, 'dvg' ),
		'edit_item'                  => __( 'Edit item'						, 'dvg' ),
		'update_item'                => __( 'Update item'					, 'dvg' ),
		'view_item'                  => __( 'View item'						, 'dvg' ),
		'separate_items_with_commas' => __( 'Separate items with commas'	, 'dvg' ),
		'add_or_remove_items'        => __( 'Add or remove items'			, 'dvg' ),
		'choose_from_most_used'      => __( 'Choose from the most used'		, 'dvg' ),
		'popular_items'              => __( 'Popular items'					, 'dvg' ),
		'search_items'               => __( 'Search item'					, 'dvg' ),
		'not_found'                  => __( 'Not Found'						, 'dvg' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'product_category', [ 'products' ],  $args );
}