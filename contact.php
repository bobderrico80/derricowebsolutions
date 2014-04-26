<!DOCTYPE html>
<html>
	<head>
		<title>D'Errico Web Design - Custom Websites for Small Businesses, Organizations, and Individuals</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
		<link rel="icon" type="image/png" href="img/favicon.png"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<img src="img/banner.png"/>
			</div>
			<div id="navbarContainer">
				<div id="navbar">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="spacer"></li>
						<li><a href="about.html">About</a></li>
						<li class="spacer"></li>
						<li><a href="projects.html">Current Projects</a></li>
						<li class="spacer"></li>
						<li><a href="contact.php" class="current">Contact</a></li>
					</ul>
				</div>
			</div>
			<div id="content">
												
				<?php
					//display form if user has not clicked submit
					if (!isset($_POST["submit"])) {
						?>
						<h1 class="noBottomMargin">Contact D'Errico Web Design</h1>
						<p class="required">* - required fields</p>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<span class="spaced">E-Mail Address:</span><input type="text" name="from" id="from"><span class="required" id="fromErr">*</span><br>
						<span class="spaced">Name:</span><input type="text" name="name" id="name"><span class="required" id="nameErr">*</span><br><br>
						Message: <span class="required" id="messageErr">*</span><br>
						<textarea rows="20" cols="80" name="message" id="message"></textarea><br>
						<input type="submit" name="submit" id="submit" value="Send Message" disabled>
						</form>
						<?php
					} else { //user has submitted the form
						$from = spamcheck($_POST["from"]);
						$subject = "[DerricoWebDesign] New Message from " . $_POST["name"];
						$message = $_POST["message"];
						$message = wordwrap($message, 70);
						//send mail
						mail("bob@derricowebdesign.com", $subject, $message, "From: $from\n");
						?>
						<h1 class="noBottomMargin">Thank You!</h1>
						<p>Your message has been sent.  You should expect to hear from us within 24 hours.
						
						<p><a href="contact.php">Send Another Message</a> | <a href="index.html">Return Home</a></p>
						<?php
						}
				?>
				
				<?php 
					function spamcheck($field) {
						//sanitize e-mail address
						$field = filter_var($field, FILTER_SANITIZE_EMAIL);
						return $field;
					}
				?>
			</div>
			<div id="footer">
				<p>Copyright &copy 2014 D'Errico Web Design</p>
			</div>
			
			<script>
				//functions for validating form fields
				//variables for determining which fields have been properly completed
				var fromFlag = false;
				var nameFlag = false;
				var messageFlag = false;
				
				//on from field blur
				$("#from").blur(function() {
					//checks if from field is completed
					if ($("#from").val() == "") {
						$("#fromErr").text("* Email field must be completed"); 
						fromFlag = false;
					} else {
						$("#fromErr").text("*");
						fromFlag = true;
					}
					
					//checks if from field is properly formatted
					var regexEmail = /\b[a-z0-9.-_%+]+@[a-z0-9.-]+\.[a-z]{2,4}\b/i;
					var from = $("#from").val();
					if (!regexEmail.test(from)) {
						$("#fromErr").text("* Email address is not valid");
						fromFlag = false;
					} else {
						$("#fromErr").text("*");
						fromFlag = true;
					}
					
					checkSubmit();
				});
				
				//on name field blur
				$("#name").blur (function() {
					//checks if the subject field is completed
					if ($("#name").val() == "") {
						$("#nameErr").text("* Please enter your name");
						subjectFlag = false;
					} else {
						$("#nameErr").text("*");
						nameFlag = true;
					}
					
					checkSubmit();
				});
				
				//on message field keyup
				$("#message").keyup (function() {
					//checks if the message field is completed
					if ($("#message").val() == "") {
						$("#messageErr").text("* Please enter a message");
						messageFlag = false;
					} else {
						$("#messageErr").text("*");
						messageFlag = true;
					}
					
					checkSubmit();
				});
				
				//function to check the status of flags and enable submit button if all are true.
				function checkSubmit() {
					if (fromFlag && nameFlag && messageFlag) {
						$("#submit").removeAttr("disabled");
					} else {
						$("#submit").attr("disabled","true");
					}
				}
			</script>
			
		</div>
	</body>
</html>