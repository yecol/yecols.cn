<?php /* Fusion/digitalnature

Template Name: Archives 
*/ ?>
<?php get_header(); ?>

<!-- main content -->
<div id="main-content">
 <?php get_search_form(); ?>
 <h2><?php _e('Archives by Month:','fusion'); ?></h2>
 <ul>
  <?php wp_get_archives('type=monthly'); ?>
 </ul>
 <h2><?php _e('Archives by Subject:','fusion'); ?></h2>
  <ul>
   <?php wp_list_categories(); ?>
  </ul>
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