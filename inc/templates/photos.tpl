<{extends file="index.tpl"}>

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

<{block "js"}>
<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".container-head").width($("#photos").width()+80);
});
$(window).resize(function(){
    $(".container-head").width($("#photos").width()+80);
});
</script>
<{/block}>