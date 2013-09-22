<?php get_header() ?>
	<div id="divMain">
	  <div id="content">
<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<div class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'sandbox'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></div>
                
				<div class="entry-date">
                <div class="left_act"><span class="date" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php unset($previousday); printf( __( '%1$s &#8211; %2$s', 'sandbox' ), the_date( '', '', '', false ), get_the_time() ) ?></span></div>
                <div class="right_act"> <span class="comments"><?php comments_popup_link( __( '没有评论', 'sandbox' ), __( '1条评论', 'sandbox' ), __( '%条评论', 'sandbox' ) ) ?></span></div>
                </div>
                
                
				<div class="entry-content-index">
                <?php the_excerpt(); ?> 
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
				</div>
                
				<div class="entry-meta">
                    <span class="read-all"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'sandbox'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><span class="meta-nav">阅读全文/Read all</span></a></span>
                    <span class="meta-sep">&nbsp;&nbsp;</span>
					<span class="cat-links"><?php printf( __( ' %s', 'sandbox' ), get_the_category_list(', ') ) ?></span>
					<span class="meta-sep">&nbsp;&nbsp;</span>
					<?php the_tags( __( '<span class="tag-links">', 'sandbox' ), ", ", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">&nbsp;&nbsp;</span>\n" ) ?>
<?php edit_post_link( __( 'Edit', 'sandbox' ), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">&nbsp;&nbsp;</span>\n" ) ?>
					<span class="comments-link"><?php comments_popup_link( __( '没有评论', 'sandbox' ), __( '1条评论', 'sandbox' ), __( '%条评论', 'sandbox' ) ) ?></span>
				</div>
			</div><!-- .post -->

<?php comments_template() ?>

<?php endwhile; ?>
           
           <div id="nav-below" class="navigation">
                <?php  /*if(function_exists('wp_paginator')) { wp_paginator(); } */
				if(function_exists('wp_pagenavi')) { wp_pagenavi();} ?>
		</div>


	  </div><!-- #content -->
	</div><!-- #divMain -->

<?php get_sidebar() ?>
<?php get_footer() ?>