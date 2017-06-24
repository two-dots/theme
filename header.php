<?php
/**
 * @package WordPress
 * @subpackage TwoDots
 */
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/CreativeWork">
	
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
  ================================================== -->

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> <?php if(!wp_title('', false)) {echo " | "; bloginfo('description');} ?></title>
	
   <meta name="description" content="<?php if ( is_single()) { global $wp_query;$postid = $wp_query->post->ID; echo get_post_meta($postid, 'comic_meta_description', true); }
   elseif( is_category()) { echo "An archive page for all two dots posts in the category of "; single_cat_title();}
   elseif( is_tag()) {echo "An archive page for all two dots comics with the tag "; single_tag_title();}
   elseif( is_author()) {$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo "biography, twitter, and comics of "; echo $curauth->first_name; echo "; two dots comic creator and generally snazzy person.";}
  else { echo 'Webcomic & doodles by a pun-making, doodle producing duo, focusing on science, time travel, and the occasional cow. Updating every Sunday!'; } ?>" />
 
    
   	<meta name="author" content="NowOverAndOut & B.D">
   	<link rel="author" href="https://plus.google.com/+TwodotsComic/"/>
  	<meta name="robots" content="NOODP">
	
	<!--[if lt IE 9]>
		<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title"
      content="<?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?>">
      
 
	<!-- CSS & RSS
  ================================================== -->
  	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=2" type="text/css" media="screen" />
  	<link href="<?php bloginfo('stylesheet_directory'); ?>/webfonts/ss-social-regular.css" rel="stylesheet" />
    <link href="<?php bloginfo('stylesheet_directory'); ?>/webfonts/ss-social-circle.css" rel="stylesheet" />
  	<link href="<?php bloginfo('stylesheet_directory'); ?>/webfonts/ss-standard.css" rel="stylesheet" />
  		
  	
  	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php bloginfo('atom_url'); ?>" />
	
	<!-- OpenGraph [facebook, g+, twitter]
  ================================================== -->
  
  <?php $twitter_name   = str_replace('@', '', get_the_author_meta('twitter'));?>
  
  	 <meta name="twitter:card" content="summary">
  	 <meta name="twitter:site" content="@twodotscomic">
  	 <meta name="twitter:creator" value="@<?php $temp_post = get_post($post_id);$user_id = $temp_post->post_author; echo the_author_meta( 'twitter', $user_id); ?>" />
  	 <meta name="twitter:title" content="Two-dots: <?php the_title();?>">
  	 <meta name="twitter:description" content="<?php global $wp_query;$postid = $wp_query->post->ID; echo get_post_meta($postid, 'comic_meta_description', true);?>">
  	 <meta name="twitter:image" content="https://imgs.two-dots.com/comics/thumbs/<?php echo get_post_meta($post->ID, 'comic_medium', true); ?>">
  	 
  
	 <meta property="og:title" content="Two-dots: <?php the_title();?>"/> 
	 <meta property="og:type" content="article"/> 
	 <meta property="og:image" content="https://imgs.two-dots.com/comics/thumbs/<?php echo get_post_meta($post->ID, 'comic_medium', true); ?>"/> 
	 <meta property="og:description" content="<?php global $wp_query;$postid = $wp_query->post->ID; echo get_post_meta($postid, 'comic_meta_description', true);?>"/>
	 <meta property="og:url" content="<?php the_permalink(); ?>"/>
	 <meta property="og:site_name" content="TwoDots"/> 
	 <meta property="og:locale" content="en_GB" />
	 <meta property="fb:app_id" content="80654212672"/>
	 <meta property="article:author" content="<?php $temp_post = get_post($post_id);$user_id = $temp_post->post_author; echo the_author_meta( 'first_name', $user_id); ?>"/>
	 <meta property="article:publisher" content="https://www.facebook.com/pun.workshop"/>
	 <meta property="article:tag" content="<?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo $tag->name . ', '; }}?>"/>
	 
	 
	 
	 <!-- Scripts for the head
	 ================================================== -->
	 
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php get_comic_category(); ?>	
	<?php wp_head(); ?>
	
	<script>
    foresight = {
        options: {
        	minKbpsForHighBandwidth: 300,
        	speedTestExpireMinutes: 15,
        	speedTestKB:50,
            speedTestUri: '<?php bloginfo('stylesheet_directory'); ?>/js/speed-test/50K.jpg'
        }
    };
