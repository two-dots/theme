<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
if ( !is_admin() ) wp_deregister_script('jquery');
function get_comic_layout() {?>
		<div id="content">	
			<div class="comic" id="post-<?php the_ID(); ?>">
				<div class="entry center"><?php the_comic(); ?></div>
				<div class="alt tablet phone"><p><?php $comic=get_the_comic(); echo $comic->description;?></p></div>
			</div>	
				
				<div id="bottom_box">
					<div id="bottom_left">
						<ul id="bottom_controls_left" class="controls">
							<li id="control-bottom-first" class="bottom-first" alt="First"><?php first_comic_link('&laquo; Way Back'); ?></li>
							<li id="control-bottom-back" class="bottom-back" alt="Previous"><?php previous_comic_link('&lt; Back'); ?></li>
						</ul>
					</div>
					
					<div id="middle">
						<div class="comic-links" id="post-<?php the_ID(); ?>-links">
							<div id="permalink"><p><i class="ss-icon">link</i><?php the_permalink(); ?><p></div>
							<div id="embedlink">
								<p><a class="embededlinklink" href="<?php $comic=get_the_comic(); echo $comic->file;?>" target="_blank"><i class="ss-icon">picture</i></a><?php $comic=get_the_comic(); echo $comic->file;?><p>
							</div>
						</div>	
					</div>
					
					<div id="bottom_right">
						<ul id="bottom_controls_right" class="controls">
							<li id="control-bottom-forward" class="bottom-forward" alt="Next"><?php next_comic_link('Next &gt;'); ?></li>
							<li id="control-bottom-latest" class="bottom-last" alt="Latest"><?php last_comic_link('Way Next &raquo;'); ?></li>
						</ul>
					</div>
					
				</div>
				<div class="bottom_shuffle phone"><a id="control-bottom-shuffle" class="bottom-shuffle" href="/?random=1">Random comic</a></div>
			</div>
			
		<div id="social_container" class="border-radius">
			<div id="social_content" class="">
				<a class="btn social" target="_blank" title="share on twitter" href="https://twitter.com/intent/tweet?text=<?php the_title();?>&url=<?php the_permalink(); ?>&via=<?php $temp_post = get_post($post_id);$user_id = $temp_post->post_author; echo the_author_meta( 'twitter', $user_id); ?>"><i class="ss-icon ss-social-circle ss-twitter"></i></a>
				<a class="btn social" target="_blank" title="share on facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="ss-icon ss-social-circle ss-facebook"></i></a>
				<a class="btn" target="_blank" title="share on google+" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="ss-icon ss-social-circle ss-googleplus"></i></a>
			</div>
		</div>
		<div class="clear"><p></p></div></div>
		<hr />
		
		<div id="lower_container">
			<div id="lower_content" class="lower_content border-radius">		
				<div id="notes" class="box">
					<h3>'<?php the_title();?>'</h3>
	                <h4><?php the_time('l, F jS, Y') ?></h4>
	                <?php the_content(); ?>
	                <div class="user"><i class="ss-icon">user</i><p>  <?php the_author_posts_link(); ?> <?php global $wp_query;$postid = $wp_query->post->ID; echo get_post_meta($postid, 'and_author', true);?></p></div>
	                <div class="postmetadata"><i class="ss-icon">tags</i><p class="tags"><?php the_tags('', '<span class="comma"></span> ', '<br />'); ?></p></div>
	              
				</div>			
			<div id="related_posts" class="relatedposts box">
			<?php related_posts(); ?>
			
			<!--<?php do_action('erp-show-related-posts', array('title'=>'Related Posts', 'num_to_display'=>3)); ?>-->
		
		
        </div>
			</div>
		
			<div id="about" class="border-radius">
				<div class="block start"><h2>Hey, what is this thing?</h2></div>
				<div class="block second">
					<p>Two Dots is a snazzy doodle & webcomic collaboration between NowOverAndOut & B.D; a pun-making, kite flying, doodle producing duo focusing on science, time travel, and the occasional cow.</p>
				</div>
	
				<div class="block profile nowoverandout">
					<div class="portrait"><a href="<?php echo home_url(); ?>/author/nowoverandout/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/high-res/nowoverandout-2x.png" width="80" height="108" alt="Drawing of NowOverAndOut" class="border-radius"></a></div>
					<p>As well as being a science-wielding feminist vegan bee-keeper, <a href="<?php echo home_url(); ?>/author/nowoverandout/" title="author page for nowoverandout">NowOverAndOut</a> also makes pretty good balloon animals.</p>
				</div>
				
				<div class="block profile ben">
					<div class="portrait"><a href="<?php echo home_url(); ?>/author/bd/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/high-res/Ben-2x.png" width="80" height="108" alt="Drawing of B.D" class="border-radius"></a></div>
					<p><a href="<?php echo home_url(); ?>/author/bd/" title="author page for B.D">B.D.</a> is the kind of guy who likes to look for precious metals in exotic locations. That's his thing. That and cookies.</p>
				</div>
			</div>
		</div>	
		
<?php
}

