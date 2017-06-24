<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>



<div id="content" class="widecolumn">


<div id="2013" class="year_box">
		<div class="year"><h2>2013</h2></div>
		<div class="archive_box">
		<?php query_posts('showposts=100&offset=0&year=2013'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>">
			<div class="thumbnail">
				<img class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/texture/groovepaper.png" data-original="https://imgs.two-dots.com/comics/thumbs/<?php echo get_post_meta($post->ID, 'comic_thumb', true); ?>">
				<h3><?php the_title(); ?></h3>
			</div>
		</a>
		<?php endwhile; endif; ?>
		</div>
	</div>


	<div id="2012" class="year_box">
		<div class="year"><h2>2012</h2></div>
		<div class="archive_box">
		<?php query_posts('showposts=100&offset=0&year=2012'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>">
			<div class="thumbnail">
				<img class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/texture/groovepaper.png" data-original="https://imgs.two-dots.com/comics/thumbs/<?php echo get_post_meta($post->ID, 'comic_thumb', true); ?>">
				<h3><?php the_title(); ?></h3>
			</div>
		</a>
		<?php endwhile; endif; ?>
		</div>
	</div>
	
	
	<div id="2011" class="year_box">
		<div class="year"><h2>2011</h2></div>
		<div class="archive_box">
		<?php query_posts('showposts=100&offset=0&year=2011'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>">
			<div class="thumbnail">
				<img class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/texture/groovepaper.png" data-original="https://imgs.two-dots.com/comics/thumbs/<?php echo get_post_meta($post->ID, 'comic_thumb', true); ?>">
				<h3><?php the_title(); ?></h3>
			</div>
		</a>
		<?php endwhile; endif; ?>
		</div>
	</div>
	
	<div id="2010" class="year_box">
		<div class="year"><h2>2010</h2></div>
		<div class="archive_box">
		<?php query_posts('showposts=100&offset=0&year=2010'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>">
			<div class="thumbnail">
				<img class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/texture/groovepaper.png" data-original="https://imgs.two-dots.com/comics/thumbs/<?php echo get_post_meta($post->ID, 'comic_thumb', true); ?>">				<h3><?php the_title(); ?></h3>
			</div>
		</a>
		<?php endwhile; endif; ?>
		</div>
	</div>
	
	<div id="2009" class="year_box">
		<div class="year"><h2>2009</h2></div>
		<div class="archive_box">
		<?php query_posts('showposts=100&offset=0&year=2009'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<a href="<?php the_permalink() ?>" alt="comic: <?php the_title(); ?>">
			<div class="thumbnail">
				<img class="lazy" src="<?php bloginfo('stylesheet_directory'); ?>/images/texture/groovepaper.png" data-original="https://imgs.two-dots.com/comics/thumbs/<?php echo get_post_meta($post->ID, 'comic_thumb', true); ?>">
				<h3><?php the_title(); ?></h3>
			</div>
		</a>
		<?php endwhile; endif; ?>
		</div>
	</div>
	

</div>
</div><!-- end contentBox -->

<?php get_footer(); ?>
