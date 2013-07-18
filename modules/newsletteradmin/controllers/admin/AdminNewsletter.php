<?php

/**
 * Envoi de Newsletter depuis le Back-Office Prestashop 
 * @category admin
 *
 * @original author Odlanier de Souza <master_odlanier@hotmail.com> 2009
 * @contributor Leighton Whiting
 * @copyright eolia@o2switch.net
 * @license http://www.opensource.org/licenses/osl-3.0.php Open-source licence 3.0
 * @author  Eolia  02/02/2013 compatible PS 1.5 ONLY !(Special Thank's to Manouille and J.DANSE!)
 * @version 3.0
 *
 */
 
// Security
if (!defined('_PS_VERSION_'))
	exit;

error_reporting(E_ALL);
session_start() ;
global $filename;
require_once(_PS_ROOT_DIR_.'/modules/newsletteradmin/functions.php');

function recursive_in_array($needle, $haystack) 
{
	foreach ($haystack as $stalk)
  	if ($needle === $stalk || (is_array($stalk) && recursive_in_array($needle, $stalk)))
    	return true;

  return false;
}

class AdminNewsletterController extends ModuleAdminController
{

	
	public $_returnHTML = '';
	public $multishop_context_group = false;
	public $_html = '';
	// used for translations
	public static $l_cache;
	
	public function initContent()
	{		
		$this->show_toolbar = false;
		$this->display = 'view';
		
		parent::initContent();	
	}
	public function renderView()
	{		
		if(strlen($this->_returnHTML) <= 0)	
			$content = $this->setForm();
		else
			$content = '';			
			
		return parent::renderView().$this->_returnHTML.$content;
	}
	protected function l($string, $class = 'AdminTab', $addslashes = FALSE, $htmlentities = TRUE)
	{
		// need to be called in order to populate $classInModule
		$str = self::findTranslation('newsletteradmin', $string, 'AdminNewsletter');
		$str = $htmlentities ? htmlentities($str, ENT_QUOTES, 'utf-8') : $str;
		return str_replace('"', '&quot;', ($addslashes ? addslashes($str) : stripslashes($str)));
	}

