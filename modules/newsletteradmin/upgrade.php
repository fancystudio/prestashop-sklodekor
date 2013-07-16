<?php
//session_start();
error_reporting(E_STRICT | E_ALL);
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/functions.php');
$filename = 'UPGRADE';
	$Key = Configuration::get('NEWSLETTER_KEY_CODE');
	
	if(intval(Configuration::get('PS_REWRITING_SETTINGS')) === 1)
		$rewrited_url = __PS_BASE_URI__;

		
		
ini_set('user_agent', $_SERVER['HTTP_USER_AGENT']);
	
	$xml_link = 'http://www.eolia.o2switch.net/newsletter/xml/version2.xml';
	if (@fclose(@fopen($xml_link, 'r'))){
	$feed = simplexml_load_file("http://www.eolia.o2switch.net/newsletter/xml/version2.xml");
								$num = $feed->version->num;
								$name = $feed->version->name;
								$link = $feed->download->link;

				if ($link != null) {
					$url = 'http://www.eolia.o2switch.net/newsletter/download/newsletteradmin2.zip ';
					if (@fclose(@fopen($url, 'r'))){
					
					$tempFile = '../upgrade_PSNewsLetter.zip';

					$out = fopen($tempFile , 'wb');
					
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_FILE, $out);
					curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
					curl_setopt($ch, CURLOPT_HEADER, false);
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_exec($ch);

					$info = curl_getinfo($ch);

					if($info['http_code'] == 200 ) {
					deltree('../newsletteradmin');
					sleep(2);
							include(dirname(__FILE__).'/../../tools/pclzip/pclzip.lib.php');
							  $archive = new PclZip($tempFile);
							  if ($archive->extract(PCLZIP_OPT_PATH, '../',
													PCLZIP_OPT_REMOVE_PATH, $tempFile) == 0)
													{
								die("Error : ".$archive->errorInfo(true));
							  } else {
								$ref = $_SERVER['HTTP_REFERER'] ;
								
								//$ref = strstr($ref, 'index', true);//ne fonctionne pas si php<5.3
								$ref = (string)$ref;
								$ref = explode('index',$ref);
								$ref =  (string)$ref[0];
								$ref = $ref.'index.php?tab=AdminModules&token='.$_GET['token'].'&module_name=newsletteradmin&reset&tab_module=administration';
								//$ref = $ref.'index.php?controller=adminmodules&token='.$_GET['token'].'&module_name=newsletteradmin&reset&tab_module=emailing';
								echo '

								<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
								<head>
								<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
								<title>'.trans('Module Updater').'</title>
									<fieldset style="background:#FFFFF0;border:1px solid #DFD5C3;font-size:1em;margin:50px;padding:1em">
										<legend><img src="logo.gif"  alt="" title="Update" /> <a style="margin: 0;padding: 0.2em 0.5em;border: 1px solid #DFD5C3;background: #FFF6D3;font-weight: bold;text-align: left;">'.trans('Updating PSNewsletter Module').' </a></legend>
										<label><b>'.trans('Downloading files').'...</b><br/><br/></label>
										'.trans('files were unpacked in the directory').' /newsletteradmin<br/><center>'.trans('Proceed to the reinstallation of the module').':<br/>
										<a href="#" onclick="if(confirm(\''.trans('Remember to configure your module after installation!').'\')) document.location.href=\''.$ref.'\'"><img src="../../img/admin/cog.gif" alt="Install" title="'.trans('Module install').'" width="16px"></a><br/>
								</center>
								</fieldset>';
								}
					} 
					}else echo trans('No files to update! Try later');
				}else echo trans('xml request error! Try later');

	}else echo trans('xml request error! Try later');
//session_destroy();
?>	