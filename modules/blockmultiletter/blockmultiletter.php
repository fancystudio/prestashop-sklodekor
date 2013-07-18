<?php
if (!defined('_PS_VERSION_'))
    exit;
class Blockmultiletter extends Module{
    const GUEST_NOT_REGISTERED = -1;
    const CUSTOMER_NOT_REGISTERED = 0;
    const GUEST_REGISTERED = 1;
    const CUSTOMER_REGISTERED = 2;
    public function __construct()
    {
        $this->name = 'blockmultiletter';
        $this->tab = 'front_office_features';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Multishop Newsletter hook bottom');
        $this->description = $this->l('Adds a block for newsletter subscription to footer.');

        $this->version = '1.0';
        $this->author = 'eshopthemes';
        $this->error = false;
        $this->valid = false;
    }
    public function install()
    {
        if (!parent::install() ||
            !$this->registerHook('header') ||
            !$this->registerHook('footer'))
            return false;
        return true;
    }
    public function uninstall()
    {
        if (!parent::uninstall())
            return false;
        return true;
    }
    private function isNewsletterRegistered($customerEmail)
    {
        $sql = 'SELECT `email`
				FROM '._DB_PREFIX_.'newsletter
				WHERE `email` = \''.pSQL($customerEmail).'\'
				AND id_shop = '.$this->context->shop->id;

        if (Db::getInstance()->getRow($sql))
            return self::GUEST_REGISTERED;

        $sql = 'SELECT `newsletter`
				FROM '._DB_PREFIX_.'customer
				WHERE `email` = \''.pSQL($customerEmail).'\'
				AND id_shop = '.$this->context->shop->id;

        if (!$registered = Db::getInstance()->getRow($sql))
            return self::GUEST_NOT_REGISTERED;

        if ($registered['newsletter'] == '1')
            return self::CUSTOMER_REGISTERED;

        return self::CUSTOMER_NOT_REGISTERED;
    }
    protected function registerGuest($email, $active = true)
    {
        $sql = 'INSERT INTO '._DB_PREFIX_.'newsletter (id_shop, id_shop_group, email, newsletter_date_add, ip_registration_newsletter, http_referer, active)
				VALUES
				('.$this->context->shop->id.',
				'.$this->context->shop->id_shop_group.',
				\''.pSQL($email).'\',
				NOW(),
				\''.pSQL(Tools::getRemoteAddr()).'\',
				(
					SELECT c.http_referer
					FROM '._DB_PREFIX_.'connections c
					WHERE c.id_guest = '.(int)$this->context->customer->id.'
					ORDER BY c.date_add DESC LIMIT 1
				),
				'.(int)$active.'
				)';

        return Db::getInstance()->execute($sql);
    }
    private function newsletterRegistration()
    {
        if (empty($_POST['email']) || !Validate::isEmail($_POST['email']))
            return $this->error = $this->l('Invalid e-mail address');

        /* Unsubscription */
        else if ($_POST['action'] == '1')
        {
            $register_status = $this->isNewsletterRegistered($_POST['email']);
            if ($register_status < 1)
                return $this->error = $this->l('E-mail address not registered');
            else if ($register_status == self::GUEST_REGISTERED)
            {
                if (!Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'newsletter WHERE `email` = \''.pSQL($_POST['email']).'\' AND id_shop = '.$this->context->shop->id))
                    return $this->error = $this->l('Error during unsubscription');
                return $this->valid = $this->l('Unsubscription successful');
            }
            else if ($register_status == self::CUSTOMER_REGISTERED)
            {
                if (!Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'customer SET `newsletter` = 0 WHERE `email` = \''.pSQL($_POST['email']).'\' AND id_shop = '.$this->context->shop->id))
                    return $this->error = $this->l('Error during unsubscription');
                return $this->valid = $this->l('Unsubscription successful');
            }
        }
        /* Subscription */
        else if ($_POST['action'] == '0')
        {
            $register_status = $this->isNewsletterRegistered($_POST['email']);
            if ($register_status > 0)
                return $this->error = $this->l('E-mail address already registered');

            $email = pSQL($_POST['email']);
            if (!$this->isRegistered($register_status))
            {
                if (Configuration::get('NW_VERIFICATION_EMAIL'))
                {
                    // create an unactive entry in the newsletter database
                    if ($register_status == self::GUEST_NOT_REGISTERED)
                        $this->registerGuest($email, false);

                    if (!$token = $this->getToken($email, $register_status))
                        return $this->error = $this->l('Error during subscription');

                    $this->sendVerificationEmail($email, $token);

                    return $this->valid = $this->l('A verification email has been sent. Please check your email.');
                }
                else
                {
                    if ($this->register($email, $register_status))
                        $this->valid = $this->l('Subscription successful');
                    else
                        return $this->error = $this->l('Error during subscription');

                    if ($code = Configuration::get('NW_VOUCHER_CODE'))
                        $this->sendVoucher($email, $code);

                    if (Configuration::get('NW_CONFIRMATION_EMAIL'))
                        $this->sendConfirmationEmail($email);
                }
            }
        }
    }
    protected function sendVoucher($email, $code)
    {
        return Mail::Send($this->context->language->id, 'newsletter_voucher', Mail::l('Newsletter voucher', $this->context->language->id), array('{discount}' => $code), $email, null, null, null, null, null, dirname(__FILE__).'/mails/');
    }

    /**
     * Send a confirmation email
     * @param string $email
     * @return bool
     */
    protected function sendConfirmationEmail($email)
    {
        return	Mail::Send($this->context->language->id, 'newsletter_conf', Mail::l('Newsletter confirmation', $this->context->language->id), array(), pSQL($email), null, null, null, null, null, dirname(__FILE__).'/mails/');
    }
    protected function register($email, $register_status)
    {
        if ($register_status == self::GUEST_NOT_REGISTERED)
        {
            if (!$this->registerGuest(Tools::getValue('email')))
                return false;
        }
        else if ($register_status == self::CUSTOMER_NOT_REGISTERED)
        {
            if (!$this->registerUser(Tools::getValue('email')))
                return false;
        }

        return true;
    }
    protected function registerUser($email)
    {
        $sql = 'UPDATE '._DB_PREFIX_.'customer
				SET `newsletter` = 1, newsletter_date_add = NOW(), `ip_registration_newsletter` = \''.pSQL(Tools::getRemoteAddr()).'\'
				WHERE `email` = \''.pSQL($email).'\'
				AND id_shop = '.$this->context->shop->id;

        return Db::getInstance()->execute($sql);
    }
    protected function sendVerificationEmail($email, $token)
    {
        $verif_url = Context::getContext()->link->getModuleLink('blocknewsletter', 'verification', array(
            'token' => $token,
        ));
        return Mail::Send($this->context->language->id, 'newsletter_verif', Mail::l('Email verification', $this->context->language->id), array('{verif_url}' => $verif_url), $email, null, null, null, null, null, dirname(__FILE__).'/mails/');
    }

    protected function getToken($email, $register_status)
    {
        if (in_array($register_status, array(self::GUEST_NOT_REGISTERED, self::GUEST_REGISTERED)))
        {
            $sql = 'SELECT MD5(CONCAT( `email` , `newsletter_date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) as token
					FROM `'._DB_PREFIX_.'newsletter`
					WHERE `active` = 0
					AND `email` = \''.pSQL($email).'\'';
        }
        else if ($register_status == self::CUSTOMER_NOT_REGISTERED)
        {
            $sql = 'SELECT MD5(CONCAT( `email` , `date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\' )) as token
					FROM `'._DB_PREFIX_.'customer`
					WHERE `newsletter` = 0
					AND `email` = \''.pSQL($email).'\'';
        }

        return Db::getInstance()->getValue($sql);
    }
    protected function isRegistered($register_status)
    {
        return in_array(
            $register_status,
            array(self::GUEST_REGISTERED, self::CUSTOMER_REGISTERED)
        );
    }
    private function _prepareHook($params)
    {
        if (Tools::isSubmit('submitNewsletter'))
        {

            $this->newsletterRegistration();
            if ($this->error)
            {
                $this->smarty->assign(array('color' => 'red',
                        'msg' => $this->error,
                        'nw_value' => isset($_POST['email']) ? pSQL($_POST['email']) : false,
                        'nw_error' => true,
                        'action' => $_POST['action'])
                );
            }
            else if ($this->valid)
            {
                $this->smarty->assign(array('color' => 'green',
                        'msg' => $this->valid,
                        'nw_error' => false)
                );
            }
        }
        $this->smarty->assign('this_path', $this->_path);
    }
    public function hookFooter($params)
    {
        $this->_prepareHook($params);
        return $this->display(__FILE__, 'blockmultiletter.tpl');
    }

    public function hookDisplayHeader($params)
    {
        $this->context->controller->addCSS($this->_path.'blockmultiletter.css', 'all');
    }
}