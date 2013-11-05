<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Landscape. 风光');
	$smarty->assign('album_dir','./album/landscape/');

	$smarty->display('photos.tpl','landscape');

?>