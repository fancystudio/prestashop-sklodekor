<?php /* Smarty version Smarty-3.1.13, created on 2013-07-11 19:55:51
         compiled from "C:\wamp\www\prestashop1.5.4.1\modules\favoriteproducts\views\templates\hook\favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1362251def1a7679126-73521128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca38d23b8a151c2740b5a211407f495bc7a99c78' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\modules\\favoriteproducts\\views\\templates\\hook\\favoriteproducts-header.tpl',
      1 => 1371487719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1362251def1a7679126-73521128',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51def1a7726301_14433877',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51def1a7726301_14433877')) {function content_51def1a7726301_14433877($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add'),false);?>
';
	var favorite_products_url_remove = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),false);?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>