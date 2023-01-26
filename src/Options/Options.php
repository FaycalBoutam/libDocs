<?php
namespace Src\Options;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Src\Base\Controller;

class Options extends Controller
{
    public function register()
    {
        add_action( 'after_setup_theme', [ $this, 'crb_load' ]);
        add_action( 'carbon_fields_register_fields', [ $this, 'crb_attach_theme_options' ]);
    }

    public function crb_load() {
        \Carbon_Fields\Carbon_Fields::boot();
    }

    public function crb_attach_theme_options()
    {
        Container::make( 'theme_options', __( 'Library Docs' ) )
            ->add_fields( array(
                Field::make( 'text', 'crb_facebook_url', __( 'Facebook URL' ) ),
                Field::make( 'textarea', 'crb_footer_text', __( 'Footer Text' ) )
            ) );
    }
}