/** @ignore */

add_theme_support( 'post-thumbnails' ); 

//customise the login page
function my_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/style-login.css'; ?>?v=2" type="text/css" media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );



//Remove YARPP style sheets

add_action('wp_print_styles','lm_dequeue_header_styles');
function lm_dequeue_header_styles()
{
  wp_dequeue_style('yarppWidgetCss');
}

add_action('get_footer','lm_dequeue_footer_styles');
function lm_dequeue_footer_styles()
{
  wp_dequeue_style('yarppRelatedCss');
}

//script for randomness

add_action('init','random_post');
function random_post() {
       global $wp;
       $wp->add_query_var('random');
       add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}
 
add_action('template_redirect','random_template');
function random_template() {
       if (get_query_var('random') == 1) {
               $posts = get_posts('post_type=post&orderby=rand&numberposts=1');
               foreach($posts as $post) {
                       $link = get_permalink($post);
               }
               wp_redirect($link,307);
               exit;
       }
}


//Archive stuff
function posts_by_year() {
  // array to use for results
  $years = array();

  // get posts from WP
  $posts = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'post_date',
    'order' => 'DEC',
    'post_type' => 'post',
    'post_status' => 'publish'
  ));

  // loop through posts, populating $years arrays
  foreach($posts as $post) {
    $years[date('Y', strtotime($post->post_date))][] = $post;
  }

  // reverse sort by year
  krsort($years);

  return $years;
}


//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');

//New contact methods
function my_new_contactmethods( $contactmethods ) {
    // Add Twitter
    $contactmethods['twitter'] = 'Twitter';

    return $contactmethods;
    }
    add_filter('user_contactmethods','my_new_contactmethods',10,1);
    // Remove Yahoo IM
  unset($contactmethods['yim']);
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);
  
  

add_action('admin_menu', 'twodots_theme_page');

function twodots_theme_page() {
	if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) {
		wp_enqueue_script('tags', '/wp-content/themes/twodots/js/tags.js');
		if('twodots_save_settings' == $_REQUEST['action']):
			check_admin_referer('twodots_save_settings');

			$keywords = ($_REQUEST['twodots_keywords'] == '') ? 'off' : $_REQUEST['twodots_keywords'];

			$alternate_image_root = $_REQUEST['alternate_image_root'];
			
			update_option('alternate_image_root', $alternate_image_root);
			update_option('twodots_keywords', $keywords);
		endif;
	}
	add_theme_page(__('Theme Settings'), __('TwoDots Settings'), 'edit_themes', basename(__FILE__), 'twodots_theme_page_display');
}

