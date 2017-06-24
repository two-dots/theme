<?php
/**
 * @package WordPress
 * @subpackage TwoDots
 */
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/Thing">
	
	<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">

<!--
  ==================================================
  ++++++++++++++++ Two-dots.com HTML ++++++++++++++++
  ==================================================


	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> <?php if(!wp_title('', false)) {echo " | "; bloginfo('description');} ?></title>
    <meta name="description" content="404: Missing Page">
  	<meta name="author" content="Hannah &amp; B.D">
	
	<!--[if lt IE 9]>
		<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width">

  

	<!-- CSS & RSS
  ================================================== -->
  	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=2" type="text/css" media="screen" />
  	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php bloginfo('atom_url'); ?>" />
	 
	 <!-- Scripts for the head
	 ================================================== -->
	 
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php get_comic_category(); ?>	
	<?php wp_head(); ?>

	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/libs/modernizr.custom.37320.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/foresight.min.js"></script>
		
</head>
	
	<body id="body_id" <?php body_class(); ?>>
	
		<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="https://browsehappy.com/">Upgrade to a different browser</a> or <a href="https://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
		<div id="page">
		
		<div class="navbar">
			<div class="nav_container">
	            <ul class="nav">
	              <li id="nav_home"<?php if ( is_home() ) { echo ' class="active" '; } ?>><a href="<?php echo home_url(); ?>" alt="home"><span class="glyph" aria-hidden="true" data-icon="&#x0025;"></span><span class="visuallyhidden">Home</span></a</li>
	              <li id="nav_archive"<?php if ( is_page(array('archive'))) { echo ' class="active" '; } ?>><a href="<?php echo home_url('archive'); ?>" alt="archive"><span class="glyph" aria-hidden="true" data-icon="&#x002d;"></span><span class="visuallyhidden">Archive</span></a></li>
	              <li id="nav_about"><a href="#about" alt="About"><span class="glyph" aria-hidden="true" data-icon="&#x0024;"></span><span class="visuallyhidden">About</span></a></li>
	              <li id="nav_facebook"><a href="https://facebook.com/pun.workshop" alt="Our facebook group"><span class="glyph" aria-hidden="true" data-icon="&#x002b;"></span><span class="visuallyhidden">Our facebook group</span></a></li> 
	            </ul>
         </div>
		</div>

	<div id="content">
		<div id="header"></div>
		<div id="contentBox">
<h2>ACK! It's a 404!</h2>
	<div class="404_image"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sad_cat.jpg"></div>
<p> Gee it looks like the page you were looking for has just... disappeared... or mutated or something. We're really sorry about that. <p>
<p> Why not try:

<li><p>Reloading the page later</p></li>
<li><p><a href="<?php echo home_url(); ?>" alt="Home">Return to the home page</a></p></li>
<li><p><a href="<?php echo home_url('archive'); ?>" alt="comic archive" title="archive">Visit the archive</a></p></li>
<li><p>Pressing that big friendly button below...</p></li>

	<ul id="nav_404">
		<!--<li id="home_button"><a href="<?php echo home_url(); ?>" alt="Home">Home</a></li>
		<li id="archive_button"><a href="<?php echo home_url('archive'); ?>" alt="comic archive" title="archive">Archive</a></li>-->
		<li id="control-shuffle" class="control-shuffle"><?php random_comic_link('Shuffle those comics', true); ?></li>
	</ul>
		

		</div>
	</div>
	
	</div>

			<footer>
				<p>Powered by <a href="https://wordpress.org/">WordPress</a> &amp; <a href="https://andrewnaylor.co.uk/">argon</a> <br > Licensed under a <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a> &copy; <a href="https://twitter.com/syntheticfuture/"><b>B.D.</b></a> &amp; <a href="https://twitter.com/NowOverAndOut/"><b>Hannah</b></a> 2015</p>
			</footer>

	<?php /* "I'm sorry, I can't let you do that Dave" */ ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  	<script>window.jQuery || document.write('<script src="js/libs/jquery/jquery-1.7.1.min.js"><\/script>')</script>
	
	
	<script>
	    var _gaq=[['_setAccount','UA-26452916-1'],['_trackPageview']];
	    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	    s.parentNode.insertBefore(g,s)}(document,'script'));
  	</script>
	
	<script type="text/javascript">
	  window.___gcfg = {lang: 'en-GB'};
	
	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=80654212672";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>


	<?php wp_footer(); ?>
	</body>
</html>