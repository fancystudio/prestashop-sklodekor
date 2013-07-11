<?php /* Smarty version Smarty-3.1.13, created on 2013-07-11 22:18:13
         compiled from "/Applications/MAMP/htdocs/prestashop-sklodekor/themes/sklodekor/modules/blocktopmenu/blocktopmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88941103751df1305ed8ab9-15840074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4d5008e7766d596dbd8f61b3d444acda87fe6c3' => 
    array (
      0 => '/Applications/MAMP/htdocs/prestashop-sklodekor/themes/sklodekor/modules/blocktopmenu/blocktopmenu.tpl',
      1 => 1373566518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88941103751df1305ed8ab9-15840074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU' => 0,
    'MENU_SEARCH' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51df1305f101f1_36226355',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51df1305f101f1_36226355')) {function content_51df1305f101f1_36226355($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/MAMP/htdocs/prestashop-sklodekor/tools/smarty/plugins/modifier.escape.php';
?><?php if ($_smarty_tpl->tpl_vars['MENU']->value!=''){?>
	
	<!-- Menu -->
	
		<ul class="nav nav-pills pull-left">
			<?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

			<?php if ($_smarty_tpl->tpl_vars['MENU_SEARCH']->value){?>
				<li class="sf-search noBack" style="float:right">
					<form id="searchbox" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('search');?>
" method="get">
						<p>
							<input type="hidden" name="controller" value="search" />
							<input type="hidden" value="position" name="orderby"/>
							<input type="hidden" value="desc" name="orderway"/>
							<input type="text" name="search_query" value="<?php if (isset($_GET['search_query'])){?><?php echo smarty_modifier_escape($_GET['search_query'], 'htmlall', 'UTF-8');?>
<?php }?>" />
						</p>
					</form>
				</li>
			<?php }?>
		</ul>
	<!--/ Menu -->
<?php }?><?php }} ?>