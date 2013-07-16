<?php
/* 
 * Gestion des templates
 * @module newsletteradmin 
 * @copyright eolia@o2switch.net 2013
*/
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
 
	if (file_exists(dirname(__FILE__).'/../../../config/config.inc.php'))
	{
		include(dirname(__FILE__).'/../../../config/config.inc.php');
		include(dirname(__FILE__).'/../../../modules/newsletteradmin/functions.php');
	}
	else {
		include(dirname(__FILE__).'/../../../../../config/config.inc.php');
		include(dirname(__FILE__).'/../../../../../modules/newsletteradmin/functions.php');
	}
	
	$filename = 'TEMPLATES';
	$Key = Configuration::get('NEWSLETTER_KEY_CODE');
	
	echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="content-type" content="text/html; charset=utf-8" />
					<title>'.trans('Manage your templates').'</title>
					</head>
					<body><br/>
					<fieldset style="background:#FFFFF0;border:1px solid #DFD5C3;font-size:1em;margin:5px;padding:1em">
					<legend><a style="margin: 0;padding: 0.2em 0.5em;border: 1px solid #DFD5C3;background: #FFF6D3;font-weight: bold;text-align: center;">'.trans('Your templates').'</a></legend>
					<div style="margin-left: 12px">';
					
	// Lecture des fichiers contenus dans le répertoire
	$rep = dirname(__FILE__);
	$dir = opendir($rep);
		while (false !==($file = readdir($dir)))
		{
			if($file != "." && $file != ".."&& $file != "index.php"&& $file != "list.php"&& $file != "index.html"&& $file != "supp.php")
			{	
				// Insertion du nom du fichier dans le tableau nommé tb
				$tb[] = "$file";
			}
		}

	// Fin de la recherche dans le fichier
	clearstatcache();

	// Tri du tableau par ordre alphabétique
	if (!isset($tb)) 
	{
		$fail = trans('Your template directory is empty').'!';
		echo $fail.'<br/>
					<form><input type="button" class="button" value=" OK " onclick="window.close()"></form>';
	} else
	{
		asort($tb);

		// Affichage du tableau ligne par ligne
		reset($tb);
		echo '<br/>';
			while(list($key,$val) = each($tb))
			{ 
				$val = str_replace("'","_", $val);
				$url=  '<a href="#" onclick=" document.location.href=\''.$val.'\'"><img src="../../../img/admin/details.gif" alt="View" border="0" title="'.trans('View this template').'" width="16px"><a href="#" onclick="if(confirm(\''.trans('Are you sure to delete this template').'? ('.$val.')\')); document.location.href=\'supp.php?key='.$Key.'&file='.$val.'\'"><img src="../../../img/admin/delete.gif" border="0" alt="Delete" title="'.trans('Delete this template').'" width="16px"></a>&nbsp;&nbsp;'.$val.'<br/>';
				echo $url;
			}
			
			echo '			<br/>
							<form><input type="button" class="button" value=" OK " onclick="window.close()"></form>
						</div>
					</fieldset>
				</body>
			</html>';
	}
?>