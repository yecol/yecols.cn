<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Live in Hangzhou. 大学，杭州。');
	$smarty->assign('album_dir','./album/life-hangzhou/');

	$smarty->display('photos.tpl','life-hangzhou');

?>