<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Travel Log. 云南');
	$smarty->assign('album_dir','./album/travel-yunnan/');

	$smarty->display('photos.tpl','travel-yunnan');

?>