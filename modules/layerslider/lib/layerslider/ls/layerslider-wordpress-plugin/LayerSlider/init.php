    <script type="text/javascript">
    
    jQuery(document).ready(function(){
    	
    	<?php foreach($slides as $key => $val) : ?>
    	jQuery("#layerslider_<?=($key+1)?>").layerSlider({    		
   			autoStart			: <?=$val['properties']['autostart']?>,
   			pauseOnHover		: <?=$val['properties']['pauseonhover']?>,
			firstLayer			: <?=$val['properties']['firstlayer']?>,
			twoWaySlideshow		: <?=$val['properties']['twowayslideshow']?>,
    		keybNav				: <?=$val['properties']['keybnav']?>,
    		imgPreload			: <?=$val['properties']['imgpreload']?>,
    		navPrevNext			: <?=$val['properties']['navprevnext']?>,
    		navStartStop		: <?=$val['properties']['navstartstop']?>,
    		navButtons			: <?=$val['properties']['navbuttons']?>,
    		skin				: '<?=$val['properties']['skin']?>',
    		skinsPath			: '<?=WP_PLUGIN_URL?><?=$val['properties']['skinspath']?>'
    	});
    	<?php endforeach; ?>
    });
    
    </script>
    