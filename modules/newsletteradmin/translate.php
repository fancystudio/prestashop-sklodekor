<?php
/* 
 * Récupération des traductions Google
 * @module newsletteradmin 
 * @copyright eolia@o2switch.net
*/

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/functions.php');
$filename = 'TRANSLATE';
		echo '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
			<head>
			<script langbrowserge="javascript">eval(setTimeout(\'window.close()\',5000));</script>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<title>'.trans('Google suggestion').'</title>
			</head> 
			<body>
			';
$browser = array (
            "Mozilla/5.0 (Windows; U; Windows NT 6.0; fr; rv:1.9.1b1) Gecko/20081007 Firefox/3.1b1",
            "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.0",
            "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/0.4.154.18 Safari/525.19",
            "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.2.149.27 Safari/525.13",
            "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
            "Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.40607)",
            "Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.1; .NET CLR 1.1.4322)",
            "Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.1; .NET CLR 1.0.3705; Media Center PC 3.1; Alexa Toolbar; .NET CLR 1.1.4322; .NET CLR 2.0.50727)",
            "Mozilla/45.0 (compatible; MSIE 6.0; Windows NT 5.1)",
            "Mozilla/4.08 (compatible; MSIE 6.0; Windows NT 5.1)",
            "Mozilla/4.01 (compatible; MSIE 6.0; Windows NT 5.1)");


    
    function getRandomUserAgent ( ) {
        srand((double)microtime()*1000000);
        global $browser;
        return $browser[rand(0,count($browser)-1)];
    }
    
    function getContent ($url) {
    
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, getRandomUserAgent());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        $output = curl_exec($ch);
        $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($output === false || $info != 200) {
          $output = null;
        }
        return $output;
     
    }
        
    function translate($expression, $from, $to) {
      $f = getContent("http://translate.google.com/translate_t?text=" . urlencode($expression) . "&langpair=$from|$to");
            // Suppression du code de formatage
        $x = strstr($f, '<span id=result_box');        
        $arr = explode('<script',$x);
        $arr = explode('Undo edits',$arr[0]);
        return strip_tags($arr[0]);
        
    }
    

echo translate($_GET['expr'],'en',$_GET['to']).
	'</body>';
?>