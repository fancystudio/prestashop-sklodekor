<?php /* Smarty version Smarty-3.1.13, created on 2013-07-07 22:55:20
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/prestashop1.5.4.1/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117937777951b4bda4b87888-38025514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03f61a372a17b4bd0d72c94cafb3cfcc908e5334' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/prestashop1.5.4.1/modules/feeder/feederHeader.tpl',
      1 => 1373230275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117937777951b4bda4b87888-38025514',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b4bda4ba9480_33724077',
  'variables' => 
  array (
    'meta_title' => 0,
    'feedUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b4bda4ba9480_33724077')) {function content_51b4bda4ba9480_33724077($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/prestashop1.5.4.1/tools/smarty/plugins/modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>