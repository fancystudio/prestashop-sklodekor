
<div class="slider-wrap" style="width: 100%;height:100%;  margin: 0px auto; ">

<div id="layerslider">

	<div class="ls-layer" rel="slidedelay: 3000" style="overflow:visible; ">
		<img class="ls-s0" src="modules/layerslider/img/slider_bg.jpg"alt="layer" style="top:0px; margin-left:0px">

		<img class="ls-s2" src="modules/layerslider/img/dvere.png" alt="sublayer" style="top:127px; left:790px; " rel="durationin: 500; easingin: easeOutExpo; slidedirection: top; delayin: 1000">
		<img class="ls-s3" src="modules/layerslider/img/kreslo.png" alt="sublayer" style="top:371px; left:963px; z-index:100" rel="durationin: 2000; easingin: easeOutElastic; slidedirection: bottom; delayin: 2000">
		<img class="ls-s5" src="modules/layerslider/img/police.png" alt="sublayer" rel="slidedirection: top" style="z-index:99; left:1250px; top: 120px;">
        <div class="ls-s6 span3" alt="sublayer" rel="slidedirection: left" easingin: easeOutElastic; slidedirection: bottom; delayin: 10000" style="left: 400px; top: 250px;" > 
        <h2>Nadpis H2</h2> 
        <p style="color: white; font-weight:100">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum 
        </p>
        </div> 
        </div>
        
        
        
	<div class="ls-layer" rel="slidedelay: 3000" style="overflow:visible; ">
		<img class="ls-s0" src="modules/layerslider/img/slider_bg.jpg"alt="layer" style="top:0px; margin-left:0px">

		<img class="ls-s2" src="modules/layerslider/img/dvere.png" alt="sublayer" style="top:127px; left:790px; " rel="durationin: 500; easingin: easeOutExpo; slidedirection: top; delayin: 1000">
		<img class="ls-s3" src="modules/layerslider/img/kreslo.png" alt="sublayer" style="top:371px; left:963px; z-index:100" rel="durationin: 2000; easingin: easeOutElastic; slidedirection: bottom; delayin: 2000">
		<img class="ls-s5" src="modules/layerslider/img/police.png" alt="sublayer" rel="slidedirection: top" style="z-index:99; left:1250px; top: 120px;">
        <div class="ls-s6 span3" alt="sublayer" rel="slidedirection: left" easingin: easeOutElastic; slidedirection: bottom; delayin: 10000" style="left: 400px; top: 250px;" > 
        <h2>Nadpis H2</h2> 
        <p style="color: white; font-weight:100">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum 
        </p>
        </div> 
        </div>
        

</div>	</div>
	
	


<div class="container main-three-column clearfix">
<div class="row">
<div class="span4">
<h3>dvere</h3>
<img src="modules/layerslider/img/home-dvere.jpg" alt="" >
<p>
euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis 
</p>
</div>

<div class="span4">
<h3>stoly</h3>
<img src="modules/layerslider/img/home-stoly.jpg" alt="" >
<p>
euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis 
</p>
</div>

<div class="span4">
<h3>doplnky</h3>
<img src="modules/layerslider/img/home-doplnky.jpg" alt="" >
<p>
euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis 
</p>
</div>


</div><!--main three colum-->

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
					responsive : true,
					responsiveUnder : 1914,
					sublayerContainer : 1914,
					autoStart : false,
				});
			});	
</script>	