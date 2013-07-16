<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 19:33:11
         compiled from "C:\wamp\www\prestashop-sklodekor\modules\blocksharefb\blocksharefb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1098551e583d7338687-18311674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0d0f5fe74e15d4a0498ca68ac4d3b6478eb8658' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop-sklodekor\\modules\\blocksharefb\\blocksharefb.tpl',
      1 => 1373574079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1098551e583d7338687-18311674',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_link' => 0,
    'product_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e583d7357410_44243411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e583d7357410_44243411')) {function content_51e583d7357410_44243411($_smarty_tpl) {?>

<li id="left_share_fb">
	<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
&amp;t=<?php echo $_smarty_tpl->tpl_vars['product_title']->value;?>
" class="js-new-window"><?php echo smartyTranslate(array('s'=>'Share on Facebook!','mod'=>'blocksharefb'),$_smarty_tpl);?>
</a>
</li><?php }} ?>