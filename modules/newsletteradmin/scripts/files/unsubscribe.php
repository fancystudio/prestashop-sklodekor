<?php
/**
 * Unsubcription file for AdminNewsLetter v.1.8
 * @category admin
 *
 * @original author QuinoaDesign 2010
 * @license http://www.opensource.org/licenses/osl-3.0.php Open-source licence 3.0
 * @last contributor Eolia  10/06/2011 compatible PS 1.4.1
 * @version 1.1
 *
 */

include(dirname(__FILE__).'/config/config.inc.php');
include(dirname(__FILE__).'/modules/newsletteradmin/functions.php');

$filename = 'UNSUBSCRIBE';

  echo "<center><div style='
    margin-top: 100px;
width: 800px;background:#F2F2F2'><br/><img class='logo' src='img/logo.jpg' alt='RC1' width='209' height='52'>";
  echo "<h3>&nbsp;&nbsp;".trans('Your newsletter subscription')."</h3><p>&nbsp;</p>";
  $nu = new NewsLetterUpdater();
  echo "<fieldset><p>";
  echo $nu->newsletterRegistration();
  echo "</p></fieldset><br/>";
  echo ' <form><input type="submit" name="back" value="OK" onclick="self.location.href='.__PS_BASE_URI__.'" class="button" /></form></br> ';   
  echo "</div></center>";




  class NewsLetterUpdater 
{

	
    private function isNewsletterRegistered($customerEmail)
       {
            if (Db::getInstance()->getRow('SELECT `email` FROM '._DB_PREFIX_.'newsletter WHERE `email` = \''.pSQL($customerEmail).'\''))
                return 1;
          if (!$registered = Db::getInstance()->getRow('SELECT `newsletter` FROM '._DB_PREFIX_.'customer WHERE `email` = \''.pSQL($customerEmail).'\''))
              return -1;
          if ($registered['newsletter'] == '1')
              return 2;
          return 0;
       }
       

       public function newsletterRegistration()
       {
			global $currentIndex, $cookie;
			
            if (empty($_GET['email'])) 
			 header('Location: index.php');
			if (!Validate::isEmail(pSQL($_GET['email'])))
              return  trans('Invalid e-mail address').'.';
           /* Unsubscription */
           elseif ($_GET['action'] == '1')
           {
               $registerStatus = $this->isNewsletterRegistered(pSQL($_GET['email']));
                if ($registerStatus < 1)
                    return trans('This e-mail address').' (<b>'.$_GET['email'].'</b>) '.trans('is not registered in our database').'.';
                /* If the user ins't a customer */
                elseif ($registerStatus == 1)
                {
                    if (!Db::getInstance()->Execute('DELETE FROM '._DB_PREFIX_.'newsletter WHERE `email` = \''.pSQL($_GET['email']).'\''))
							return trans('Error during unsubscription').'.';

						Mail::Send(intval($cookie->id_lang), 'unsubscribe_conf', Mail::l(trans('Unsubscribe our Newsletter')), array('{email}' => $_GET['email']), pSQL($_GET['email']), NULL, NULL, NULL, NULL, NULL, _PS_MODULE_DIR_.'blocknewsletter/mails/');						
                  return trans('You are now unsubscribed from our mailing list').'. '.trans('Your e-mail').' (<b>'.$_GET['email'].'</b>) '.trans('has been removed from our database').'. </br> '.trans('A confirmation mail has been sent').'.';

                }
                /* If the user is a customer */
                elseif ($registerStatus == 2)
               {
                    if (!Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'customer SET `newsletter` = 0 WHERE `email` = \''.pSQL($_GET['email']).'\''))

							return trans('Error during unsubscription').'.';

						Mail::Send(intval($cookie->id_lang), 'unsubscribe_conf', Mail::l(trans('Unsubscribe our Newsletter')), array('{email}' => $_GET['email']), pSQL($_GET['email']), NULL, NULL, NULL, NULL, NULL,  _PS_MODULE_DIR_.'blocknewsletter/mails/');							
                 return trans('You are now unsubscribed from our mailing list').'. '.trans('Your e-mail').' (<b>'.$_GET['email'].'</b>) '.trans('has been removed from our database').'. </br> '.trans('A confirmation mail has been sent').'.';
                }
          }
           /* Subscription */
           elseif ($_GET['action'] == '0')
           {
                $registerStatus = $this->isNewsletterRegistered(pSQL($_GET['email']));
              if ($registerStatus > 0)
                  return trans('This e-mail address').' (<b>'.$_GET['email'].'</b>) '.trans('is already registered').'.';
              /* If the user ins't a customer */
              elseif ($registerStatus == -1)
              {


				global $cookie;
				
				if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'newsletter (email, newsletter_date_add, ip_registration_newsletter, http_referer) VALUES (\''.pSQL($_GET['email']).'\', NOW(), \''.pSQL(Tools::getRemoteAddr()).'\', 


					(SELECT c.http_referer FROM '._DB_PREFIX_.'connections c WHERE c.id_guest = '.(int)($cookie->id_guest).' ORDER BY c.date_add DESC LIMIT 1))'))
                      return trans('Error during subscription').'.';
					  
                  return trans('You are now subscribed to our mailing list').'. '.trans('Your e-mail').' (<b>'.$_GET['email'].'</b>) '.trans('was added to our database').'.';
              }
              /* If the user is a customer */
              elseif ($registerStatus == 0)
              {
                   if (!Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'customer SET `newsletter` = 1, newsletter_date_add = NOW(), `ip_registration_newsletter` = \''.pSQL($_SERVER['REMOTE_ADDR']).'\' WHERE `email` = \''.pSQL($_GET['email']).'\''))
                    {
                      return trans('Error during subscription').'.';  
          }
                  return trans('You are now subscribed to our mailing list').'. '.trans('Your e-mail').' (<b>'.$_GET['email'].'</b>) '.trans('was added to our database').'.';
              }
          }
 
      }
	  
}
?>