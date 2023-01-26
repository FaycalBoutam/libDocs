<?php
namespace Src\Base;

use Src\Base\CPT;
use Src\Base\Controller;

class Activate extends Controller
{
    public function register()
    {
        register_activation_hook( $this->plugin, [ $this, 'activate' ]);
    }

    /**
	 * Plugin has just being activated
	 */
    function activate()
    {
        CPT::cpt();

        flush_rewrite_rules();
    }
}