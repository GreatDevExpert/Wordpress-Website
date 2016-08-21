<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
    <head>
        <title>Veterans History Project</title>
        <link href="/css/style.css" type="text/css" rel="stylesheet"/>       
        <link href="/css/fonts/fonts.css" type="text/css" rel="stylesheet"/>
<!-- script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script -->
<style type="text/css">
/*
body {
	background: #333333 url(concrete_wall.png);
} */
.twtr-widget {
	float: left;
	width: 280px;
	margin: 0 0 0 -10px;
	/* padding: 0 0 15px; */
	/*background: #fafafa url(wavecut.png);*/
			
	/*** cross browser box shadow ***/
	-moz-box-shadow: 0 0 2px #fff;
	-webkit-box-shadow: 0 0 2px #fff;
	-ms-filter: "progid:DXImageTransform.Microsoft.Glow(color=#ffffff,strength=3)";
	filter:
		progid:DXImageTransform.Microsoft.Shadow(color=#ffffff,direction=0,strength=3)
		progid:DXImageTransform.Microsoft.Shadow(color=#ffffff,direction=90,strength=3)
		progid:DXImageTransform.Microsoft.Shadow(color=#ffffff,direction=180,strength=3)
		progid:DXImageTransform.Microsoft.Shadow(color=#ffffff,direction=270,strength=3);
	box-shadow: 0 0 2px #fff;
			
	/*** kind of cross browser rounded corner ***/
	-webkit-border-radius: 3px;
	-khtml-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}
.twtr-hd {
	/*** cross browser rgba ***/
	background-color: transparent;
	background-color: rgba(255,255,255,0.3);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#30ffffff,endColorstr=#30ffffff);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#30ffffff,endColorstr=#30ffffff)";
	display: none;
}
.twtr-bd {
}
.twtr-widget .twtr-bd .twtr-tweet {
	/* margin: 5px 0 0; */
	/* padding: 0 0 5px; */
	border-bottom: 1px solid #cecece;
}
.twtr-tweet:before {
	display: block;
	float: left;
	margin: -5px 0 0 5px;
	font-size: 12px; /* let's make it a big quote! */
	content: "Ò";
	color: #bababa;
	text-shadow: 0 1px 1px #909090;
	font-family: "times new roman", serif;
	display: none;
}
.twtr-ft { display: none; }

//Custome sharethis button
.st_sharethis_custom{
	//background-image: url("/img/bing.jpg") no-repeat scroll left top transparent;
	//padding:0px 16px 0 0;
}
</style>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "5ba6bf0a-eea7-4a2a-bb51-b6b20c81f10a"});</script>
    </head>
    <body>
        <div class="outer-container">
            <div class="wrapper">
                <div class="inner-wrapper">
                    <div class="baner">
                        <a href="https://www.umb.edu/giving/give_now/?f=Veterans+History+Project" target="_blank" class="today"><img src="/img/donate-today.png" alt="donate-today"/></a>
                        <div class="header">
                            <ul class="icon">
                                <li><a href="http://www.facebook.com/vhpstudentedition"><img src="/img/fb.jpg" alt="fb"/></a></li>
                                <li><a href="https://twitter.com/VHPStudents"><img src="/img/twit.jpg" alt="fb"/></a></li>
                                <!-- li><a href="#"><img src="/img/bing.jpg" alt="ShareThis"/></a></li -->
				<li><span class='st_sharethis_custom'><img src="/img/bing.jpg" alt="ShareThis"/></span></li>
                            </ul>
                            <!-- div class="drop-down">
                               
                                <form action="" method="post" class="histroy">
                                    <label>LINKS</label>
                                    <div>
                                        <ul class="drop">
                                            <li><a href="#">Veterans History Project 1</a></li>
                                            <li><a href="#">Veterans History Project 2</a></li>
                                            <li><a href="#">Veterans History Project 3</a></li>
                                        </ul>
                                        <input type="button" name="" value="" class="btn"/><img src="/img/header-sap.png" alt="sap"/>
                                        <input type="text" name="" value="Veterans History Project" class="text"/>
                                    </div>
                                    <input type="submit" name="" value="" class="launch"/>
                                </form>
                            </div -->
                        </div>
                        <div class="menu">
                            <a id="logo" href="index.html" title="Veterans History Project For Stydent"><img src="/img/logo.png" alt="Veterans History Project For Stydent" /></a>
                            <ul class="nav">
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
                        <span class="flag"><img src="/img/flag.png" alt="logo"/></span>
                    </div>
                    <div class="container">
                        <span class="tv"><img src="/img/tv.png" alt="television"/></span>
                        <span class="tv_tube"><?php echo $this->element('getFeaturedVideo'); ?></span>
                        <div class="about">
                            <span class="style"></span>
                            <h2><img src="/img/project-head.png" alt="head"/></h2>
                            <p><?php echo $this->element('getArticle', array('id' => 4)); ?></p>
                        </div>
                        <div class="features">
                            <div class="events">
                                <span class="style"></span>
                                <h2><img src="/img/news.png" alt="news"/></h2> 
                                <div class="events_scroll">
<?php echo $this->element('getEvents'); ?>
                                </div>
                            </div>
                            <div class="events pad">
                                <span class="style"></span>
                                <h2><img src="/img/twitter.png" alt="twitter"/></h2>
<!-- a class="twitter-timeline" data-dnt=true href="https://twitter.com/search?q=%23veterans" width="294" height="200" data-widget-id="246622672144957442">Veterans Tweets</a -->
                                <div class="events_scroll">
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
	version: 2,
	type: 'profile',
	rpp: 24,
	//search: '@VHPStudents',
	interval: 6000,
	title: 'Veterans twitter feeds',
	subject: 'Veterans related tweets',
	width: 300,
	height: 3000,
	theme: {
		shell: {
			background: 'transparent',
			color: '#333'
		},
		tweets: {
			background: 'transparent',
			color: '#333',
			links: '#c10000'
		}
	},
	features: {
		scrollbar: false,
		loop: false,
		live: false,
		hashtags: true,
		timestamp: true,
		//avatars: false,
		avatars: true,
		behavior: 'default'
	}
}).render().setUser('VHPStudents').start();
</script>
                                </div>
                            </div>
                            <div class="events collection">
                                <span class="style"></span>
                                <h2><img src="/img/collect.png" alt="twitter"/></h2>
<?php echo $this->element('getVideos'); ?>
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
