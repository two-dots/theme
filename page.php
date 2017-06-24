<?php
/**
 * @package WordPress
 * @subpackage TwoDots
 */

get_header(); ?>

	<div id="content" class="<?php print (!is_page(array('about', 'contact')) ? "widecolumn" : "narrowcolumn"); ?>">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>

<?php if(!is_page(array('about', 'contact'))) get_sidebar(); ?>

<?php get_footer(); ?>