<?php
	// NOTE: Smarty has a capital 'S'
	require('../inc/yecol.smarty.php');

	$smarty = new Yecol_Smarty();

	$smarty->display('portfolio.tpl');
?>