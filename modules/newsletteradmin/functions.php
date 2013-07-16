<?php
/*
 * Regroupement de certaines fonctions communes 
 * @module newsletteradmin 
 * @copyright eolia@o2switch.net
*/
$filename = 'INSTALL';
	function trans($string)
	{
		$iso = Configuration::get('PS_LOCALE_LANGUAGE');
		global $filename;
		$trans_lang = _PS_MODULE_DIR_.'newsletteradmin/lang/lang_'.$iso.'.php';
		
		if ($iso == 'en') return $string;
		if(file_exists ($trans_lang)) {
			include $trans_lang;

			if (isset ($_LANG[$filename.' '.$string])) {
				return html_entity_decode ($_LANG[$filename.' '.$string]);}

			else 
			{
					$win = file_get_contents($trans_lang);
					$test = substr($win, 0, -2);
					$r = chr(13);
					$wadd = '$_LANG[\''.$filename.' '. addslashes($string).'\'] = \''.addslashes($string).'\';'.$r.'?>'; 
					$test .= $wadd;
					file_put_contents($trans_lang,$test);
					
			return $string;
			}
		}
		else {
		echo 'Warning, Your translation file not exists! Please re-configure your module';
			return $string;}
		
	}

	function nlog($log_message)
	{
		$date = date("d-m-Y");
		$time = date("H\h i\m s\s");
		$log = '../modules/newsletteradmin/logs/'.$date.'.txt' ;
		$wlog=fopen($log, 'a+');
		$log_message = str_replace("&#039;","'", $log_message);
		fwrite($wlog,$log_message);
		$r = chr(13);
		fclose($wlog);
	}

	function cmp($a,$b) 
	{
		if ($a[1] == $b[1])
			return 0;
		return ($a[1] < $b[1]) ? 1 : -1 ;
	}

	function rotate_logs()
	{
			$repertoire_sauvegardes = '../modules/newsletteradmin/logs/';			
			if ($repertoire_ouvert = opendir($repertoire_sauvegardes)) 
			{
				while($fichier_en_cours = readdir($repertoire_ouvert)) {       
						if(is_file($repertoire_sauvegardes.$fichier_en_cours)) {
						$tableau_sauvegardes[] = array($fichier_en_cours, filectime($repertoire_sauvegardes.$fichier_en_cours)) ;
						}
					}
					closedir($repertoire_ouvert) ;  
				}

				$numero_fichier = null;
				usort($tableau_sauvegardes, 'cmp') ;
				// Lecture des entrées triées par date
				foreach($tableau_sauvegardes as $element) {

					if( $numero_fichier > 10 ) {
						// Suppression des sauvegardes obsolètes
						unlink($repertoire_sauvegardes.$element[0]) ;
					}
					$numero_fichier++ ;
				}	
	}
	
	function deltree($dir)  //suppression d'un répertoire et de son contenu(sous-répertoires y compris)
	{ 
		  $current_dir = opendir($dir); 
		  
		  while($entryname = readdir($current_dir))  
		  { 
		  
		   if(is_dir("$dir/$entryname") and ($entryname != "." and $entryname!=".."))  
		   { 
		   deltree("${dir}/${entryname}"); 
		   }  
		   elseif($entryname != "." and $entryname!="..") 
		   { 
		   unlink("${dir}/${entryname}"); 
		   } 
		  
		  } //Fin tant que 
		  
		  closedir($current_dir); 
		  @rmdir(${dir}); 
	}
	  
	function dbconnect()
	{
				$hostName = _DB_SERVER_;
				$userName = _DB_USER_;
				$password = _DB_PASSWD_;
				$dbName = _DB_NAME_;

				$req = mysql_connect($hostName,$userName,$password) or die(trans('Connection to the server failed'));
				@mysql_select_db($dbName,$req) or die(trans('No such database exist'));
	}	
?>	