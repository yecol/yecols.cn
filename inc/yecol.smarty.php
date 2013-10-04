<?php

date_default_timezone_set("Asia/Shanghai");  
define("WEB_ROOT",realpath(dirname(__FILE__)."/.."));

require_once(WEB_ROOT."/smarty/Smarty.class.php");

$smarty = new Smarty();

$smarty->template_dir = WEB_ROOT."/inc/templates/";
$smarty->compile_dir = WEB_ROOT."/inc/templates_c/";
$smarty->config_dir = WEB_ROOT."/inc/configs/";
$smarty->cache_dir =  WEB_ROOT."/inc/cache/";
$smarty->caching=1;
$smarty->cache_lifetime=60*60*24;
$smarty->left_delimiter = '<{';  
$smarty->right_delimiter = '}>';

?>