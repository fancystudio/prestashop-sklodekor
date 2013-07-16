<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 18:04:35
         compiled from "C:\wamp\www\prestashop-sklodekor\admin0951\themes\default\template\helpers\list\list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1137251df1227519db7-11359551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e34e513ca593adc28a18ea2e415d77c4e3991bd2' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop-sklodekor\\admin0951\\themes\\default\\template\\helpers\\list\\list_action_delete.tpl',
      1 => 1373574088,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1137251df1227519db7-11359551',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51df122755da53_04136103',
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51df122755da53_04136103')) {function content_51df122755da53_04136103($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>