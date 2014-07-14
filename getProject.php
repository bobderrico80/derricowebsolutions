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
    <img src="thumbs/<?php echo $row['projectImgURL'];?>" id="projImg" title="<?php echo $row['projectTitle'];?>" alt="<?php echo $row['projectTitle'];?>"/>
</a>
<p id="projLink">
    <a href="<?php echo $row['projectURL'];?>" target="_blank">
        <?php echo $row['projectDispURL'];?>
    </a>
</p>
<p id="projSkills">Skills: <?php echo $row['projectSkills'];?></p>
<p id="projDesc"><?php echo $row['projectDescription'];?></p>

