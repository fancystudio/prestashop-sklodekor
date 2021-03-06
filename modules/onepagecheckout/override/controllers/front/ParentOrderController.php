<?php
class ParentOrderController extends ParentOrderControllerCore
{
    private $opc_enabled = false;

    public function origInit()
    {
        // verification keys: VK##2
        parent::init();
    }

    public function origInitContent()
    {
        parent::initContent();
    }

    public function origSetMedia()
    {
        parent::setMedia();
    }

    private $opcModuleActive = -1; // -1 .. not set, 0 .. inactive, 1 .. active

    private function isOpcModuleActive()
    {
        // fallback for mobile-enabled theme
        if ($this->context->getMobileDevice())
            return false;

        if ($this->opcModuleActive > -1)
            return $this->opcModuleActive;

        $opc_mod_script = _PS_MODULE_DIR_ . 'onepagecheckout/onepagecheckout.php';
        if (file_exists($opc_mod_script)) {
            require_once($opc_mod_script);
            $opc_mod               = new OnePageCheckout();
            $this->opcModuleActive = $opc_mod->active;
        } else {
            $this->opcModuleActive = 0;
        }
        return $this->opcModuleActive;
    }

    protected function _processCarrier()
    {
        if (!$this->isOpcModuleActive())
            return parent::_processCarrier();

        $reset = false;
        if (!$this->context->customer->id)
            $reset = true;
        if ($reset)
            $this->context->customer->id = 1; // hocijaka nenulova hodnota na osalenie _processCarrier v parentovi

        $_POST['delivery_option'][$this->context->cart->id_address_delivery] = Cart::desintifier(Tools::getValue("id_carrier"));
        $this->context->cart->id_carrier                                     = Cart::desintifier(Tools::getValue("id_carrier"), '');
        $result                                                              = parent::_processCarrier();
        if ($reset)
            $this->context->customer->id = null;
        return $result;
    }
}
