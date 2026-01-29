<?php
/*
Plugin Name: WDT Videos
Description: A Staging-ready plugin to add the "wfwe-videos" post type.
Author: Elev8 Web Studio
Version: 1.0.0
Requires PHP: 8.2
Author URI: https://www.wedatatools.com/
Text Domain: wdt
*/


add_action('init', function () {
	$postType = 'wfwe_video';
	$singularName = 'Video';
	$pluralName = 'Videos';
	$postSlug = 'wfwe-video';

	$labels = array(
		'name'                  => _x($pluralName, 'Post Type General Name', 'wdt'),
		'singular_name'         => _x($singularName, 'Post Type Singular Name', 'wdt'),
		'menu_name'             => __($pluralName, 'wdt'),
		'name_admin_bar'        => __($singularName, 'wdt'),
		'archives'              => __($singularName . ' Archives', 'wdt'),
		'attributes'            => __($singularName . ' Attributes', 'wdt'),
		'parent_item_colon'     => __('Parent ' . $singularName . ':', 'wdt'),
		'all_items'             => __('All ' . $pluralName, 'wdt'),
		'add_new_item'          => __('Add New ' . $singularName, 'wdt'),
		'add_new'               => __('Add New', 'wdt'),
		'new_item'              => __('New ' . $singularName, 'wdt'),
		'edit_item'             => __('Edit ' . $singularName, 'wdt'),
		'update_item'           => __('Update ' . $singularName, 'wdt'),
		'view_item'             => __('View ' . $singularName, 'wdt'),
		'view_items'            => __('View ' . $pluralName, 'wdt'),
		'search_items'          => __('Search ' . $singularName, 'wdt'),
		'not_found'             => __('Not found', 'wdt'),
		'not_found_in_trash'    => __('Not found in Trash', 'wdt'),
		'featured_image'        => __('Featured Image', 'wdt'),
		'set_featured_image'    => __('Set featured image', 'wdt'),
		'remove_featured_image' => __('Remove featured image', 'wdt'),
		'use_featured_image'    => __('Use as featured image', 'wdt'),
		'insert_into_item'      => __('Insert into item', 'wdt'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'wdt'),
		'items_list'            => __($pluralName . ' list', 'wdt'),
		'items_list_navigation' => __($pluralName . ' list navigation', 'wdt'),
		'filter_items_list'     => __('Filter items list', 'wdt'),
	);

	$rewrite = array(
		'slug'                  => $postSlug,
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);

	$capabilities = array(
		'read_private_posts' => 'read_private_posts', // Primitive capability
		'read_post' => 'read',
		'edit_post' => 'edit_posts',
		'delete_post' => 'delete_posts',
	);

	$args = array(
		'label'                 => __($singularName, 'wdt'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'revisions', 'thumbnail', 'author'),
		'taxonomies'            => array('post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'map_meta_cap'			=> false,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rest_base'             => 'wdt-videos',
		'capabilities'			=> $capabilities,
	);
	register_post_type($postType, $args);
});
