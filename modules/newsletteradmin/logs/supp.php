<?php
/* 
 * Suppression des backups 
 * @module newsletteradmin 
 * @copyright eolia@o2switch.net
*/
include('../../../config/config.inc.php');
	$Key = Configuration::get('NEWSLETTER_KEY_CODE');
	if (@$_GET['key'] != $Key) die('Bad request...Wrong key.');
	
if(isset($_POST['Submit']))
{
for($key=0;$key<count($_POST['list']);$key++)
  unlik($val[$key]);}
  
if (!empty($_GET['file']) && file_exists($_GET['file']))
  unlink($_GET['file']);

header("Location: list.php?key=$Key");
?>