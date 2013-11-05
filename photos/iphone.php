<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','By iPhone. 手机，随手拍.');
	$smarty->assign('album_dir','./album/iphone/');

	$smarty->display('photos.tpl','iphone');

?>