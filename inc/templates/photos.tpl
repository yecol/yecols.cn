{extends file="index.tpl"}

{block "content"}

<div id="main" role="main" class="container">
 <div class="container-head">
    <ol class="breadcrumb">
      <li><a href="/photos/">Photos 相册</a></li>
      <li>Travel to Taiwan. 台湾</li>
    </ol>
  </div>

  <section id="photos">
 
    {php}
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
    
  {/php}
  </section><!-- #photos -->
  
</div>
{/block}

{block "js"}
<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".container-head").width($(".container").width()-100);
});
</script>
{/block}