<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 18:04:35
         compiled from "C:\wamp\www\prestashop-sklodekor\admin0951\themes\default\template\helpers\list\list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:735851df1227489c78-87817384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9788366a137329e100dae7174adbea7b8062f01' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop-sklodekor\\admin0951\\themes\\default\\template\\helpers\\list\\list_action_edit.tpl',
      1 => 1373574092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '735851df1227489c78-87817384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51df12274ae9c8_26521295',
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51df12274ae9c8_26521295')) {function content_51df12274ae9c8_26521295($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>