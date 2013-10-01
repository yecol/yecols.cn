<!--This page is cached on {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} -->
<!--COMMON HEADER-->
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no">
		<title>{block "title"}Yecols.cn{/block}</title>
		<link type="text/css" rel="stylesheet" href="/assets/css/style.css">
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
{block "content"}
<div id="main" role="main" class="container"></div>
{/block}
<!--FOOTER-->
{block "footer"}
<footer>
	<div class="copyright">
  		<p class="text-c9">
			浙ICP备08101950号 Copyright © Jingbo Xu 2013-2016. All Rights Reserved. 
		</p>
	</div>
</footer>
{/block}
<!--JAVASCRIPT-->
{block "js"}
{/block}
<!--PAGE END-->
	</body>
</html>
