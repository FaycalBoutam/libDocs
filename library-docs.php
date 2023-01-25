<?php
/**
 * Plugin Name:     Library Docs
 * Plugin URI:      https://faycalboutam.com/
 * Description:     Create, list and search through documents.
 * Version:         1.0.0
 * Author:          Faycal Boutam
 * Author URI:      https://faycalboutam.com
 * Text Domain:     library-docs
 * Domain Path:     /languages
 *
 *
 * License:         GNU General Public License v3.0
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.html
 */

// Prevents direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// const PLUGIN_VERSION = '1.0.0';
const PLUGIN_FILE    = __FILE__;


class LibraryDocs
{
    function activate()
    {
        // create the CPT
        // flash rewrite rules
    }

    function deactivate()
    {
        // flash rewrite rules
    }
}

if ( class_exists('LibraryDocs')) {
    $libraryDocs = new LibraryDocs();
}

register_activation_hook( PLUGIN_FILE, array( $libraryDocs, 'activate' ));
register_deactivation_hook( PLUGIN_FILE, array( $libraryDocs, 'deactivate' ));