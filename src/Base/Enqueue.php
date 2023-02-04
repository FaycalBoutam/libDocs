<?php
namespace Src\Base;

use Src\Base\Controller;

class Enqueue extends Controller
{
    public function register()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ], 999 );
    }

    /**
	 * Enqueue styles & scripts
	 */
    function enqueue()
    {
        wp_enqueue_style( 'lib-docs', $this->plugin_url . '/assets/css/style.css', $this->plugin_version );
        wp_enqueue_script( 'lib-docs', $this->plugin_url . '/assets/js/main.js', array('dataTables'), $this->plugin_version );
        wp_enqueue_style( 'dataTables', 'https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css', $this->plugin_version );
        wp_enqueue_script( 'dataTables', 'https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js', array('jquery'), $this->plugin_version );
    }
}