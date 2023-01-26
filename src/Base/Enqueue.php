<?php
namespace Src\Base;

use Src\Base\Controller;

class Enqueue extends Controller
{
    public function register()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ], 20 );
    }

    /**
	 * Enqueue styles & scripts
	 */
    function enqueue()
    {
        wp_enqueue_style( 'lib-docs', $this->plugin_url . '/assets/css/style.css', $this->plugin );
    }
}