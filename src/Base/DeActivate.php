<?php
namespace Src\Base;

use Src\Base\Controller;

class DeActivate extends Controller
{
    public function register()
    {
        register_deactivation_hook( $this->plugin, [ $this, 'deactivate' ]);
    }

    /**
	 * Plugin has just being deactivated
	 */
    function deactivate()
    {
        flush_rewrite_rules();
    }
}