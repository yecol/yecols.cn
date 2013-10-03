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


    
    <?php
    
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
    
  ?>
  </section><!-- #portfolio -->
  
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
