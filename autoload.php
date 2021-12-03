<?php

spl_autoload_register(
	function ( $class ) {

		// project-specific namespace prefix
        $prefix = 'DIGITAL_MENU_BOARD\\';

		// base directory for the namespace prefix
        $base_dir = DIGITAL_MENU_BOARD_PLUGIN_PATH . '/';

		// does the class use the namespace prefix?
        $len = strlen( $prefix );
        if ( strncmp( $prefix, $class, $len ) !== 0 ) {
        	// no, move to the next registered autoloader
            return;
        }

		// get the relative class name
        $relative_class = substr( $class, $len );
		
		/*
			replace the namespace prefix with the base directory, replace namespace
			 separators with directory separators in the relative class name, append
			 with .php. */
			
		/* check file has classes file then perform below action */
		if (strpos($relative_class, "Classes") === 0) {
			$relative_class = strtolower(str_replace('_', '-', $relative_class));
			$relative_class = lreplace('\\', '\\class-', $relative_class);
		}

		/* check file has Includes file then perform below action */
		if (strpos($relative_class, "Includes") === 0) {
			$trait_class = explode("\\", $relative_class);
			$relative_class = strtolower(substr($relative_class, 0, strrpos($relative_class, '\\'))) . '\\' . end($trait_class);
		}
		
		$file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';
		
		// if the file exists, require it
        if ( file_exists( $file ) ) {
			require $file;
		}

	}
);

function lreplace($search, $replace, $subject) {
    $pos = strrpos($subject, $search);
    if($pos !== false){
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}