<?php
//get ID from GET
$id = $_GET['id'];

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

//Lookup selected ID
$stmt = $db->query('SELECT * FROM projects WHERE projectID = ' . $id);

$row = $stmt->fetch()
//Display html
?>
<h2 id="projTitle"><?php echo $row['projectTitle'];?></h2>
<a href="<?php echo $row['projectURL'];?>" target="_blank">
<img src="thumbs/<?php echo $row['projectImgURL'];?>" id="projImg" alt="<?php echo $row['projectTitle'];?>"/>
<p id="projLink"><?php echo $row['projectDispURL'];?></p></a>
<p id="projSkills">Skills: <?php echo $row['projectSkills'];?></p>
<p id="projDesc"><?php echo $row['projectDescription'];?></p>

