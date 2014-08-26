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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
            <div id="contentProjects" class="pageSection" style="display:block">
                <div id="thumbGrid">
                    <h1>Projects</h1>
                    <p>Click on an image below to view more information about each project.</p>
                    <?php 
                        $rst = $db->query('SELECT projectImgURL, projectID, projectTitle FROM projects ORDER BY projectID');
                        while ($row = $rst->fetch()) {
                            echo '<a href="projectDisp.php?id=' . $row[1] . '">';
                            echo '<img src="thumbs/' . $row[0] . '" id="' . $row[1] . '" alt="' . $row[2] . '" title="' . $row[2] . '" class="projGal"/>';
                            echo '</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> D'Errico Web Solutions</p>
        </div>
    </body>
</html>
