<?php
namespace Src\Base;

class CPT
{
    public function register()
    {
        add_action( 'init', [ $this, 'cpt' ], 15 );
    }

    /**
	 * Creates the custom post type: Document
	 */
    public static function cpt()
    {
        $labels = array(
            'name'                  => _x( 'Documents', 'Post type general name', 'library-docs' ),
            'singular_name'         => _x( 'Document', 'Post type singular name', 'library-docs' ),
            'menu_name'             => _x( 'Documents', 'Admin Menu text', 'library-docs' ),
            'name_admin_bar'        => _x( 'Document', 'Add New on Toolbar', 'library-docs' ),
            'add_new'               => __( 'Add New', 'library-docs' ),
            'add_new_item'          => __( 'Add New Document', 'library-docs' ),
            'new_item'              => __( 'New Document', 'library-docs' ),
            'edit_item'             => __( 'Edit Document', 'library-docs' ),
            'view_item'             => __( 'View Document', 'library-docs' ),
            'all_items'             => __( 'All Documents', 'library-docs' ),
            'search_items'          => __( 'Search Documents', 'library-docs' ),
            'parent_item_colon'     => __( 'Parent Documents:', 'library-docs' ),
            'not_found'             => __( 'No documents found.', 'library-docs' ),
            'not_found_in_trash'    => __( 'No documents found in Trash.', 'library-docs' ),
            'featured_image'        => _x( 'Document Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'library-docs' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'library-docs' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'library-docs' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'library-docs' ),
            'archives'              => _x( 'Document archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'library-docs' ),
            'insert_into_item'      => _x( 'Insert into document', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'library-docs' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this document', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'library-docs' ),
            'filter_items_list'     => _x( 'Filter documents list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'library-docs' ),
            'items_list_navigation' => _x( 'Documents list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'library-docs' ),
            'items_list'            => _x( 'Documents list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'library-docs' ),
        );
    
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'document' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            'taxonomies'         => [ 'category' ],
        );
    
        register_post_type( 'document', $args );
    }
}