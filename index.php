<?php
require_once('sqlconn.php');
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
            <img id="hamburger" src="img/hamburger.png" title="Main Menu" alt="Main Menu"/>

        </div>

        <!--DIV for testing
        <div id="test">
            window.innerWidth: <span id="innerWidth"></span><br>
            window.innerHeight: <span id="innerHeight"></span><br>
            css-width: <span id="cssWidth"></span><br>
            css-height: <span id="cssHeight"></span>
            <script>
            $(window).resize(function(){
                $("#innerWidth").html(window.innerWidth);
                $("#innerHeight").html(window.innerHeight);
                $("#cssWidth").html($("body").width());
                $("#cssHeight").html($("body").height());
            });
            </script>
        </div>-->

        <!--Home Section-->
        <div id="contentHome" class="pageSection">
            <h1>Bob D'Errico</h1>
            <h2>Web Developer</h2>
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
            <p id="menuHint">Tap here to learn more</p>
        </div>

        <!--Projects Section-->
        <div id="contentProjects" class="pageSection">
            <div id="thumbGrid">
                <h1>Projects</h1>
                <p>Click on an image below to view more information about each project.</p>
                <?php
                    $rstProject = $db->query('SELECT projectImgURL, projectID, projectTitle FROM projects ORDER BY projectID');
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
                <div class="formRow">
                    <label for="name">Name:</label><input type="text" id="name" name="name"/><span class="warning" id="nameWarning"></span><br>
                </div>
                <div class="formRow">
                    <label for="email">E-Mail Address:</label><input type="text" id="email" name="email"/><span class="warning" id="emailWarning"></span><br>
                </div>
                <div class="formRow">
                    <label for="subject">Subject:</label><input type="text" id="subject" name="subject"/><br>
                </div>
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
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> D'Errico Web Solutions</p>
        </div>
        <script>
            //Variables representing the content divs
            /*
            var home = $("#contentHome");
            var projects = $("#contentProjects");
            var skills = $("#contentSkills");
            var about = $("#contentAbout");
            var contact = $("#contentContact");
            */

            /***************/
            /** FUNCTIONS **/
            /***************/

            //Function to change the visible content div
            function changeDiv(show) {

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

                //special handling for footer div on content div change
                if($("#footer").css("position") == "relative") {
                    $("#footer").hide();
                }



                //hides visible div, and shows selected div
                if(!(hide.is(":visible") && show.is(":visible"))) {

                    //slides up hamburger menu (if hamburger menu is in use)
                    if($("#hamburger").is(":visible")) {
                        $("#navbar").slideUp("fast");
                    }

                    hide.slideUp(null, null, function(){
                        show.fadeIn();
                        $("#footer").show();
                        $(window).resize();
                    });
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

            /*****************************************/
            /** EVENT LISTNERS FOR NAVIGATION LINKS **/
            /*****************************************/

            //Home (D'Errico Web Solutions Heading)
            $("#home").click(function(event){
                event.preventDefault();
                changeDiv($("#contentHome"));
            });

            //Projects on Navbar
            $("#projects").click(function(event){
                event.preventDefault();
                changeDiv($("#contentProjects"));
            });

            //Skills on Navbar
            $("#skills").click(function(event){
                event.preventDefault();
                changeDiv($("#contentSkills"));
            });

            //About on Navbar
            $("#about").click(function(event){
                event.preventDefault();
                changeDiv($("#contentAbout"));
            });

            //Contact on Navbar
            $("#contact").click(function(event){
                event.preventDefault();
                changeDiv($("#contentContact"));
                validateForm();
            });

            //Contact link found in text
            $(".contactLink").click(function(event){
                event.preventDefault();
                changeDiv($("#contentContact"));
                validateForm();
            });

            //Event listener for hamburger and menuHint
            $("#hamburger").click(function(){
                $("#navbar").slideToggle("fast");
            });

            $("#menuHint").click(function(){
                $("#navbar").slideDown("fast");
            });

            /*****************************************/
            /** EVENT LISTENERS FOR WINDOW RESIZING **/
            /*****************************************/

            //Triggers resize event on document ready
            //(allows dynamic content to be set on page load)
            $(document).ready(function(){$(window).resize();});

            //Event listener to change project page display format if window is resized
            $(window).resize(function(){
                //larger than 1350 wide
                if((window.innerWidth >= 1350) &&($("#projDisplay").is(":visible"))) { //and display is visible
                    $("#thumbGrid").show();
                    $("#contentProjects").css("width","1200px");
                    $("#returnToThumbs").hide();
                }

                if((window.innerWidth >= 1350) && !($("#projDisplay").is(":visible"))) { //and display is hidden
                    $("#thumbGrid").show();
                    $("#contentProjects").css("width","700px");
                }

                //Between 900 and 1349 wide
                if((window.innerWidth >= 900) && (window.innerWidth < 1350) && ($("#projDisplay").is(":visible"))) { //and display is visible
                    $("#thumbGrid").hide();
                    $("#contentProjects").css("width","700px");
                    $("#returnToThumbs").show();
                }

                if((window.innerWidth >= 900) && (window.innerWidth < 1350) && !($("#projDisplay").is(":visible"))) { //and display is hidden
                    $("thumbGrid").show();
                    $("#contentProjects").css("width","700px");
                }

                //Smaller than 900
                if((window.innerWidth < 900) && ($("#projDisplay").is(":visible"))) { //and display is visible
                    $("#thumbGrid").hide();
                    $("#contentProjects").css("width","auto");
                    $("#returnToThumbs").show();
                }

                if(((window.innerWidth) < 900) && !($("#projDisplay").is(":visible"))) { //and display is hiden
                    $("thumbGrid").show();
                    $("#contentProjects").css("width","auto");
                }
            });

            //Event listener to change "E-Mail Address" label to "E-Mail" on contacts
            //form if the window is between 700 and 360 px wide
            $(window).resize(function(){
                //windows less than 700 and greater than 360 pixels wide
                if((window.innerWidth < 700) && (window.innerWidth > 360)) {
                    $("label[for=\"email\"]").html("Email:");
                }
                //windows greater than or equal to 700, or less than 360
                if((window.innerWidth >= 700) || (window.innerWidth <= 360)) {
                    $("label[for=\"email\"]").html("Email Address:");
                }
            });

            //Event listener to adjust positioning of the footer if CSS width is longer
            //than the screen width
            $(window).resize(function(){
                if(window.innerHeight >= $("body").height()) {
                    $("#footer").css("position","fixed");
                } else {
                    $("#footer").css("position","relative");
                }
            });

            /***************************************/
            /** EVENT LISTENERS FOR PROJECTS PAGE **/
            /***************************************/

            //Event listener for project gallery
            $(".projGal").click (function(){

                //code for very wide screens (1350px and up)
                if(window.innerWidth >= 1350) {
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
                            $("#returnToThumbs").hide();
                        }
                    });
                }

                //code for normal and narrow screens
                if(window.innerWidth < 1350) {
                    $("#thumbGrid").slideUp(null, null, function(){$("#projDisplay").fadeIn();});
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
                }

            });

            //Event listener for returnToThumbs link on narrow screens
            $(document).on("click", "#returnToThumbs", function(e){
                $("#projDisplay").slideUp(null, null, function(){$("#thumbGrid").fadeIn();});
                e.preventDefault();
            });

            /***************************************/
            /** EVENT LISTENERS FOR CONTACTS PAGE **/
            /***************************************/

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
                       validateForm();

                       //displays response from server
                       $("#formResponse").html(response);
                   },
                   error : function() {
                       //hides form and leaves fields intact
                       $("#contactForm").hide();
                       validateForm();

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
