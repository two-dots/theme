<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Tag Page
*/
?>

<?php get_header(); ?>



<div id="content" class="widecolumn">


	<?php if (have_posts() && !is_category(get_comic_category())) : ?>

 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
		
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Comics tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	   	  <?php } ?>

 	   	  
		<?php while (have_posts()) : the_post(); ?>
		<div class="tag_box">
			<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>">
			<div class="thumbnail">
				<img class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/texture/groovepaper.png" data-original="<?php echo get_comic_directory('url', true) . get_post_meta($post->ID, 'comic_thumb', true); ?>">
				<h3><?php the_title(); ?></h3>
			</div>
			</a>
			<div class="Description">
				<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
				<p><?php echo get_post_meta($post->ID, 'comic_meta_description', true); ?></p>
				<div class="postmetadata"><i class="ss-icon">tags</i><p class="tags"><?php the_tags('', ', ', '<br />'); ?></p></div>
				<div class="postmetadata"><i class="ss-icon">bookmark</i><p class="bookmarks"><?php the_category(', '); ?></p></div>
				<div class="postmetadata"><i class="ss-icon">user</i><p><?php the_author_posts_link(); ?> <?php global $wp_query;$postid = $wp_query->post->ID; echo get_post_meta($postid, 'and_author', true);?></p></div>
			</div>
 	   	  </div>
		<?php endwhile; endif; ?>

		
</div>
</div><!-- end contentBox -->

<?php get_footer(); ?>
