<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<?php
// 在 4.1.0 以前的 PHP 中，需要用 $HTTP_POST_FILES 代替 $_FILES。
// 在 4.0.3 以前的 PHP 中，需要用 copy() 和 is_uploaded_file() 来代替 move_uploaded_file()。

include("./AES.class.php");

#aes padding function#
function pad2Length($text, $padlen){
	$len = strlen($text)%$padlen;
	$res = $text;
	$span = $padlen-$len;
	for($i=0; $i<$span; $i++){
		$res .= chr($span);
	}
	return $res;
}


print '<pre>';
    $imageBytes = file_get_contents($_FILES['imgfile']['tmp_name']);
	#var_dump($imageBytes);
	
	#echo $imageBytes;


	$source_str = "image_r_iphone";
	$secret_str = "5j59p2";
	$timeIntervalSince1970 = "123456789";


	$postBodyString = "v=1.0";
	$postBodyString = $postBodyString . "&source=" . $source_str;
	$postBodyString = $postBodyString . "&time=" . $timeIntervalSince1970; 

    $veri_str_raw = $source_str . $secret_str . $timeIntervalSince1970;
	
	$postBodyString = $postBodyString . "&veri_str=" . md5($veri_str_raw);
	$postBodyString = $postBodyString . "&location=0,0" ;
	$postBodyString = $postBodyString . "&pic_info=" . strlen($bytes);

    #echo $postBodyString . '<br>';
	
	#print_r(bin2hex($postBodyString));
	
	$postdata = bin2hex($postBodyString);
	
	$postdata = $postdata . '\0' . $imageBytes;
	
	#print_r($postdata);
	
	#AES 128+ECB#
    
	$z = "cloud.shurufa{{{";
	$aes = new AES($z);
	
	#$padkey = "{";
	$padpostdata = pad2Length($postdata,16);
	
	$aesPostData = $aes->encrypt($padpostdata);
	
	#print_r($aesPostData);
	
    echo strlen($aesPostData);
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,            "http://10.171.99.36/search" );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt($ch, CURLOPT_POST,           1 );
	curl_setopt($ch, CURLOPT_POSTFIELDS,     $aesPostData ); 
	curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain','Content-Length:'.strlen($aesPostData))); 

    //print_r($ch);

	$result=curl_exec ($ch);
	
	echo $result;
	
	
    print '</pre>';

?>


<body>
</body>
</html>