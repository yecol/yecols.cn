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
            $imagePath = "./origin/".$file;
            // There are 2 arrays which contains the information we are after, so it's easier to state them both
            $exif_ifd0 = read_exif_data($imagePath ,'IFD0' ,0);       
            $exif_exif = read_exif_data($imagePath ,'EXIF' ,0);
            
            //error control
            $notFound = "";
            
            // Model
            if (@array_key_exists('Model', $exif_ifd0)) {
              $camModel = $exif_ifd0['Model'];
            } else { $camModel = $notFound; }
            
            // Exposure
            if (@array_key_exists('ExposureTime', $exif_ifd0)) {
              $camExposure = '&nbsp;&nbsp;'.$exif_ifd0['ExposureTime'];
            } else { $camExposure = $notFound; }

            // Aperture
            if (@array_key_exists('ApertureFNumber', $exif_ifd0['COMPUTED'])) {
              $camAperture = '&nbsp;&nbsp;'.$exif_ifd0['COMPUTED']['ApertureFNumber'];
            } else { $camAperture = $notFound; }
            
            // Date
            if (@array_key_exists('DateTime', $exif_ifd0)) {
              $camDate = '&nbsp;&nbsp;'.
              substr($exif_ifd0['DateTime'],0,4).'-'.
              substr($exif_ifd0['DateTime'],5,2).'-'.
              substr($exif_ifd0['DateTime'],8,2).' '.
              substr($exif_ifd0['DateTime'],11,2).':'.
              substr($exif_ifd0['DateTime'],14,2);
            } else { $camDate = $notFound; }
            
            // ISO
            if (@array_key_exists('ISOSpeedRatings',$exif_exif)) {
              $camIso = '&nbsp;&nbsp;ISO'.$exif_exif['ISOSpeedRatings'];
            } else { $camIso = $notFound; }

            $title = $camModel.$camExposure.$camAperture.$camIso.$camDate;


    	    $html.= '<div class="a-photo">
    	    			<a class="origin" href="./origin/'.$file.'" title="'.$title.'">
                    		<img src="/assets/img/pixel.gif" data-original="'.$image_dir.$file.'" class="thumb" />
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