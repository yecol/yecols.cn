<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Life in Beijing. 北漂生活');
	$smarty->assign('album_dir','./album/life-beijing/');

	$smarty->display('photos.tpl','life-beijing');

?>