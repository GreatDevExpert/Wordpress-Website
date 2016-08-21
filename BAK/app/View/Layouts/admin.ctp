<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Admin Panel</title>
	
	<link rel="stylesheet" href="/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="/css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="/js/hideshow.js" type="text/javascript"></script>
	<script src="/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="/admins">Veterans History Project Admin</a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>" target="_blank">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<!-- p>John Doe (<a href="#">3 Messages</a>)</p -->
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<!-- article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article -->
	<article class='breadcrumbs'><a>Website Admin</a>
<?php 
if ( $_SERVER['REQUEST_URI'] == "/admins" ) {
} else {
	$crumbs = explode("/", ltrim($_SERVER['REQUEST_URI'], "/"));
	$count = count($crumbs);
	$i = 0;
        foreach ( $crumbs as $crumb ) {
		echo "<div class='breadcrumb_divider'></div>";
		if ( ++$i === $count )
			echo "<a class='current'>" . ucfirst($crumb) . "</a>";
		else 
			echo "<a>" . ucfirst($crumb) . "</a>";
	}
}
?>
	</article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Categories</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="/categories/add">New Categorie</a></li>
			<li class="icn_edit_article"><a href="/categories">Manage Categories</a></li>
		</ul>
		<h3>Articles</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="/contents/add">New Article</a></li>
			<li class="icn_edit_article"><a href="/contents">Manage Articles</a></li>
		</ul>
		<h3>News/Events</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="/events/add">New News/Event</a></li>
			<li class="icn_edit_article"><a href="/events">Manage News/Events</a></li>
		</ul>
		<h3>Links</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="/links/add">New Link</a></li>
			<li class="icn_edit_article"><a href="/links">Manage Links</a></li>
		</ul>
		<h3>Videos</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="/videos/add">New Video</a></li>
			<li class="icn_edit_article"><a href="/videos">Manage Videos</a></li>
		</ul>
		<h3>Wars</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="/wars/add">New War</a></li>
			<li class="icn_edit_article"><a href="/wars">Manage Wars</a></li>
		</ul>
		<h3>Military Branches</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="/branches/add">New Branch</a></li>
			<li class="icn_edit_article"><a href="/branches">Manage Branches</a></li>
		</ul>
		<h3>Ranks</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="/ranks/add">New Rank</a></li>
			<li class="icn_edit_article"><a href="/ranks">Manage Ranks</a></li>
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="/users/add">Add New User</a></li>
			<li class="icn_view_users"><a href="/users">View Users</a></li>
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
		<!-- h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="#">Logout</a></li>
		</ul -->
		
		<footer>
			<hr />
			<!-- p><strong>Copyright &copy; 2011 Website Admin</strong></p>
			<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p -->
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
                 <?php echo $this->fetch('content'); ?>
		
		<div class="spacer"></div>
	</section>
</body>
</html>
