<?php
/* 
 * Suppression des backups 
 * @module newsletteradmin 
 * @copyright eolia@o2switch.net
*/
include(dirname(__FILE__).'/../config/config.inc.php');
	$Key = Configuration::get('NEWSLETTER_KEY_CODE');
	if (@$_GET['key'] != $Key) die('Bad request...Wrong key.');	
	
if (!empty($_GET['file']) && file_exists($_GET['file']))
  unlink($_GET['file']);

header("Location: list.php?key=$Key");
?>