<?php /*
Post Thumbnail Template
Author: Zach Dunn (www.buildinternet.com)
*/
?>

<h3>Related Comics:</h3>

<?php if ($related_query->have_posts()):?>

	<ol class="related-posts">
		<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>

			<?php
				//Set Default Thumbnail Image URL's
				$related_thumbnail = get_post_meta($post->ID, "comic_thumb", $single = true);
				$default_thumbnail = 'twodots.png';
			?>

			<li>
				<a href="<?php the_permalink() ?>" rel="bookmark">
				<?php if ($related_thumbnail != "") : ?>
					<img src="<?php echo get_comic_directory('url', true) . $related_thumbnail; ?>" alt="<?php the_title(); ?>" class="related-thumbnail" />
				<?php else : ?>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/<?php echo $default_thumbnail; ?>" alt="<?php the_title(); ?>" class="related-default" />
				<?php endif; ?></a>

				<a href="<?php the_permalink() ?>" rel="bookmark" class="related-title"><?php the_title(); ?></a>
			</li>

		<?php endwhile; ?>
	</ol>

<?php else: ?>

	<p>No related posts found</p>

<?php endif; ?>