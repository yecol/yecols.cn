<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Travel to Nanjing. 南京');
	$smarty->assign('album_dir','./album/travel-nanjing/');

	$smarty->display('photos.tpl','travel-nanjing');

?>