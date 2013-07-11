<?php /* Smarty version Smarty-3.1.13, created on 2013-07-07 23:51:58
         compiled from "C:\wamp\www\prestashop1.5.4.1\modules\blockcurrencies\blockcurrencies.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3193751d9e2fecc7385-88752313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf7dcfd049e1e7f5241a4244f267daadf66abab1' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\modules\\blockcurrencies\\blockcurrencies.tpl',
      1 => 1371487718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3193751d9e2fecc7385-88752313',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'request_uri' => 0,
    'blockcurrencies_sign' => 0,
    'currencies' => 0,
    'cookie' => 0,
    'f_currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d9e2fed4a235_25819866',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d9e2fed4a235_25819866')) {function content_51d9e2fed4a235_25819866($_smarty_tpl) {?>

<!-- Block currencies module -->
<script type="text/javascript">
$(document).ready(function () {
	$("#setCurrency").mouseover(function(){
		$(this).addClass("countries_hover");
		$(".currencies_ul").addClass("currencies_ul_hover");
	});
	$("#setCurrency").mouseout(function(){
		$(this).removeClass("countries_hover");
		$(".currencies_ul").removeClass("currencies_ul_hover");
	});

	$('ul#first-currencies li:not(.selected)').css('opacity', 0.3);
	$('ul#first-currencies li:not(.selected)').hover(function(){
		$(this).css('opacity', 1);
	}, function(){
		$(this).css('opacity', 0.3);
	});
});
</script>

<div id="currencies_block_top">
	<form id="setCurrency" action="<?php echo $_smarty_tpl->tpl_vars['request_uri']->value;?>
" method="post">
		<p>
			<input type="hidden" name="id_currency" id="id_currency" value=""/>
			<input type="hidden" name="SubmitCurrency" value="" />
			<?php echo smartyTranslate(array('s'=>'Currency','mod'=>'blockcurrencies'),$_smarty_tpl);?>
 : <?php echo $_smarty_tpl->tpl_vars['blockcurrencies_sign']->value;?>

		</p>
		<ul id="first-currencies" class="currencies_ul">
			<?php  $_smarty_tpl->tpl_vars['f_currency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f_currency']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f_currency']->key => $_smarty_tpl->tpl_vars['f_currency']->value){
$_smarty_tpl->tpl_vars['f_currency']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['f_currency']->key;
?>
				<li <?php if ($_smarty_tpl->tpl_vars['cookie']->value->id_currency==$_smarty_tpl->tpl_vars['f_currency']->value['id_currency']){?>class="selected"<?php }?>>
					<a href="javascript:setCurrency(<?php echo $_smarty_tpl->tpl_vars['f_currency']->value['id_currency'];?>
);" title="<?php echo $_smarty_tpl->tpl_vars['f_currency']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['f_currency']->value['sign'];?>
</a>
				</li>
			<?php } ?>
		</ul>
	</form>
</div>
<!-- /Block currencies module -->
<?php }} ?>