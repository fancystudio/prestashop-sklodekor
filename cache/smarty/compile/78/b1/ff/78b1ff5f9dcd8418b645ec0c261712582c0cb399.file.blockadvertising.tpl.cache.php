<?php /* Smarty version Smarty-3.1.13, created on 2013-07-07 23:52:01
         compiled from "C:\wamp\www\prestashop1.5.4.1\modules\blockadvertising\blockadvertising.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2157851d9e301a04128-05879549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78b1ff5f9dcd8418b645ec0c261712582c0cb399' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\modules\\blockadvertising\\blockadvertising.tpl',
      1 => 1371487701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2157851d9e301a04128-05879549',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adv_link' => 0,
    'adv_title' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d9e301a3c056_24839110',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d9e301a3c056_24839110')) {function content_51d9e301a3c056_24839110($_smarty_tpl) {?>

<!-- MODULE Block advertising -->
<div class="advertising_block">
	<a href="<?php echo $_smarty_tpl->tpl_vars['adv_link']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" width="155"  height="163" /></a>
</div>
<!-- /MODULE Block advertising -->
<?php }} ?>