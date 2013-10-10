<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php twentytwelve_entry_meta(); ?>
		<header class="entry-summary-header">
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		</header><!-- .entry-header -->

		
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<hr>
		

	</article><!-- #post -->
