<?php /* Smarty version Smarty-3.1.13, created on 2013-06-09 19:38:50
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/prestashop1.5.4.1/themes/default/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140761334051b4bdaa0d9ee0-75204443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '735afdebbdc4f7f4d21548440b0676f7986304d1' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/prestashop1.5.4.1/themes/default/layout.tpl',
      1 => 1370796437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140761334051b4bdaa0d9ee0-75204443',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'display_header' => 0,
    'HOOK_HEADER' => 0,
    'template' => 0,
    'display_footer' => 0,
    'live_edit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b4bdaa12d455_88092992',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b4bdaa12d455_88092992')) {function content_51b4bdaa12d455_88092992($_smarty_tpl) {?>
<?php if (!empty($_smarty_tpl->tpl_vars['display_header']->value)){?><?php echo $_smarty_tpl->getSubTemplate ('./header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('HOOK_HEADER'=>$_smarty_tpl->tpl_vars['HOOK_HEADER']->value), 0);?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['template']->value)){?><?php echo $_smarty_tpl->tpl_vars['template']->value;?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['display_footer']->value)){?><?php echo $_smarty_tpl->getSubTemplate ('./footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['live_edit']->value)){?><?php echo $_smarty_tpl->tpl_vars['live_edit']->value;?>
<?php }?><?php }} ?>