	/**
	 * findTranslation (initially in Module class), to make translations works
	 *
	 * @param string $name module name
	 * @param string $string string to translate
	 * @param string $source current class
	 * @return string translated string
	 */
	public static function findTranslation($name, $string, $source)
	{
		static $_MODULES;
		if (!is_array($_MODULES))
		{
			// note: $_COOKIE[iso_code] is set in createCustomToken();
			$file = _PS_MODULE_DIR_.'newsletteradmin/translations/'.Configuration::get('PS_LOCALE_LANGUAGE').'.php';
			if (file_exists($file) && include($file))
				$_MODULES = !empty($_MODULES)?array_merge($_MODULES, $_MODULE):$_MODULE;
		}
		$cache_key = $name.'|'.$string.'|'.$source;

		if (!isset(self::$l_cache[$cache_key]))
		{
			if (!is_array($_MODULES))
				return $string;
			// set array key to lowercase for 1.3 compatibility
			$_MODULES = array_change_key_case($_MODULES);
			if (defined('_THEME_NAME_'))
				$currentKey = '<{'.strtolower($name).'}'.strtolower(_THEME_NAME_).'>'.strtolower($source).'_'.md5($string);
			else
				$currentKey = '<{'.strtolower($name).'}default>'.strtolower($source).'_'.md5($string);
			// note : we should use a variable to define the default theme (instead of "prestashop")
			$defaultKey = '<{'.strtolower($name).'}prestashop>'.strtolower($source).'_'.md5($string);
			$currentKey = $defaultKey;

			if (isset($_MODULES[$currentKey]))
				$ret = stripslashes($_MODULES[$currentKey]);
			elseif (isset($_MODULES[strtolower($currentKey)]))
				$ret = stripslashes($_MODULES[strtolower($currentKey)]);
			elseif (isset($_MODULES[$defaultKey]))
				$ret = stripslashes($_MODULES[$defaultKey]);
			elseif (isset($_MODULES[strtolower($defaultKey)]))
				$ret = stripslashes($_MODULES[strtolower($defaultKey)]);
			else
				$ret = stripslashes($string);

			self::$l_cache[$cache_key] = $ret;
		}
		return self::$l_cache[$cache_key];
	}	
  public function setForm()
  {
    global $currentIndex, $cookie, $Key;
             
    if (Tools::getValue('send') != 1 && Tools::getValue('install') != 1)
    {
			$Key = md5(uniqid(rand(), true));
			Configuration::updateValue('NEWSLETTER_KEY_CODE', $Key);
			$shop_server  = $_SERVER['HTTP_HOST'];
			
			//count email list
			$countCustomersSub = $this->countCustomersSub();
			$countBirthCustomers = $this->countBirthCustomers();
			$countCustomers =$this->countCustomers();
			$countOptCustomers =$this->countOptCustomers();
			$countBlockSub = $this->countBlockSub();
			$countNoReadCustomers = $this->countNoReadCustomers();
			$countCsvCustomers = $this->countCsvCustomers();

			$tagtl = Tools::getAdminTokenLite('AdminModules');
			$tagt2 = Tools::getAdminTokenLite('AdminTranslations');

		
			$_SESSION['tagtl'] = $tagtl;

			//Verify if the module version is configured and up to date 
			$nwl_version = Configuration::getGlobalValue ('Admin_Newsletter_Version');//current version
	
			if($nwl_version == '0.0')
			{
				$this->displayWarning('
					<span style="color: red;">
					<b>'.$this->l('Warning:').' </b> '.$this->l(' Your AdminNewsletter Module is not configured!').'
					</span>
					<br/>
					'.$this->l(' Please configure the module  ').': 
					<a href="'.$_SERVER["PHP_SELF"].'?controller=AdminNewsletter&install=1&token='.Tools::getAdminTokenLite('AdminNewsletter').'">
					<font color="blue"> '.$this->l('Copy files').'</font></a>
														'); 	
			}
			else
			{ 

			$contenu = "http://www.eolia.o2switch.net/newsletter/xml/version2.xml";

				try
				{
					$feed = simplexml_load_file($contenu);
				}
				catch(Exception $e)
				{
					die($e->message);
				}
				if ($feed) 
				{
					$num = $feed->version->num;
					$name = $feed->version->name;
					$link = $feed->download->link;		
					if ($nwl_version < $num)
					{
					$token = Tools::getAdminToken('AdminModules'.(int)$this->id.(int)$this->context->employee->id);
					//echo $token; die();
						$this->html .= '<center><div class="alert"><font color="red"><b>'.$this->l('Warning:').' </b> '.$this->l(' Your AdminNewsletter is out of date!').'</font><br/>'.$this->l(' Please download the latest version and install it  ').': <a href="'.$link.'"><font color="blue"> '.$name.'</a></font></div>
						<br/> '.$this->l('Auto-Upgrade your module').': <a href="../modules/newsletteradmin/upgrade.php?key='.$Key.'&token='.$tagtl.'" style="margin-left:5px"><img src="../img/admin/cog.gif" alt="Upgrade" title="'.$this->l('Upgrade').'"></a>
						</center>'; 	
					}
					else
					{ 
						$this->html .=  '<font color="green"><center>'.$this->l('Your version is up to date ').':</font>&nbsp;'.$name.'
						</center>';
					}
				}
				else 
					$this->html .=  '<center><div class="alert"><font color="red">'.$this->l('Sorry, No information of new version avalaible!').'</font><br/>'.$this->l(' Please try later  ').' </font></div></center>'; 	
						$this->html .=  '<fieldset>
						<legend>'.$this->l('Import csv file').':</legend>	
							<form action="'._MODULE_DIR_.'newsletteradmin/import.php" method="post" enctype="multipart/form-data" name="form1"> 
									'.$this->l('Import email list from csv file').': <input type="file" name="file" />&nbsp;
									<input type="submit" name="Record" class="button" value="'.$this->l('Record').'" title="'.$this->l('Choose a csv or txt file').' &#13; '.$this->l('Max: 3 columns').' &#13; '.$this->l('email;lastname;firstname').'"> 
							</form>	
						</fieldset></br>';
		
		
		
	      $_POST = isset($_SESSION['newsletter']['POST']) ? $_SESSION['newsletter']['POST'] : null;
			
				//date settings for no-english contries
				$par1 = $this->l('en_EN.utf8');
				$par2 = $this->l('eng');
	      //$iso = Language::getIsoById(intval($cookie->id_lang));
				$iso = Configuration::get('PS_LOCALE_LANGUAGE');
				$flag =Configuration::get('PS_LANG_DEFAULT');
				setlocale (LC_TIME, $par1,$par2); 		
				$daten = strftime("%A %d %B %Y");
				$help_link ='http://www.eolia.o2switch.net/newsletter/download/MODULE%20%20PSNEWSLETTER%20par%20Eolia.pdf';
				if ($iso != 'fr') $help_link ='http://www.eolia.o2switch.net/newsletter/download/MODULE%20%20PSNEWSLETTER%20by%20Eolia.pdf';
				$day = utf8_encode($daten);
	      $this->html .= '
	          '.$this->listrep().'			
				<h2>PS'.$this->l('Newsletter').'-'.$nwl_version. '&nbsp;&nbsp;<img src="../modules/newsletteradmin/logo.gif" /><div style="float: right;padding:0px 40px"><a href="'.$help_link.'"><img src="../modules/newsletteradmin/img/help.gif" width="55" height="26" alt="help" title="'.$this->l('Help about this module').'"></a></div></h2>
				<div style="float: right;padding:0px 10px">'.$this->l('Manage translations').': <a href="index.php?controller=AdminTranslations&lang='.$iso.'&type=modules&token='.$tagt2.'" style="margin-left:5px"><img src="../img/l/'.$flag.'.jpg" alt="'.$iso.'" title="'.$iso.'"></a>
				<br/> '.$this->l('Translation attachments').': <a href="../modules/newsletteradmin/translations.php?key='.$Key.'" style="margin-left:5px"><img src="../img/l/'.$flag.'.jpg" alt="'.$iso.'" title="'.$iso.'"></a>
				<br/> '.$this->l('Module reset').': <a href="'.$_SERVER["PHP_SELF"].'?controller=AdminNewsletter&install=1&token='.Tools::getAdminTokenLite('AdminNewsletter').'"><img src="../img/admin/cog.gif" alt="Reset" title="'.$this->l('Reset').'"></a></div><p>' .  		      
				$this->l('You can use the following variables in your message (only for registered customers):') .'</br>'.
				$this->l('Variables:') 	. '   '	.
				$this->l('%CIVILITY%') . ' - ' . 
				$this->l('%FIRSTNAME%') . ' - ' .				
				$this->l('%LASTNAME%') 	. ' - ' . 				
				$this->l('%MAIL%') 	. '</br>' . 
				$this->l('These variables are used to create a link to view the page in a browser and create the unsubscription link:') .'</br>'.	
				$this->l('Variables:') 	. '   '	.
				$this->l('%LINK%') . ' - ' .
				$this->l('%SUB%') . ' - ' .
				$this->l('%UNSUB%') . '</p>
						
		
				<form action="' . $currentIndex . '&token=' . $this->token .'&send=1" method="post" >
				<fieldset>
			
				<legend>'.$this->l('Subject').':</legend><br/>
				<input type="text" value="'.$this->l('Newsletter of').' '.$day.'" name="subject_email" style="width: 50%" value="'.Tools::getValue('subject_email').'" />
				</fieldset>			
				<br/>
				<fieldset>
				<legend>'.$this->l('Message').':</legend>
				<br/>';
				$tiny = '../js/tiny_mce';
					if(!file_exists ($tiny.'/langs/'.$iso.'.js')) $lang = 'en'; else $lang = $iso;
				$this->html .= '	
				<script type="text/javascript" src="'._PS_JS_DIR_.'tiny_mce/tiny_mce.js"></script>
	              <script type="text/javascript">
				tinyMCE.init({
					mode : "textareas",
					theme : "advanced",
					skin : "cirkuit",
					plugins : "pagebreak,style,table,advimage,advlink,inlinepopups,preview,media,emotions,searchreplace,contextmenu,paste,fullscreen,template",
					// Theme options
					theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,emotions",
					theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,,|,forecolor,backcolor",
					theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,media,|,ltr,rtl,|,fullscreen",
					theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,template,pagebreak",
					theme_advanced_toolbar_location : "top",
					theme_advanced_toolbar_align : "left",
					theme_advanced_statusbar_location : "bottom",
					theme_advanced_resizing : true,
					content_css : "'.__PS_BASE_URI__.'themes/'._THEME_NAME_.'/css/global.css",
					document_base_url : "'.__PS_BASE_URI__.'",
					width: "100%",
					height: "auto",
					font_size_style_values : "8pt, 10pt, 12pt, 14pt, 18pt, 24pt, 36pt",
					elements : "nourlconvert,ajaxfilemanager",
					file_browser_callback : "ajaxfilemanager",
					entity_encoding: "named",
					convert_urls : false,
					language : "'.$lang.'",
					template_external_list_url : "'._PS_JS_DIR_.'tiny_mce/lists/template_list.php"
				});
				function ajaxfilemanager(field_name, url, type, win) {
					var ajaxfilemanagerurl = "'.dirname($_SERVER["PHP_SELF"]).'/ajaxfilemanager/ajaxfilemanager.php";
					switch (type) {
						case "image":
							break;
						case "media":
							break;
						case "flash":
							break;
						case "file":
							break;
						default:
							return false;
					}
					tinyMCE.activeEditor.windowManager.open({
						url: "'.dirname($_SERVER["PHP_SELF"]).'/ajaxfilemanager/ajaxfilemanager.php",
						width: 782,
						height: 440,
						inline : "yes",
						close_previous : "no"
					},{
						window : win,
						input : field_name
					});
				}			
	              </script>
	
		<textarea name="body_email" style="width:100%; height: 400px;">
		
	              '.Tools::getValue('body_email').'
		</textarea>
	      <br />     
	     <div align="left">
	          <h2> '.$this->l('Configuration').' </h2><div style="margin-left: 15px; font-size:11px"> '.$this->l('Note: If you leave the fields blank, defaults settings will be used').'</div><br/>
	          <div style="margin-left: 15px">
	              '.$this->l('Emails per minute:').'
	              <input type="text" name="wait_time" size="2" value="60" maxlength="2" /></label>
	          </div>
			<div style="margin-left: 12px">
			<TABLE WIDTH=100%><TR>
	              <TD>'.$this->l('Email from').': <input type="text" value="'.Configuration::get('NEWSLETTER_FROM').'" name="from" size="30" /></label></TD><TD WIDTH=30px ></TD> 
				<TD>'.$this->l('Email from name').': <input type="text" value="'.Configuration::get('NEWSLETTER_FROM_NAME').'" name="fromname" size="30" /></label></TD><TD WIDTH=30px></TD>  
				<TD>'.$this->l('Recipients').': <input type="text" value="'.Configuration::get('NEWSLETTER_TO_NAME').'" name="toname" size="30" /></label><br /></TD>
	          </TR><br/>
			<TR style="font-size:11px;text-align:center">
	          <TD>'.$this->l('Example: ').'No-reply@'.$shop_server.'</TD><TD></TD>		
			<TD>'.$this->l('Example: ').'Press Division</TD><TD></TD> 
			<TD>'.$this->l('Example: ').'Mailing List</TD>
			</TR>
			</div>				
			</TABLE></div><br/>
	          <h2> '.$this->l('Test').' </h2>
	          <div style="margin-left: 15px">
	              <input type="checkbox" name="sTeste" value="1" /> '.$this->l('Mailer Test').' <br /><br /> &nbsp;&nbsp;&nbsp;
	              '.$this->l('Email:').' <input type="text" value="'. Configuration::get('PS_SHOP_EMAIL').'" name="sMailTest" size="30" /></label> <br /><br />
	          </div>
	          <h2> '.$this->l('Block Subscribers').' </h2>
	          <div style="margin-left: 15px">
	              <input type="checkbox" name="$sNewsletter" value="1" /> '.$this->l('Newsletter Block Subscribers').'&nbsp;(<b>'.$countBlockSub.'</b>) <br />
	              ';
	              $this->html .= '<span class="showBlockSubscribers">zobraziť</span><br />'; 
	              $this->html .= '<ul class="blockSubscribersClass" style="display:none">';
	              foreach($this->getBlockSubscribers() as $blockSubscribers){
	              	$this->html .= '<li>'.$blockSubscribers['email'].'</li>';
	              }
	              $this->html .= '</ul><br/>';
	          $this->html .= '</div>
			<h2> '.$this->l('By gender').' </h2>
	          <div style="margin-left: 15px">
				<input type="radio" name="sexCustomers" value="0"  checked="checked" onClick="hide();"/> '.$this->l('None').'<br/><br/>
	            <input type="radio" name="sexCustomers" value="1"  /> '.$this->l('Womens').'&nbsp;(<b>'.$this->countsex(2).'</b>) <br/><br/>
	            <input type="radio" name="sexCustomers" value="2"  /> '.$this->l('Mens').'&nbsp;(<b>'.$this->countsex(1).'</b>) <br/><br/>
	          </div>
	          <h2> '.$this->l('Customers').' </h2>
	          <div style="margin-left: 15px">		
	              <input type="radio" name="sCustomers" value="0"  checked="checked" onClick="hide();"/> '.$this->l('None').'<br/><br/>
	              <input type="radio" name="sCustomers" value="1"  onClick="hide();"/> '.$this->l('All Customers').'&nbsp;(<b>'.$countCustomers.'</b>) <br/><br/>
	              <input type="radio" name="sCustomers" value="2"  onClick="hide();"/> '.$this->l('Customers who signed up for Newsletter').'&nbsp;(<b>'.$countCustomersSub.'</b>) <br/><br/>
				<input type="radio" name="sCustomers" value="5"  onClick="hide();"/> '.$this->l('Customers who signed up for Opt-in').'&nbsp;(<b>'.$countOptCustomers.'</b>) <br/><br/>
	              <input type="radio" name="sCustomers" value="3"  onClick="hide();"/> '.$this->l('Customers birthday').': &nbsp;&nbsp;
	                  <input type="text" size="6" maxlength="5" value="'.date("d-m").'" name="dateBirthday" onClick="hide();"/>&nbsp;(<b>'.$countBirthCustomers.' </b>)<br/><div style="font-size:11px; margin-left: 15px">( '.$this->l('Format: d-m').' )</div><br/>
				<input type="radio" name="sCustomers" value="4" onClick="display();" /> '.$this->l('Customers who belong to one or more of these groups:').':
					<p id="collapse" style="margin-left: 15px"><br/>';
					 $sql = "SELECT distinct(c.id_customer), c.active, c.deleted,c.newsletter,
					 cg.id_customer, cg.id_group as group2, count(cg.id_customer) as compte, gl.id_group,gl.name as nom, gl.id_lang
						   FROM  "._DB_PREFIX_."customer as c,
						   "._DB_PREFIX_."customer_group as cg,
						   "._DB_PREFIX_."group_lang as gl
						   WHERE c.active !=0
						   AND c.deleted !=1
						   AND c.newsletter !=0
						   AND c.id_customer=cg.id_customer
						   AND cg.id_group=gl.id_group
						   AND gl.id_lang=".Configuration::get('PS_LANG_DEFAULT')."
						   GROUP BY cg.id_group";
	         $datas = DB::getInstance()->ExecuteS($sql);

	         foreach ($datas as $data)

				   {
					   $name2=$data["nom"];
					   $compte2=$data["compte"];
					   $id_group2= $data["group2"];
					   
					   
			    $this->html .=  "<input type=\"checkbox\" name=\"groupname\" value=\"$id_group2\"  /> $name2 <strong>($compte2)</strong>&nbsp;&nbsp;" ;
					}
		   		$this->html .= '
						<script type="text/javascript"> 
							document.getElementById("collapse").style.display = "none";
							function display()
							{
								document.getElementById("collapse").style.display = "block" ;
							}
							function hide()
							{
								document.getElementById("collapse").style.display = "none";
							}
							var isBlockSubscribersShow = false;
							$(".showBlockSubscribers").click(function(){
								if(isBlockSubscribersShow){
									$(".blockSubscribersClass").hide();
									isBlockSubscribersShow = false;	
								}else{
									$(".blockSubscribersClass").show();
									isBlockSubscribersShow = true;
								}
							});
						</script>
				</p><br/><br/>
				<input type="radio" name="sCustomers" value="6"  onClick="hide();"/> '.$this->l('Customers who have not read the latest newsletter').'&nbsp;(<b>'.$countNoReadCustomers.'</b>)<br/><br/>
				<input type="radio" name="sCustomers" value="7" onClick="hide();" /> '.$this->l('Email list imported from csv file:').'&nbsp;(<b>'.$countCsvCustomers.'</b>)
	          </div>
	      </div>       
	      <br />        
	      <div align="right"> 
					<input type="checkbox" name="template_save" value="1"  /> '.$this->l('Save this mail as template').'<br/>	
					<input type="checkbox" name="no_save" value="1"  /> '.$this->l('Do not save this campaign (no backups, no tracking)').'<br/><br/>	
					<input type="submit" class="button" name="send_newsletter" value="&nbsp;'.$this->l(' Send Mails ').' &nbsp;" />
				</div>             
			</fieldset>
			<div style="height:10px;">&nbsp;</div>';
			$news_url = 'http://www.eolia.o2switch.net/pss_cms_content.php?cms=9&iso=fr';
				if (@fclose(@fopen($news_url, 'r'))){
				$this->html .= '<fieldset style="background:#FBF7EB;">
				<legend><img style="vertical-align:middle;" src="http://www.eolia.o2switch.net/news.png" width="16" height="16" />'.$this->l('News about the module...').'</legend>
				<iframe width="100%" height="200" style="border:none;" src="http://www.eolia.o2switch.net/pss_cms_content.php?cms=9&iso=fr"></iframe>';}
				else $this->html .= '<center>News Server Error!</center>';
			$this->html .='	
			</fieldset>
			</form>
			';
	  	unset( $_SESSION['newsletter'] );
			
	    $_SESSION['newsletter']['POST'] = $_POST;
			return $this->html;
		}
		}
	}

	public function postProcess()
	{
		global $currentIndex, $cookie;
		
		if (Tools::getValue('send') == 1)
		{				
			$date = date("d-m-Y");
			$time = date("H\h i\m s\s");
			$start1 = html_entity_decode($this->l('Sending the mail,on:'));
			$start2 = html_entity_decode($this->l('at'));
			$start = $start1.' '.$date.' '.$start2.' '.$time.' -> ';	
			nlog($start);	
	
	    if( !isset($_SESSION['newsletter']) OR empty($_SESSION['newsletter']['finalList']) )
	    {
	      $sCustomers 		= Tools::getValue('sCustomers');
		  $sexCustomers		= Tools::getValue('sexCustomers');
	      $sNewsletter 		= Tools::getValue('$sNewsletter');
	      $sTeste                 = Tools::getValue('sTeste');
	      $sendList               = Array();
	
		    /** BEGIN Mailer test **/
		    if( $sTeste) 
		    {
					if (Validate::isEmail(Tools::getValue('sMailTest')))
	        {
		        $array[]            = array( 'email' => Tools::getValue('sMailTest'), 'firstname' => $this->l('Mailer'), 'lastname' => $this->l('TestMan') );
		        $sendList           = array_merge($sendList,  $array );
						$_SESSION['category'] = 'Test';
					}
					else 
					{
						$this->_returnHTML .= '<div class="alert">'.$this->l('Verify your email\'s syntax, this address is not a valid email address!').' ('.Tools::getValue('sMailTest').')</div><form action="' . $currentIndex . '&token=' . $this->token .'&send=0" method="post" >
			<div align="center"><br />
				<input type="submit" name="back" value="&nbsp;'.$this->l('Back').'&nbsp;" class="button" />
			</div></form>';
						$fail= Tools::getValue('sMailTest').': '.html_entity_decode($this->l('Verify your email\'s syntax, this address is not a valid email address!'));	
						nlog($fail.chr(13));
	          $_POST['send']  =   0;
	          return;
	        }
				}
	      /** END Mailer test **/
					
				switch($sexCustomers)
				{
					case '1':
			      $sexcustomers 		    = $this->getSexCustomers(2);
			      $sendList           	= array_merge($sendList, $sexcustomers );
						$_SESSION['category'] = $this->l('females Customers');
		      	break;
		      case '2':
			      $sexcustomers         = $this->getSexCustomers(1);
			      $sendList           	= array_merge($sendList, $sexcustomers );
						$_SESSION['category'] = $this->l('Males Customers');
						break;
				}
	      
	      /** BEGIN Customers **/
	      switch($sCustomers)
	      {
			  case '1':
				$customers 		    = $this->getCustomers();
			    $sendList           = array_merge($sendList, $customers);
						$_SESSION['category'] = $this->l('All Customers');
						break;
		      case '2':
				$customers          = $this->getNewsletteremails();
			     $sendList           = array_merge($sendList, $customers);
						$_SESSION['category'] = $this->l('Customers who signed up for Newsletter');
		      	break;
		      case '3':
				$customers          = $this->getBirthdayCustomers( Tools::getValue('dateBirthday') );
			    $sendList           = array_merge($sendList, $customers);
						$_SESSION['category'] = $this->l('Customers birthday');
		      	break;
		      case '4':			
				$customers          = $this->getGroupCustomers( Tools::getValue('groupname') );
		        $sendList           = array_merge($sendList, $customers);
						$_SESSION['category'] = 'Groupe N:'.trim(Tools::getValue('groupname'));
		      	break;
		      case '5':
				$customers          = $this->getOptCustomers();
		        $sendList           = array_merge($sendList, $customers);
						$_SESSION['category'] = $this->l('Customers who signed up for Opt-in');
		      	break;
		      case '6':
				$customers          = $this->getNoReadCustomers();
		        $sendList           = array_merge($sendList, $customers);
						$_SESSION['category'] = $this->l('Customers who have not read the latest newsletter');
		      	break;
		      case '7':
				$customers          = $this->getCsvCustomers();
		        $sendList           = array_merge($sendList, $customers);
						$_SESSION['category'] = $this->l('Email list imported from csv file:');
		      	break;
	      }
	      /** END Customers **/
	
		    /** BEGIN Block Subscribers **/
		    if ($sNewsletter)
		    {
		      $blockSubscribers   = $this->getBlockSubscribers();
		      $sendList           = array_merge($sendList, $blockSubscribers);
					$_SESSION['category'] = $this->l('Newsletter Block Subscribers');
	      }
	      /** END Block Subscribers **/
	
	      $finalList = Array();
	      foreach ($sendList as $item)
	          if (!recursive_in_array($item['email'],$finalList))
	              $finalList[] = $item;
		                
				/**VERIFY if subject is present!**/
				$subject = Tools::getValue('subject_email');
				$subject = self::remove_accents($subject);
				$subject = str_replace("\\","-", $subject);
				$subject = str_replace("/","-", $subject);
				
				if (empty($subject))
				{
					$this->_returnHTML .= '<div class="alert">'.$this->l('Email subject don\'t be empty!').'</div><form action="' . $currentIndex . '&token=' . $this->token .'&send=0" method="post" >
					<div align="center"><br />
						<input type="submit" name="back" value="&nbsp;'.$this->l('Back').'&nbsp;" class="button" />
					</div></form>';
					$fail = 'Fail! '.html_entity_decode($this->l('Email subject don\'t be empty!'));	
					nlog($fail.chr(13));
					return;
				}
				
				/**SEND the email**/
	      $Result['total']            =   0;
	      $Result['failed']           =   0;
	      $Result['success']          =   0;
	      $ArrayFailed                =   array();
	      $key                        =   0;
	      $output                     =   '';
	      $check_division             =   60 / ( intval($_POST['wait_time']) > 0 ? intval($_POST['wait_time']) : 2 ) ;
	      $wait                       =   intval( $check_division ) > 0 ? $check_division : 30;
	
	      $_SESSION['newsletter']['check']          =   TRUE;
	      $_SESSION['newsletter']['finalList']      =   $finalList;
	      $_SESSION['newsletter']['total']          =   $Result['total'];
	      $_SESSION['newsletter']['failed']         =   $Result['failed'];
	      $_SESSION['newsletter']['success']        =   $Result['success'];
	      $_SESSION['newsletter']['ArrayFailed']    =   $ArrayFailed;
	      $_SESSION['newsletter']['POST']           =   $_POST;
	      $_SESSION['newsletter']['GET']            =   $_GET;
	      $_SESSION['newsletter']['key']            =   $key;
	      $_SESSION['newsletter']['output']         =   $output;
	    }
	    else
	    {
	      $finalList                  =   $_SESSION['newsletter']['finalList'];
	      $Result['total']            =   $_SESSION['newsletter']['total'];
	      $Result['failed']           =   $_SESSION['newsletter']['failed'];
	      $Result['success']          =   $_SESSION['newsletter']['success'];
	      $ArrayFailed                =   $_SESSION['newsletter']['ArrayFailed'];
	      $_POST                      =   $_SESSION['newsletter']['POST'];
	      $_GET                       =   $_SESSION['newsletter']['GET'];
	      $key                        =   $_SESSION['newsletter']['key']+1;
	      $output                     =   $_SESSION['newsletter']['output'];
	      
	      $check_division             =   60 / ( intval($_POST['wait_time']) > 0 ? intval($_POST['wait_time']) : 1 ) ;
	      $wait                       =   intval( $check_division ) > 0 ? $check_division : 30;
	    }
	
			if(empty($finalList))
			{
	    	$this->_returnHTML .= '<div class="alert">'.$this->l('No recipients, with selected criteria!').'</div><form action="' . $currentIndex . '&token=' . $this->token .'&send=0" method="post" >
			<div align="center"><br />
				<input type="submit" name="back" value="&nbsp;'.$this->l('Back').'&nbsp;" class="button" />
			</div></form>';
				$NoRecip= html_entity_decode($this->l('No recipients, with selected criteria!'));	
				nlog($NoRecip.chr(13));				
	      return;
	    }
	
			$url = $_SERVER['HTTP_HOST'].__PS_BASE_URI__;
			$no_save = trim(Tools::getValue('no_save'));
			$template_save = trim(Tools::getValue('template_save'));
			if (isset($subject))
			{
				//if (!Validate::isMailSubject($subject))
		 		//die(Tools::displayError('Error: invalid email subject'));
				$subject = self::remove_accents($subject);
				$subject = str_replace("\\","-", $subject);
				$subject = str_replace("/","-", $subject);
				$subject = str_replace("'","_", $subject);
				$subject = str_replace("%"," per cent", $subject);
				$fichier = _PS_ROOT_DIR_.'/newsletters/'.$subject.'.html';
				if(file_exists($fichier) AND ($no_save != 1)) 
				{
					$this->_returnHTML .='<div class="alert">'.$this->l('A file with the same name already exists, please change your subject!').'</div><form action="' . $currentIndex . '&token=' . $this->token .'&send=0" method="post" >
								            <div align="center"><br />
								            <input type="submit" name="back" value="&nbsp;'.$this->l('Back').'&nbsp;" class="button" />
														</div></form>';
						$fail= 'Fail! '.html_entity_decode($this->l('A file with the same name already exists, please change your subject!'));	
						nlog($fail.chr(13));
					return;
				}
				else
					$_POST['send']  =   1;	
			}
	    $value      = $finalList[$key];
	
	    //%EMAIL% - %NAME% - %LASTNAME%
			$subject = Tools::getValue('subject_email');//do not remove!
			$subject = self::remove_accents($subject);
			$subject = str_replace("\\","-", $subject);
			$subject = str_replace("/","-", $subject);
			
			$gender =  isset($value['id_gender']) ? $value['id_gender'] : Tools::getValue('name_Subscribers');
			switch($gender)
			{
				case '1':
					$gender = $this->l('Mr');
					break;	
				case '2':
					$gender = $this->l('Mme');
					break;	
				default:
					$gender = '';
					break;	
			}
				
			$html 	= Tools::getValue('body_email');
				
			//Insert the mails-tracker  
			if ($no_save != 1)
			{
				$id_campaign = Db::getInstance()->getValue("SELECT MAX(id_campaign) FROM "._DB_PREFIX_."mailing_history");
				$nbrs_enreg = Db::getInstance()->getValue("SELECT COUNT(*) AS compt FROM "._DB_PREFIX_."mailing_history WHERE id_campaign ='$id_campaign'");
				$id_campaign++;
				$this->_returnHTML .= '<h2>'.$this->l('Campaign').' n° '.$id_campaign.'&nbsp;&nbsp;</h2>';
					$track = '<iframe src="http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'track.php?email='.$this->l('%MAIL%').'&id_campaign='.$id_campaign.'&subject='.$subject.'"  width="0" height="0" frameborder="0"></iframe>';
					$html.= $track;
			}
				
	    $firstname 	= isset($value['firstname']) ? $value['firstname'] : Tools::getValue('name_Subscribers');
	    $lastname 	= isset($value['lastname']) ? $value['lastname'] : Tools::getValue('lname_Subscribers');
	    $email 	= $value['email'];
			$view = str_replace("'","_", $subject);
			$link = '<a href="http://'.$url.'newsletters/'.$view.'.html">'.$this->l('Click here to read this email in your browser').'</a>';
			$sub = '<a href="http://'.$url.'unsubscribe.php?action=0&email='.$email.'">'.$this->l('Subscribe').'</a>';
			$unsub = '<a href="http://'.$url.'unsubscribe.php?action=1&email='.$email.'">'.$this->l('Unsubscribe').'</a>';
	
	    $html 	= str_replace($this->l('%FIRSTNAME%'), $firstname, $html);
	    $html 	= str_replace($this->l('%CIVILITY%'), $gender, $html);			
	    $html 	= str_replace($this->l('%LASTNAME%'),  $lastname, $html);
	    $html 	= str_replace($this->l('%MAIL%'),      $email, $html);
	    $html 	= str_replace($this->l('%LINK%'),      $link, $html);
			$html 	= str_replace($this->l('%SUB%'),     $sub, $html);
	    $html 	= str_replace($this->l('%UNSUB%'),     $unsub, $html);
				
	    $subject 	= str_replace($this->l('%CIVILITY%'), $gender, $subject);			
	    $subject 	= str_replace($this->l('%FIRSTNAME%'), $firstname, $subject);
	    $subject 	= str_replace($this->l('%LASTNAME%'),  $lastname, $subject);
	    $subject 	= str_replace($this->l('%MAIL%'),      $email, $subject);		
	
	    $mensagem 		= $html;
	    $Mail_Send          = new Mail();
	    $send               = true;
			$from = trim(Tools::getValue('from'));
			if(empty($from))  
				$from = configuration::get('PS_SHOP_EMAIL');
			$fromName = trim(Tools::getValue('fromname'));
			if(empty($fromName)) 
				$fromName = configuration::get('PS_SHOP_NAME');
			$toName = trim(Tools::getValue('toname'));
			if(empty($toName)) 
				$toName = Null ;
			$this->_returnHTML .= 'Backup: ';
			if (($finalList[$key]!=null) and (Validate::isEmail($email)))
			{
			$mail_dir = _PS_MODULE_DIR_ . 'newsletteradmin/mails/';
				$send 		= Mail::Send(intval($cookie->id_lang), 'newsletter', $subject, array('{message}' => stripslashes($mensagem)),strtolower($email), $toName, $from, $fromName, null, null, $mail_dir);
				if ($no_save != 1)
				{	
					$today = date('d-m-Y H:i:s');
					$sql  = "DELETE from "._DB_PREFIX_."mailing_sent WHERE id_campaign <= ($id_campaign -5)"; 
					Db::getInstance()->Execute($sql);
					$sql ="OPTIMIZE TABLE "._DB_PREFIX_."mailing_sent";
					Db::getInstance()->Execute($sql);
					$sql ="insert into "._DB_PREFIX_."mailing_sent ( id_campaign, email, date) values('$id_campaign', '$email','$today')";
					Db::getInstance()->Execute($sql);
				}
				$suc= 'Ok: '.utf8_encode($_SESSION['category']).' -> '.$email;
				nlog($suc.chr(13));
			}
			else
			{
				$this->_returnHTML .= '<div class="alert">'.$this->l('Verify your email\'s syntax, this address is not a valid email address!').' ('.$email.')</div><form action="' . $currentIndex . '&token=' . $this->token .'&send=0" method="post" >
			<div align="center"><br />
				<input type="submit" name="back" value="&nbsp;'.$this->l('Back').'&nbsp;" class="button" />
			</div></form>';
				$fail= $email.html_entity_decode($this->l('Verify your email\'s syntax, this address is not a valid email address!'));	
				nlog($fail.chr(13));
	      return;
	    }
	    $output             .=
		    '<tr>
		    <td>&nbsp;' . $firstname . '</td>
		    <td>&nbsp;' . $lastname . '</td>
		    <td>&nbsp;' . $email . '</td>
		    <td align="center">';
				
			//begining the backup...
	    if ($send) 
			{
				if($template_save == 1)
				{
					$template_dir =_PS_ROOT_DIR_.'/js/tiny_mce/templates/';
					if (!file_exists ($template_dir)) 
						$this->_returnHTML .= 'Error the directory '.$template_dir.' don\'t exists!';
					else 
					{
						$subject = str_replace("%"," per cent", $subject);
						$temp=fopen($template_dir.$subject.'.html', 'w+');
						$body = utf8_encode($_POST['body_email']);
						fputs($temp,stripslashes($body));
						fclose($temp);
					}
				}
				
				Configuration::updateValue('NEWSLETTER_FROM', $from);
				Configuration::updateValue('NEWSLETTER_FROM_NAME', $fromName);
				Configuration::updateValue('NEWSLETTER_TO_NAME', $toName);
	      $Result['success']++;
	      $output .= "<font color=\"GREEN\"> ".$this->l('SUCCESS!')." </font> <br>";
	
	 			if($no_save != 1)
				{
					//backup only if the directory exist
					$rep = _PS_ROOT_DIR_.'/newsletters/';
					if (file_exists ($rep)) 
					{
						$this->_returnHTML .= 'Ok<br/>';
	
						if (isset ($fichier))
						{
							$saven=fopen($fichier, 'w+');
							if(!file_exists($fichier)) 
								fopen($fichier, 'w+');
								
							$html = $_POST['body_email'];
	
							$html 	= str_replace($this->l('%FIRSTNAME%'),$this->l('Firstname') ,$html);
							$html 	= str_replace($this->l('%LASTNAME%'),$this->l('Name') ,$html);
							$html 	= str_replace($this->l('%MAIL%'),$this->l('your email') ,$html);
							$html 	= str_replace($this->l('%LINK%'),$this->l('html link')  ,$html);
							$html 	= str_replace($this->l('%CIVILITY%'),$this->l('Mr,Mme')  ,$html);
							$html 	= str_replace($this->l('%SUB%'),$this->l('Subscription link')  ,$html);
							$html 	= str_replace($this->l('%UNSUB%'),$this->l('Unsubscription link')  ,$html);	
							$html 	= str_replace($track,'',$html);	
							utf8_encode('body_email');
	
							$this->_returnHTML .= $html;	//To see the result of the backup in the first shipment, may be commented 
	
							fputs($saven,  stripslashes('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>'.$subject.'</title></head><body><center><input type="button" class="button" value="'.$this->l('Back').'" onClick="javascript:history.go(-1)" />&nbsp;&nbsp;<input type="button" class="button" value="'.$this->l('Close').'" onclick="window.close()" /></center></fieldset></form>'.$html.'</body>'));
							fclose($saven);
						}	
					}
					else
							$this->_returnHTML .= $this->l('FAILED').'<br/><div class="alert"><b>'.$this->l('Warning:') .'</b></br>'.$this->l('Your newsletter has not been saved!') .'</br>'.$this->l(' If you want to keep archives re-configure your module here').': <a href="'.$_SERVER["PHP_SELF"].'?controller=AdminNewsletter&install=1&token='.Tools::getAdminTokenLite('AdminNewsletter').'"><img src="../img/admin/cog.gif" alt="Reset" title="'.$this->l('Reset').'"></a></div>';
				}
				if($no_save == 1) 
				{
					$this->_returnHTML .= $this->l('No backup required for this session!').'<br/><br/>';
					$fail= 'Info: '.html_entity_decode($this->l('No backup required for this session!'));	
					nlog($fail.chr(13));
				}
			} 
			else
	    {
				$this->_returnHTML .= $this->l('No backup!').'<br/><br/>';
				$ArrayFailed[]  =   $value;
				$Result['failed']++;
				$output .=  "<font color=\"RED\"> ".$this->l('FAILED')." </font> <br>";
	    }
				
	    $output .=  ' </td></tr>';
	    $Result['total']++;
	
	    $_SESSION['newsletter']['key']            =   $key;
	    $_SESSION['newsletter']['output']         =   $output;
	    $_SESSION['newsletter']['total']          =   $Result['total'];
	    $_SESSION['newsletter']['failed']         =   $Result['failed'];
	    $_SESSION['newsletter']['success']        =   $Result['success'];
				
			//Compteur de mails à envoyer
			if( !isset($finalList[$key+1]))
				$nbv = count($finalList);
			else
				$nbv = count($finalList);
	            
	    $ouput_foot     =    '<tr><td colspan="4">&nbsp;</td></tr>';
	            
	    $ouput_foot    .=    '<tr><td colspan="2"  ></td><td><b>&nbsp; '.$this->l('Total sent / Total to be sent').'</b></td><td align="center">'.$Result['total'].'/'.$nbv.'</td><tr>';
	    
	    $ouput_foot    .=    '<tr><td colspan="2"  ></td><td><b>&nbsp; '.$this->l('Total successfully').'</b></td><td align="center"><font color="GREEN">'.$Result['success'].'</font></td><tr>';
	
	    $ouput_foot    .=    '<tr><td colspan="2"  ></td><td><b>&nbsp; '.$this->l('Total failure').'</b></td><td align="center"><font color="RED">'.$Result['failed'].'</font></td><tr>';
			$percent = ($Result['total']/$nbv)*100;
			$progress = number_format($percent, 2, ',', ' ');
				
			//affichage de la barre de progression
			$this->_returnHTML .= '<style type="text/css">
							.prog-border {height: 20px;border: 1px solid #DDD;}
							.prog-bar {height: 20px;background: url("../modules/newsletteradmin/img/bar.gif") repeat-x;width:'.$percent.'%;height:100%; }
							.barre span{width:'.$percent.'%;text-align:center;float:left;margin-top:3px;}
						</style>
						<div class="prog-border">
							<div class="prog-bar" style="width:'.$percent.'%; text-align: center;">
								<div class="barre">
									<span style="color:white;">'.$progress.' %   ('.$Result['total'].'/'.$nbv.')</span>
								</div>
							</div>
						</div>
						<br/>
			';
				
			if( isset($finalList[$key+1]) )
			{		
				//$this->html .= $email;			
	      $this->_returnHTML .= "<meta http-equiv=\"refresh\" content=\"$wait\" />";
	      $this->_returnHTML .= '<div>'.$this->l('Wait...').'
								<div id="waiting">
									<p class="center"><img src="../img/loader.gif" alt="" /> '.$this->l('Sending Emails...').'</p>
								</div>
							</div>';
	      $button      =   '  ';			
	    }
	    else
			{
	      session_destroy();
	      $_SESSION['newsletter']['POST']        =   $_POST;
	      $this->_returnHTML .= '<html><head></head><body><center><div class="conf" style="width:200px">'.$this->l('Finished!').'</div></center>
			<object type="audio/wav" width="0" height="0" data="../modules/newsletteradmin/siren.wav">
			<param name="filename" value="../modules/newsletteradmin/siren.wav" />
			<param name="autostart" value="true" />
			<param name="loop" value="false" />
			</object>';
					
				$button      =   ' <input type="submit" name="back" value="&nbsp;'.$this->l('Back').'&nbsp;" class="button" /> ';
				//Store the number of mails sent
					
				$num_sent = $Result['total'];
				$date = date("d-m-Y");
				$time = date("H-i-s");
				if ($no_save != 1)
				{
					$subject = str_replace("'","_", $subject);
					$sql ="insert into "._DB_PREFIX_."mailing_history ( id_campaign, subject, date, time, num_sent) values('$id_campaign', '$subject','$date','$time','$num_sent')";
					Db::getInstance()->Execute($sql);
				}
				$finish = html_entity_decode($this->l('Total successfully')).': '.$num_sent;
				nlog($finish.chr(13));
				if ($Result['failed']> 0)
				{					
					$num_fail = $Result['failed'];					
					$failed = html_entity_decode($this->l('Total failed')).': '.$num_fail;
					nlog($failed.chr(13));
				}
			}
	
	    $ouput_header	=	'<fieldset>
						            <legend>'.$this->l('Report').'</legend><br>
						            <table border="1" width="100%" style="border-collapse: collapse;" cellpadding="2" bordercolor="#e0d0b1" >
							            <tr>
				                    <td align="center"><b>'.$this->l('FIRSTNAME').'</b></td>
				                    <td align="center"><b>'.$this->l('LASTNAME').'</b></td>
				                    <td align="center"><b>'.$this->l('E-MAIL').'</b></td>
				                    <td align="center"><b>'.$this->l('STATUS').'</b></td>
							            </tr>
	    ';
	
	    /** BACK BUTTON **/
	    $ouput_foot	.=    '		</table>
	            						</fieldset>
	            						<form action="' . $currentIndex . '&token=' . $this->token .'&send=0" method="post" >
								            <div align="right"><br />
								                '.$button.'
														</div>
													</form>
			';
			
	    $this->_returnHTML .= $ouput_header;
	    $this->_returnHTML .= $output;
	    $this->_returnHTML .= $ouput_foot;
				
			rotate_logs();
		}
		if (Tools::getValue('install') == 1)
		{	

	$ver = '3.0';
			
			if(intval(Configuration::get('PS_REWRITING_SETTINGS')) === 1)
				$rewrited_url = __PS_BASE_URI__;
				
				clearstatcache();
				Configuration::updateGlobalValue('Admin_Newsletter_Version', $ver);
				
				$iso = trim(Configuration::get('PS_LOCALE_LANGUAGE'));
				if (empty($iso)){ $this->_returnHTML .= 'Please configure your local language before continue in Preferences/Localization and retry<br/><br/>
					<center><input type="button" class="button" value="'.trans('Go to the module').'" onClick="javascript:history.go(-1)" /></center>';die();}
				$rep_lang = _PS_MODULE_DIR_.'newsletteradmin/lang';
				$files = 'scripts';
				$trans_lang = $rep_lang.'/lang_'.$iso.'.php';
				$uni_lang = $rep_lang.'/uni_lang.php';
				$temp_lang = $rep_lang.'temp.php';
						if ($iso != 'en') 
						{
							if (!file_exists ($trans_lang))
							{
							 if (file_exists($uni_lang)) {
								copy($uni_lang,$temp_lang); 
								rename($temp_lang,$trans_lang);
								$this->_returnHTML .= '<b>'.trans('A translation file for your language has been created here').':</b> '.$trans_lang.'<br/>'.trans('You can edit it later to translate the expressions in your language').'.';}
								else die('<font color="red">Error: The files uni_lang.php is missing! <br/><br/>Verify your archive in '.$rep_lang.'</font>');
							}
							else{ $this->_returnHTML .= '<b>'.trans('A translation file for your language is here').':</b> '.$trans_lang.'<br/>';}
						}else{ $this->_returnHTML .= 'No translations required to your language (English)<br/>';}
						
				/***  Update tiny  ***/
				if (!extension_loaded('curl'))  
					die('Error! Curl extension is not activated on your server, please install it and retry.');
				$tiny = '../js/tiny_mce';
				$tiny_old = '../js/tiny_mce_old';
				if (file_exists($tiny_old)) 
				{
					if(is_writable($tiny_old))
						{@deltree($tiny_old);}
						else $this->_returnHTML .= 'This file is not erasable: '.$tiny_old;
				}
				if (!file_exists($tiny_old)) 
				{
							ini_set('user_agent', $_SERVER['HTTP_USER_AGENT']);
						
								$url = 'http://www.eolia.o2switch.net/newsletter/download/tiny.zip ';
								$testUrl = fopen($url, 'r');
								if ($testUrl){
								$tempFile = _PS_MODULE_DIR_.'newsletteradmin/upgrade_tiny.zip';
								
								fclose($testUrl);
								$out = fopen($tempFile , 'wb');
								$ch = curl_init();
									curl_setopt($ch, CURLOPT_FILE, $out);
									curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
									curl_setopt($ch, CURLOPT_HEADER, false);
									curl_setopt($ch, CURLOPT_URL, $url);
									curl_exec($ch);
			
								$info = curl_getinfo($ch);
			
								if($info['http_code'] == 200 ) {
								if (file_exists($tiny)) {rename($tiny,$tiny_old);}
										include('../tools/pclzip/pclzip.lib.php');
										  $archive = new PclZip($tempFile);
										  if ($archive->extract(PCLZIP_OPT_PATH, '../js',
																PCLZIP_OPT_REMOVE_PATH, $tempFile) == 0)
																{
											die("Error : ".$archive->errorInfo(true));
										  } 
								fclose($out);
								chmod($tempFile, 0755);
								} 
								
								}else $this->_returnHTML .= 'Server connection failed or files are missing! Try later or download it here: '.$url.' and copy it in your js directory';
				} 
			
				
			    function smartCopy($source, $dest, $options=array('folderPermission'=>0755,'filePermission'=>0755)) 
			    { 
			    	$result=false; 
			        
			      if (is_file($source)) 
			      { 
							$result .= trans('Copying file').': ';		
			        if ($dest[strlen($dest)-1]=='/') 
			        { 
			        	if (!file_exists($dest)) { 
			          	cmfcDirectory::makeAll($dest,$options['folderPermission'],true); 
			          } 
			          $__dest=$dest."/".basename($source); 
			        } 
			        else 
			        { 
			                $__dest=$dest;
					$result .= $__dest.'...<br/>';				
			            } 
			            $result=copy($source, $__dest);
						chmod($__dest,$options['filePermission']); 
			        
			        } elseif(is_dir($source)) { 
			            if ($dest[strlen($dest)-1]=='/') { 
			                if ($source[strlen($source)-1]=='/') { 
			                    //Copy only contents 
			                } else { 
			                    //Change parent itself and its contents 
			                    $dest=$dest.basename($source); 
			                    @mkdir($dest); 
			                    chmod($dest,$options['filePermission']); 
			                } 
			            } else { 
			                if ($source[strlen($source)-1]=='/') { 
			                    //Copy parent directory with new name and all its content 
			                    @mkdir($dest,$options['folderPermission']); 
			                    chmod($dest,$options['filePermission']); 
			                } else { 
			                    //Copy parent directory with new name and all its content 
			                    @mkdir($dest,$options['folderPermission']); 
			                    chmod($dest,$options['filePermission']); 
			                } 
			            } 
			
			            $dirHandle=opendir($source); 
			            while($file=readdir($dirHandle)) 
			            { 
			                if($file!="." && $file!="..") 
			                { 
			                     if(!is_dir($source."/".$file)) { 
			                        $__dest=$dest."/".$file; 
			                    } else { 
			                        $__dest=$dest."/".$file; 
			                    } 
			                    $result=smartCopy($source."/".$file, $__dest, $options);
			                } 
			            } 
			            closedir($dirHandle);            
			        } else {$result=false; 
			        } 
			        return $result; 
			    }
				
				
					$this->_returnHTML .= '
					<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
					
						<fieldset style="background:#EBEDF4;border:1px solid #CCCED7;color: #585A69; font-size:1em;margin:50px;padding:1em">
							<legend style="background: none repeat scroll 0 0 #EBEDF4;border: 1px solid #CCCED7;font-weight: 700; margin: 0;  padding: 0.2em 0.5em;  text-align: left;"><img src="../modules/newsletteradmin/logo.gif"  alt="" title="Newsletter" /> <a>'.trans('Copying files to your server').' </a></legend>
							<label><b>'.trans('Copying files').'...</b></label><br/>';
				
			
					$adir = Configuration::get('ADMIN_DIR');
					$iso = Configuration::get('PS_LOCALE_LANGUAGE');
			
			
					//Clean after auto-update
					if (file_exists('../modules/upgrade_PSNewsLetter.zip')) { 
						unlink('../modules/upgrade_PSNewsLetter.zip'); 
						$this->_returnHTML .= '<br/>'.trans('Installation files successfully deleted').'!<br/><br/>';
					}
					$right = substr(sprintf('%o', fileperms($tempFile)), -4);
					if ($right <= 700)$this->_returnHTML .= '<br/><b><font color="red">'.trans('Error!').'</b></font> '.trans('Your chmod\'s rights are').' '. $right.' '.trans('on').' '.$tempFile.' '.trans('and are too restrictive, please delete this file yourself Maybe you are on a windows server ?').'<br/>';
					if(@unlink($tempFile)){
						$this->_returnHTML .= '<br/>Update Tiny, '.trans('Downloading files and install').'... <b>'.trans('your tiny is up to date!').'</b> '; 
						$this->_returnHTML .= '<b><p align="center">'.trans('Finish!').'</p></b><br/><br/>';}
					//Recovery templates	
					if (file_exists($tiny.'_old/templates')) {
						$right = substr(sprintf('%o', fileperms($tiny.'_old/templates')), -4);
						if ($right >= 700) { $this->_returnHTML .= '<font color="green">'.trans('OK, you are allowed to write on the folder').': '._PS_ROOT_DIR_.'/js/tiny_mce/templates --> CHMOD: '.$right.'</font><br/>';
						unlink($tiny.'_old/templates/list.php');
						unlink($tiny.'_old/templates/supp.php');
						@smartCopy($tiny.'_old/templates', $tiny.'/templates', $options=array('folderPermission'=>0755,'filePermission'=>0755));
						$this->_returnHTML .= trans('Your old templates have been saved');
						$this->_returnHTML .= '<b><p align="center">'.trans('Finish!').'</p><br/>'.trans('The file').' '.$tiny.'_old/templates '.trans('was successfully copied to').' '.$tiny.'/templates</b><br/><br/>'; 
						}else {
						$this->_returnHTML .= '<b><font color="red">'.trans('Error!').' '.trans('You are not allowed to write on the folder').': '._PS_ROOT_DIR_.'/js/tiny_mce/templates -> ' .$right.'. '.trans('Your chmod rights should be greater or equal to').' 700 <p align="center">'.trans('FAIL!').'</p></font></b><br/><br/>
						<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>';
						 } 
						}
					$files = _PS_MODULE_DIR_.'newsletteradmin/scripts/files/';
					$files2 =  _PS_ROOT_DIR_;
					if (!is_dir($files)) $this->_returnHTML .= '<font color="red">'. trans('Error: The directory').' '. $files.' '.trans('not exist! Verify your archive').'</font><br/>';
						$right = substr(sprintf('%o', fileperms($files2)), -4);
						if ($right >= 700) { $this->_returnHTML .= '<font color="green">'.trans('OK, you are allowed to write on the folder').': '.$files2.' --> CHMOD: '.$right.'</font><br/>';
						smartCopy($files, $files2, $options=array('folderPermission'=>0755,'filePermission'=>0755));
						$this->_returnHTML .= '<b><p align="center">'.trans('Finish!').'</p><br/>'.trans('The entire file').' '.$files.' '.trans('was successfully copied to').' '.$files2.'</b><br/><br/>'; 
						}else {
						$this->_returnHTML .= '<b><font color="red">'.trans('Error!').' '.trans('You are not allowed to write on the folder').': '.$files2.' -> ' .$right.'. '.trans('Your chmod rights should be greater or equal to').' 700 <p align="center">'.trans('FAIL!').'</p></font></b><br/><br/>
						<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>';
							 } 
						
					$files = _PS_MODULE_DIR_.'newsletteradmin/scripts/manage';
					$files2 =  _PS_ROOT_DIR_;
					if (!is_dir($files)) $this->_returnHTML .= '<font color="red">'. trans('Error: The directory').' '. $files.' '.trans('not exist! Verify your archive').'</font><br/>';
					$right = substr(sprintf('%o', fileperms($files2)), -4);
						if ($right >= 700) { $this->_returnHTML .= '<font color="green">'.trans('OK, you are allowed to write on the folder').': '.$files2.' --> CHMOD: '.$right.'</font><br/>';
						smartCopy($files, $files2, $options=array('folderPermission'=>0755,'filePermission'=>0755));
						$this->_returnHTML .= '<b><p align="center">'.trans('Finish!').'</p><br/>'.trans('The entire file').' '.$files.' '.trans('was successfully copied to').' '.$files2.'</b><br/><br/>'; 
						}else {
						$this->_returnHTML .= '<b><font color="red">'.trans('Error!').' '.trans('You are not allowed to write on the folder').': '.$files2.' -> ' .$right.'. '.trans('Your chmod rights should be greater or equal to').' 700 <p align="center">'.trans('FAIL!').'</p></font></b><br/><br/>
						<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>';
								 } 
						
					$files = _PS_MODULE_DIR_.'newsletteradmin/modules';
					$files2 =  _PS_ROOT_DIR_.'/modules';
					if (!is_dir($files)) $this->_returnHTML .= '<font color="red">'. trans('Error: The directory').' '. $files.' '.trans('not exist! Verify your archive').'</font><br/>';
					$right = substr(sprintf('%o', fileperms($files2)), -4);
						if ($right >= 700) { $this->_returnHTML .= '<font color="green">'.trans('OK, you are allowed to write on the folder').': '.$files2.' --> CHMOD: '.$right.'</font><br/>';
						smartCopy($files, $files2, $options=array('folderPermission'=>0755,'filePermission'=>0755));
						$this->_returnHTML .= '<b><p align="center">'.trans('Finish!').'</p><br/>'.trans('The entire file').' '.$files.' '.trans('was successfully copied to').' '.$files2.'</b><br/><br/>'; 
						}else {
						$this->_returnHTML .= '<b><font color="red">'.trans('Error!').' '.trans('You are not allowed to write on the folder').': '.$files2.' -> ' .$right.'. '.trans('Your chmod rights should be greater or equal to').' 700 <p align="center">'.trans('FAIL!').'</p></font></b><br/><br/>
						<center><input type="button" class="button" value="'.trans('Back').'" onClick="javascript:history.go(-1)" /></center>';
							 }
					$this->_returnHTML .=  '
						</fieldset>
						<center><a class="button" href="'.$_SERVER["PHP_SELF"].'?controller=AdminNewsletter&token='.Tools::getAdminTokenLite('AdminNewsletter').'">
							 '.trans('OK').'</a>
						</center>';
					
				$this->_returnHTML .= '		</fieldset>
							</form>';
		}
		return $this->_returnHTML;
	}

	private function countBirthCustomers() 
	{
		$birth = Tools::getValue('dateBirthday');
		$query = "
			SELECT count(*) as nb
			FROM  `"._DB_PREFIX_."customer` 
			WHERE `newsletter`=1
			AND   active !=0
			AND deleted !=1
			AND DATE_FORMAT(birthday, \"%d-%m\") = '$birth' ";			
		return Db::getInstance()->getValue($query);
	}
		
	private function getBirthdayCustomers( $date = null )
	{
	  $date = is_null($date) ? date("d-m") : $date;
		return Db::getInstance()->Execute("
	        SELECT
							id_gender,
	            email,
	            lastname,
	            firstname
	        FROM
	            `"._DB_PREFIX_."customer`
	        WHERE `newsletter`=1
					AND   active !=0
					AND deleted !=1
					AND DATE_FORMAT(birthday, \"%d-%m\") = '$date' ");
	}
	
	private function countBlockSub() 
	{
		return Db::getInstance()->getValue('SELECT count(*) as nb FROM  `'._DB_PREFIX_.'newsletter` ');
	}
	private function usersBlockSub() 
	{
		return Db::getInstance()->getValue('SELECT email as nb FROM  `'._DB_PREFIX_.'newsletter` ');
	}
	private function getBlockSubscribers()
	{
  	return Db::getInstance()->ExecuteS("
        SELECT 
					email
        FROM `"._DB_PREFIX_."newsletter` ");
  }
	
	private function countsex($id_gender) 
	{
		return Db::getInstance()->getValue('
			SELECT count(*) as nb
			FROM  `'._DB_PREFIX_.'customer` 
			WHERE active != 0
			AND deleted != 1
			AND id_gender = '.(int)$id_gender);			
	}
	
	private function getSexCustomers($id_gender)
	{
		return Db::getInstance()->ExecuteS("
			SELECT
				id_gender,
				email,
	      lastname,
	      firstname
			FROM 
				`"._DB_PREFIX_."customer` 
	        WHERE deleted !=1
	        AND   active !=0
			AND id_gender = '".$id_gender."'
		");      
	}
	
	private function countCustomers() 
	{	
		return Db::getInstance()->getValue('
		SELECT count(*) as nb
			FROM  `'._DB_PREFIX_.'customer` 
			WHERE active !=0
			AND deleted !=1');
	}	
	
	private function getCustomers()
	{
		return Db::getInstance()->ExecuteS("
		SELECT
			id_gender,
			email,
            lastname,
            firstname
		FROM 
			`"._DB_PREFIX_."customer` 
        WHERE deleted !=1
        AND   active !=0			
			");      
	}
	
	private function countCustomersSub() 
	{			
		return Db::getInstance()->getValue('
		SELECT count(*) as nb
			FROM  `'._DB_PREFIX_.'customer` 
			WHERE `newsletter`=1
			AND   active !=0
			AND deleted !=1');
	}
		
	private function getNewsletteremails()
	{
		return Db::getInstance()->ExecuteS("
		SELECT
			id_gender,
			email,
            lastname,
            firstname
		FROM
			`"._DB_PREFIX_."customer`
        WHERE deleted !=1
        AND   active !=0
		AND newsletter !=0
			");  
	}
	
	private function countOptCustomers() 
	{	
		return Db::getInstance()->getValue('
		SELECT count(*) as nb
			FROM  `'._DB_PREFIX_.'customer` 
			WHERE `optin`=1
			AND `newsletter`=1
			AND   active !=0
			AND deleted !=1');
	}
	
	private function getOptCustomers()
	{
		return Db::getInstance()->ExecuteS("
		SELECT
			id_gender,
			email,
            lastname,
            firstname
		FROM
			`"._DB_PREFIX_."customer`
        WHERE deleted !=1
        AND   active !=0
		AND newsletter !=0
		AND `optin`=1
			");  
	}

	private function countNoReadCustomers() 
	{
		$id_campaign 	= Db::getInstance()->getValue('SELECT MAX(id_campaign) FROM '._DB_PREFIX_.'mailing_history');
		$nbr_sent 		= Db::getInstance()->getValue("select count(*) FROM `"._DB_PREFIX_."mailing_sent` as m WHERE m.id_campaign = '$id_campaign'");
		$nbr_received = Db::getInstance()->getValue("select count(*) FROM `"._DB_PREFIX_."mailing_track` as t WHERE t.id_campaign = '$id_campaign'");


		$result = ($nbr_sent - $nbr_received);	
		if ($nbr_received>$nbr_sent) 
			$result = '0';
		if ($nbr_received == 0)
			$result = $this->l('Please wait, no email has been opened');
		return ($result); 
	}
	
	private function getNoReadCustomers()
	{
		$id_campaign = Db::getInstance()->getValue("SELECT MAX(id_campaign) FROM "._DB_PREFIX_."mailing_history");

	
		return Db::getInstance()->ExecuteS("select distinct s.email from 	
						`"._DB_PREFIX_."mailing_sent` as s,
						`"._DB_PREFIX_."mailing_track` as t
						   WHERE s.id_campaign = $id_campaign
						   AND t.id_campaign = $id_campaign
						   AND s.email != t.email
						   
			"); 
	}
	
	private function getGroupCustomers() 
  {
		$groupname = trim(Tools::getValue('groupname'));
		return Db::getInstance()->ExecuteS("
		SELECT 
			c.id_gender,c.email,c.lastname,c.firstname,c.id_customer,
      cg.id_customer, cg.id_group
		FROM 
			`"._DB_PREFIX_."customer` as c,
			`"._DB_PREFIX_."customer_group` as cg
		WHERE c.id_customer=cg.id_customer
		AND cg.id_group = '$groupname'
		AND c.deleted !=1
        AND c.active !=0
		AND c.newsletter !=0");
  }
	
	private function countCsvCustomers() 
	{	
		return Db::getInstance()->getValue('SELECT count(*) as nb FROM  `'._DB_PREFIX_.'mailing_import`');
	}	
	
	private function getCsvCustomers()
	{
		return Db::getInstance()->ExecuteS("
			SELECT
				email,
	            lastname,
	            firstname
			FROM 
				`"._DB_PREFIX_."mailing_import` 		
		");      
	}
	
	private function listrep()
	{
		global $Key;
		$template_dir = 'tiny_mce/templates/';
		$rep = _PS_ROOT_DIR_.'/newsletters';
		$url = $_SERVER['HTTP_HOST'].__PS_BASE_URI__;//requested by loulou66
		if (file_exists ($rep))	
		{
			$this->html .= '
	
				<fieldset>
				<legend>'.$this->l('Archives').':</legend>		
				<form name="redirect" > 
				<div>'.$this->l('Remember to replace the variables in your text if you copy/paste an archive in your message').'</div>
				<div>'.$this->l('Yours backups are stored in the created directory:').'<b>'.$rep.'</b></div>
				</br>
				<div style="margin-left: 15px;float: right;font-size: 12px;">';
				
			//report of the last campaign
			$this->html .=  $this->l('Emails read in the last campaign');
	
				$id_campaign =Db::getInstance()->getValue("SELECT MAX(id_campaign) FROM "._DB_PREFIX_."mailing_history ");
				if ($id_campaign == 0)
				{
			$this->html .=  ': <font color="red">'.$this->l('No campaign registered!').'</font><br/></div>';
				}else{
					$nbrs_enreg = Db::getInstance()->getValue("SELECT COUNT(*) as compt FROM "._DB_PREFIX_."mailing_track WHERE id_campaign ='$id_campaign'");		
					$res2 = Db::getInstance()->getRow("SELECT * FROM "._DB_PREFIX_."mailing_history WHERE id_campaign ='$id_campaign'");			
					$num_sent = $res2['num_sent'];
					$date_sent = $res2['date'];
					$impact = ($nbrs_enreg/$num_sent)*100;
					$ratio = number_format($impact, 2, ',', ' ');
			$this->html .= ' N° '.$id_campaign.'<b> >> </b>'.$date_sent.': '.$nbrs_enreg.'/'.$num_sent.'&nbsp;&nbsp;(<b>'.$ratio.'%</b>)<br/><br/>';
			if ($id_campaign != 0)
				{
				$this->html .= "
				<a href=\"../modules/newsletteradmin/history.php?key=$Key\" target=popup class=\"button\" onclick=\"window.open('','popup','width=750,height=434,left=50,top=50')\">".$this->l('See reports')."</font></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href=\"../modules/newsletteradmin/truncate.php?key=$Key\" target=popup class=\"button\" onclick=\"if(!confirm('".$this->l('Are you sure to delete your results ?')." ')){return false }else{window.open('','popup', 'width=350, height=200, left=50, top=50')} \">".$this->l('Drop results') ."</font></font></a></div>";
				}
					}
			$this->html .= '
			'.$this->l('See or delete your backups').':</br><br/>
				<a href="../newsletters/list.php?key='.$Key.'" target="popup" class="button" onclick="window.open(\'\',\'popup\',\'width=750,height=380,left=50,top=50,resizable=yes, scrollbars=yes\')">'.$this->l('Manage backups').'</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="../js/'.$template_dir.'list.php?key='.$Key.'" target="popup" class="button" onclick="window.open(\'\',\'popup\',\'width=750,height=380,left=50,top=300,resizable=yes, scrollbars=yes\')">'.$this->l('Manage templates').'</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="../modules/newsletteradmin/logs/list.php?key='.$Key.'" target="popup" class="button" onclick="window.open(\'\',\'popup\',\'width=750,height=380,left=50,top=50,resizable=yes, scrollbars=yes\')">'.$this->l('View logs').'</font></a>
				</form><br/>
				</fieldset></br>';
				    	
		}
		else
		{	
			$this->html .= '
				<center><div class="alert"><b>'.$this->l('WARNING: Archives unavailable!') .'</b>
				</br>'.$this->l('The directory /newsletters don\'t exist!') .'</br>'.$this->l(' If you want to keep archives re-configure your module here').': <a href="../../modules/newsletteradmin/install.php">'.$this->l('Copy files').'</font></a></div></center>';
		}
	}
			
	function remove_accents($str, $charset='utf-8')//to remove specials characters in filenames
	{
		$str = htmlentities($str, ENT_NOQUOTES, $charset);
		$str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
		$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); 
		$str = preg_replace('#&[^;]+;#', '', $str);
		return $str;
	}	
}