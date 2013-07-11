<?php /* Smarty version Smarty-3.1.13, created on 2013-07-08 21:17:05
         compiled from "C:\wamp\www\prestashop1.5.4.1\themes\sklodekor\product-compare.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1184351db10313efbf5-35501141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bf36db7c02e7e829f9692864c3c294561605db9' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\themes\\sklodekor\\product-compare.tpl',
      1 => 1371487702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1184351db10313efbf5-35501141',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comparator_max_item' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51db103142a9c5_24491786',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51db103142a9c5_24491786')) {function content_51db103142a9c5_24491786($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['comparator_max_item']->value){?>
<script type="text/javascript">
// <![CDATA[
	var min_item = '<?php echo smartyTranslate(array('s'=>'Please select at least one product','js'=>1),$_smarty_tpl);?>
';
	var max_item = "<?php echo smartyTranslate(array('s'=>'You cannot add more than %d product(s) to the product comparison','sprintf'=>$_smarty_tpl->tpl_vars['comparator_max_item']->value,'js'=>1),$_smarty_tpl);?>
";
//]]>
</script>

	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('products-comparison');?>
" onsubmit="true">
		<p>
		<input type="submit" id="bt_compare" class="button" value="<?php echo smartyTranslate(array('s'=>'Compare'),$_smarty_tpl);?>
" />
		<input type="hidden" name="compare_product_list" class="compare_product_list" value="" />
		</p>
	</form>
<?php }?>

<?php }} ?>