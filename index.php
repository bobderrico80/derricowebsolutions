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
        <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="favicon.png"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
            <!--Home Section-->
            <div id="contentHome" class="pageSection">
                <h1>Bob D'Errico</h1>
                <h2>Web Developer/Designer</h2>
                <ul>
                    <li>
                        <a href="https://github.com/bobderrico80" target="_blank">
                            <img src="img/github.png" class="linkIcon" alt="Github Icon">
                            Github
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/pub/bob-d-errico/9b/13b/a8b" target="_blank">
                            <img src="img/linkedin.png" class="linkIcon" alt="LinkedIn Icon">
                            LinkedIn
                        </a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/u/0/105790611772802170570/posts/p/pub" target="_blank">
                            <img src="img/gplus.png" class="linkIcon" alt="Google+ Icon">
                            Google+
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/BobDerrico80" target="_blank">
                            <img src="img/twitter.png" class="linkIcon" alt="Twitter Icon">
                            Twitter
                        </a>
                    </li>
                </ul>
            </div>
            
            <!--Projects Section-->
            <div id="contentProjects" class="pageSection">
                <div id="thumbGrid">
                    <h1>Projects</h1>
                    <p>Click on an image below to view more information about each project.</p>
                    <?php 
                        $rstProject = $db->query('SELECT projectImgURL, projectID, projectTitle FROM projects');
                        while ($row = $rstProject->fetch()) {
                            echo '<img src="thumbs/' . $row[0] . '" id="' . $row[1] . '" alt="' . $row[2] . '" title="' . $row[2] . '" class="projGal"/>';
                        }
                    ?>
                </div>
                <div id="projDisplay">
                    
                </div>
            </div>
            
            <!--Skills Section-->
            <div id="contentSkills" class="pageSection">
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
            
            <!--About Section-->
            <div id="contentAbout" class="pageSection">
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
            
            <!--Contact Section-->
            <div id="contentContact" class="pageSection">
                <h1>Contact</h1>
                <div id="contactForm">
                    <label for="name">Name:</label><input type="text" id="name" name="name"/><span class="warning" id="nameWarning"></span><br>
                    <label for="email">E-Mail Address:</label><input type="text" id="email" name="email"/><span class="warning" id="emailWarning"></span><br>
                    <label for="subject">Subject:</label><input type="text" id="subject" name="subject"/><br>
                    <label for="body">Compose your message below:</label><br>
                    <textarea name="body" id="body"></textarea><br>
                    <div id="buttonContainer">
                        <input type="button" id="submit" value="Send Email"/>
                        <img src="img/preloader.gif" alt="loading" id="preloader" class="preloader"/>
                    </div>
                </div>
                <div id="formResponse">
                    
                </div>
            </div>
        </div>
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> D'Errico Web Design</p>
        </div>
        <script>
            //Variables representing the content divs
            var home = $("#contentHome");
            var projects = $("#contentProjects");
            var skills = $("#contentSkills");
            var about = $("#contentAbout");
            var contact = $("#contentContact");
            
            //Function to change the visible content div
            function changeDiv(show){
                
                //determine the div that is currently visible
                if ($("#contentHome").is(":visible")) {
                    var hide = $("#contentHome");
                }
                if ($("#contentProjects").is(":visible")) {
                    var hide = $("#contentProjects");
                }
                if ($("#contentSkills").is(":visible")) {
                    var hide = $("#contentSkills");
                }
                if ($("#contentAbout").is(":visible")) {
                    var hide = $("#contentAbout");
                }
                if ($("#contentContact").is(":visible")) {
                    var hide = $("#contentContact");
                }
                
                //Extra handling to close project viewer
                if($("#contentProjects").is(":visible")) {
                    $("#projDisplay").fadeOut();
                    $("#projDisplay").html("");
                    $("#contentProjects").animate({width:'700'});
                }
                
                //hides visible div, and shows selected div
                if(!(hide.is(":visible") && show.is(":visible"))) {
                hide.animate({left:"-800px"});
                hide.fadeOut();
                show.animate({left:"0px"});
                show.fadeIn();
                }
            }
            
            //Function to validate form
            function validateForm() {
                var valid = true;
                
                //validates name field completed
                if($("#name").val() === "") {
                    $("#nameWarning").html("Required");
                    valid = false;
                } else {
                    $("#nameWarning").html("");
                }
                
                //validates email field completed
                if($("#email").val() === "") {
                    $("#emailWarning").html("Required");
                    valid = false;
                } else {
                    $("#emailWarning").html("");
                }        
        
                //validates email format
                var patt = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i;
                if (!patt.test($("#email").val())) {
                    if ($("#emailWarning").html() === "Required") {
                        $("#emailWarning").html("Required");
                    } else {
                        $("#emailWarning").html("Invalid e-mail address");
                    }
                    valid = false;
                } else {
                    $("#emailWarning").html("");
                }
                
                 //enables submit button if fields are valid
                if (!valid) {
                    $("#submit").prop("disabled", true);
                } else {
                    $("#submit").removeProp("disabled");
                }
                
            }
    
            //Event listeners for navbar links
            $("#home").click(function(event){
                event.preventDefault();
                changeDiv($("#contentHome"));
            });
            
            $("#projects").click(function(event){
                event.preventDefault();
                changeDiv($("#contentProjects"));
            });
            
            $("#skills").click(function(event){
                event.preventDefault();
                changeDiv($("#contentSkills"));
            });
            
            $("#about").click(function(event){
                event.preventDefault();
                changeDiv($("#contentAbout"));
            });
            
            $("#contact").click(function(event){
                event.preventDefault();
                changeDiv($("#contentContact"));
                validateForm();
            });
            
            $(".contactLink").click(function(event){
                event.preventDefault();
                changeDiv($("#contentContact"));
                validateForm();
            });
            
            //Event listener for project gallery    
            $(".projGal").click (function(){
                
                if ($("#projDisplay").is(":visible")) {
                    $("#projDisplay").fadeOut();
                    $("#projDisplay").html("");
                    $("#contentProjects").animate({width:'700'});
                }
                
                $("#contentProjects").animate({width:'1200'});
                $("#projDisplay").fadeIn();
                $.ajax({
                    url:"getProject.php",
                    data: {
                        id: $(this).attr("id")
                    },
                    type: "GET",
                    success: function(response) {
                        $("#projDisplay").html(response);
                    }
                });
            });
            
            //Event listener for changing values of name/e-mail on contact form.
            $("#name").change(function() {
                validateForm();
            });
            
            $("#email").change(function() {
               validateForm();
            });
            
            //Event listener for send email button
            $("#submit").click(function (){
                $("#submit").hide();
                $("#preloader").show();
                $.ajax({
                   url : "sendEmail.php",
                   data : {
                       name : $("#name").val(),
                       email : $("#email").val(),
                       subject : $("#subject").val(),
                       body : $("#body").val()
                   },
                   type : "POST",
                   success : function(response) {
                       //hides form and clears fields
                       $("#contactForm").hide();
                       $("#name").val("");
                       $("#email").val("");
                       $("#subject").val("");
                       $("#body").val("");
                       $("#submit").show();
                       $("#preloader").hide();
                       
                       //displays response from server
                       $("#formResponse").html(response);
                   },
                   error : function() {
                       //hides form and clears fields
                       $("#contactForm").hide();
                       
                       //displays error message
                       $("formResponse").html(
                            "<h2>The e-mail was not sent.</h2>\n"
                            + "<p>Sorry about that.<br>\n"
                            + "<span class=\"pseudoLink\" id=\"newEmail\">Click to try again</span>"
                        );
                   }
               }); 
            });
        </script>
    </body>
</html>
