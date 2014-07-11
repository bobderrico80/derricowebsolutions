<!DOCTYPE html>
<html>
    <head>
        <title>D'Errico Web Design</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
        <!--<link rel="icon" type="image/png" href="favicon.png"/>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="header">
            <h1 id="home">D'Errico Web Design</h1>
            <ul id="navbar">
                <li id="projects">Projects</li>
                <li id="skills">Skills</li>
                <li id="about">About</li>
                <li id="contact">Contact</li>
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
                    <img src="thumbs/rrand.png" id="1" alt="The Rhythm Randomizer" class="projGal"/>
                    <img src="thumbs/whsmb.png" id="2" alt="WHS Marching Band Practice Page" class="projGal"/>
                    <img src="thumbs/pbass.png" id="3" alt="Project Bass" class="projGal"/>
                    <img src="thumbs/ttmom.png" id="4" alt="Terrific Twosome Mothers of Multiples" class="projGal"/>
                    <img src="thumbs/bth.png" id="5" alt="Beautifully Tressed Hair" class="projGal"/>
                    <img src="thumbs/laura.png" id="6" alt="Ms. D'Errico's Language Arts Classes" class="projGal"/>
                </div>
                <div id="projDisplay">
                    
                </div>
            </div>
            
            <!--Skills Section-->
            <div id="contentSkills" class="pageSection">
                <h1>Skills</h1>
                <ul>
                    <li>HTML5</li>
                    <li>CSS3</li>
                    <li>jQuery</li>
                    <li>PHP</li>
                    <li>SQL/MySQL</li>
                    <li>AJAX</li>
                    <li>WordPress</li>
                    <li>Graphic Design</li>
                    <li>Music Technology</li>
                    <li>Educational Technology</li>
                    <li>Blogs</li>
                    <li>Websites for Organizations</li>
                </ul>
            </div>
            
            <!--About Section-->
            <div id="contentAbout" class="pageSection">
                <h1>About</h1>
                <img src="img/me.jpg" id="myPic" alt="Picture of Bob D'Errico"/>
                <p>My name is Bob D'Errico.  I currently am a music teacher, and 
                    have been doing so for the last 10 years.  During my time 
                    teaching, I have always sought to include educational technology 
                    into my lesson plans.  This sometimes left me with a desire for 
                    technological tools that did not exist.  The desire inspired
                    me to create my first web app, the <a href="http://www.rhythmrandomizer.com" target="_blank">
                    Rhythm Randomizer</a>, an app that generates rhythms randomly.</p>
                <p>I found the need for a tool that did not exist, and began to 
                    research how to build what I needed.  This simple HTML/Javascript
                    app provided a springboard into the world of web design.  I 
                    soon began to build other pages and tools, all of which can 
                    be found on my <span class="pseudoLink" id="projectsLink">Projects</span>
                     page.  I would be interested in further honing my skills by developing
                    a site for you.  If you are willing to work with someone who 
                    is dedicated, a self-learner, detail-oriented, and believes that 
                    anything is possible, please <span class="pseudoLink" id="contactLink">contact 
                    me</span> to get started on building your website.
            </div>
            
            <!--Contact Section-->
            <div id="contentContact" class="pageSection">
                <h1>Contact</h1>
                <div id="contactForm">
                    <label for="name">Name:</label><input type="text" id="name" name="name"/><span class="warning" id="nameWarning">Required</span><br>
                    <label for="email">E-Mail Address:</label><input type="text" id="email" name="email"/><span class="warning" id="emailWarning">Required</span><br>
                    <label for="subject">Subject:</label><input type="text" id="subject" name="subject"/><br>
                    <label for="body">Compose your message below:</label><br>
                    <textarea name="body" id="body"></textarea><br>
                    <div id="buttonContainer">
                        <input type="button" id="submit" value="Send Email"/>
                    </div>
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
                
                if(!(hide.is(":visible") && show.is(":visible"))) {
                hide.animate({left:"-800px"});
                hide.fadeOut();
                show.animate({left:"0px"});
                show.fadeIn();
                }
            }
    
            //Event listeners for navbar links
            $("#home").click(function(){
                changeDiv($("#contentHome"));
            });
            
            $("#projects").click(function(){
                changeDiv($("#contentProjects"));
            });
            
            $("#skills").click(function(){
                changeDiv($("#contentSkills"));
            });
            
            $("#about").click(function(){
                changeDiv($("#contentAbout"));
            });
            
            $("#contact").click(function(){
                changeDiv($("#contentContact"));
            });
            
            $("#contactLink").click(function(){
                changeDiv($("#contentContact"));
            });
            
            $("#projectsLink").click(function(){
                changeDiv($("#contentProjects"));
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
            
            
            
            
        </script>
    </body>
</html>