</script>

	<script async src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/modernizr.custom.37320.js"></script>
	<script>
// Picture element HTML5 shiv
document.createElement( "picture" );
</script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/picturefill.min.js" async></script>
			
</head>
	
	<body id="body_id" <?php body_class(); ?>>
	
		<!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="https://browsehappy.com/">Upgrade your browser today</a> or <a href="https://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        
        
        <div class="navbar">
			<div class="nav_container">
	            <ul class="nav">
	              <li id="nav_home" class="nav-item <?php if ( is_home() ) { echo 'active'; } ?>"><a href="<?php echo home_url(); ?>/" alt="home"><i class="ss-icon">home</i></a></li>
	              <li id="nav_archive" class="nav-item <?php if ( is_page(array('archive'))) { echo 'active'; } ?>"><a href="<?php echo home_url(); ?>/archive/" alt="archive"><i class="ss-icon">list</i></a></li>
	              <li id="nav_search" class="<?php if ( is_search() ) { echo 'active'; } ?>"><a href="#" class="search-button<?php if ( is_search() ) { echo '-disabled'; } ?>"><i class="ss-icon">search</i><!--<input type="search" class="search" placeholder="Search comics"/>--><?php get_search_form(); ?></a></li>
	             </ul>
			</div>
		</div>
		<!--<div class="info <?php if ( is_home() ) { echo 'announcement'; } elseif (is_single() ) {echo 'announcement';} else { echo 'hidden';} ?>"><p><i class="ss-icon">info</i>Updating every Sunday!</p></div>-->
        
		<div id="page">
		
		
        
			
			
			
			
			
		</div>
			<hr />
			<div id="contentBox" class="border-radius">
			
			
			<div id="header">
				<H1 class="visuallyhidden"><?php if ( is_single()) { global $wp_query;$postid = $wp_query->post->ID; echo get_post_meta($postid, 'comic_meta_description', true); }
   elseif( is_category()) { echo "An archive page for all posts in the category "; single_cat_title();}
   elseif( is_tag()) {echo "An archive page for all comics with the tag "; single_tag_title();}
   elseif( is_author()) {$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo "biography and comics of "; echo $curauth->first_name;}
  else { echo 'Webcomic & doodles by a pun-making, doodle producing duo, focusing on science, time travel, and the occasional cow. Updating every Sunday!'; } ?></H1>
				<ul id="header_controls" class="controls">
					<li id="control-top-first" class="control control-first"><?php first_comic_link('&laquo; First', true); ?></li>
					<li id="control-top-back" class="control control-back"><?php previous_comic_link('&lt; Previous', true); ?></li>
					<li id="header-main" class="home"><a href="<?php echo get_option('home'); ?>/"></a></li>
					<li id="control-top-forward" class="control control-forward"><?php next_comic_link('Next &gt;', true); ?></li>
					<li id="control-shuffle" class="control control-shuffle"><a href="/?random=1"></a></li>
					<li id="control-archive" class="control control-archive"><a href="<?php echo home_url(); ?>/archive" alt="archive" title="archive">Archive</a></li>
					<li id="control-search" class="control control-search <?php if ( is_search() ) { echo 'active'; } ?>"><a href="#" class="control-search-button<?php if ( is_search() ) { echo '-disabled'; } ?>">
					<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
						<fieldset><input type="search" id="s" name="s" class="control-search-box" placeholder="search those comics!"/><i class="ss-icon control-close">close</i></fieldset>
					</form>
					</a></li>
					<li id="control-top-latest" class="control control-last"><?php last_comic_link(); ?></li>
				</ul>
				<ul id="button">
					<li id="home_button"><a href="<?php echo get_option('home'); ?>/" alt="Home">← Home</a></li>
				</ul>
			</div>

