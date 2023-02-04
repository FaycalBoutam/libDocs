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

 defined( 'ABSPATH' ) || exit;

 const PLUGIN_VERSION = '1.0.0';

if ( file_exists( dirname( __FILE__ ). '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ). '/vendor/autoload.php';
}

if ( class_exists( 'Src\\Setup' ) ) {
	Src\Setup::register_services();
}