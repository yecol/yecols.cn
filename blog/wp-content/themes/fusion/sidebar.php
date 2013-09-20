<?php /* Fusion/digitalnature */
  $options = get_option('fusion_options');
?>
 <!-- sidebar (container) -->
<div id="sidebar">
  <!-- sidebar wrap -->
  <div class="wrap">
     <ul id="sidelist">
        <?php if(!$options['hidesearch']) { ?>
        <li>
          <?php get_search_form(); ?>
		</li>
        <?php } ?>

           <!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>Author</h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li class="infotext">

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
            <p><?php printf(__('You are currently browsing the archives for the %1$s category.', 'fusion'), single_cat_title('',false)); ?></p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
            <p><?php printf(__('You are currently browsing the archives for %1$s','fusion'), get_the_time(__('l, F jS, Y','fusion'))); ?></p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <p><?php printf(__('You are currently browsing the archives for %1$s','fusion'), get_the_time(__('F, Y','fusion'))); ?></p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <p><?php printf(__('You are currently browsing the archives for the year %1$s','fusion'), get_the_time(__('Y','fusion'))); ?></p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
            <p class="error"><?php _e('You have searched the archives for','fusion'); ?> <strong><?php the_search_query(); ?></strong>.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			  <p><?php _e('You are currently browsing the archives.','fusion'); ?></p>
			<?php } ?>

			</li> <?php }?>

            <?php if(!$options['hidecategories'])  { ?>
            <li>

              <!-- sidebar menu (categories) -->
              <ul class="nav">
                <?php if($options['nojquery']) {
                  echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a$2><span>$3</span></a>', wp_list_categories('show_count=0&echo=0&exlude=181&title_li='));
                } else {
                  echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a> \(\<a ([^>]*) ([^>]*)>(.*?)\<\/a>\)@i', '<li $1><a$2><span>$3</span></a><a class="rss tip" $4></a>', wp_list_categories('show_count=0&echo=0&exlude=181&title_li=&feed=XML')); } ?>
              </ul>
              <!-- /sidebar menu -->
            </li>
            <?php } ?>

           <?php 	/* Widgetized sidebar, if you have the plugin installed. */
		    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<?php wp_list_bookmarks(); ?>
			<li class="box-wrap" id="box-archives">
              <div class="box">
               <h2><?php _e('Archives','fusion'); ?></h2>
               <div class="inside">
				<ul>
				<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
				</ul>
                </div>
               </div>
			</li>

			<li class="box-wrap" id="box-meta">
              <div class="box">
               <h2><?php _e('Meta','fusion'); ?></h2>
               <div class="inside">
			   <ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
                </div>
               </div>
			</li>
		   <?php endif; ?>
     </ul>
  </div><!-- /sidebar wrap -->
</div><!-- /sidebar -->
