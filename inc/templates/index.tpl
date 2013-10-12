<!--This page is cached on <{$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'}> -->
<!--COMMON HEADER-->
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no">
		<title><{block "title"}>Yecols.cn<{/block}></title>
		<{block "css"}>
		<link type="text/css" rel="stylesheet" href="/assets/css/style.css">
		<{/block}>
	</head>
	<body>
		<nav class="site-nav" tabindex="-1">
			<button class="site-nav-logo" data-action="open-nav"><span class="reader-text">HOME</span></button>
			<div class="nav-list-container">
				<ul class="nav-list">
					<li class="nav-list-item">
						<a href="#"><span class="reader-text">Navigation</span></a>
					</li>
					<li class="nav-list-item">
						<a href="/photos/">Photos</a>
					</li>
					<li class="nav-list-item">
						<a href="/blog/">Blog</a>
					</li>
					<li class="nav-list-item">
						<a href="/portfolio/">Portfolio</a>
					</li>
					<li class="nav-list-item">
						<a href="/lab/">Lab</a>
					</li>
					<li class="nav-list-item">
						<a href="/about/">About</a>
					</li>
				</ul>
			</div>
		</nav>
<!--PAGE MODULE-->
<{block "content"}>
<div id="main" role="main" class="container"></div>
<{/block}>
<!--FOOTER-->
<{block "footer"}>
<footer>
	<div id="wrap">
		<div class="nav">
			<a href="/photos/" <{block "photos-ac"}><{/block}> title="摄影">Photos</a>
			<a href="/blog/" <{block "blog-ac"}><{/block}> title="文字">Blog</a>
			<a href="/portfolio/" <{block "portfolio-ac"}><{/block}> title="作品集">Portfolio</a>
			<a href="/lab/" <{block "lab-ac"}><{/block}> title="试验">Lab</a>
			<a href="/about/" <{block "about-ac"}><{/block}> title="关于">About</a>
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
<{/block}>
<!--JAVASCRIPT-->
<{block "js"}>
<!--<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>-->
<script type="text/javascript" src="/assets/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/assets/js/tooltip.js"></script>
<{/block}>
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
<!--PAGE END-->
	</body>
</html>
