<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Travel Log. 日本');
	$smarty->assign('album_dir','./album/travel-japan/');

	$smarty->display('photos.tpl','travel-japan');

?>