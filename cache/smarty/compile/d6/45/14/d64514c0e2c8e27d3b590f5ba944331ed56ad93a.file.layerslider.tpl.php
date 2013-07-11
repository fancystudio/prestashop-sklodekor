<?php /* Smarty version Smarty-3.1.13, created on 2013-07-11 19:55:52
         compiled from "C:\wamp\www\prestashop1.5.4.1\modules\layerslider\layerslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2842551def1a8baf2b4-12060618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd64514c0e2c8e27d3b590f5ba944331ed56ad93a' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop1.5.4.1\\modules\\layerslider\\layerslider.tpl',
      1 => 1373565346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2842551def1a8baf2b4-12060618',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51def1a8bc2f46_50916243',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51def1a8bc2f46_50916243')) {function content_51def1a8bc2f46_50916243($_smarty_tpl) {?><script type="text/javascript">
$(document).ready(function(){
	$('#layerslider').layerSlider({
		skinsPath : 'modules/layerslider/skins/'
	});
});	
</script>

<div id="layerslider">

	<div class="ls-layer" rel="slidedelay: 3000">
		<img class="ls-bg" src="modules/layerslider/img/dvere.png" alt="layer">
		<img class="ls-s2" src="modules/layerslider/img/kreslo.png" alt="sublayer" style="durationin: 2000; easingin: easeOutExpo; slidedirection: top; delayin: 1000">
		<img class="ls-s3" src="modules/layerslider/img/police.png" alt="sublayer" rel="durationin: 2300; easingin: easeOutElastic; slidedirection: bottom; delayin: 1000">
	</div>

	<div class="ls-layer">
		<img class="ls-bg" src="modules/layerslider/img/dvere.png" alt="layer">
		<img class="ls-s2" src="modules/layerslider/img/kreslo.png" alt="sublayer" rel="durationin: 5800; easingin: easeOutQuad">
		<img class="ls-s3" src="modules/layerslider/img/police.png" alt="sublayer" rel="durationin: 5600; easingin: easeOutQuad">
	</div>

</div>


<div style="clear:all"></div><?php }} ?>