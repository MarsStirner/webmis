<?php
	function proxy_url ($url) {
		set_time_limit(120);

		$ch = curl_init( $url );


		$cookie = array();
		foreach ( $_COOKIE as $key => $value ) {
			$cookie[] = $key . '=' . $value;
		}
		$cookie = implode( '; ', $cookie );


		if ( strtolower($_SERVER['REQUEST_METHOD']) == 'post' ) {
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, file_get_contents('php://input') );
		}
		if ( strtolower($_SERVER['REQUEST_METHOD']) == 'put' ) {
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, file_get_contents('php://input') );
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		}

		if ( strtolower($_SERVER['REQUEST_METHOD']) == 'delete' ) {
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, file_get_contents('php://input') );
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		}

		curl_setopt( $ch, CURLOPT_COOKIE, $cookie );

		$headers = array();
		foreach ( getallheaders() as $key => $value ) {
			$headers[] = $key . ': ' . $value;
		}

		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );

		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
		curl_setopt( $ch, CURLOPT_HEADER, true );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

		curl_setopt( $ch, CURLOPT_USERAGENT, !empty($_GET['user_agent']) ? $_GET['user_agent'] : $_SERVER['HTTP_USER_AGENT'] );

		curl_setopt( $ch, CURLOPT_TIMEOUT, 120 );


		$result = curl_exec($ch);
		$curl_info = curl_getinfo($ch);

		if ( $result ) {
			$header_size = $curl_info["header_size"];
			$headers = substr($result, 0, $header_size);
			$contents = substr($result, $header_size);

			$header_text = preg_split( '/[\r\n]+/', $headers );
			foreach ( $header_text as $header ) {
				if (strlen($header) == 0) {
					continue;
				}
				// Необъяснимая 500 ошибка на продакшне, при попытке выставить Transfer-Encoding
				if (!preg_match('/^(?:Transfer-Encoding):/i', $header)) {
					header($header);
				}

//				if ( preg_match( '/^(?:Content-Type|Content-Encoding|Content-Language|Set-Cookie):/i', $header ) ) {
//					header( $header );
//				}
			}

			echo $contents;
		}else {
			echo "Сервер недоступен";
		}

		curl_close( $ch );
	}

	//proxy_url("http://test.localhost".$_SERVER["REQUEST_URI"]);
	if ( preg_match("/^\\/data\\/(auth|roles)\\//", $_SERVER["REQUEST_URI"]) ) {
		proxy_url("http://10.1.2.106:8080/tmis-ws-medipad/rest/tms-auth/".preg_replace("/^\\/data\\//", "", $_SERVER["REQUEST_URI"]));
	}else {
		proxy_url("http://10.1.2.106:8080/tmis-ws-medipad/rest/tms-registry/".preg_replace("/^\\/data\\//", "", $_SERVER["REQUEST_URI"]));
	}

?>
