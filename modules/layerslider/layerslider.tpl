
<div class="slider-wrap" style="width: 100%;height:500px;  margin: 0px auto; ">

<div id="layerslider">

	<div class="ls-layer" rel="slidedelay: 3000">
		<img class="ls-bg" src="modules/layerslider/img/slider_bg.jpg" alt="layer" style=" top:0px">

		<img class="ls-s2" src="modules/layerslider/img/dvere.png" alt="sublayer" rel="durationin: 2000; easingin: easeOutExpo; slidedirection: top; delayin: 1000">
		<img class="ls-s3" src="modules/layerslider/img/kreslo.png" alt="sublayer" rel="durationin: 2300; easingin: easeOutElastic; slidedirection: bottom; delayin: 1000">
		<img class="ls-s5" src="modules/layerslider/img/police.png" alt="sublayer" rel="slidedirection: top" style="left:600px;">

	</div>
	<div class="ls-layer" rel="slidedelay: 3000">
		<img class="ls-bg" src="modules/layerslider/img/slider_bg.jpg" alt="layer" style=" top:0px">
		<img class="ls-s2" src="modules/layerslider/img/dvere.png" alt="sublayer" rel="durationin: 2000; easingin: easeOutExpo; slidedirection: top; delayin: 1000">
		<img class="ls-s3" src="modules/layerslider/img/kreslo.png" alt="sublayer" rel="durationin: 2300; easingin: easeOutElastic; slidedirection: bottom; delayin: 1000">
		<img class="ls-s5" src="modules/layerslider/img/police.png" alt="sublayer" rel="slidedirection: top" style="right:0px">
    </div>
</div>	

<!--<script type="text/javascript">
	$('#layerslider').layerSlider({
		skinsPath : 'modules/layerslider/lib/layerslider/skins/'
	});
</script>	-->
	
<script type="text/javascript">
	$(document).ready(function(){
				$('#layerslider').layerSlider({
					skinsPath : 'modules/layerslider/lib/layerslider/skins/',
					skin : 'fullwidth',
					thumbnailNavigation : 'hover',
					hoverPrevNext : false,
					responsive : false,
					responsiveUnder : 1050,
					sublayerContainer : 1050,
					autoStart : false,
				});
			});	
</script>	