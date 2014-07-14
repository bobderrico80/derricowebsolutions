<!DOCTYPE html>
<html>
    <head>
        <title>D'Errico Web Design</title>
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
            <div id="contentAbout" class="pageSection" style="display: block">
                <h1>About</h1>
                <div class="figure">
                    <img src="img/me.jpg" id="myPic" alt="Picture of Bob D'Errico"/>
                    <p><strong>Bob D'Errico</strong><br>
                        Web Designer/Developer
                    </p>
                </div>
                <p>
                    Bob D'Errico is a web designer/developer from suburban Philadelphia.  
                    His expertise lies in creating concise and impressive websites for 
                    businesses, non-profits, organizations, and school groups.  
                    His experience in the education field as a band and choral director 
                    gives him special insight into the needs of these clients.  
                </p>
                <p>
                    Bob can also create web apps for specific needs; his 
                    <a href="http://www.rhythmrandomizer.com" target="_blank">Rhythm Randomizer</a> 
                    web app gives music educators a quick and easy way to generate 
                    an infinite number of rhythm drills for their students. This 
                    site is currently free! He recently developed a <a href="http://whsmb.derricowebdesign.com" target="_blank">web app</a> 
                    that allows band students to access their music from home, including 
                    midi play-along files and specific instrumentation set-up. Bob 
                    can create other web sites and apps, tailored to your organization's 
                    specific needs. 
                </p>
                <p>
                    <strong>At this time, in addition to regular business website design, 
                    Bob is taking a limited number of non-profit or school clients 
                    to help them grow - free of charge! <a href="contact.php" class="contactLink">Contact him</a>
                    for details!</strong>
                </p>
                <p>
                    When he is not working with web design, Bob enjoys working with 
                    music-recording technology, cooking, and spending time with 
                    his wife, and two daughters. 
                </p>
                <p>
                    Contact <a href="contact.php" class="contactLink">Bob D'Errico</a> 
                    here to start improving your group's presence and accessibility online. 
                </p>
            </div>
        </div>
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> D'Errico Web Design</p>
        </div>
    </body>
</html>
