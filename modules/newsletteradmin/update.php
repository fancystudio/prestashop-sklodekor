<?php
/* 
 * Enregistrement du fichier de traductions mises à jour 
 * @module newsletteradmin 
 * @copyright eolia@o2switch.net
*/

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/functions.php');
$filename = 'UPDATE';
$iso = Configuration::get('PS_LOCALE_LANGUAGE');
$trans_lang = _PS_MODULE_DIR_.'newsletteradmin/lang/lang_'.$iso.'.php';
	$Key = Configuration::get('NEWSLETTER_KEY_CODE');

	
	if(file_exists ($trans_lang)) 
	{
		include $trans_lang;
	global $_LANG;	
			echo '

		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
		<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>'.trans('Translations').'</title>
			<fieldset style="background:#FFFFF0;border:1px solid #DFD5C3;font-size:1em;margin:50px;padding:1em">
				<legend><img src="logo.gif"  alt="" title="Newsletter" /> <a style="margin: 0;padding: 0.2em 0.5em;border: 1px solid #DFD5C3;background: #FFF6D3;font-weight: bold;text-align: left;">'.trans('Edit your file translations').' </a></legend>
				<label><b>'.trans('Record').'...</b><br/></label>';
		foreach($_POST AS $name => $value)
		{
			if ($value == '') {
				echo trans('You have not entered all information').': '.$name.' = ????????????';
				echo'
					<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>';
				return ('error');	
				}
		}
				$wadd=fopen($trans_lang, "w");
				$r = chr(13);
				fwrite($wadd, '<?php'.PHP_EOL .PHP_EOL .'$_LANG = array();'.PHP_EOL);
				
		foreach($_POST AS $name => $value)
		{	$name = str_replace('_', ' ', ($name));
			if ($name != 'update')
			{
				fwrite($wadd,'$_LANG[\''.addslashes($name).'\'] = \''.addslashes($value).'\';'.PHP_EOL);
				
		
				echo $name.' --> '.$value.'<br/>';
			}
		}
		fwrite($wadd,'?>');
		fclose($wadd);
		echo '<br/><b>'.trans('Translations file updated!').'</b><br/><br/>
			<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-2)" /></center></fieldset>';	
		
	}else die('<br/><br/><center>Your file '.$trans_lang.' not exists!, <br/>please use "Configure" in your module install<br/><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>');
?>
