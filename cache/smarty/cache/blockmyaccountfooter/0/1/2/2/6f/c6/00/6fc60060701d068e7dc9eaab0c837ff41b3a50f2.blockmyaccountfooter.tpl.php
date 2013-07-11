<?php /*%%SmartyHeaderCode:727351d9e30434ec00-98604172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fc60060701d068e7dc9eaab0c837ff41b3a50f2' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\themes\\sklodekor\\modules\\blockmyaccountfooter\\blockmyaccountfooter.tpl',
      1 => 1371487736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '727351d9e30434ec00-98604172',
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d9e3044b5be3_94651897',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d9e3044b5be3_94651897')) {function content_51d9e3044b5be3_94651897($_smarty_tpl) {?>
<!-- Block myaccount module -->
<div class="block myaccount">
	<p class="title_block"><a href="http://localhost/prestashop1.5.4.1/index.php?controller=my-account" title="Manage my customer account" rel="nofollow">Účet</a></p>
	<div class="block_content">
		<ul class="bullet">
			<li><a href="http://localhost/prestashop1.5.4.1/index.php?controller=history" title="List of my orders" rel="nofollow">Objednávky</a></li>
						<li><a href="http://localhost/prestashop1.5.4.1/index.php?controller=order-slip" title="List of my credit slips" rel="nofollow">Dobropisy</a></li>
			<li><a href="http://localhost/prestashop1.5.4.1/index.php?controller=addresses" title="List of my addresses" rel="nofollow">Adresy a fakturačné údaje</a></li>
			<li><a href="http://localhost/prestashop1.5.4.1/index.php?controller=identity" title="Manage my personal information" rel="nofollow">Osobné údaje</a></li>
						
<li class="favoriteproducts">
	<a href="http://localhost/prestashop1.5.4.1/index.php?fc=module&amp;module=favoriteproducts&amp;controller=account" title="Moje obľúbené produkty">
				Moje obľúbené produkty
	</a>
</li>

		</ul>
		<p class="logout"><a href="http://localhost/prestashop1.5.4.1/index.php?mylogout" title="Odhlásiť sa" rel="nofollow">Sign out</a></p>
	</div>
</div>
<!-- /Block myaccount module -->
<?php }} ?>