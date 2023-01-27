<?php

namespace Src\Base;

defined( 'ABSPATH' ) || exit;

class Shortcode
{
    public function register()
    {
        add_shortcode( 'lib_docs', [ $this, 'do_shortcode_output' ] );
    }

    /**
	 * Shortcode HTML
	 */
    function do_shortcode_output()
    {
        $the_query = new \WP_Query( array(
            'post_type' => 'document',
            ),
        );

        if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '<p>' . get_the_title() . '</p>';
          }
        }
    
        wp_reset_query();
    }
}