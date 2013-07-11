<?php /* Smarty version Smarty-3.1.13, created on 2013-07-11 22:18:13
         compiled from "/Applications/MAMP/htdocs/prestashop-sklodekor/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70218486651df1305bb22c4-45988310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a080823c7716b7507aec8379e1bc6e2c15f171f' => 
    array (
      0 => '/Applications/MAMP/htdocs/prestashop-sklodekor/modules/feeder/feederHeader.tpl',
      1 => 1373396672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70218486651df1305bb22c4-45988310',
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
  'unifunc' => 'content_51df1305bc5103_54333684',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51df1305bc5103_54333684')) {function content_51df1305bc5103_54333684($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/MAMP/htdocs/prestashop-sklodekor/tools/smarty/plugins/modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>