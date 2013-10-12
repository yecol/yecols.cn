<?php /* Smarty version Smarty-3.1.10, created on 2013-10-12 12:08:39
         compiled from "D:\Servers\xampp\xampp\htdocs\lhycn\inc\templates\photos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176185258b7f2a6ccd4-86853518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6a39f9807176494923ccb8b8a4263a4a70cf65f' => 
    array (
      0 => 'D:\\Servers\\xampp\\xampp\\htdocs\\lhycn\\inc\\templates\\photos.tpl',
      1 => 1381550806,
      2 => 'file',
    ),
    '1b95148edd5940d4a4787a2ad895615e184b8fd5' => 
    array (
      0 => 'D:\\Servers\\xampp\\xampp\\htdocs\\lhycn\\inc\\templates\\index.tpl',
      1 => 1381546947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176185258b7f2a6ccd4-86853518',
  'function' => 
  array (
  ),
  'cache_lifetime' => 86400,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5258b7f38e7882_62493483',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5258b7f38e7882_62493483')) {function content_5258b7f38e7882_62493483($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\Servers\\xampp\\xampp\\htdocs\\lhycn\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_function_photos')) include 'D:\\Servers\\xampp\\xampp\\htdocs\\lhycn\\smarty\\plugins\\function.photos.php';
?><!--This page is cached on <?php echo smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S');?>
 -->
<!--COMMON HEADER-->
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no">
		<title>Yecols.cn</title>
		
		<link type="text/css" rel="stylesheet" href="/assets/css/style.css">
		
<link rel="stylesheet" href="/assets/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

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


<div id="main" role="main" class="container">
 <div class="container-head">
    <ol class="breadcrumb">
      <li><a href="/photos/">Photos 相册</a></li>
      <li><?php echo $_smarty_tpl->tpl_vars['album_title']->value;?>
</li>
    </ol>
  </div>

  <section id="photos">
 
 <?php echo smarty_function_photos(array('dir'=>((string)$_smarty_tpl->tpl_vars['album_dir']->value)),$_smarty_tpl);?>

  </section><!-- #photos -->
  
</div>

<!--FOOTER-->

<footer>
	<div id="wrap">
		<div class="nav">
			<a href="/photos/" 
class="ac"
 title="摄影">Photos</a>
			<a href="/blog/"  title="文字">Blog</a>
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

<!--<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>-->
<script type="text/javascript" src="/assets/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/assets/js/tooltip.js"></script>

<script type="text/javascript" src="/assets/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/assets/js/jquery.lazyload.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('footer .nav a.ac').tooltip({trigger:'manual'}).tooltip('show');
    $('footer .nav a').not('.ac').tooltip();
    
    $(".container-head").width($("#photos").width()+80);
    $(".origin").fancybox({
      beforeLoad: function() {
        this.title = $(this.element).attr('exif');
      },
    	padding:8,
      openEffect  : 'none',
      closeEffect : 'none',
      helpers : {
        title : {
          type : 'over'
        }
      }
    });
    $("img.thumb").lazyload({
      threshold : 400
    });
});
$(window).resize(function(){
    $(".container-head").width($("#photos").width()+80);
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
<!--PAGE END-->
	</body>
</html>
<?php }} ?>