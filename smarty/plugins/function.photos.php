<?php

	/**
	 * 定义函数，参数为数组放置标签的属性
	 * @param 传递参数 $args
	 */
	function smarty_function_photos($args,&$smarty){

		/* settings */
    	$image_dir = $args["dir"];
    	
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


    	$html="";
    	/* step two: loop through, format gallery */
    	if(count($files))
    	{
    	  foreach($files as $file)
    	  {
    	    $datepos=strpos($file,"-");
    	    $html.= '<div class="a-photo">
    	    			<a class="origin" href="'.$image_dir.substr($file,0,$datepos).".jpg".'">
                    		<img src="'.$image_dir.$file.'" class="thumb" />
                			<span class="hidden">
                  				<p class="info">111'.str_replace("_"," ",substr($file,0,$datepos)).'</p>
                  				<p class="date">111'.'</p>
                			</span>
                		</a>
                	</div>';
          }
    	}
    	else
    	{
      		echo '<p>There are no images in this gallery.</p>';
    	}

		return $html;
	}
?>