<?php /* Fusion/digitalnature */ ?>
<?php get_header(); ?>

<!-- main content -->
<div id="main-content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="navigation">
      <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
      <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
      <div class="clear"></div>
    </div>

    <?php if (function_exists("post_class")) { ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php } else { ?>
    <div class="post" id="post-<?php the_ID(); ?>">
    <?php } ?>
	   <h2><?php the_title(); ?></h2>
       <br />
	   <div class="entry">
          <div class="postbody entry">
	       <?php the_content(__('Read the rest of this entry &raquo;', 'fusion')); ?>
          </div>
          <?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <?php
          $posttags = get_the_tags();
          if ($posttags) { ?>
          <p class="tags"><?php the_tags(''); ?></p>
          <div class="clear"></div>
          <?php } ?>
          <p class="postmetadata alt">
			<small>
        		<?php _e('This entry was posted on','fusion'); ?>
        		<?php the_time(__('l, F jS, Y','fusion')) ?>, <?php the_time() ?>
        		<?php _e('and is filed under','fusion'); ?>
                <?php the_category(', ') ?>.
                <?php _e('You can follow any responses to this entry through','fusion');echo ' ';post_comments_feed_link('RSS 2.0');echo '.'; ?>
                <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
        		  // Both Comments and Pings are open
                  printf(__('You can <a href="#respond">leave a response</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.', 'fusion'), trackback_url('',false));

        		 } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
        		  // Only Pings are Open
                  printf(__('Responses are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.', 'fusion'), trackback_url('',false));

        		 } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
        		  // Comments are open, Pings are not
        		  _e('You can skip to the end and leave a response. Pinging is currently not allowed.','fusion');

        		 } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
        		  // Neither Comments, nor Pings are open
        		  _e('Both comments and pings are currently closed.','fusion');
        		} ?>
                <?php edit_post_link(__('Edit this entry', 'fusion')); ?>
            </small>
		  </p>
	   </div>
    </div>
	<?php comments_template(); ?>
  <?php endwhile; else: ?>
    <p><?php _e("Sorry, no posts matched your criteria.","fusion"); ?></p>
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