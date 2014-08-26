<?php

//get values from post
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$body = wordwrap(filter_var($_POST['body'], FILTER_SANITIZE_STRING ), 70);

//set to
$to = 'bob@derricowebsolutions.com';

//send email
if (!mail($to, $subject, 'Message from: ' . $name . '\n' . $body, 'From: ' . $email)) {
    ?>
    <h2>The e-mail was not sent.</h2>
    <p>Sorry about that.</p><br>
    <span class="pseudoLink" id="newEmail">Click to try again</span>
    <script>
        //Event listener for new email pseudolink
                $("#newEmail").click(function(){
                    $("#formResponse").html("");
                    $("#contactForm").show();
                });
        </script>
    <?php
} else {
    ?>
        <h2>Thank you!</h2>
        <p>You can expect a reply from me shortly</p>
        <span class="pseudoLink" id="newEmail">Send another message</span>
        <script>
            //Event listener for new email pseudolink
            $("#newEmail").click(function(){
                $("#formResponse").html("");
                $("#contactForm").show();
            });
        </script>
    <?php
}