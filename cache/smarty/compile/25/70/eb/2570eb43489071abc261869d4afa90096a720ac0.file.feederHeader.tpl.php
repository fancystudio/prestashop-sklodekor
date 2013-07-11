<?php /* Smarty version Smarty-3.1.13, created on 2013-07-11 19:55:51
         compiled from "C:\wamp\www\prestashop1.5.4.1\modules\feeder\feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1951151def1a7756189-01652436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2570eb43489071abc261869d4afa90096a720ac0' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\modules\\feeder\\feederHeader.tpl',
      1 => 1371487738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1951151def1a7756189-01652436',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'feedUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51def1a7786d62_15627839',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51def1a7786d62_15627839')) {function content_51def1a7786d62_15627839($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\wamp\\www\\prestashop1.5.4.1\\tools\\smarty\\plugins\\modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>