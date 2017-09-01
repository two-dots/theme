<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
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
                <?php
                  $comic = get_the_comic();
                  $filename = isset($comic->file) ? $comic->file : '';
?>
                <p><a class="embededlinklink" href="<?php $filename; ?>" target="_blank"><i class="ss-icon">picture</i></a><?php $filename; ?><p>
 
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
        <a class="btn social" target="_blank" title="share on twitter" href="https://twitter.com/intent/tweet?text=<?php the_title();?>&url=<?php the_permalink(); ?>&via=<?php the_author_meta( 'twitter'); ?>"><i class="ss-icon ss-social-circle ss-twitter"></i></a>
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
      <?php function_exists("related_posts") ? related_posts() : ''; ?>
      
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

    // Remove Yahoo IM
    unset($contactmethods['yim']);
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);

    return $contactmethods;
}

add_filter('user_contactmethods','my_new_contactmethods',10,1);

add_action('admin_menu', 'add_twodots_theme_menu_item');
add_action('admin_init', "display_twodots_theme_settings_fields");

function add_twodots_theme_menu_item() {
  add_theme_page(__('Theme Settings'), __('TwoDots Settings'), 'edit_themes', 'twodots-theme-settings-page', 'twodots_theme_page_display');
}

function twodots_theme_page_display() {
  wp_enqueue_script('tags', '/wp-content/themes/twodots/js/tags.js');
  if ( get_option('twodots_keywords') == 'off' ) echo '<div id="message" class="updated fade"><p><strong>You have not set any meta-keywords.</strong></p></div>';
?>
<div class="wrap">
    <h1><?php _e('Theme Settings'); ?></h1>
    <form method="post" action="options.php">
<?php
    do_settings_sections("twodots-theme-settings-page");
    settings_fields("twodots-theme-settings");
    submit_button();
?>
    </form>
</div>
<?php 
}

function display_twodots_theme_settings_fields() {
    add_settings_section( "general", "General", null, 'twodots-theme-settings-page' );

    add_settings_field( "alternate_image_root", "Alternate image root", "display_alternate_image_root", "twodots-theme-settings-page", "general" );
    register_setting( "twodots-theme-settings", "alternate_image_root" );

    add_settings_field( "comic_embed_code", "Embed", "display_comic_embed_code", "twodots-theme-settings-page", "general" );
    register_setting( "twodots-theme-settings", "comic_embed_code" );
    register_setting( "twodots-theme-settings", "comic_embed_code_size" );

    add_settings_section( "archive", "Archive", null, "twodots-theme-settings-page" );

    add_settings_field( "comic_archive_pages", "Pages", "display_comic_archive_pages", "twodots-theme-settings-page", "archive" );
    register_setting( "twodots-theme-settings", "comic_archive_images" );
    register_setting( "twodots-theme-settings", "comic_archive_images_size" );

    add_settings_field( "comic_archive_format", "Format", "display_comic_archive_format", "twodots-theme-settings-page", "archive" );
    register_setting( "twodots-theme-settings", "comic_archive_format" );
    register_setting( "twodots-theme-settings", "comic_archive_descriptions" );
    register_setting( "twodots-theme-settings", "comic_archive_pages" );
    register_setting( "twodots-theme-settings", "comic_archive_reverse" );
}

function display_alternate_image_root() {
?>
    <input type="text" name="alternate_image_root" class="regular-text" value="<?php echo get_option('alternate_image_root');?>" />
<?php
}

function display_comic_embed_code() {
?>
    <input type="checkbox" name="comic_embed_code" value="on"<?php checked('on', get_option('comic_embed_code'), true); ?> />
    <label>Include comic embed code with 
    <select name="comic_embed_code_size">
        <option value="full"<?php selected('full', get_option('comic_embed_code_size'), true); ?>>Full</option>
        <option value="large"<?php selected('large', get_option('comic_embed_code_size'), true); ?>>Large</option>
        <option value="medium"<?php selected('medium', get_option('comic_embed_code_size'), true); ?>>Medium</option>
        <option value="thumb"<?php selected('thumb', get_option('comic_embed_code_size'), true); ?>>Thumbnail</option>
    </select>
    comic images on single comic pages</label>
<?php
}

function display_comic_archive_pages() {
?>
  <input type="checkbox" name="comic_archive_images" value="on"<?php checked('on', get_option('comic_archive_images'), true); ?> />
  <label>Include
    <select name="comic_archive_images_size">
      <option value="full"<?php selected('full', get_option('comic_archive_images_size'), true); ?>>Full</option>
      <option value="large"<?php selected('large', get_option('comic_archive_images_size'), true); ?>>Large</option>
      <option value="medium"<?php selected('medium', get_option('comic_archive_images_size'), true); ?>>Medium</option>
      <option value="thumb"<?php selected('thumb', get_option('comic_archive_images_size'), true); ?>>Thumbnail</option>
    </select>
    comic images on WordPress archive and search pages</label></td>
<?php
}

function display_comic_archive_format() {
?>
  <fieldset>
    <p>
      <label><input type="radio" name="comic_archive_format" value="date"<?php checked('date', get_option('comic_archive_format'), true); ?> /> Dates</label>
      <p class="description">
        Your archive will be organized by year, month, and day.
      </p>
    </p>
    <p>
      <label><input type="radio" name="comic_archive_format" value="chapter"<?php checked('chapter', get_option('comic_archive_format'), true); disabled(true, !get_the_collection(), true); ?> /> Chapters</label>
    </p>
    <?php if(!get_the_collection()): ?>
      <p class="description">
        You must create volumes and chapters and assign comics to them before you can use the chapters archive.
      </p>
    <?php else: ?>
      <p class="description">
        Your archive will be organized by volume, chapter, and page.
      </p>
      <ul>
        <li><label><input type="checkbox" name="comic_archive_descriptions" value="on"<?php checked('on', get_option('comic_archive_descriptions'), true); ?> /> Show volume and chapter descriptions</label></li>
        <li><label><input type="checkbox" name="comic_archive_pages" value="on"<?php checked('on', get_option('comic_archive_pages'), true); ?> /> Show volume and chapter page counts</label></li>
        <li><label><input type="checkbox" name="comic_archive_reverse" value="on"<?php checked('on', get_option('comic_archive_reverse'), true); ?> /> Show volumes, chapters, and pages in reverse order</label></li>
      </ul>
    <?php endif; ?>
  </fieldset>
<?php
}
