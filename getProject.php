<?php
//get ID from GET
$id = $_GET['id'];

<?php
require_once('sqlconn.php');
?>

//Lookup selected ID
$stmt = $db->query('SELECT * FROM projects WHERE projectID = ' . $id . ' ORDER BY projectID');

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
<p id="returnToThumbs"><a href="projects.php">Return to project selections</a></p>
