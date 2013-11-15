<?php

	header("Content-Type: text/html;charset=utf-8");
	
	function do_post_request($url, $data, $optional_headers = null)
	{
	  	// $params = array('http' => array(
	  	//             'method' => 'POST',
	  	//             'content' => $data
	  	//           ));
	  	// if ($optional_headers !== null) {
	  	//   	$params['http']['header'] = $optional_headers;
	  	// }
	  	// $ctx = stream_context_create($params);
	  	// $fp = @fopen($url, 'rb', false, $ctx);
	  	// if (!$fp) {
	  	//   	throw new Exception("Problem with $url, $php_errormsg");
	  	// }
	  	// $response = @stream_get_contents($fp);
	  	// if ($response === false) {
	  	//   	throw new Exception("Problem reading data from $url, $php_errormsg");
	  	// }
	  	// return $response;

	  	$ch = curl_init();
		$timeout = 60;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_HEADER, 0);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$response = curl_exec($ch);
		curl_close($ch);

	  	return $response;

	}


	function make_request($question){

		// return do_post_request("http://10.212.3.21:12447/ask_answer","<xml>
 	// 		<ToUserName><![CDATA[yecolxu]]></ToUserName>
 	// 		<FromUserName><![CDATA[yecolxu]]></FromUserName>
 	// 		<CreateTime>".time()."</CreateTime>
 	// 		<MsgType><![CDATA[text]]></MsgType>
 	// 		<Content><![CDATA[".$question."]]></Content>
 	// 		<MsgId>1234567890123456</MsgId>
 	// 		</xml>");

		//外网
		return do_post_request("http://140.207.54.156/ask_answer","<xml>
 					<ToUserName><![CDATA[yecolxu]]></ToUserName>
 					<FromUserName><![CDATA[yecolxu]]></FromUserName>
 					<CreateTime>".time()."</CreateTime>
 					<MsgType><![CDATA[text]]></MsgType>
 					<Content><![CDATA[".$question."]]></Content>
 					<MsgId>1234567890123456</MsgId>
 					</xml>");
	}


	function make_response($original_response){

		try{
			//open xml
			$dom = new DOMDocument();
			$dom->loadXML($original_response);
			$r_string = $dom->getElementsByTagName('Content')->item(0)->nodeValue;

			//jsonlint
			$response_string = "{";

			$begin_postion = 0;

			$n = substr_count($r_string,"]");
			while($n--) {

				if ($begin_postion!=0) {
					$response_string .= ',';
				}

				$end_postion = stripos($r_string,"]",$begin_postion);

				$frag = substr($r_string,$begin_postion+1,$end_postion-$begin_postion-1);

				$mid = stripos($frag,':');
				$key=trim(substr($frag,0,$mid));
				$value=trim(substr($frag,$mid+1));

				$response_string .= '"'.$key.'":"'.$value.'"'; 
				$begin_postion = $end_postion+2;

			}

			$response_string .="}";

			echo $response_string;
			
		}catch(Exception $e){
		}

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		make_response(make_request($_REQUEST['q']));
	}

?>