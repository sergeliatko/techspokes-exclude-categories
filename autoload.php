<?php

/**
 * PSR-4 Autoloader.
 */
spl_autoload_register( function ( $class ) {

	// validate namespace
	if (
		strncmp(
			$namespace = 'TechSpokes\\ExcludeCategories',#namespace
			$class,
			$namespace_length = strlen( $namespace )
		) !== 0
	) {
		return;
	};

	// try to load the file
	if ( file_exists(
		$file = join(
			        DIRECTORY_SEPARATOR,
			        array(
				        __DIR__,
				        'src',#sources directory name
				        str_replace( '\\', DIRECTORY_SEPARATOR, trim( substr( $class, $namespace_length ), '\\' ) )
			        )
		        ) . '.php'
	) ) {
		include $file;
	}
} );
