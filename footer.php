<?php
/**
 * @package WordPress
 * @subpackage TwoDots
 */
?>
			
			
			<footer>
				<p>Powered by <a href="https://wordpress.org/">WordPress</a> &amp; <a href="http://andrewnaylor.co.uk/">argon</a> <br > Licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a> &copy; <a href="https://twitter.com/syntheticfuture/"><strong>B.D.</strong></a> &amp; <a href="https://twitter.com/NowOverAndOut/"><strong>NowOverAndOut</strong></a> 2009 - <?php echo date('Y'); ?></p>
			</footer>

	<?php /* "I'm sorry, I can't let you do that Dave" */ ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script>window.jQuery || document.write('<script async src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/jquery-3.1.0.min.js"><\/script>')</script>
  	
  	<script>
  	var a=document.getElementsByTagName("a");
for(var i=0;i<a.length;i++) {
    if(!a[i].onclick && a[i].getAttribute("target") != "_blank") {
        a[i].onclick=function() {
                window.location=this.getAttribute("href");
                return false; 
        }
    }
}</script>
	
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/plugins.js"></script>
  	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/script.js"></script>
  	<script src="<?php bloginfo('stylesheet_directory'); ?>/webfonts/ss-standard.js"></script>
	


	<?php wp_footer(); ?>
	</body>
</html>
