 <!-- 2nd sidebar -->
<div id="sidebar2">
  <ul>
    <?php
      if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
       <li>hey look another sidebar :)<br />Add some widgets here to make me dissapear</li>
      <?php endif; ?>
  </ul>
</div><!-- /2nd sidebar -->
