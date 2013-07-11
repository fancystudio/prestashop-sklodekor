<?php /* Smarty version Smarty-3.1.13, created on 2013-07-07 23:05:32
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/prestashop1.5.4.1/admin0951/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63035160651b4c1a3b748f6-20070694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '230657a9a032e709be78f0154d24921d294c6779' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/prestashop1.5.4.1/admin0951/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1373230272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63035160651b4c1a3b748f6-20070694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b4c1a3b9c447_15566497',
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b4c1a3b9c447_15566497')) {function content_51b4c1a3b9c447_15566497($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>