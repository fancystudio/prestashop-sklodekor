<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 18:02:25
         compiled from "C:\wamp\www\prestashop-sklodekor\modules\layerslider\layerslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1088751e56e918d5704-09842808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a969addc719cbab7af18eed595c71475c35be121' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop-sklodekor\\modules\\layerslider\\layerslider.tpl',
      1 => 1373641628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1088751e56e918d5704-09842808',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e56e91908009_22573671',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e56e91908009_22573671')) {function content_51e56e91908009_22573671($_smarty_tpl) {?><div id="layerslider">
	<div class="ls-layer" rel="slidedelay: 3000">
		<img class="ls-bg" src="modules/layerslider/img/slider_bg.jpg" alt="layer">
		<img class="ls-s2" src="modules/layerslider/img/dvere.png" alt="sublayer" style="durationin: 2000; easingin: easeOutExpo; slidedirection: top; delayin: 1000">
		<img class="ls-s3" src="modules/layerslider/img/kreslo.png" alt="sublayer" rel="durationin: 2300; easingin: easeOutElastic; slidedirection: bottom; delayin: 1000">
		<img class="ls-s5" src="modules/layerslider/img/police.png" alt="sublayer" rel="slidedirection: top">
	</div>
	<div class="ls-layer">
		<img class="ls-bg" src="modules/layerslider/img/slider_bg.jpg" alt="layer">
		<img class="ls-s2" src="modules/layerslider/img/dvere.png" alt="sublayer" style="durationin: 2000; easingin: easeOutExpo; slidedirection: top; delayin: 1000">
		<img class="ls-s3" src="modules/layerslider/img/kreslo.png" alt="sublayer" rel="durationin: 2300; easingin: easeOutElastic; slidedirection: bottom; delayin: 1000">
		<img class="ls-s5" src="modules/layerslider/img/police.png" alt="sublayer" rel="slidedirection: top">
	</div>	
</div>	
<script type="text/javascript">
	$('#layerslider').layerSlider({
		skinsPath : 'modules/layerslider/lib/layerslider/skins/'
	});
</script>	<?php }} ?>