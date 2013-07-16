<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 19:33:08
         compiled from "C:\wamp\www\prestashop-sklodekor\modules\feeder\feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2842051e583d4bb3d60-67487970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc725e27d81153dfb5d9532c01a5e8546fdec53b' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop-sklodekor\\modules\\feeder\\feederHeader.tpl',
      1 => 1373574111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2842051e583d4bb3d60-67487970',
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
  'unifunc' => 'content_51e583d4bd8cc1_21819364',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e583d4bd8cc1_21819364')) {function content_51e583d4bd8cc1_21819364($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\wamp\\www\\prestashop-sklodekor\\tools\\smarty\\plugins\\modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>