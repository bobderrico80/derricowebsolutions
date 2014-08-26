<?php 
//MySQL connection variables
$hostname = 'localhost';
$user = ini_get('mysqli.default_user');
$pw = ini_get('mysqli.default_pw');
$database = 'rhytxfpd_landingpage';

//Connect to database
try {
    $db = new PDO('mysql:host=' . $hostname . ';dbname=' . $database,$user,$pw);
} catch(PDOException $e) {
    echo $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>D'Errico Web Solutions</title>
        <meta name="viewport" content="width=device-width"/>
        <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="favicon.png"/>
    </head>
    <body>
        <div id="header">
            <h1><a href="index.php" id="home">D'Errico Web Solutions</a></h1>
            <ul id="navbar">
                <li><a href="projects.php" id="projects">Projects</a></li>
                <li><a href="skills.php" id="skills">Skills</a></li>
                <li><a href="about.php" id="about">About</a></li>
                <li><a href="contact.php" id="contact">Contact</a></li>
            </ul>
        </div>
        
        <div id="contentWrapper">
            <div id="contentAbout" class="pageSection" style="display: block">
                <h1>About</h1>
                <div class="figure">
                    <?php
                        $rstUser = $db->query('SELECT userName, userTitle FROM users WHERE userID = 2');
                        while ($row = $rstUser->fetch()) {
                    ?>
                    <img src="img/me.jpg" id="myPic" alt="Picture of <?php echo $row[0]; ?>"/>
                    <p><strong><?php echo $row[0]; ?></strong><br>
                        <?php echo $row[1]; ?>
                    </p>    
                    <?php
                        } //end while
                    ?>
                </div>
                <?php
                    //Get About content from cms table
                    $rstAbout = $db->query('SELECT cmsContent from cms WHERE cmsID = 2');
                    while ($rowAbout = $rstAbout->fetch()) {
                        echo '<p>' . preg_replace('/\r\n/', '</p><p>', $rowAbout[0]) . '</p>';
                    }
                ?>
            </div>
        </div>
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> D'Errico Web Solutions</p>
        </div>
    </body>
</html>
