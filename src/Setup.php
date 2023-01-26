<?php
namespace Src;

use Src\Base\CPT;
use Src\Base\Enqueue;
use Src\Base\Activate;
use Src\Base\DeActivate;
use Src\Options\Options;

final class Setup
{
	/**
	 * Get classes
	 */
	public static function get_services()
    {
		return [
			Options::class,
			Activate::class,
			DeActivate::class,
			CPT::class,
			Enqueue::class,
		];
	}

	/**
	 * Initialize classes
	 */
	public static function register_services()
    {
		foreach ( self::get_services() as $class ) {
			$service = self::insantiate( $class );

			// Call register method if exists
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Create class instance
	 */
	public static function insantiate( $class )
    {
		$service = new $class();

		return $service;
	}
}