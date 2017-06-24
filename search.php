<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Search page
*/
?>

<?php get_header(); ?>



<div id="content" class="widecolumn">


<?php if ( have_posts() ) : ?>

		<h2 class="pagetitle">Search results for <br> &#8216;<?php echo $s ?>&#8217;</h2>


<?php get_search_form(); ?>
 	   	  
		<?php while (have_posts()) : the_post(); ?>
		<div class="tag_box">
			<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>">
			<div class="thumbnail">
				<img class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/texture/groovepaper.png" data-original="https://imgs.two-dots.com/comics/thumbs/<?php echo get_post_meta($post->ID, 'comic_thumb', true); ?>">
				<h3><?php the_title(); ?></h3>
			</div>
			</a>
			<div class="Description">
				<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
				<p><?php echo get_post_meta($post->ID, 'comic_meta_description', true); ?></p>
				<div class="postmetadata"><i class="ss-icon">tags</i><p class="tags"><?php the_tags('', ', ', '<br />'); ?></p></div>
				<div class="postmetadata"><i class="ss-icon">bookmark</i><p class="bookmarks"> <?php the_category(', ') ?>
				<!--<?php get_the_chapter(', ') ?>--></p></div>
				<div class="postmetadata"><i class="ss-icon">user</i><p><?php the_author_posts_link(); ?> <?php global $wp_query;$postid = $wp_query->post->ID; echo get_post_meta($postid, 'and_author', true);?></p></div>
			</div>
 	   	  </div>
		<?php endwhile;?>
		
		<?php else : ?>
 
                <?php get_template_part( 'no-results', 'search' ); ?>
 
            <?php endif; ?>

		
</div>
</div><!-- end contentBox -->

<?php get_footer(); ?>