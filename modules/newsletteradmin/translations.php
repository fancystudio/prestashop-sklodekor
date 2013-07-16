<?php
/* 
 * Gestion des traductions 
 * @module newsletteradmin 
 * @copyright eolia@o2switch.net
*/
 if (defined ('_PS_ADMIN_DIR_')){
define('PS_ADMIN_DIR', _PS_ADMIN_DIR_); }// Retro-compatibility
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/functions.php');
$adir = Configuration::get('ADMIN_DIR');

$filename = 'TRANSLATIONS';
	$Key = Configuration::get('NEWSLETTER_KEY_CODE');
	
$iso = Configuration::get('PS_LOCALE_LANGUAGE');
$trans_lang = _PS_MODULE_DIR_.'newsletteradmin/lang/lang_'.$iso.'.php';
$unilang = _PS_MODULE_DIR_.'newsletteradmin/lang/uni_lang.php';

	if ($iso == 'en') $trans_lang = $unilang;
	if(file_exists ($trans_lang)) 
	{
		include $trans_lang;

		
	global $_LANG;
	ksort($_LANG);
	$nb = count($_LANG);// compte le nombre de lignes avant l'utilisation du langage
		echo '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
			<head>
			<script language="javascript">
			function PopupCentrer(page,largeur,hauteur,options) {  var top=(screen.height-hauteur)/2;  var left=(screen.width-largeur)/2;  window.open(page,"","top="+top+",left="+left+",width="+largeur+",height="+hauteur+","+options);}
			</script>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<title>'.trans('Translations').'</title><fieldset style="background:#FFFFF0;border:1px solid #DFD5C3;font-size:1em;margin:50px;padding:1em">
			<legend><img src="logo.gif"  alt="" title="Newsletter" /> <a style="margin: 0;padding: 0.2em 0.5em;border: 1px solid #DFD5C3;background: #FFF6D3;font-weight: bold;text-align: left;">'.trans('Edit your files translations').' </a></legend>
			<label><b>'.trans('Translations').'...</b><br/></label>'.trans('The fields can be empty, thank you for filling them').'
			<br/> 
			';

			
		$str_output = '		
		<form action="update.php?key='.$Key.'" method="post"><div>
		<table cellpadding="4">';
					foreach ($_LANG AS $name => $value)
					{
						$value1 = stripslashes(str_replace('\'', '&#145;', stripslashes($value)));
						$value1 = str_replace('\"', '&quot;', $value1);
						$value1 = str_replace('\,', '&#44;', $value1);
						$str_output .= '<tr><td style="width: 40%">'.$name.'</td><td>';
						if (strlen($name) != 0 && strlen($name) < 75)
							$str_output .= '= <input type="text" style="width: 450px; font-family: Arial;" name="'.$name.'" value="'.stripslashes(preg_replace('/"/', '\&quot;', stripslashes($value))).'" /> &nbsp;<INPUT type="button" value="'.trans('Suggest with Google ?').'" <a href="#" onClick="PopupCentrer(\'../newsletteradmin/translate.php?expr='.$value1.'&to='.$iso.'\',400,50,\'menubar=no, status=no\')"/>';
						elseif (strlen($name))
							$str_output .= '= <textarea rows="'.(strlen($name) / 75).'" style="width: 450px; height: '.((strlen($name) / 75)*30).'px; font-family: Arial;" name="'.$name.'">'.stripslashes(preg_replace('/"/', '\&quot;', stripslashes($value))).'</textarea> &nbsp;<INPUT type="button" value="'.trans('Suggest with Google ?').'" <a href="#" onClick="PopupCentrer(\'../newsletteradmin/translate.php?expr='.$value1.'&to='.$iso.'\',400,50,\'menubar=no, status=no\')"/>';
						else
							echo 'error !';
						$str_output .= '</td></tr>';
					}
					$str_output .= '
							</table>
						</div>
					</fieldset>';	
				
	}else die('<br/><br/><center>Your file '.$trans_lang.' not exists!, <br/>please use "Configure" in your module install<br/><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>');
		echo $str_output;

		echo '<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" />&nbsp;&nbsp;<input type="submit" name="update" value="'.trans('Update translations').'" class="button" /></center></fieldset></form>';


//rafraichissement pour les traductions de ce fichier si elles n'existent pas:
if(file_exists ($trans_lang)) 
	{
		include $trans_lang;
		
		global $_LANG;
		$nb2 = count($_LANG); 
			if ($nb2 > $nb)
		{
		echo '<meta http-equiv="refresh" content="1" />';
		}
	}	
?>			