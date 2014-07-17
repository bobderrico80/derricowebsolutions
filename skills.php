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
        <title>D'Errico Web Design</title>
        <meta name="viewport" content="width=device-width"/>
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
            <div id="contentSkills" class="pageSection" style="display: block">
                <h1>Skills</h1>
                <ul>
                    <?php
                        $rstSkills = $db->query('SELECT cmsContent from cms WHERE cmsID = 3');
                        while ($rowSkills = $rstSkills->fetch()) {
                            echo '<li>' . preg_replace('/\r\n/', '</li><li>', $rowSkills[0]) . '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> D'Errico Web Design</p>
        </div>
    </body>
</html>
