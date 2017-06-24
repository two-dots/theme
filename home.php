<?php
/*
Template Name: Comic Front Page
*/
/**
 * @package WordPress
 * @subpackage TwoDots
 */

get_header(); ?>
		<?php $mycomics = comic_loop(); if ( $mycomics->have_posts() ) : while ( $mycomics->have_posts() ) : $mycomics->the_post(); ?>
		<?php get_comic_layout();?>
		<?php endwhile; endif; ?>
<?php get_footer(); ?>