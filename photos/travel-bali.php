<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Travel to Bali. 巴厘岛');
	$smarty->assign('album_dir','./album/travel-bali/');

	$smarty->display('photos.tpl','travel-bali');

?>