<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Travel Log. 台湾');
	$smarty->assign('album_dir','./album/travel-taiwan/');

	$smarty->display('photos.tpl','travel-taiwan');

?>