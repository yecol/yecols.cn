<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet" />
<title>拍拍相似商品视觉搜索</title>
<script src="assets/js/jquery.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script>

$(document).ready(function() {
	
	if($.browser.msie){
		$("#vms-input-file").show();
		$("#vms-input-file").css("width",70);
		$("#vms-input-file").css("height",20);
		$(".image-layout-left").css("height",300);
		$("#input-file-action").hide();	
		
		$("#vms-input-file").bind("change",function(){
			$(".uploadtip").html("已选择文件："+$(this).val());
			$("#vms-input-url").attr("value","");
			$("#errorInfo").hide();
		});
	}
	
	$("#vms-input-file").bind("change",function(){
		$("#vms-input-url").attr("placeholder",$(this).val());
	});
	
	$("#input-file-action").click(function(){
		$("#vms-input-file").click();
		$("#vms-input-url").attr("value","");
		$("#errorInfo").hide();
	});
	
	$("#vms-input-url").click(function(){
		$("#errorInfo").hide();
	});
	
	$("#vms-input-url").keyup(function(){
		$("#errorInfo").hide();
		if($.browser.msie){
			$(".uploadtip").html("");
		}
	});
});

function checkform(){
	
	//no input
	if($("#vms-input-url").val()==""&&$("#vms-input-file").val()==""){
		$("#errorInfo").show();
		return false;
	}
	
	//clear inputfile and bind event.
	if($("#vms-input-url").val()!=""){
		var file = $(":file");
		file.after(file.clone().val(""));
		file.remove();
		
		if($.browser.msie){
			$("#vms-input-file").bind("change",function(){
			$(".uploadtip").html("已选择文件："+$(this).val());
			$("#vms-input-url").attr("value","");
			$("#errorInfo").hide();
			});
		}
		
		else{
			$("#vms-input-file").bind("change",function(){
				$("#vms-input-url").attr("placeholder",$(this).val());
			});
		}
	}
	
	//input url should be url
    var RegUrl = new RegExp();
    RegUrl.compile("^[A-Za-z]+://[A-Za-z0-9-_]+\\.[A-Za-z0-9-_%&\?\/.=]+$");
    if ($("#vms-input-url").val()!=""&&!RegUrl.test($("#vms-input-url").val())) {
		$("#errorInfo").show();
        return false;
    }
	
    return true;
}

</script>


</head>

