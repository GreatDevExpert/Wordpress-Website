<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
    <head>
        <title>Veterans History Project</title>
        <link href="/css/style.css" type="text/css" rel="stylesheet"/>
        <link href="/css/fonts/fonts.css" type="text/css" rel="stylesheet"/>
        <link href="/css/css3.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div class="outer-container">
            <div class="wrapper">
                <div class="inner-wrapper">
                    <div class="baner banner2">
                        <div class="header">
                            <ul class="icon">
                                <li><a href="http://www.facebook.com/vhpstudentedition"><img src="/img/fb.jpg" alt="fb"/></a></li>
                                <li><a href="https://twitter.com/VHPStudents"><img src="/img/twit.jpg" alt="fb"/></a></li>
                                <li><a href="#"><img src="/img/bing.jpg" alt="fb"/></a></li>
                            </ul>
                            <!-- div class="drop-down">
                                <form action="" method="post" class="histroy">
                                     <label>LINKS</label>
                                    <div>
                                        <ul class="drop">
                                            <li><a href="#">Veterans History Project</a></li>
                                             <li><a href="#">Veterans History Project</a></li>
                                              <li><a href="#">Veterans History Project</a></li>
                                        </ul>
                                        <input type="button" name="" value="" class="btn"/><img src="/img/header-sap.png" alt="sap"/>
                                    <input type="text" name="" value="Veterans History Project" class="text"/>
                                    </div>
                                    <input type="submit" name="" value="" class="launch"/>
                                </form>
                            </div -->
                        </div>
                        <div class="menu">
                            <a id="logo" href="index.html" title="Veterans History Project For Student"><img src="/img/logo.png" alt="Veterans History Project For Student" /></a>
                            <ul class="nav1">
                                 <li><a href="/" class="yellow">home</a></li>
                                <li><a href="/contents/categoryIndex/id:1" class="yellow">For Vets</a></li>
                                <li><a href="/contents/categoryIndex/id:2" class="yellow">For Mentors</a></li>
                                <li><a href="/contents/categoryIndex/id:3" class="yellow">For Schools</a></li>
                                <li class="margin"><a href="/contents/categoryIndex/id:20">Video Collection</a></li>
                                <!-- li><a href="#">Forms</a></li -->
                                <li><a href="/events/publicIndex">News &amp; Events</a></li>
                                <li><a href="/contents/categoryIndex/id:10">Partners</a></li>
                                <li><a href="/contents/categoryIndex/id:11">Contact Us</a></li>
                            </ul>

                        </div>                        
                    </div>
                    <div class="container">
                        <div class="container-left">
                           <span class="style"></span>
                           <h2><img src="/img/global.png" alt="global"/></h2>
                           <?php echo $this->element('getArticle', array('id' => 22)); ?>
                        </div>
                        <div class="container-right">
                            <!-- div class="form">
                                <h2><img src="/img/forms.png" alt="form"/></h2>
                                <ul class="sub-link">
                                  <li><a href="#">Sub Pages Links</a></li>
                                  <li><a href="#">Sub Pages Links</a></li>
                                  <li class="last"><a href="#">Sub Pages Links</a></li>
                                </ul>                                
                            </div -->
                            <div class="content">
                               <?php echo $this->fetch('content'); ?> 
                            </div>
                        </div>
                         <ul class="container-links">
                            <li><a href="/events/publicIndex"><img src="/img/new-archived.png" alt="video3"/></a></li>
                            <li><a href="https://twitter.com/VHPStudents"><img src="/img/follow.png" alt="video3"/></a></li>
                            <li><a href="/contents/categoryIndex/id:20"><img src="/img/all.png" alt="video3"/></a></li>
                        </ul>
                        </div>

                    </div>
                    <div class=" footer">
                        <div class="footer-top">
                            <div class="participate">
                                <ul class="footer-link1">
                                    <li><a href="/contents/categoryIndex/id:1">For Vets</a></li>
                                    <li><a href="/contents/categoryIndex/id:2">For Mentors</a></li>
                                    <li class="last"><a href="/contents/categoryIndex/id:3">For Schools</a></li>
                                </ul>
                                <a href="#" class="footer-btn">Participate</a>
                            </div>
                            
                            <div class="donate">
                                <ul class="footer-link2">
                                    <li><a href="/contents/categoryIndex/id:20">Video Collection</a></li>
                                    <!-- li><a href="#">Forms</a></li -->
                                    <li><a href="/events/publicIndex">News &amp; Events</a></li>
                                    <li><a href="/contents/categoryIndex/id:10">Partners</a></li>
                                    <li class="last"><a href="/contents/categoryIndex/id:11">Contact Us</a></li>
                                </ul>
                                <a href="https://www.umb.edu/giving/give_now/?f=Veterans+History+Project" target="_blank" class="footer-btn">Donate Today</a>
                            </div>
                        </div>
                        <div class="footer-bottom">
                            <p>Copyright © 2012 Veterans History Project. All Rights Reserved. Site designed by <a href="#">Academic Web Pages</a>.</p>
                        </div>
                            
                    </div>
                </div>
            </div>       
<!-- ?php echo $this->element('sql_dump'); ? -->
    </body>
</html>
