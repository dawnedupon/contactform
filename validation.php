<? 

$error = "";
$success = "";

if ($_POST) {	
	
	if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
		$error .= "<p>Please enter a valid email address.</p>";
	}
	
	if (!$_POST["email"]) {
		$error .= "<p>An email address is required.</p>";
	}
	
	if (!$_POST["subject"]) {
		$error .= "<p>A subject is required.</p>";
	}
	
	if (!$_POST["content"]) {
		$error .= "<p>A message is required.</p>";
	}
	
	if ($error != "") {
		$error = $error;
	} else {
		$emailTo = "";
		$subject = $_POST["subject"];
		$content = $_POST["content"];
		$headers = "From: " . $_POST["email"];
		if (mail($emailTo, $subject, $content, $headers)) {
			$error = "";
			$success = "<p>Message successfully sent! We\'ll get back to you as soon as possible.</p>";
		} else {
			$error = "<p>There was an error in sending the message. Please try again.</p>";
		}
	}

}; 

?>