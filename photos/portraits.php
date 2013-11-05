<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Faces. 人像');
	$smarty->assign('album_dir','./album/portraits/');

	$smarty->display('photos.tpl','faces');

?>