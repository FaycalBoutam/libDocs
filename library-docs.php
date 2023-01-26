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
if ( ! defined( 'ABSPATH' ) ) { exit; }

const PLUGIN_VERSION = '1.0.0';
const PLUGIN_FILE    = __FILE__;

// define plugin path constant
if ( ! defined( 'LibraryDocs_PATH' ) ) {
	define( 'LibraryDocs_PATH', plugin_dir_path( PLUGIN_FILE ) );
}

// Require plugin main class
require_once( LibraryDocs_PATH . 'src/Plugin.php' );
