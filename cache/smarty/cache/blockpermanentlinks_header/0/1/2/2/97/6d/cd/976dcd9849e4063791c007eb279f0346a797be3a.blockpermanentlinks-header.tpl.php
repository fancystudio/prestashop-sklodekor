<?php /*%%SmartyHeaderCode:727051d9e2fed73de4-86085709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '976dcd9849e4063791c007eb279f0346a797be3a' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\modules\\blockpermanentlinks\\blockpermanentlinks-header.tpl',
      1 => 1371487725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '727051d9e2fed73de4-86085709',
  'variables' => 
  array (
    'link' => 0,
    'come_from' => 0,
    'meta_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d9e2fedfb4c3_21170980',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d9e2fedfb4c3_21170980')) {function content_51d9e2fedfb4c3_21170980($_smarty_tpl) {?>
<!-- Block permanent links module HEADER -->
<ul id="header_links">
	<li id="header_link_contact"><a href="http://localhost/prestashop1.5.4.1/index.php?controller=contact" title="kontakt">kontakt</a></li>
	<li id="header_link_sitemap"><a href="http://localhost/prestashop1.5.4.1/index.php?controller=sitemap" title="Mapa stránky">Mapa stránky</a></li>
	<li id="header_link_bookmark">
		<script type="text/javascript">writeBookmarkLink('http://localhost/prestashop1.5.4.1/index.php', 'fancystudio', 'záložka');</script>
	</li>
</ul>
<!-- /Block permanent links module HEADER -->
<?php }} ?>