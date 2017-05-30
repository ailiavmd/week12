<?php
	// Start the session
	//session_start();
    //logOut();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>VANARTS STUDENT MOCKUP PROJECT SITE</title>
        <meta name="description" content="This is a student excercise website for the Vancouver Institute of Media Arts">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
        <script src="https://use.fontawesome.com/88ffc56346.js"></script>

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    
        <div class="backend">

            <div class="row">
                <h1>Admin Page</h1>
                <p class="intro">Welcome to your own page <span><?php //echo $_SESSION['uname'] ?></span>. Select an option below to edit/upload content.</p> 
            </div>
            <nav class="row collapse">
                <div class="small-12 columns" id="backend-nav">
                    <ul class="tabs" data-tabs id="backend-menu">
                        <li class="tabs-title is-active"><a href="#profile" aria-selected="true">profile</a></li>
                        <li class="tabs-title"><a href="#bgEx">background & expertise</a></li>
                        <li class="tabs-title"><a href="#portfolio">portfolio</a></li>
                        <li class="tabs-title"><a href="#blog">blog</a></li>
                        <li class="tabs-title"><a href="#settings">settings</a></li>
                    </ul>
                </div>
            </nav>
            
            <div class="row tabs-content" data-tabs-content="backend-menu">
              
                <!-- PROFILE FORM -->
                <div class="tabs-panel is-active" id="profile">
                    <form id="profile-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
                        
                        <h2>Homepage Information</h2>
                        
                        <label for="about">About</label>
                        <textarea name="about" id="about"></textarea>
                        
                        <label for="cv">Upload CV</label>
                        <input type="file" name="cv" id="cv">
                        
                        <label for="pro-pic">Profile Picture</label>
                        <input type="file" name="imageUploaded" id="pro-pic">
                        
                        <input type="submit" name="profile_submit" value="Save Changes" id="profile_submit">
                    </form>
                </div>
                <!-- PROFILE FORM END -->
                
                <!-- BG & EX FORMS -->
                <div class="tabs-panel row" id="bgEx">
                    
                    <div class="medium-3 columns">
                        <ul class="vertical tabs" data-tabs id="bgExTabs">
                            <li class="tabs-title is-active"><a href="#education" aria-selected="true">Education</a></li>
                            <li class="tabs-title"><a href="#experience">Experience</a></li>
                            <li class="tabs-title"><a href="#skills">Skills</a></li>
                            <li class="tabs-title"><a href="#software">Software</a></li>
                        </ul>
                    </div>
                    
                    <div class="medium-9 columns">
                        <div class="tabs-content" data-tabs-content="bgExTabs">

                            <div class="tabs-panel is-active" id="education">
                                <h2>Education</h2>

                                <form id="education-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">

                                    <label for="institution">Institution</label>
                                    <input type="text" name="institution" id="institution">

                                    <label for="inst-info">Information</label>
                                    <textarea name="information" id="inst-info"></textarea>

                                    <input type="submit" name="education_submit" value="Save Changes" id="education_submit">
                                </form>
                            </div>

                            <div class="tabs-panel" id="experience">
                                <h2>Experience</h2>

                                <form id="experience-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">

                                    <label for="place">Institution</label>
                                    <input type="text" name="place" id="place">

                                    <label for="place-info">Information</label>
                                    <textarea name="place-info" id="place-info"></textarea>

                                    <input type="submit" name="experience_submit" value="Save Changes" id="experience_submit">
                                </form>
                            </div>

                            <div class="tabs-panel" id="skills">
                                <h2>Skills</h2>

                                <form id="skills-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">

                                    <label for="skill-name">Skill name</label>
                                    <input type="text" name="skill-name" id="skill-name">

                                    <label for="skill-desc">description</label>
                                    <textarea name="skill-desc" id="skill-desc"></textarea>

                                    <label for="skill-per">Percentage</label>
                                    <input type="number" name="skill-per" id="skill-per" min="1" max="100">

                                    <input type="submit" name="skill_submit" value="Save Changes" id="skill_submit">
                                </form>
                            </div>

                            <div class="tabs-panel" id="software">
                                <h2>Software</h2>

                                <form id="software-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">

                                    <label for="software-name">Software Name</label>
                                    <input type="text" name="software-name" id="software-name">

                                    <label for="pro-pic">Software Logo</label>
                                    <input type="file" name="imageUploaded" id="software-pic">

                                    <input type="submit" name="software_submit" value="Save Changes" id="software_submit">
                                </form>
                            </div>

                        </div>
                    </div>
                
                    
                </div>                
                <!-- BG & EX FORM END -->
                
                <!-- PORTFOLIO FORM -->
                <div class="tabs-panel" id="portfolio">
                    <form id="portfolio-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
                        
                        <label for="file-title">Title</label>
                        <input type="text" name="file-title" id="file-title">
                        
                        <label for="file-thumb">Image</label>
                        <input type="file" name="file-thumb" id="file-thumb">
                        
                        <label for="html-file">HTML File</label>
                        <input type="file" name="html-file" id="html-file">
                        
                        <label for="mview-file">MVIEW File</label>
                        <input type="file" name="mview-file" id="mview-file">
                        
                        <input type="submit" name="file_submit" value="Save Changes" id="file_submit">
                    </form>
                </div>
                <!-- PORTFOLIO FORM END -->

                <!-- BLOG FORM -->
                <div class="tabs-panel" id="blog">
                    <form id="blog-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
                        <script src="//cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>
                        <textarea id="editor1" name="editor1">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
                        <script type="text/javascript">CKEDITOR.replace( 'editor1' );
                        </script>
                        <input type="submit" name="post_submit" value="Post" id="post_submit">
                    </form>
                </div>
                <!-- BLOG FORM END -->
                
                <!-- SETTINGS FORM -->
                <div class="tabs-panel" id="settings">
                    <form id="settings-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
                        <h2>Password Change</h2>
                        
                        <label for="uname">Username</label>
                        <input type="text" name="uname" id="uname">
                        
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password">
                        
                        <hr>
                        
                        <label for="password1">New Password</label>
                        <input type="text" name="file-title" id="password1" required>
                        
                        <label for="password2">Confirm New Password</label>
                        <input type="text" name="file-title" id="password2" required>
                        
                        <input type="submit" name="settings_submit" value="Save Changes" id="settings_submit">
                    </form>
                </div>
                <!-- SETTINGS END -->
                
            </div>
            
            <p><a href="index.php"><i class="fa fa-long-arrow-left"></i> Go to home page</a></p>
        
        </div>
        
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/app.js"></script>
        
    </body>
</html>
