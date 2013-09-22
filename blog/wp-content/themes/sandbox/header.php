<HTML><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<META NAME="Title" CONTENT="檐,个人站,yecols.cn,yecol">
<META NAME="Author" CONTENT="yecol">
<META NAME="Keywords" CONTENT="檐,yecol,blog,portfolio,博客,作品,摄影,编程,软件,程序,设计,个人站">
<META NAME="Language" CONTENT="zh-CN">
<META NAME="Copyright" CONTENT="yecol">
<META NAME="Designer" CONTENT="yecol">
<META NAME="Robots" CONTENT="All">
<title>檐·博&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yecols.cn</title>
   <link rel="shortcut icon" href="http://yecols.cn/images/favicon.ico" />
  <link type="text/css" rel="stylesheet" href="http://yecols.cn/blog/SyntaxHighlighter.css"></link>
  <link href="<?php bloginfo('stylesheet_url') ?>" rel="stylesheet" type="text/css">
  <script type="text/javascript">
startList = function() {
if (document.all&&document.getElementById) {
navRoot = document.getElementById("head_nav");
for (i=0; i<navRoot.childNodes.length; i++) {
node = navRoot.childNodes[i];
node.onmouseover=function() {this.className+=" over";}
node.onmouseout=function() {this.className=this.className.replace(" over", "");}
}
}
if(document.getElementById("content").clientHeight<document.getElementById("divMiddle").clientHeight){
document.getElementById("content").style.height=document.getElementById("divMiddle").offsetHeight+"px";
}
}
window.onload=startList;
function ResizeImage(objImage,maxWidth) {
try{
  if(maxWidth>0){
   var objImg = $(objImage);
   if(objImg.width()>maxWidth){
    objImg.width(maxWidth).css("cursor","pointer").click(function(){
     try{showModelessDialog(objImage.src);}catch(e){window.open(objImage.src);}
    });
   }
  }
}catch(e){};
}
</script></head>
<body>
<div id="nav"><table id="tableid" border="0">
<tr><td height="10"><a href="http://yecols.cn" title="首页">Index</a></td><td class="paddingtd" id="tdIndex">
<td><a href="http://yecols.cn/photos" title="摄影">Photos</a></td><td class="paddingtd" id="tdPhotos">
<td><a href="http://yecols.cn/portfolio" title="作业集">Portfolio</a></td>
<td class="paddingtd" id="tdPortfolio">
<td><a href="http://yecols.cn/blog" title="博客"><span class="navnow">Blog</span></a></td><td class="paddingtd" id="tdBlog">
<td><a href="http://yecols.cn/lab" title="实验室">Lab</a></td><td class="paddingtd" id="tdLab">
<td><a href="http://yecols.cn/guestbook" title="留言">Guestbook</a></td><td class="paddingtd" id="tdGuestbook">
<td><a href="http://yecols.cn/about" title="关于">About</a></td>
</tr></table></div>
<div id="wholePage">
<div id="divTop"></div>
  <div id="divAll">
    <div id="divPage">
      <div id="divMiddle">