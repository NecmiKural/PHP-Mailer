<?php


// Get the contents of the JSON file 
$json = file_get_contents("gfg.json");



// $json  = '[{"var1":"necmi.k@nistgrup.com","var2":"mert.y@nistgrup.com"}]';

$array = json_decode($json, true);


foreach ($array as $key => $jsons) { // This will search in the 2 jsons
     foreach($jsons as $key => $value) {
         foreach($value as $key => $item) {
         

        $address = $item;


        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

		$error = false;
		$fields = array( 'contact-name', 'contact-email', 'contact-phone', 'your-message', 'contact-address' );

		foreach ( $fields as $field ) {
			if ( empty($_POST[$field]) || trim($_POST[$field]) == '' )
				$error = true;
		}

		if ( !$error ) {

			$name = stripslashes($_POST['contact-name']);
			$email = trim($_POST['contact-email']);
			$phone = stripslashes($_POST['contact-phone']);		
			$message = stripslashes($_POST['your-message']);
			$adress = stripslashes($_POST['contact-address']);
			
			$e_phone = 'You\'ve been contacted by ' . $name . '.';

			// Configuration option.
			// You can change this if you feel that you need to.
			// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

			$e_body = "You have been contacted by: $name" . PHP_EOL . PHP_EOL;
			$e_reply = "E-mail: $email" . PHP_EOL;
			$e_phone = "\rphone: $phone" . PHP_EOL;	
			$e_adress = "\rAdress: $adress" . PHP_EOL;	
			$e_content = "\rMessage:\r\n$message" . PHP_EOL . PHP_EOL;

			$msg = wordwrap( $e_body . $e_reply .$e_phone .$e_adress .$e_content, 70 );

			$headers = "From: $email" . PHP_EOL;
			$headers .= "Reply-To: $email" . PHP_EOL;
			$headers .= "MIME-Version: 1.0" . PHP_EOL;
			$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
			$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

			if(mail($address, $e_phone, $msg, $headers)) {

				// Email has sent successfully, echo a success page.

				echo 'Success';

			} else {

				echo 'Mailer Error: ' . $error; /*$mail->ErrorInfo*/

			}

		}

    }
}
}

?>