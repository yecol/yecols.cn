<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>



	</div><!-- #main .wrapper -->
</div><!-- #page -->

<footer>
	<div id="wrap">
		<div class="nav">
			<a href="/photos/" title="摄影">Photos</a>
			<a href="/blog/" class="ac" title="文字">Blog</a>
			<a href="/portfolio/"  title="作品集">Portfolio</a>
			<a href="/lab/"  title="试验">Lab</a>
			<a href="/about/"  title="关于">About</a>
		</div>
		<div class="search">
  			<div class="input-append">
    			<input id="appendedInputButton" type="text">
    			<button class="btn" type="button">Search</button>
  			</div>
		</div>
		<div class="info">
  			<div class="copyright">©Jingbo Xu<br/>浙 ICP 备08101950号</div>
  			<div class="social">
    			<a href="http://www.linkedin.com/pub/jingbo-xu/7a/427/532" id="linkedin" target="blank"></a>
    			<a href="https://www.facebook.com/yecolhsu" id="facebook" target="blank"></a>
    			<a href="http://weibo.com/yecol" id="weibo" target="blank"></a>   
  			</div>
		</div>
	</div>
</footer>

<!--JAVASCRIPT-->
<script type="text/javascript" src="/assets/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/assets/js/tooltip.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('footer .nav a.ac').tooltip({trigger:'manual'}).tooltip('show');
    $('footer .nav a').not('.ac').tooltip();
});
$(window).resize(function(){
    $('footer .nav a.ac').tooltip({trigger:'manual'}).tooltip('show');
});
</script>

<!--GOOGLE ANALYTICS-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-9074876-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</body>
</html>