<?php

if( isset( $_POST[ 'Submit' ]  ) ) {
	// Get input
	$target = $_REQUEST[ 'ip' ];

	// Validar que sea una IP real antes de tocar el shell
	if( filter_var( $target, FILTER_VALIDATE_IP ) ) {
		// Escapar por si acaso
		$target = escapeshellarg( $target );

		if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
			$cmd = shell_exec( 'ping ' . $target );
		}
		else {
			$cmd = shell_exec( 'ping -c 4 ' . $target );
		}

		$html .= "<pre>{$cmd}</pre>";
	}
	else {
		$html .= '<pre>Entrada invalida. Ingrese una direccion IP valida.</pre>';
	}
}

?>