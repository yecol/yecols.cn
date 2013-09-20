<?php /* Fusion/digitalnature */ ?>
<?php get_header(); ?>

<!-- main content -->
<div id="main-content">
   <?php if (have_posts()) : ?>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
    <h1 class="pagetitle"><?php _e('Archive for category','fusion'); echo ' ';single_cat_title(); ?></h1>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h1 class="pagetitle"><?php _e('Posts Tagged');echo ' ';single_tag_title(); ?></h1>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h1 class="pagetitle"><?php _e('Archive for','fusion'); echo ' ';the_time(__('F jS, Y'),'fusion'); ?></h1>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h1 class="pagetitle"><?php _e('Archive for','fusion'); echo ' ';the_time(__('F, Y'),'fusion'); ?></h1>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h1 class="pagetitle"><?php _e('Archive for','fusion'); echo ' ';the_time(__('Y'),'fusion'); ?></h1>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h1 class="pagetitle"><?php _e('Author Archive','fusion'); ?></h1>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h1 class="pagetitle"><?php _e('Blog Archives','fusion'); ?></h1>
    <?php } ?>
    <?php while (have_posts()) : the_post(); ?>
      <!-- post -->
      <?php if (function_exists("post_class")) { ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php } else { ?>
      <div class="post" id="post-<?php the_ID(); ?>">
      <?php } ?>
        <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','fusion'); echo ' '.the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
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
   <?php else :
    if ( is_category() ) { // If this is a category archive
        ?> <h2> <?php printf(__("Sorry, but there aren't any posts in the %s category yet.", "fusion"),single_cat_title('',false)); ?> </h2> <?php
    } else if ( is_date() ) { // If this is a date archive
    	?> <h2> <?php _e("Sorry, but there aren't any posts with this date."); ?> </h2> <?php
    } else if ( is_author() ) { // If this is a category archive
    	$userdata = get_userdatabylogin(get_query_var('author_name'));
    	?> <h2> <?php printf(__("Sorry, but there aren't any posts by %s yet.", "fusion"),$userdata->display_name); ?> </h2> <?php
    } else {
    	?> <h2> <?php _e('No posts found.'); ?> </h2> <?php
    }
    get_search_form();

    endif;
?>

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