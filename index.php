<? include("validation.php"); ?>
<html>
	<head>
		<title>Contact Form with jQuery and PHP Validation</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	</head>
	<body>
		<div class="container">
			
			<h2>Contact Us</h2>
			<div id="errorMessage"><? echo $error; ?></div>
			<div id="successMessage"><? echo $success; ?></div>
			
			<form method="post">
				<div class="form-elem">
					<label for="email">Your Email</label>
					<input type="text" id="email" name="email" placeholder="Email">
				</div>
				<div class="form-elem">
					<label for="subject">Subject</label>
					<input type="text" id="subject" name="subject" placeholder="Subject">
				</div>
				<div class="form-elem">
					<label for="content">Your Message</label>
					<textarea id="content" name="content" rows="8"></textarea>
				</div>
				<div class="form-elem">
					<input type="submit" id="submit" name="submit" value="Sign Up">
				</div>
			</form>
		</div>
		
		<script type="text/javascript">
			//Email Validation
			function isEmail(email) {
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return regex.test(email);
			}
			
			$("form").submit(function(e) {
				
				var error ="";
				
				if ($("#email").val() == "") {
					error += "<p>An email is required.</p>";
				} else if (isEmail($("#email").val()) == false) {
					error += "<p>Please enter a valid email address.</p>";
				}
				
				if ($("#subject").val() == "") {
					error += "<p>A subject is required.</p>";
				}
				
				if ($("#content").val() == "") {
					error += "<p>A message is required.</p>";
				}
				
				if (error != "") {
					$("#errorMessage").html(error);
					return false;
				} else {
					$("#errorMessage").html("");
					return true;
				}
				
			});
			
		</script>
	</body>
</html>