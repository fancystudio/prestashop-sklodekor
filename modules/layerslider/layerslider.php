
<?php
if (!defined('_PS_VERSION_'))
  exit;
 
class layerslider extends Module
  {
  public function __construct()
    {
    $this->name = 'layerslider';
    $this->tab = 'Test';
    $this->version = 1.0;
    $this->author = 'fancystudio';
    $this->need_instance = 0;
 
    parent::__construct();
 
    $this->displayName = $this->l('layer slider');
    $this->description = $this->l('layer slider na indexe');
    }
	



public function install(){
  if ( Shop::isFeatureActive() ){
   Shop::setContext( Shop::CONTEXT_ALL );
  }
  return parent::install() && $this->registerHook( 'displayHome' ) && $this->registerHook( 'header' );
}

public function uninstall(){
  return parent::uninstall();
}


  
public function hookDisplayRightColumn( $params ){
  return $this->hookDisplayLeftColumn( $params );
}
  
public function hookDisplayHeader($params){
  $this->context->controller->addCSS( $this->_path . 'lib/layerslider/ls/layerslider/css/layerslider.css' , 'all' );
  $this->context->controller->addJS( $this->_path . 'lib/layerslider/ls/layerslider/js/layerslider.kreaturamedia.jquery.js' , 'all' );
  $this->context->controller->addJS( $this->_path . 'js/test.js' , 'all' );

 //return $this->Display(__FILE__, 'layerslider.tpl', $this->getCacheId());

}


public function hookdisplayHome($params)
   {

       return $this->display(__FILE__, 'layerslider.tpl');
   }



}
?>