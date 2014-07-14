<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //get values from post
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $body = wordwrap(filter_var($_POST['body'], FILTER_SANITIZE_STRING ), 70);
    
    //set initial error flag state
    $errFlag = false;
    
    //validate values from post
    if($name == '') {
        $errFlag = true;
        $nameWarning = 'Name required';
    }
    
    if($email == '' || preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i', $email) == 0) {
        $errFlag = true;
        $emailWarning = 'Invalid E-mail';
    }

    //set to
    $to = 'bob@derricowebdesign.com';

    //send email
    if (!$errFlag) {
        mail($to, $subject, 'Message from: ' . $name . '\n' . $body, 'From: ' . $email);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>D'Errico Web Design</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="favicon.png"/>
    </head>
    <body>
        <div id="header">
            <h1><a href="index.php" id="home">D'Errico Web Design</a></h1>
            <ul id="navbar">
                <li><a href="projects.php" id="projects">Projects</a></li>
                <li><a href="skills.php" id="skills">Skills</a></li>
                <li><a href="about.php" id="about">About</a></li>
                <li><a href="contact.php" id="contact">Contact</a></li>
            </ul>
        </div>
        
        <div id="contentWrapper">
            <div id="contentContact" class="pageSection" style="display: block">
                <h1>Contact</h1>
                <?php if(($_SERVER['REQUEST_METHOD'] == 'POST') && (!$errFlag)) {
                ?>
                <div id="formResponse">
                    <h2>Thank you!</h2>
                    <p>You can expect a reply from me shortly</p>
                    <a href="contact.php">Send another message</a>
                </div>
                <?php } else { ?>
                <form id="contactForm" method="post" action="contact.php">
                    <label for="name">Name:</label><input type="text" id="name" name="name" value="<?php echo $name;?>"/><span class="warning" id="nameWarning">* <?php echo $nameWarning;?></span><br>
                    <label for="email">E-Mail Address:</label><input type="text" id="email" name="email" value="<?php echo $email; ?>"/><span class="warning" id="emailWarning">* <?php echo $emailWarning;?></span><br>
                    <label for="subject">Subject:</label><input type="text" id="subject" name="subject" value="<?php echo $subject; ?>"/><br>
                    <label for="body">Compose your message below:</label><br>
                    <textarea name="body" id="body"><?php echo $body; ?></textarea><br>
                    <div id="buttonContainer">
                        <p style="display:inline; padding-right:20px">* - Required</p><input type="submit" id="submit" value="Send Email"/>
                    </div>
                </form>
                <?php } //end if ?>
            </div>
        </div>
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> D'Errico Web Design</p>
        </div>
    </body>
</html>
