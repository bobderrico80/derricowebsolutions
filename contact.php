<!DOCTYPE html>
<html>
	<head>
		<title>D'Errico Web Design - Custom Websites for Small Businesses, Organizations, and Individuals</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
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
				
							
				<h1>Contact D'Errico Web Design</h1>
				<p class="required">* - required fields</p>
				
				<?php
					//display form if user has not clicked submit
					if (!isset($_POST["submit"])) {
						?>
						
						
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						From: <input type="text" name="from" id="from"><span class="required" id="fromErr">*</span><br>
						Subject: <input type="text" name="subject" id="subject"><span class="required" id="subjectErr">*</span><br>
						Message: <textarea rows="10" cols="40" name="message" id="message"></textarea><span class="required" id="messageErr">*</span><br>
						<input type="submit" name="submit" id="submit" value="Submit Feedback" disabled>
						</form>
						<?php
					} else { //user has submitted the form
						//check if the "from" input field is filled out
						if (isset($_POST["from"])) {
							$from = spamcheck($_POST["from"]);
							$subject = $_POST["subject"];
							$message = $_POST["message"];
							$message = wordwrap($message, 70);
							//send mail
							mail("bob@derricowebdesign.com", $subject, $message, "From: $from\n");
							echo "Thank you for sending us feedback";
							}
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
				var subjectFlag = false;
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
					var regexEmail = new RegExp("\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b","i");
					var from = $("#from").val();
					if (!regexEmail.test(from)) {
						$("#fromErr").text("* Email address is not valid");
						fromFlag = false;
					} else {
						$("#fromErr").text("*");
						fromFlag = true;
					}
					
					//checks status of flags and enables submit button if all are true.
					if (fromFlag && subjectFlag && messageFlag) {
						$("#submit").attr("disabled","false");
					}
				});
				
				//on subject field blur
				$("#subject").blur (function() {
					//checks if the subject field is completed
					if ($("#subject").val() == "") {
						$("#subjectErr").text("* Subject field must be completed");
						subjectFlag = false;
					} else {
						$("#subjectErr").text("*");
						subjectFlag = true;
					}
					
					//checks status of flags and enables submit button if all are true.
					if (fromFlag && subjectFlag && messageFlag) {
						$("#submit").attr("disabled","false");
					}
				});
				
				//on message field blur
				$("#message").blur (function() {
					//checks if the message field is completed
					if ($("#message").val() == "") {
						$("#messageErr").text("* Message field must be completed");
						messageFlag = false;
					} else {
						$("#messageErr").text("*");
						messageFlag = true;
					}
					
					//checks status of flags and enables submit button if all are true.
					if (fromFlag && subjectFlag && messageFlag) {
						$("#submit").attr("disabled","false");
					}
				});
			</script>
			
		</div>
	</body>
</html>