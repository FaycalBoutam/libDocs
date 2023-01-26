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
		register_post_type( 'document', [ 'public' => true, 'label' => __( 'Documents', 'library-docs' ) ]);
    }
}