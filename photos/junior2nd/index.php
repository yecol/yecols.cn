<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Title" content="檐,个人站,yecols.cn,yecol" />
<meta name="Author" content="yecol" />
<meta name="Keywords" content="檐,yecol,blog,portfolio,博客,作品,摄影,编程,软件,程序,设计,个人站" />
<meta name="Language" content="zh-CN" />
<meta name="Copyright" content="yecol" />
<meta name="Designer" content="yecol" />
<meta name="Robots" content="All" />
<title>檐·Index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yecols.cn</title>
<link rel="shortcut icon" href="http://yecols.cn/images/favicon.ico" />
<link href="../../glb.css" rel="stylesheet" type="text/css" />
	
    <link rel="stylesheet" type="text/css" href="../style.css" />
	<link rel="stylesheet" type="text/css" href="../resources/fancy.css" />
	
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
    <script type="text/javascript" src="../js/jquery-1.2.3.pack.js"></script>
	<script type="text/javascript" src="../js/jquery.fancybox-1.0.0.js"></script>
	
	<script type="text/javascript">
	
		$(function(){
		
			$(".photo-link").fancybox({ 'zoomSpeedIn': 500, 'zoomSpeedOut': 500, 'overlayShow': true }); 
		
		});
	
	</script>

</head>
<body>
<div id="wholePage">
  <div id="menu">
    <ul id="nav">
      <li class="nav" id="index"><a href="../../" title="首页">Index</a></li>
      <li class="nav" id="Photos"><a href="../../photos" title="摄影" class="navnow">Photos</a></li>
      <li class="nav" id="Portfolio"><a href="../../portfolio" title="作业集">Portfolio</a></li>
      <li class="nav" id="Blog"><a href="../../blog" title="博客">Blog</a></li>
      <li class="nav" id="Lab"><a href="../../lab" title="实验室">Lab</a></li>
      <li class="nav" id="Guestbook"><a href="../../guestbook" title="留言本">Guestbook</a></li>
      <li class="nav" id="About"><a href="../../about" title="关于">About</a></li>
    </ul>
  </div>
  <div id="contentPage">
    <div id="divTop"></div>
    <div id="divAll">
      <div id="divPage">
        <div id="divMiddle">
        
        <div id="basicInfo">
        <span id="albumName">专辑 [ 大三下 ]&nbsp;&nbsp;</span>
        <span>上传于2010.4.3</span>
        <a href="../" class="return">[ 返回相册页 ]</a>
        </div>
        
        <div id="thumbs">
      
      
      
      <?php
		
		/* settings */
		$image_dir = 'images/';
		$per_column = 10;
		
		
		/* step one:  read directory, make array of files */
		if ($handle = opendir($image_dir)) {
			while (false !== ($file = readdir($handle))) 
			{
				if ($file != '.' && $file != '..') 
				{
					if(strstr($file,'-thumb'))
					{
						$files[] = $file;
					}
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
				echo '<a class="photo-link" rel="one-big-group" href="',$image_dir,str_replace('-thumb','',$file),'"><img src="',$image_dir,$file,'" width="120" height="120" alt="',$image_dir,str_replace('-thumb','',$file),'" /></a>';
				/*if($count % $per_column == 0) { echo '<div class="clear"></div>'; }*/
			}
			echo '<a class="return-link" href="../" ><img src="../images/return.jpg" width="120" height="120" alt="返回" /></a>';
		}
		else
		{
			echo '<p>There are no images in this gallery.</p>';
		}
		
	?>
     
        
        
        </div>
        
        
        
        
        
          <div id="footer">
            <p><span id="generator-link">浙ICP备08101950号 Copyright © <a href="http://yecols.cn" title="yecols.cn" rel="generator">Yecols.cn</a> 2010. All Rights Reserved. <br />
              <a href="mailto:ddolphin@126.com">联系站长</a>&nbsp;&nbsp;<a href="http://yecols.cn/about">关于</a>&nbsp;&nbsp;<a href="http://yecols.cn/guestbook">留言</a>&nbsp;&nbsp;<a href="http://yecols.cn/link.htm">友情链接</a>&nbsp;&nbsp;<a href="http://yecols.cn/sitemap.asp">站点地图</a>&nbsp;&nbsp;<a href="http://yecols.cn/mgr">登录</a> &nbsp;&nbsp;
              <?php 
function getUrl(){ 
$url="http://".$_SERVER["HTTP_HOST"]; 

if(isset($_SERVER["REQUEST_URI"])){ 
$url.=$_SERVER["REQUEST_URI"]; 
} 
else{ 
$url.=$_SERVER["PHP_SELF"]; 
if(!empty($_SERVER["QUERY_STRING"])){ 
$url.="?".$_SERVER["QUERY_STRING"]; 
} 
} 

return $url; 
} 

              echo '<a href="http://validator.w3.org/check?uri=',getUrl(),'" target="_blank">XHTML 1.0 Validated</a>'
?>
              &nbsp;&nbsp;
              <script src='http://s66.cnzz.com/stat.php?id=975780&amp;web_id=975780&amp;show=pic' type='text/javaScript' charset='gb2312'></script>
              </span> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9074876-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>