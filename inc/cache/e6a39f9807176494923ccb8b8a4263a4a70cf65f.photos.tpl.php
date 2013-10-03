<?php /*%%SmartyHeaderCode:13691524d64a60724b1-12449000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6a39f9807176494923ccb8b8a4263a4a70cf65f' => 
    array (
      0 => 'D:\\Servers\\xampp\\xampp\\htdocs\\lhycn\\inc\\templates\\photos.tpl',
      1 => 1380803663,
      2 => 'file',
    ),
    '1b95148edd5940d4a4787a2ad895615e184b8fd5' => 
    array (
      0 => 'D:\\Servers\\xampp\\xampp\\htdocs\\lhycn\\inc\\templates\\index.tpl',
      1 => 1380627853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13691524d64a60724b1-12449000',
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_524d64a6afac61_60480364',
  'cache_lifetime' => 86400,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524d64a6afac61_60480364')) {function content_524d64a6afac61_60480364($_smarty_tpl) {?><!--This page is cached on 2013-10-03 20:35:50 -->
<!--COMMON HEADER-->
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no">
		<title>Yecols.cn</title>
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


<div id="main" role="main" class="container">
 <div class="container-head">
    <ol class="breadcrumb">
      <li><a href="/photos/">Photos 相册</a></li>
      <li>Travel to Taiwan. 台湾</li>
    </ol>
  </div>

  <section id="photos">
 
    <?php echo '<?php'; ?>    
    /* settings */
    $image_dir = './album/travel-taiwan/';
    
    
    /* step one:  read directory, make array of files */
    if ($handle = opendir($image_dir)) {
      while (false !== ($file = readdir($handle))) 
      {
        if ($file != '.' && $file != '..') 
        {
          //if(strstr($file,'-thumb'))
          //{
            $files[] = $file;
          //}
        }
      }
      closedir($handle);
    }
    
    /* step two: loop through, format gallery */
    if(count($files))
    {
      foreach($files as $file)
      {
        $count++;
        $datepos=strpos($file,"-");
        echo '<div class="a-photo">
                        <a class="origin" href="',$image_dir,substr($file,0,$datepos).".jpg",'">
                        <img src="',$image_dir,$file,'" class="thumb">
                <span class="hidden">
                  <p class="info">111',str_replace("_"," ",substr($file,0,$datepos)),'</p>
                  <p class="date">111','</p>
                </span>
                </a>
                            </div>';
      }
    }
    else
    {
      echo '<p>There are no images in this gallery.</p>';
    }
    
  <?php echo '?>'; ?>
  </section><!-- #photos -->
  
</div>

<!--FOOTER-->

<footer>
	<div class="copyright">
  		<p class="text-c9">
			浙ICP备08101950号 Copyright © Jingbo Xu 2013-2016. All Rights Reserved. 
		</p>
	</div>
</footer>

<!--JAVASCRIPT-->

<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".container-head").width($(".container").width()-100);
});
</script>

<!--PAGE END-->
	</body>
</html>
<?php }} ?>