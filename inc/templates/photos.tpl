<{extends file="index.tpl"}>

<{block "css" append}>
<link rel="stylesheet" href="/assets/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<{/block}>

<{block "content"}>

<div id="main" role="main" class="container">
 <div class="container-head">
    <ol class="breadcrumb">
      <li><a href="/photos/">Photos 相册</a></li>
      <li><{$album_title}></li>
    </ol>
  </div>

  <section id="photos">
 
 <{photos dir="<{$album_dir}>" }>
  </section><!-- #photos -->
  
</div>
<{/block}>

<{block "photos-ac"}>
class="ac"
<{/block}>

<{block "js" append}>
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
<{/block}>