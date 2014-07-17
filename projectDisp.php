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
            <div id="contentProjects" class="pageSection" style="display: block; text-align:center">
                <div id="projDisplay" style="display: inline-block; position:relative; top:0px; left:0px; width:80%">
                    <?php
                        //Lookup selected ID
                        $stmt = $db->prepare('SELECT * FROM projects WHERE projectID = ?');
                        $stmt->bindParam(1, $_GET['id']);
                        $stmt->execute();
                        $row = $stmt->fetch()
                    ?>
                    <h2 id="projTitle"><?php echo $row['projectTitle'];?></h2>
                    <a href="<?php echo $row['projectURL'];?>" target="_blank">
                        <img src="thumbs/<?php echo $row['projectImgURL'];?>" id="projImg" title="<?php echo $row['projectTitle'];?>" alt="<?php echo $row['projectTitle'];?>"/>
                    </a>
                    <p id="projLink">
                        <a href="<?php echo $row['projectURL'];?>" target="_blank">
                            <?php echo $row['projectDispURL'];?>
                        </a>
                    </p>
                    <p id="projSkills">Skills: <?php echo $row['projectSkills'];?></p>
                    <p id="projDesc"><?php echo $row['projectDescription'];?></p>
                    <p style="padding-top:1em"><a href="projects.php">Return to project selections</a></p>
                </div>
            </div>
        </div>
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> D'Errico Web Design</p>
        </div>
    </body>
</html>
