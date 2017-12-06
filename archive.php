<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/

$thumbnail_directory = get_comic_directory('url', true);
?>

<?php get_header(); ?>



<div id="content" class="widecolumn">


<?php foreach(posts_by_year() as $year => $posts) : ?>
	<div class="year_box">
		<div class="year"><h2><?php echo $year; ?></h2></div>
		<div class="archive_box">
			<?php foreach($posts as $post) : setup_postdata($post); ?>
				<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>">
					<div class="thumbnail">
						<img class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/texture/groovepaper.png" data-original="<?php echo $thumbnail_directory . get_post_meta($post->ID, 'comic_thumb', true); ?>">
						<h3><?php the_title(); ?></h3>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
		</div>
<?php endforeach; ?>

		
		</div>
</div><!-- end contentBox -->

<?php get_footer(); ?>
