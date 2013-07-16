<?php
/**
 * Tableau récapitulatif des 10 derniers envois depuis le Back-Office Prestashop  
 * @category admin 
 * @copyright eolia@o2switch.net
 * @license http://www.opensource.org/licenses/osl-3.0.php Open-source licence 3.0 
 * @Author Eolia  31/03/2012  compatible PS 1.3- 1.4 
 * @version 2.2
 *
 */
 if (defined ('_PS_ADMIN_DIR_')){
define('PS_ADMIN_DIR', _PS_ADMIN_DIR_); }// Retro-compatibility
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/functions.php');
$filename = 'HISTORY';
	$Key = Configuration::get('NEWSLETTER_KEY_CODE');
	if(intval(Configuration::get('PS_REWRITING_SETTINGS')) === 1)
		$rewrited_url = __PS_BASE_URI__;

		
			$hostName = _DB_SERVER_;
            $userName = _DB_USER_;
            $password = _DB_PASSWD_;
            $dbName = _DB_NAME_;

            $req = mysql_connect($hostName,$userName,$password) or die(trans('Connection to the server failed'));
            @mysql_select_db($dbName,$req) or die(trans('No such database exist'));

	function report($id_campaign)
	{
				$req2 = mysql_query("SELECT * FROM "._DB_PREFIX_."mailing_history WHERE id_campaign ='$id_campaign'");			
				if ($req2 == null){die('No Campaign!');}
				else{				
					$res2=mysql_fetch_array($req2);				
					$req = mysql_query("SELECT COUNT(*) AS compt FROM "._DB_PREFIX_."mailing_track WHERE id_campaign ='$id_campaign'");
					$nbrs_enreg = mysql_fetch_array($req);	
					$name = $res2['subject'];
					$num_sent = $res2['num_sent'];
					$date_sent = $res2['date'];
					$time_sent = $res2['time'];
					$arrayIdentifiants = array();
					$arrayIdentifiants[] = $name;
					$arrayIdentifiants[] = $date_sent;
					$arrayIdentifiants[] = $time_sent;
					$arrayIdentifiants[] = $num_sent;	
					$arrayIdentifiants[] = $nbrs_enreg;
			 
				return $arrayIdentifiants;
					}
				mysql_close($req);	
	}	

			echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="content-type" content="text/html; charset=utf-8" />
					<title>'.trans('Results of the latest campaigns').'</title>
					</head>
					<body>
					<fieldset style="background:#FFFFF0;border:1px solid #DFD5C3;font-size:1em;margin:5px;padding:1em">
					<legend><a style="margin: 0;padding: 0.2em 0.5em;border: 1px solid #DFD5C3;background: #FFF6D3;font-weight: bold;text-align: center;">'.trans('Results').'</a></legend>
			
					<div style="margin-left: 12px">
					<TABLE border="3" style=" font-size:14px; text-align:center; width:100%"><TR>
						<TD><b>Id</b> </TD>
						<TD><b>'.trans('Name').':</b> </TD>
						<TD><b>'.trans('Date').':</b> </TD>
						<TD><b>'.trans('Time').':</b> </TD>
						<TD><b>'.trans('Sent').':</b> </TD>
						<TD><b>'.trans('Received').':</b> </TD>
						<TD><b>'.trans('Impact').':</b> </TD>
					</TR><br/>';
			//Nombre de campagnes
			$req3 = mysql_query("SELECT `id_campaign` FROM "._DB_PREFIX_."mailing_history");
			while (list($id_campaign) = mysql_fetch_row($req3)) 
				{
				list($name,$date_sent,$time_sent,$num_sent,$nbrs_enreg) = report($id_campaign);
				$impact=($nbrs_enreg['compt']/$num_sent)*100;
				$ratio = number_format($impact, 2, ',', ' ');
			echo'
				<TR style="font-size:12px;">
				<TD>'.$id_campaign.'</TD>
				<TD>'.$name.'</TD>
				<TD>'.$date_sent.'</TD>	
				<TD>'.$time_sent.'</TD>
				<TD>'.$num_sent.'</TD>
				<TD>'.$nbrs_enreg['compt'].'</TD>
				<TD>'.$ratio.' %</TD></TR>';					
				}
			echo '	</div>				
					</TABLE></div><br/><form><input type="button" class="button" value=" OK " onclick="window.close()"></form>
					</fieldset>
					</body>
					</html>';
			// Clean the table after 10 campaigns
			if ($id_campaign >10)
			{				
			$id_camp_old = ($id_campaign - 10);
			
			$sql ="DELETE  FROM "._DB_PREFIX_."mailing_track WHERE id_campaign ='$id_camp_old'";
			mysql_query($sql)or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
			$sql ="OPTIMIZE TABLE "._DB_PREFIX_."mailing_track ";
			mysql_query($sql)or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
			$sql ="DELETE  FROM "._DB_PREFIX_."mailing_history WHERE id_campaign ='$id_camp_old'";
			mysql_query($sql)or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
			$sql ="OPTIMIZE TABLE "._DB_PREFIX_."mailing_history ";
			mysql_query($sql)or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
			mysql_close($sql);
			}

	
?>			
			