<?php /* Smarty version Smarty-3.1.13, created on 2013-07-07 23:05:32
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/prestashop1.5.4.1/admin0951/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:101472859551b4c1a3b5b1a8-09961322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94491c0a14352b782b8f7e70663bd461df171e2d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/prestashop1.5.4.1/admin0951/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1373230273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101472859551b4c1a3b5b1a8-09961322',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b4c1a3b6f2b8_86107556',
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b4c1a3b6f2b8_86107556')) {function content_51b4c1a3b6f2b8_86107556($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>