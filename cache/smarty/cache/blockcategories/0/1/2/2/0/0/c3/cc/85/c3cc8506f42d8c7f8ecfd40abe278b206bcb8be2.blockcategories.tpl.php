<?php /*%%SmartyHeaderCode:2604851d9e30076e335-73013904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3cc8506f42d8c7f8ecfd40abe278b206bcb8be2' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\themes\\sklodekor\\modules\\blockcategories\\blockcategories.tpl',
      1 => 1371487733,
      2 => 'file',
    ),
    '9563751975f71d71cc81c1c2c6601a2acfe0bde0' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\themes\\sklodekor\\modules\\blockcategories\\category-tree-branch.tpl',
      1 => 1371487714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2604851d9e30076e335-73013904',
  'variables' => 
  array (
    'isDhtml' => 0,
    'blockCategTree' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d9e30092a794_03091482',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d9e30092a794_03091482')) {function content_51d9e30092a794_03091482($_smarty_tpl) {?>
<!-- Block categories module -->
<div id="categories_block_left" class="block">
	<p class="title_block">Kategórie</p>
	<div class="block_content">
		<ul class="tree dhtml">
									
<li >
	<a href="http://localhost/prestashop1.5.4.1/index.php?id_category=3&amp;controller=category"  title="">iPods</a>
	</li>

												
<li >
	<a href="http://localhost/prestashop1.5.4.1/index.php?id_category=4&amp;controller=category"  title="">Accessories</a>
	</li>

												
<li class="last">
	<a href="http://localhost/prestashop1.5.4.1/index.php?id_category=5&amp;controller=category"  title="">Laptops</a>
	</li>

							</ul>
		
		<script type="text/javascript">
		// <![CDATA[
			// we hide the tree only if JavaScript is activated
			$('div#categories_block_left ul.dhtml').hide();
		// ]]>
		</script>
	</div>
</div>
<!-- /Block categories module -->
<?php }} ?>