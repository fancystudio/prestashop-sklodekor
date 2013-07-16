<?php
/* 
 * Import des fichiers csv et txt
 * @module newsletteradmin 
 * @copyright eolia@o2switch.net
 * Version 2.2 - 31/03/2012
*/
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/functions.php');
if(intval(Configuration::get('PS_REWRITING_SETTINGS')) === 1)
	$rewrited_url = __PS_BASE_URI__;	
	$filename = 'IMPORT';		
	$table   = _DB_PREFIX_.'mailing_import';

		
/*Vidage de la table*/			
Db::getInstance()->Execute('TRUNCATE TABLE '.$table);

		echo '
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
		<head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <title>'.trans('Import CSV File').'</title>
			<fieldset style="background:#FFFFF0;border:1px solid #DFD5C3;font-size:1em;margin:50px;padding:1em">
				<legend><img src="logo.gif"  alt="" title="Import" /> <a style="margin: 0;padding: 0.2em 0.5em;border: 1px solid #DFD5C3;background: #FFF6D3;font-weight: bold;text-align: left;">'.trans('Import csv file into your database').' </a></legend>
				<label><b>'.trans('Import file').'...</b><br/><br/></label>';
				
	/*On ouvre le fichier à importer en lecture seulement*/
	if ($_FILES['file']['error'] > 0) { 
		echo trans('Please, choose a file').' !<br />'.trans('Import stopped').'.';
		echo '<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>';
			$back=$_SERVER['HTTP_REFERER'];
		echo '<meta HTTP-EQUIV="Refresh" content="2;URL='.$back.'"> ' ;
		exit();
	}
	else {
	$extension = substr ($_FILES['file']['name'],-3,3);
		if ($extension != 'csv' AND $extension != 'txt')
		{
			echo trans('Error extension file, please choose only a csv or txt file').'<br />'.trans('Import stopped').'.';
			echo '<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>';

			exit();
		}

			echo '<center>
			'.trans('Name of your file').': <font color="#0099CC">'.$_FILES['file']['name'].'</font><br />
			'.trans('Type').': <font color="#0099CC">'.$_FILES['file']['type'].'</font><br />
			'.trans('Size').': <font color="#0099CC">'.($_FILES['file']['size'] / 1024).' Kb</font><br />
			'.trans('Temporarily stored in').': <font color="#0099CC">'.$_FILES['file']['tmp_name'].'</font></center><br />
					<div style="margin-left: 12px">';
  
	$fichier = $_FILES['file']['tmp_name']; 
	$fp = fopen("$fichier", "r");

	}

	while (!feof($fp)) {

		$ligne = fgets($fp,4096);
			if ($ligne != NULL){
				$ligne = str_replace('"','', $ligne);//compatibilité excel
				$liste = explode( ";",$ligne);
				$email = $liste[0];
				@$nom = $liste[1];
				@$prenom = $liste[2];
				if (!Validate::isEmail($email)) {
					echo trans("Verify your email syntax, this address is not a valid email address").'! ('.$email.')<br/>
					 <center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>';
					exit();
					}
				try
				{
					Db::getInstance()->Execute("INSERT INTO `".$table."`(`ID`,`email`,`lastname`,`firstname`) VALUES('ID','$email','$nom','$prenom')");
					//OK
					echo $email.' | '.$nom.' | '.$prenom.'<br />';
				}
				catch(PrestaShopDatabaseException $e) 
				{
					echo trans('Database error').' : '.$e->message;
					echo '<br />'.trans('Import stopped').'.';
					echo '<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>';
					exit();
				}
				
			} else{ 
				echo '<br><font color="red"><b>'.trans('Warning, last lines of your file are empty').'!</b></font><br/>';
				}
	}
	/*Fermeture du fichier*/
	fclose($fp);

	Db::getInstance()->Execute('OPTIMIZE TABLE '.$table);

		echo '</div><br />
			<center><b>'.trans('IMPORT SUCCESS').'!</b></center><br />';


	$back=$_SERVER['HTTP_REFERER'];
		echo '<meta HTTP-EQUIV="Refresh" content="3;URL='.$back.'"> ' ;
		echo  '</fieldset>';
?>