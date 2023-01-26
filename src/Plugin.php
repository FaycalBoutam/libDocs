<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class LibraryDocs
{
    /**
	 * Registers the plugin with WordPress
	 */
	public function register()
    {
		add_action( 'init', [ $this, 'cpt' ], 15 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ], 20 );
	}

	/**
	 * Enqueue styles & scripts
	 */
    function enqueue()
    {
        wp_enqueue_style( 'lib-docs', plugins_url('/assets/css/style.css'), PLUGIN_FILE );
    }

	/**
	 * Happens upon plugin activation
	 */
    function activate()
    {
        $this->cpt();

        flush_rewrite_rules();
    }

	/**
	 * Happens upon plugin deactivation
	 */
    function deactivate()
    {
        flush_rewrite_rules();
    }

    /**
	 * Creates the custom post type: Document
	 */
    function cpt()
    {
		register_post_type( 'document', [ 'public' => true, 'label' => __( 'Documents', 'library-docs' ) ]);
    }

    /**
	 * Flushes rewrite rules
	 */
	public function flush_rewrite_rules()
    {
		flush_rewrite_rules();
	}
}

if ( class_exists( 'LibraryDocs' ) ) {
	$libraryDocs = new LibraryDocs();
	$libraryDocs->register();
}

register_activation_hook( PLUGIN_FILE, [ $libraryDocs, 'activate' ]);

register_deactivation_hook( PLUGIN_FILE, [ $libraryDocs, 'deactivate' ]);
