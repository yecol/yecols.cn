<?php get_header(); ?>

<!-- main content -->
<div id="main-content">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

            <!-- post -->
            <?php if (function_exists("post_class")) { ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php } else { ?>
            <div class="post" id="post-<?php the_ID(); ?>">
            <?php } ?>
                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','fusion'); echo ' '.the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                <!-- story header -->
                <div class="postheader">
                    <div class="postinfo">
                    <p>
                    <?php printf(__('Posted by %s in %s','fusion'),'<a href="'. get_author_posts_url(get_the_author_ID()) .'" title="'. sprintf(__("Posts by %s","fusion"), attribute_escape(get_the_author())).' ">'. get_the_author() .'</a>',get_the_category_list(', ')) ?>  <?php printf(' '.__("on","fusion").' ');the_time(__('F jS, Y','fusion')) ?>

                    <span class="editlink"><?php edit_post_link(''); ?></span></p>
                    </div>
                </div>
                <!-- /story header -->

				<div class="postbody entry">
					<?php the_content(__('Read the rest of this entry &raquo;', 'fusion')); ?>
				</div>
                <?php
                 $posttags = get_the_tags();
                 if ($posttags) { ?>
                  <p class="tags"><?php the_tags(''); ?></p>
                <?php } ?>
                <p class="postcontrols">
                  <?php
                  global $id, $comment;
  	              $number = get_comments_number( $id );
                  ?>
                  <a class="<?php if($number<1) { echo 'no '; }?>comments" href="<?php comments_link(); ?>"><?php comments_number(__('No Comments','fusion'), __('1 Comment','fusion'), __('% Comments','fusion')); ?></a>
                </p>
                <div class="clear"></div>
		    </div>
            <!-- /post -->

		<?php endwhile; ?>

		<div class="navigation" id="pagenavi">
     	<?php if(function_exists('wp_pagenavi')) : ?>
		<?php wp_pagenavi() ?>
     	<?php else : ?>
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','fusion')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','fusion')) ?></div>
            <div class="clear"></div>
        <?php endif; ?>
		</div>

	<?php else : ?>

		<h2><?php _e("Not Found","fusion"); ?></h2>
		<p class="error"><?php _e("Sorry, but you are looking for something that isn't here.","fusion"); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>

</div>
<!-- /main content -->

</div>
<!-- /main -->
</div>
<!-- /main wrapper -->

<?php get_sidebar(); ?>

<!-- clear main & sidebar sections -->
<div class="clearcontent"></div>
<!-- /clear main & sidebar sections -->

<?php get_footer(); ?>