<body>
<?php


    $randtag = substr(md5(rand(0,32000)),0,10);
	date_default_timezone_set("Asia/Shanghai");
	
	$content_file;
	$search_img_url;
	$json;
	$has_error=false;
	$duration=0.0;
	
	//echo $_FILES["imgfile"]["type"];
	//echo $_FILES["imgfile"]["size"];
	
	if($_POST["imgfileurl"]!=""){
		$search_img_url = $_POST["imgfileurl"];	
		$ch = curl_init();
		$timeout = 60;
		curl_setopt ($ch, CURLOPT_URL, $search_img_url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$content_file = curl_exec($ch);
		curl_close($ch);
		
		$start_time = gettime();
		
		//echo "yecol+".$content_file."+yecol";
		
		matchService($content_file);
		$end_time = gettime();
		$duration = $end_time - $start_time;
	}

	else if ((($_FILES["imgfile"]["type"] == "image/gif")
		|| ($_FILES["imgfile"]["type"] == "image/jpeg")
		|| ($_FILES["imgfile"]["type"] == "image/png")
		|| ($_FILES["imgfile"]["type"] == "image/pjpeg"))
		&& ($_FILES["imgfile"]["size"] < 1024000)){
  		
		if ($_FILES["file"]["error"] > 0){
    		echo "Error: " . $_FILES["imgfile"]["error"] . "<br />";
    	}
  		else
    	{
			
			$content_file = file_get_contents($_FILES['imgfile']['tmp_name']);
			
			// store file in disk
			$imagefilename = date('Ymdhis') . $randtag . getFileExtension($_FILES['imgfile']['name']);
			move_uploaded_file($_FILES["imgfile"]["tmp_name"],"upload/" . $imagefilename);
      		$search_img_url = "upload/" . $imagefilename;
			
            $start_time = gettime();
			matchService($content_file);
			$end_time = gettime();
			$duration = $end_time - $start_time;
    	}
  	}
	else
  	{
  		$has_error = true;
  	}
	
	
	
	function matchService($content_file){
			//$remote_server = "localhost";	
		    $remote_server = "10.171.99.36";	 
        	$boundary = "---------------------".$randtag;
        
        	// Build the header
        	$header = "POST /match HTTP/1.0\r\n";
			//$header = "POST /vs/json.php HTTP/1.0\r\n";
        	$header .= "Host: {$remote_server}\r\n";
        	$header .= "Content-type: multipart/form-data, boundary=$boundary\r\n";
 
        	//$content_file = file_get_contents('aaa.jpg');		
        	//$data .="Content-Disposition: form-data; name=\"userfile\"; filename=\"$file_name\"\r\n";
        	//$data .= "Content-Type: $content_type\r\n\r\n";
			
        	$data = $content_file;
        	//$data .="--$boundary--\r\n";
 
        	$header .= "Content-length: " . strlen($data) . "\r\n\r\n";
                 // Open the connection
  
        	$fp = fsockopen($remote_server, 80);
        	// then just
		
			if(!$fp){
				echo "ERROR cannot open fsock";	
			}
		
        	fputs($fp, $header.$data);
        	// reader
		
			//echo $header;
		
			//echo "<br>";
		
			$serviceResponse = "";

   			while (!feof($fp)) {
        		$serviceResponse .= fgets($fp, 128);
    		}
        	fclose($fp);
			
			//var_dump($serviceResponse);
		
			$jsonResponse = stristr($serviceResponse,"{");
			
			//var_dump($jsonResponse);
		
			global $json;
			$json = json_decode($jsonResponse);
	}
	
	
    function getFileExtension($filename){
		$c=strrchr($filename,'.');
		if($c)
			return $c;
		else
			return '';
	}
	
	function gettime() {
    	list($usec, $sec) = explode(" ", microtime());
    	return (float)$usec + (float)$sec; 
	}
	
?>




<div class="container result-container">
<div class="mini-layout result-layout">
	<form class="form-inline" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return checkform();">
		<div class="legend"><img src="assets/img/logo.png"></div>
		<input id="vms-input-url" name="imgfileurl" type="text" placeholder="输入图片链接地址或点击右侧按钮上传图片" class="input-xxlarge offset1" />
		<input id="vms-input-file" type="file" name="imgfile" />
		<a id="input-file-action" class="button">&nbsp;&nbsp;&nbsp;&nbsp;</a>
		<button type="submit" id="button-search" class="button"></button>
		 <p class="help-block uploadtip"></p>
		
			<div id="errorInfo" class="alert alert-error upload-alert" style="display:none"> <strong>Error:&nbsp;</strong>图片网址格式错误或没有选择上传图片 </div>
	</form>

</div>
<div>
<div class="mini-layout image-layout">

<div class="image-layout-left">
<?php
   if($has_error==false)
   echo '<a href="#" class="thumbnail searchImage"><img src="'.$search_img_url.'" /></a>';
?>
</div>
<div class="image-layout-right">
<?php
   if($has_error==false&&$json->{"ret"}==0){
	   echo '搜索获得&nbsp;<h7>'. $json->{"results"}[0]->{"count"} .'</h7>&nbsp;个结果，耗时&nbsp;<h7>'.number_format($duration, 6, '.', '').'</h7>&nbsp;秒';
   }
   else if($json->{"ret"}==-1){
	   echo "没有找到相似性结果，请换一张图片重新搜索。";
   }
   else
   	   echo "发生错误，请重新搜索";
?>
</div>
</div>

<div>
	<table class="table table-hover">
		<tbody>
		    <?php 
			if($has_error){
				return;
			}else{
			foreach($json->{"results"}[0]->{"result"} as $aresult){
				echo '<tr>';
				echo '<td><a href="#" class="thumbnail snap"> <img src="'. $aresult->{"snap"}.'" /></a></td>';
				echo '<td>.<h6>'.$aresult->{"name"}.'</h6><br />';
				echo 'score:'.$aresult->{"score"}.'<br />';
				echo '商品ID:'.$aresult->{"productId"}.'<br />';
				echo '价格:￥'.$aresult->{"price"}.'<br />';
				echo '类目:'.$aresult->{"class1"}.' / '.$aresult->{"class2"}.' / '.$aresult->{"class3"}.'<br />';
				echo '商家:'.$aresult->{"shopId"}.'<br />';
				echo '链接:<a href="'.$aresult->{"url"}.'" target="_blank">'.$aresult->{"url"}.'</a><br /></td>';
				echo '<tr>';
			}
			}
			?>
		</tbody>
	</table>
</div>
</div>

</body>
</html>
