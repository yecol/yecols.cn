<?php get_header() ?>

	<div id="divMain">
		<div id="content">

			<h2 class="page-title"><?php _e( 'Category Archives:', 'sandbox' ) ?> <span><?php single_cat_title() ?></span></h2>
			<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>

           <div id="nav-below" class="navigation">
                <?php  /*if(function_exists('wp_paginator')) { wp_paginator(); } */
				if(function_exists('wp_pagenavi')) { wp_pagenavi();} ?>
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
                <?php  /*if(function_exists('wp_paginator')) { wp_paginator(); } */
				if(function_exists('wp_pagenavi')) { wp_pagenavi();} ?>
		</div>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>