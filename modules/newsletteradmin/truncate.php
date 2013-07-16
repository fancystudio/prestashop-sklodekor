<?php
/**
 * Nettoyage de tables depuis le Back-Office Prestashop  
 * @category admin 
 * @copyright eolia@o2switch.net
 * @license http://www.opensource.org/licenses/osl-3.0.php Open-source licence 3.0 
 * @Author Eolia  19/02/2012  compatible PS 1.3- 1.4.8 
 * @version 2.1
 *
 */

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/functions.php');
if(intval(Configuration::get('PS_REWRITING_SETTINGS')) === 1)
	$rewrited_url = __PS_BASE_URI__;	
$filename = 'TRUNCATE';	
	$Key = Configuration::get('NEWSLETTER_KEY_CODE');
			$hostName = _DB_SERVER_;
            $userName = _DB_USER_;
            $password = _DB_PASSWD_;
            $dbName = _DB_NAME_;

            $req = mysql_connect($hostName,$userName,$password) or die(trans('Connection to the server failed'));
            @mysql_select_db($dbName,$req) or die(trans('No such database exist'));
	
			$table1   = 'mailing_history';  
			$table2   = 'mailing_track';  

  function vider_table($table){
    $sql  = "TRUNCATE TABLE "._DB_PREFIX_.$table; 
    mysql_query($sql);
    
    if(mysql_query($sql)){
      // SUCCES
      echo trans('The table').' '.$table.' '.trans('has been cleared').' !<br/><br/>'; 
    }else{
      // ECHEC
      echo trans('The table').' '.$table.' '.trans('has not been emptied of its contents').'.<br/><br/>';
	}
  }
  
  
  // ON VIDE $table_a_vider

  echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>'.trans('Deleting campaigns').'</title>
			</head>
			<body>
			<fieldset style="background:#FFFFF0;border:1px solid #DFD5C3;font-size:1em;margin:5px;padding:1em">
			<legend><a style="margin: 0;padding: 0.2em 0.5em;border: 1px solid #DFD5C3;background: #FFF6D3;font-weight: bold;text-align: center;">'.trans('Report').'</a></legend>
			<div style="margin-left: 12px">';
		mysql_query("TRUNCATE TABLE "._DB_PREFIX_."mailing_sent"); 			
		  vider_table($table1);
		  vider_table($table2);			
			echo '<script type="text/javascript">
            opener.location.reload();
			</script>';
			echo'<form><input type="button" class="button" value="'.trans('Close').'" onclick="window.close()"></form>
			</div>
			</fieldset>
			</body>';
?>	