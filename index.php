<?php

	require 'inc/h2o.php';
	
	$time_start = microtime(true);

  	$tpl = new h2o('inc/tpls/portfolio.html', array(
  		'cache'=>'file',
  		'cache_dir'=>'cache',
  		'cache_ttl' => 3600
  		));

    echo $tpl->render(array(
    	'title'=>'Yecols.cn'
    	));

	echo "<!--Generate on ".date("Y-m-d H:i:s").", in ".(microtime(true) - $time_start)." seconds, with memory size ".memory_get_usage()." -->";
?>