function twodots_theme_page_display() {
	if ( isset( $_REQUEST['action'] ) ) echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>';
	if ( get_option('twodots_keywords') == 'off' ) echo '<div id="message" class="updated fade"><p><strong>You have not set any meta-keywords.</strong></p></div>';
?>

<?php if(has_post_thumbnail())
{
	$image_url = get_the_post_thumbnail();
	$external_url = get_post_meta( $post->ID, 'comic_thumb', true);

	if ( $external_url ) {
		echo '<a href="https://imgs.two-dots.com/comics/thumbs/'.$external_url. '" target="_blank">'.$image_url.'</a>';
	} else {
		echo '<a href="'.get_permalink($postID).'">'.$image_url.'</a>';
	}
} ?>


<div class='wrap'>
	<h2><?php _e('Theme Settings'); ?></h2>
	
	
	
	<form method="post" action="">
			<?php wp_nonce_field('twodots_save_settings'); ?>
			<table class="form-table">
				<tr>
					<th scope="row"><label for="comic_embed_code">Embed</label></th>
					<td><input type="checkbox" name="comic_embed_code" id="comic_embed_code" value="on"<?php if('on' == get_option('comic_embed_code')) print ' checked="checked"'; ?> />
					<label>Include comic embed code with 
						<select name="comic_embed_code_size">
							<option value="full"<?php if('full' == get_option('comic_embed_code_size')) echo ' selected="selected"'; ?>>Full</option>
							<option value="large"<?php if('large' == get_option('comic_embed_code_size')) echo ' selected="selected"'; ?>>Large</option>
							<option value="medium"<?php if('medium' == get_option('comic_embed_code_size')) echo ' selected="selected"'; ?>>Medium</option>
							<option value="thumb"<?php if('thumb' == get_option('comic_embed_code_size')) echo ' selected="selected"'; ?>>Thumbnail</option>
						</select>
					comic images on single comic pages</label></td>
				</tr>
			</table>
			<h3>Archive</h3>
			<table class="form-table">
				<tr>
					<th scope="row"><label for="comic_archive_images">Pages</label></th>
					<td><input type="checkbox" name="comic_archive_images" id="comic_archive_images" value="on"<?php if('on' == get_option('comic_archive_images')) print ' checked="checked"'; ?> />
					<label>Include
						<select name="comic_archive_images_size">
							<option value="full"<?php if('full' == get_option('comic_archive_images_size')) echo ' selected="selected"'; ?>>Full</option>
							<option value="large"<?php if('large' == get_option('comic_archive_images_size')) echo ' selected="selected"'; ?>>Large</option>
							<option value="medium"<?php if('medium' == get_option('comic_archive_images_size')) echo ' selected="selected"'; ?>>Medium</option>
							<option value="thumb"<?php if('thumb' == get_option('comic_archive_images_size')) echo ' selected="selected"'; ?>>Thumbnail</option>
						</select>
					comic images on WordPress archive and search pages</label></td>
				</tr>
				<tr>
					<th scope="row"><label><input type="radio" name="comic_archive_format" value="date"<?php if('date' == get_option('comic_archive_format')) echo ' checked="checked"'; ?> /> Dates</label></th>
					<td>Your archive will be organized by year, month, and day.</td>
				</tr>
				<tr>
					<th><label><input type="radio" name="comic_archive_format" value="chapter"<?php if('chapter' == get_option('comic_archive_format')) echo ' checked="checked"'; if(!get_the_collection()) echo ' disabled="disabled"'; ?> /> Chapters</label></th>
					<td>
					<?php if(!get_the_collection()): ?>
						You must create volumes and chapters and assign comics to them before you can use the chapters archive.
					<?php else: ?>
						Your archive will be organized by volume, chapter, and page.<br />
						<label><input type="checkbox" name="comic_archive_descriptions" id="comic_archive_descriptions" value="on"<?php if('on' == get_option('comic_archive_descriptions')) echo ' checked="checked"'; ?> /> Show volume and chapter descriptions</label><br />
						<label><input type="checkbox" name="comic_archive_pages" id="comic_archive_pages" value="on"<?php if('on' == get_option('comic_archive_pages')) echo ' checked="checked"'; ?> /> Show volume and chapter page counts</label><br />
						<label><input type="checkbox" name="comic_archive_reverse" id="comic_archive_reverse" value="on"<?php if('on' == get_option('comic_archive_reverse')) echo ' checked="checked"'; ?> /> Show volumes, chapters, and pages in reverse order</label>
					<?php endif; ?>
					</td>
				</tr>
			</table>
			
			<h3>General</h3>
			<table class="form-table">
				<tr>
					<td>
						<label>Alternate image root: <input type="text" name="alternate_image_root" id="alternate_image_root" value="<?php echo get_option('alternate_image_root');?>" /></label>
					</td>
				</tr>
			</table>
	
</div>
</div>

<?php } ?>
