
<?php
if (!defined('_PS_VERSION_'))
  exit;
 
class testone extends Module
  {
  public function __construct()
    {
    $this->name = 'testone';
    $this->tab = 'Test';
    $this->version = 1.0;
    $this->author = 'fancystudio';
    $this->need_instance = 0;
 
    parent::__construct();
 
    $this->displayName = $this->l('layer slider');
    $this->description = $this->l('layer slider na indexe');
    }
	
	public function hookDisplayHome()
	{
		if(!$this->_prepareHook())
			return;

		$this->context->controller->addJS($this->_path.'js/jquery.bxSlider.min.jsd');
		$this->context->controller->addCSS($this->_path.'bx_styles1.css');
		$this->context->controller->addJS($this->_path.'js/homeslider1.js');
;
	}
 
  public function install()
    {
    if (parent::install() == false)
      return false;
    return true;
    }
  }
?>