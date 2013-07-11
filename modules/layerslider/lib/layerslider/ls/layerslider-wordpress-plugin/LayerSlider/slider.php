<?php if(is_array($slides)) {
$data = '<div id="layerslider_'.$id.'" style="width: '.$slides['properties']['width'].'px; height: '.$slides['properties']['height'].'px">';
	foreach($slides['layers'] as $layerkey => $layer) {
	$data .= '<div class="ls-layer" style="slidedirection: '.$layer['properties']['slidedirection'].'; slidedelay: '.$layer['properties']['slidedelay'].'; durationin: '.$layer['properties']['durationin'].'; durationout: '.$layer['properties']['durationout'].'; easingin: '.$layer['properties']['easingin'].'; easingout: '.$layer['properties']['easingout'].'; delayin: '.$layer['properties']['delayin'].'; delayout: '.$layer['properties']['delayout'].';">';
		$data .= '<img class="ls-bg" src="'.$layer['properties']['background'].'" alt="layer">';
		foreach($layer['sublayers'] as $sublayer) {
			if(!empty($sublayer['url'])) {
			$data .= '<a href="'.$sublayer['url'].'" target="'.$sublayer['target'].'" class="ls-s'.$sublayer['level'].'" style="position: absolute; top: '.$sublayer['top'].'px; left:'.$sublayer['left'].'px; slidedirection : '.$sublayer['slidedirection'].'; parallaxin : '.$sublayer['parallaxin'].'; parallaxout : '.$sublayer['parallaxout'].'; durationin : '.$sublayer['durationin'].'; durationout : '.$sublayer['durationout'].'; easingin : '.$sublayer['easingin'].'; easingout : '.$sublayer['easingout'].'; delayin : '.$sublayer['delayin'].'; delayout : '.$sublayer['delayout'].';">';
				$data .= '<img src="'.$sublayer['image'].'" alt="sublayer">';
			$data .= '</a>';
		} else {
			$data .= '<img class="ls-s'.$sublayer['level'].'" src="'.$sublayer['image'].'" alt="sublayer" style="position: absolute; top: '.$sublayer['top'].'px; left: '.$sublayer['left'].'px; slidedirection : '.$sublayer['slidedirection'].'; parallaxin : '.$sublayer['parallaxin'].'; parallaxout : '.$sublayer['parallaxout'].'; durationin : '.$sublayer['durationin'].'; durationout : '.$sublayer['durationout'].'; easingin : '.$sublayer['easingin'].'; easingout : '.$sublayer['easingout'].'; delayin : '.$sublayer['delayin'].'; delayout : '.$sublayer['delayout'].';">';
		}
		}
	$data .= '</div>';
	}
$data .= '</div>';
}
?>