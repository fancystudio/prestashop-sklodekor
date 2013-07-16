<?php
/**
 * Envoi de Newsletter depuis le Back-Office Prestashop 
 * @category admin
 * @license http://www.opensource.org/licenses/osl-3.0.php Open-source licence 3.0
 * @author  Eolia  01/12/2012 compatible PS 1.5 ONLY !
 * @version 3.0
 *
 */
if (!defined('_PS_VERSION_') || !defined('_CAN_LOAD_FILES_'))
	exit;
 		
			
// Checking compatibility with older PrestaShop and fixing it
if (!defined('_MYSQL_ENGINE_'))
	define('_MYSQL_ENGINE_', 'MyISAM');
 
class NewsletterAdmin extends Module
{ 
	
	/******************************************************************/
	/** Construct Method **********************************************/
	/******************************************************************/
	
	public function __construct ()
	{
    $this->name = 'newsletteradmin';
    $this->tab = 'emailing';
    $this->version = '3.0';
    $this->author = 'eolia@eolia.o2switch.net';
	    
    parent::__construct();

    $this->confirmUninstall = $this->l('Delete your Newsletter module ?');
    $this->displayName = $this->l('Newsletter for Prestashop');
    $this->description = $this->l('Sending newsletter from the Back-Office');
		// If this module requires configuration, check whether configured and show warning, if not configured      
		if($this->active && (Configuration::get ('Admin_Newsletter_Version') < $this->version))
		{
		 $this->warning = $this->l('Module not configured correctly, Please click here  ').': 
					<a href="'.$_SERVER["PHP_SELF"].'?controller=AdminNewsletter&install=1&token='.Tools::getAdminTokenLite('AdminNewsletter').'">
					<font color="blue"> '.$this->l('Install files').'</font></a>'; 
		 return false;
		}
	}
			
	/******************************************************************/
	/** Install / Uninstall Methods ***********************************/
	/******************************************************************/
		
	public function install()
	{
		$psVersion = _PS_VERSION_;
		$psVersion = str_replace('.','', $psVersion);	
			if ( strlen($psVersion) == '4')$psVersion = str_replace($psVersion,$psVersion.'0', $psVersion);//missed in some versions
			if ( strlen($psVersion) == '3')$psVersion = str_replace($psVersion,$psVersion.'00', $psVersion);//missed in some versions
			if ( strlen($psVersion) == '2')$psVersion = str_replace($psVersion,$psVersion.'000', $psVersion);//missed in some versions
			if ($psVersion < 15000)
			{
				echo $this->l('This version runs on Prestashop 1.5 only, Please, download the right version to your shop !').'
				<center><br/><input type="button" class="button" value="'.$this->l('Back').'" onClick="javascript:history.go(-1)" /></center>';
				exit;
			}
		// Install SQL
		include(dirname(__FILE__).'/sql/install.php');
		foreach ($sql as $s)
			if (!Db::getInstance()->execute($s))
				return false;

		// Install Module
		if (!parent::install())
			return false;
			
		// Init
		Configuration::updateGlobalValue('Admin_Newsletter_Version', '0.0');
		
		// Tab
		$tab = new Tab();
    $tab->class_name = 'AdminNewsletter';
    $tab->id_parent = Tab::getIdFromClassName('AdminCustomers');
    $tab->module = $this->name;
    $tab->name[(int)(Configuration::get('PS_LANG_DEFAULT'))] = $this->l('Send a newsletter');
    if(!$tab->add())
    	return false;

		return true;
	}
		

	
  public function uninstall()
  {	
  	// Uninstall Config
	//	foreach ($this->_fieldsList as $keyConfiguration => $name)
	//		if (!Configuration::deleteByName($keyConfiguration))
	//			return false;

		// Uninstall SQL
		include(dirname(__FILE__).'/sql/uninstall.php');
		foreach ($sql as $s)
			if (!Db::getInstance()->execute($s))
				return false;
				
		// Uninstall Config (deleteByName)
		Configuration::deleteByName('Admin_Newsletter_Version');
		Configuration::deleteByName('ADMIN_DIR');

		// Uninstall Tab
		$tab = new Tab(Tab::getIdFromClassName('AdminNewsletter'));
		if(!$tab->delete())
			return false;
			
		// Uninstall Files
		if (file_exists(_PS_ROOT_DIR_.'/track.php')) 
			unlink(_PS_ROOT_DIR_.'/track.php');
		if (file_exists(_PS_ROOT_DIR_.'/unsubscribe.php')) 
			unlink(_PS_ROOT_DIR_.'/unsubscribe.php');

		// Uninstall Module
		if (!parent::uninstall())
			return false;

		return true;
	
  }
  
  /******************************************************************/
	/** Main Form Methods *********************************************/
	/******************************************************************/
	
	/*
	public function getContent()
	{
		$output = '<h2>'.$this->displayName.'</h2>
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
			<fieldset>
				<legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
				<label>'.$this->l('Copying Files').'<br/></label>
				<div class="margin-form">
					<br/>'.$this->l('Why copy files?').'
					<p class="clear">'.$this->l('Some files are necessary for the proper functioning of this module. Adding plugins in tiny_mce and two directories, copying files track and unsubscribe to the root of your store and add style mails. The full list will be visible to the next window.').'<br/><br/>
					'.$this->l('You can skip this step if you have already copied the files, or if you want to do it by yourself.').'</p>
				</div>
				<center>
				<input type="button" class="button" value=" '.$this->l(' Copy files ').' " onClick="javascript:document.location.href=\''._MODULE_DIR_.'newsletteradmin/install.php\'" /></center><br/><br/>
				<div class="margin-form">
				'.$this->l('Once your files are copied, you can click on the "Clients" tab and "Send a newsletter"').'
				</div>
			</fieldset>
		</form>';
		return $output;
	}	
	*/
}