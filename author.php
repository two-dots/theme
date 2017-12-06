<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Authors*/
?>

<?php get_header(); ?>



<div id="content" class="widecolumn">

	
	<!-- This sets the $curauth variable -->
    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
    <?php $blah = new WP_Query();
$blah->query( array(
    'posts_per_page' => -1,
    'author' => $curauth->ID
) ); ?>
    
    
<div id="author_info" class="tag_box">
    <h2 class="pagetitle">About <?php echo $curauth->display_name; ?></h2>
    
    <div class="portrait"><img data-src="<?php bloginfo('stylesheet_directory'); ?>/images/high-res/<?php echo $curauth->first_name; ?>-2x.png" data-width="160" data-height="216" alt="Drawing of <?php echo $curauth->first_name; ?>" class="retina_img border-radius"><noscript><img src="<?php bloginfo('stylesheet_directory'); ?>/images/high-res/<?php echo $curauth->first_name; ?>-2x.png" alt="<?php echo $curauth->first_name; ?>"></noscript></div>
    <div class="Description">
    	<h3><?php echo $curauth->display_name; ?></h3>
    	<p><?php echo $curauth->description; ?></p>
    </div>
    <div class="contact_bar">
    	<div id="post_count" class="stat"><i class="ss-icon">barchart</i><?php the_author_posts(); ?> posts</div>
    	<div id="twitter" class="stat"><a href="https://twitter.com/<?php echo $curauth->twitter ?>/" target = "_blank"><i class="ss-icon ss-social-regular">twitter</i><?php echo $curauth->twitter ?></a></div>
    	
    </div>
</div>


<!-- The Loop -->
<div id="author_posts" class="archive_box">
<h2 class="pagetitle">Posts</h2>

    <?php if ( have_posts() ) : while ( $blah-> have_posts() ) : $blah-> the_post(); ?>
        <a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>">
			<div class="thumbnail">
				<img class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/texture/groovepaper.png" data-original="<?php echo get_comic_directory('url', true) . get_post_meta($post->ID, 'comic_thumb', true); ?>">
				<h3><?php the_title(); ?></h3>
			</div>
		</a>


    <?php endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>

    <?php endif; ?>
    
</div>

<!-- End Loop -->

    </ul>
	

</div>
</div><!-- end contentBox -->

<?php get_footer(); ?>
