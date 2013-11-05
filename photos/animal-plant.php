<?php

	include('../inc/yecol.smarty.php');

	$smarty->assign('album_title','Animals and Plants. 动植物');
	$smarty->assign('album_dir','./album/animal-plant/');

	$smarty->display('photos.tpl','animal-plant');

?>