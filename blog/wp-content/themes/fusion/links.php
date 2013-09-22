<?php /* Fusion/digitalnature

Template Name: Links 
*/ ?>
<?php get_header(); ?>

<!-- main content -->
<div id="main-content">
 <h2><?php _e("Links:","fusion"); ?></h2>
 <ul>
  <?php wp_list_bookmarks(); ?>
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
