<?php get_header() ?>

	<div id="divMain">
		<div id="content">

			<h2 class="page-title"><?php _e( 'Tag Archives:', 'sandbox' ) ?> <span><?php single_tag_title() ?></span></h2>

			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'sandbox' ) ) ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'sandbox' ) ) ?></div>
			</div>

<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __( 'Permalink to %s', 'sandbox' ), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h3>
				<div class="entry-date">
                <div class="left_act"><span class="date" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php unset($previousday); printf( __( '%1$s &#8211; %2$s', 'sandbox' ), the_date( '', '', '', false ), get_the_time() ) ?></span></div>
                <div class="right_act"> <span class="comments"><?php comments_popup_link( __( '没有评论', 'sandbox' ), __( '1条评论', 'sandbox' ), __( '%条评论', 'sandbox' ) ) ?></span></div>
                </div>
				<div class="entry-content">
<?php the_excerpt(__( 'Read More <span class="meta-nav">&raquo;</span>', 'sandbox' )) ?>

				</div>
				<div class="entry-meta">
					<span class="cat-links"><?php printf( __( ' %s', 'sandbox' ), get_the_category_list(', ') ) ?></span>
					<span class="meta-sep">&nbsp;&nbsp;</span>
					<?php the_tags( __( '<span class="tag-links">', 'sandbox' ), ", ", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">&nbsp;&nbsp;</span>\n" ) ?>
<?php edit_post_link( __( 'Edit', 'sandbox' ), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">&nbsp;&nbsp;</span>\n" ) ?>
					<span class="comments-link"><?php comments_popup_link( __( '没有评论', 'sandbox' ), __( '1条评论', 'sandbox' ), __( '%条评论', 'sandbox' ) ) ?></span>
				</div>
			</div><!-- .post -->

<?php endwhile; ?>

			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'sandbox' ) ) ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'sandbox' ) ) ?></div>
			</div>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>