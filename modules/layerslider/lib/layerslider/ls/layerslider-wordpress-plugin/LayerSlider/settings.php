<div class="wrap">
<h2>LayerSlider Settings</h2>

<div id="layerslider-sample-tab">
	<table class="form-table">
	    <tr valign="top">
	    	<th scope="row"><strong>width</strong></th>
	    	<td>
	 			<input type="text" name="width" value="800" />
	 			<br/>
	 			<span class="description">The slider width in pixels</span>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>height</strong></th>
	    	<td>
	    		<input type="text" name="height" value="400" />
	    		<br/>
	    		<span class="description">The slider height in pixels</span>
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>autoStart</strong> : true or false</th>
	    	<td>
	    		<input type="text" name="autostart" value="true" />
	    		<br/>
	    		<span class="description">If true, slideshow will automatically start after loading the page.</span>
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>pauseOnHover</strong> : true or false</th>
	    	<td>
	    		<input type="text" name="pauseonhover" value="true" />
	    		<br/>
	    		<span class="description">SlideShow will pause when mouse pointer is over LayerSlider.</span>
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>firstLayer</strong> : number (positive integer)</th>
	    	<td>
	    		<input type="text" name="firstlayer" value="1" />
	    		<br/>
	    		<span class="description">LayerSlider will begin with this layer.</span>
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>twoWaySlideshow</strong> : true or false</th>
	    	<td>
	    		<input type="text" name="twowayslideshow" value="true" />
	    		<br/>
	    		<span class="description">If true, slideshow will go backwards if you click the prev button.</span>
	    	</td>
	     </tr>
	    <tr valign="top">
	    	<th scope="row"><strong>keybNav</strong> : true or false</th>
	    	<td>
	    		<input type="text" name="keybnav" value="true" />
	    		<br/>
	    		<span class="description">Keyboard navigation. You can navigate with the left and right arrow keys.</span>
	    	</td>
	    </tr>
        <tr valign="top">
        	<th scope="row"><strong>imgPreload</strong> : true or false</th>
        	<td>
        		<input type="text" name="imgpreload" value="true" />
        		<br/>
        		<span class="description">Image preload. Preloads all images and background-images of the next layer.</span>
        	</td>
	    </tr>
	    <tr valign="top">
        	<th scope="row"><strong>navPrevNext</strong> : true or false</th>
        	<td>
        		<input type="text" name="navprevnext" value="true" />
        		<br/>
        		<span class="description">If false, Prev and Next buttons will be invisible.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>navStartStop</strong> : true or false</th>
        	<td>
        		<input type="text" name="navstartstop" value="true" />
        		<br/>
        		<span class="description">If false, Start and Stop buttons will be invisible.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>navButtons</strong> : true or false</th>
        	<td>
        		<input type="text" name="navbuttons" value="true" />
        		<br/>
        		<span class="description">If false, slide buttons will be invisible.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>skin</strong> : 'name_of_the_skin'</th>
        	<td>
        		<input type="text" name="skin" value="defaultskin" />
        		<br/>
        		<span class="description">You can change the skin of the Slider.</span>
        	</td>
        </tr>
        <tr valign="top">
        	<th scope="row"><strong>skinsPath</strong> : 'path_of_the_skins_folder/'</th>
        	<td>
        		<input type="text" name="skinspath" value="/LayerSlider/skins/" />
        		<br/>
        		<span class="description">You can change the default path of the skins folder. Note, that you must use the slash at the end of the path.</span>
        	</td>
        </tr>
	</table>
	<ul class="layerslider_slides_wrapper"></ul>
	<a href="#" class="layerslider_add_slide">Add new slide</a>
</div>


<ul id="layerslider_slides_code">
    <li class="layerslider_slides">

    	<div class="draggable" style="width: 1000px; height: 500px; position: relative;"></div>

    	<table>
    		<tr>
    			<th>Background</th>
    			<th>SlideDirection</th>
    			<th>SlideDelay</th>
    			<th>DurationIn</th>
    			<th>DurationOut</th>
    			<th>EasingIn</th>
    			<th>EasingOut</th>
    			<th>DelayIn</th>
    			<th>DelayOut</th>
    		</tr>
    		<tr>
    			<td><input type="text" name="background" class="layerslider_upload_input"></td>
    			<td>
    				<select name="slidedirection">
    					<option>left</option>
    					<option selected="selected">right</option>
    					<option>top</option>
    					<option>bottom</option>
    				</select>
    			</td>
    			<td><input type="text" name="slidedelay" value="4000"></td>
    			<td><input type="text" name="durationin" value="1500"></td>
    			<td><input type="text" name="durationout" value="1500"></td>
    			<td>
    				<select name="easingin">
    					<option>linear</option>
    					<option>swing</option>
    					<option>easeInQuad</option>
    					<option>easeOutQuad</option>
    					<option>easeInOutQuad</option>
    					<option>easeInCubic</option>
    					<option>easeOutCubic</option>
    					<option>easeInOutCubic</option>
    					<option>easeInQuart</option>
    					<option>easeOutQuart</option>
    					<option>easeInOutQuart</option>
    					<option>easeInQuint</option>
    					<option>easeOutQuint</option>
    					<option selected="selected">easeInOutQuint</option>
    					<option>easeInSine</option>
    					<option>easeOutSine</option>
    					<option>easeInOutSine</option>
    					<option>easeInExpo</option>
    					<option>easeOutExpo</option>
    					<option>easeInOutExpo</option>
    					<option>easeInCirc</option>
    					<option>easeOutCirc</option>
    					<option>easeInOutCirc</option>
    					<option>easeInElastic</option>
    					<option>easeOutElastic</option>
    					<option>easeInOutElastic</option>
    					<option>easeInBack</option>
    					<option>easeOutBack</option>
    					<option>easeInOutBack</option>
    					<option>easeInBounce</option>
    					<option>easeOutBounce</option>
    					<option>easeInOutBounce</option>
    				</select>
    			</td>
    	    	<td>
    	    		<select name="easingout">
    	    			<option>linear</option>
    	    			<option>swing</option>
    	    			<option>easeInQuad</option>
    	    			<option>easeOutQuad</option>
    	    			<option>easeInOutQuad</option>
    	    			<option>easeInCubic</option>
    	    			<option>easeOutCubic</option>
    	    			<option>easeInOutCubic</option>
    	    			<option>easeInQuart</option>
    	    			<option>easeOutQuart</option>
    	    			<option>easeInOutQuart</option>
    	    			<option>easeInQuint</option>
    	    			<option>easeOutQuint</option>
    	    			<option selected="selected">easeInOutQuint</option>
    	    			<option>easeInSine</option>
    	    			<option>easeOutSine</option>
    	    			<option>easeInOutSine</option>
    	    			<option>easeInExpo</option>
    	    			<option>easeOutExpo</option>
    	    			<option>easeInOutExpo</option>
    	    			<option>easeInCirc</option>
    	    			<option>easeOutCirc</option>
    	    			<option>easeInOutCirc</option>
    	    			<option>easeInElastic</option>
    	    			<option>easeOutElastic</option>
    	    			<option>easeInOutElastic</option>
    	    			<option>easeInBack</option>
    	    			<option>easeOutBack</option>
    	    			<option>easeInOutBack</option>
    	    			<option>easeInBounce</option>
    	    			<option>easeOutBounce</option>
    	    			<option>easeInOutBounce</option>
    	    		</select>
    	    	</td>
    	    	<td><input type="text" name="delayin" value="0"></td>
    	    	<td><input type="text" name="delayout" value="0"></td>
    	    </tr>
    	</table>
    	<p><strong>Sublayers:</strong></p>
    	<table>
    		<tbody class="sortable">
    		<tr>
    			<th></th>
    			<th></th>
    			<th>Top</th>
    			<th>Left</th>
    			<th>Image</th>
    			<th>Link</th>
    			<th>Target</th>
    			<th>P.Level</th>
    			<th>SlideDirection</th>
    			<th>ParallaxIn</th>
    			<th>ParallaxOut</th>
    			<th>DurationIn</th>
    			<th>DurationOut</th>
    			<th>EasingIn</th>
    			<th>EasingOut</th>
    			<th>DelayIn</th>
    			<th>DelayOut</th>
    			<th>Remove</th>
    		</tr>
    		<tr class="layerslider_sublayer">
    			<td><input type="checkbox" name="selected" class="layerslider-layer-select"></td>
    			<td><div class="moveable"></div></td>
    			<td><input type="text" name="top" value="0"></td>
    			<td><input type="text" name="left" value="0"></td>
    			<td><input type="text" name="image" class="layerslider_upload_input"></td>
    			<td><input type="text" name="url" value=""></td>
    			<td>
    				<select name="target">
    					<option>_self</option>
    					<option>_blank</option>
    					<option>_parent</option>
    					<option>_top</option>
    				</select>
    			</td>
    			<td><input type="text" name="level" value="1"></td>
    			<td>
    				<select name="slidedirection">
    					<option>left</option>
    					<option selected="selected">right</option>
    					<option>top</option>
    					<option>bottom</option>
    				</select>
    			</td>
    			<td><input type="text" name="parallaxin" value=".45"></td>
    			<td><input type="text" name="parallaxout" value=".45"></td>
    			<td><input type="text" name="durationin" value="1500"></td>
    			<td><input type="text" name="durationout" value="1500"></td>
    			<td>
    				<select name="easingin">
    					<option>linear</option>
    					<option>swing</option>
    					<option>easeInQuad</option>
    					<option>easeOutQuad</option>
    					<option>easeInOutQuad</option>
    					<option>easeInCubic</option>
    					<option>easeOutCubic</option>
    					<option>easeInOutCubic</option>
    					<option>easeInQuart</option>
    					<option>easeOutQuart</option>
    					<option>easeInOutQuart</option>
    					<option>easeInQuint</option>
    					<option>easeOutQuint</option>
    					<option selected="selected">easeInOutQuint</option>
    					<option>easeInSine</option>
    					<option>easeOutSine</option>
    					<option>easeInOutSine</option>
    					<option>easeInExpo</option>
    					<option>easeOutExpo</option>
    					<option>easeInOutExpo</option>
    					<option>easeInCirc</option>
    					<option>easeOutCirc</option>
    					<option>easeInOutCirc</option>
    					<option>easeInElastic</option>
    					<option>easeOutElastic</option>
    					<option>easeInOutElastic</option>
    					<option>easeInBack</option>
    					<option>easeOutBack</option>
    					<option>easeInOutBack</option>
    					<option>easeInBounce</option>
    					<option>easeOutBounce</option>
    					<option>easeInOutBounce</option>
    				</select>
    			</td>
    			<td>
    				<select name="easingout">
    					<option>linear</option>
    					<option>swing</option>
    					<option>easeInQuad</option>
    					<option>easeOutQuad</option>
    					<option>easeInOutQuad</option>
    					<option>easeInCubic</option>
    					<option>easeOutCubic</option>
    					<option>easeInOutCubic</option>
    					<option>easeInQuart</option>
    					<option>easeOutQuart</option>
    					<option>easeInOutQuart</option>
    					<option>easeInQuint</option>
    					<option>easeOutQuint</option>
    					<option selected="selected">easeInOutQuint</option>
    					<option>easeInSine</option>
    					<option>easeOutSine</option>
    					<option>easeInOutSine</option>
    					<option>easeInExpo</option>
    					<option>easeOutExpo</option>
    					<option>easeInOutExpo</option>
    					<option>easeInCirc</option>
    					<option>easeOutCirc</option>
    					<option>easeInOutCirc</option>
    					<option>easeInElastic</option>
    					<option>easeOutElastic</option>
    					<option>easeInOutElastic</option>
    					<option>easeInBack</option>
    					<option>easeOutBack</option>
    					<option>easeInOutBack</option>
    					<option>easeInBounce</option>
    					<option>easeOutBounce</option>
    					<option>easeInOutBounce</option>
    				</select>
    			</td>
    			<td><input type="text" name="delayin" value="0"></td>
    			<td><input type="text" name="delayout" value="0"></td>
    			<td><a href="#" class="remove">remove</a></a></td>
    		</tr>
    	</tbody>
    	</table>
    	<p><a href="#" class="layerslider_add_sublayer">Add new sublayer</a></p>
    	<p><a href="#" class="layerslider_remove_layer">Remove this layer</a></p>
    </li>
</ul>

<?php $slides = unserialize(get_option('layerslider-slides')); ?>

<form method="post" action="" id="layerslider_form">
    <div id="layerslider-tabs">
    	<button id="layerslider-add-tab">Create new slider</button>
    	<ul>
    		<?php foreach($slides as $slidekey => $slide) : ?>
			<li><a href="#tabs-<?=($slidekey+1)?>">LayerSlider #<?=($slidekey+1)?></a><span class="ui-icon ui-icon-close">X</span></li>
			<?php endforeach; ?>
		</ul>

		<?php foreach($slides as $slidekey => $slide) : ?>
		<div id="tabs-<?=($slidekey+1)?>">
			<table class="form-table">
				<tr valign="top">
  					<th scope="row"><strong>width</strong></th>
					<td>
   		     			<input type="text" name="width" value="<?=$slide['properties']['width']?>" />
   		     			<br/>
   		     			<span class="description">The slider width value in pixels</span>
   		     		</td>
   		     	</tr>
        		<tr valign="top">
        			<th scope="row"><strong>height</strong></th>
        			<td>
        				<input type="text" name="height" value="<?=$slide['properties']['height']?>" />
        				<br/>
        				<span class="description">The slider height value in pixels</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>autoStart</strong> : true or false</th>
        			<td>
        				<input type="text" name="autostart" value="<?=$slide['properties']['autostart']?>" />
        				<br/>
        				<span class="description">If true, slideshow will automatically start after loading the page.</span>
        			</td>
        		</tr>
	    		<tr valign="top">
	    			<th scope="row"><strong>pauseOnHover</strong> : true or false</th>
	    			<td>
	    				<input type="text" name="pauseonhover" value="<?=$slide['properties']['pauseonhover']?>" />
	    				<br/>
	    				<span class="description">SlideShow will pause when mouse pointer is over LayerSlider.</span>
	    			</td>
	    		</tr>
				<tr valign="top">
        			<th scope="row"><strong>firstLayer</strong> : number (positive integer)</th>
        			<td>
        				<input type="text" name="firstlayer" value="<?=$slide['properties']['firstlayer']?>" />
        				<br/>
        				<span class="description">LayerSlider will begin with this layer.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>twoWaySlideshow</strong> : true or false</th>
        			<td>
        				<input type="text" name="twowayslideshow" value="<?=$slide['properties']['twowayslideshow']?>" />
        				<br/>
        				<span class="description">If true, slideshow will go backwards if you click the prev button.</span>
        			</td>
       			 </tr>
				<tr valign="top">
        			<th scope="row"><strong>keybNav</strong> : true or false</th>
        			<td>
        				<input type="text" name="keybnav" value="<?=$slide['properties']['keybnav']?>" />
        				<br/>
        				<span class="description">Keyboard navigation. You can navigate with the left and right arrow keys.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>imgPreload</strong> : true or false</th>
        			<td>
        				<input type="text" name="imgpreload" value="<?=$slide['properties']['imgpreload']?>" />
        				<br/>
        				<span class="description">Image preload. Preloads all images and background-images of the next layer.</span>
        			</td>
				</tr>
				<tr valign="top">
        			<th scope="row"><strong>navPrevNext</strong> : true or false</th>
        			<td>
        				<input type="text" name="navprevnext" value="<?=$slide['properties']['navprevnext']?>" />
        				<br/>
        				<span class="description">If false, Prev and Next buttons will be invisible.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>navStartStop</strong> : true or false</th>
        			<td>
        				<input type="text" name="navstartstop" value="<?=$slide['properties']['navstartstop']?>" />
        				<br/>
        				<span class="description">If false, Start and Stop buttons will be invisible.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>navButtons</strong> : true or false</th>
        			<td>
        				<input type="text" name="navbuttons" value="<?=$slide['properties']['navbuttons']?>" />
        				<br/>
        				<span class="description">If false, slide buttons will be invisible.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>skin</strong> : 'name_of_the_skin'</th>
        			<td>
        				<input type="text" name="skin" value="<?=$slide['properties']['skin']?>" />
        				<br/>
        				<span class="description">You can change the skin of the Slider.</span>
        			</td>
        		</tr>
        		<tr valign="top">
        			<th scope="row"><strong>skinsPath</strong> : 'path_of_the_skins_folder/'</th>
        			<td>
        				<input type="text" name="skinspath" value="<?=$slide['properties']['skinspath']?>" />
        				<br/>
        				<span class="description">You can change the default path of the skins folder. Note, that you must use the slash at the end of the path.</span>
        			</td>
        		</tr>
			</table>
			
			<ul class="layerslider_slides_wrapper">
				<?php if(is_array($slide)) : ?>
				<?php foreach($slide['layers'] as $layerkey => $layer) : ?>
				<li class="layerslider_slides">
			
					<div class="draggable" style="width: <?=$slide['properties']['width']?>px; height: <?=$slide['properties']['height']?>px; position: relative; background-image: url(<?=$layer['properties']['background']?>);">
						<?php foreach($layer['sublayers'] as $sublayerkey => $sublayer) : ?>
						<img src="<?=$sublayer['image']?>" style="position: absolute; top: <?=$sublayer['top']?>px; left: <?=$sublayer['left']?>px; z-index: <?=($sublayerkey+1)?>">
						<?php endforeach; ?>
					</div>
				
					<table>
						<tr>
							<th>Background</th>
							<th>SlideDirection</th>
							<th>SlideDelay</th>
							<th>DurationIn</th>
							<th>DurationOut</th>
							<th>EasingIn</th>
							<th>EasingOut</th>
							<th>DelayIn</th>
							<th>DelayOut</th>
						</tr>
						<tr>
							<td><input type="text" name="background" class="layerslider_upload_input" value="<?=$layer['properties']['background']?>"></td>
							<td>
								<select name="slidedirection">
									<option <?=($layer['properties']['slidedirection'] == 'left') ? 'selected="selected"' : ''?>>left</option>
									<option <?=($layer['properties']['slidedirection'] == 'right') ? 'selected="selected"' : ''?>>right</option>
									<option <?=($layer['properties']['slidedirection'] == 'top') ? 'selected="selected"' : ''?>>top</option>
									<option <?=($layer['properties']['slidedirection'] == 'bottom') ? 'selected="selected"' : ''?>>bottom</option>
								</select>
							</td>
							<td><input type="text" name="slidedelay" value="<?=$layer['properties']['slidedelay']?>"></td>
							<td><input type="text" name="durationin" value="<?=$layer['properties']['durationin']?>"></td>
							<td><input type="text" name="durationout" value="<?=$layer['properties']['durationout']?>"></td>
							<td>
								<select name="easingin">
									<option <?=($layer['properties']['easingin'] == 'linear')				? 'selected="selected"' : ''?>>linear</option>
									<option <?=($layer['properties']['easingin'] == 'swing')				? 'selected="selected"' : ''?>>swing</option>
									<option <?=($layer['properties']['easingin'] == 'easeInQuad')			? 'selected="selected"' : ''?>>easeInQuad</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutQuad')		? 'selected="selected"' : ''?>>easeOutQuad</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutQuad')		? 'selected="selected"' : ''?>>easeInOutQuad</option>
									<option <?=($layer['properties']['easingin'] == 'easeInCubic')		? 'selected="selected"' : ''?>>easeInCubic</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutCubic')		? 'selected="selected"' : ''?>>easeOutCubic</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutCubic')		? 'selected="selected"' : ''?>>easeInOutCubic</option>
									<option <?=($layer['properties']['easingin'] == 'easeInQuart')		? 'selected="selected"' : ''?>>easeInQuart</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutQuart')		? 'selected="selected"' : ''?>>easeOutQuart</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutQuart')		? 'selected="selected"' : ''?>>easeInOutQuart</option>
									<option <?=($layer['properties']['easingin'] == 'easeInQuint')		? 'selected="selected"' : ''?>>easeInQuint</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutQuint')		? 'selected="selected"' : ''?>>easeOutQuint</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutQuint')		? 'selected="selected"' : ''?>>easeInOutQuint</option>
									<option <?=($layer['properties']['easingin'] == 'easeInSine')			? 'selected="selected"' : ''?>>easeInSine</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutSine')		? 'selected="selected"' : ''?>>easeOutSine</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutSine')		? 'selected="selected"' : ''?>>easeInOutSine</option>
									<option <?=($layer['properties']['easingin'] == 'easeInExpo')			? 'selected="selected"' : ''?>>easeInExpo</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutExpo')		? 'selected="selected"' : ''?>>easeOutExpo</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutExpo')		? 'selected="selected"' : ''?>>easeInOutExpo</option>
									<option <?=($layer['properties']['easingin'] == 'easeInCirc')			? 'selected="selected"' : ''?>>easeInCirc</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutCirc')		? 'selected="selected"' : ''?>>easeOutCirc</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutCirc')		? 'selected="selected"' : ''?>>easeInOutCirc</option>
									<option <?=($layer['properties']['easingin'] == 'easeInElastic')		? 'selected="selected"' : ''?>>easeInElastic</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutElastic')		? 'selected="selected"' : ''?>>easeOutElastic</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutElastic')	? 'selected="selected"' : ''?>>easeInOutElastic</option>
									<option <?=($layer['properties']['easingin'] == 'easeInBack')			? 'selected="selected"' : ''?>>easeInBack</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutBack')		? 'selected="selected"' : ''?>>easeOutBack</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutBack')		? 'selected="selected"' : ''?>>easeInOutBack</option>
									<option <?=($layer['properties']['easingin'] == 'easeInBounce')		? 'selected="selected"' : ''?>>easeInBounce</option>
									<option <?=($layer['properties']['easingin'] == 'easeOutBounce')		? 'selected="selected"' : ''?>>easeOutBounce</option>
									<option <?=($layer['properties']['easingin'] == 'easeInOutBounce')	? 'selected="selected"' : ''?>>easeInOutBounce</option>
								</select>
							</td>
							<td>
								<select name="easingout">
									<option <?=($layer['properties']['easingout'] == 'linear')			? 'selected="selected"' : ''?>>linear</option>
									<option <?=($layer['properties']['easingout'] == 'swing')				? 'selected="selected"' : ''?>>swing</option>
									<option <?=($layer['properties']['easingout'] == 'easeInQuad')		? 'selected="selected"' : ''?>>easeInQuad</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutQuad')		? 'selected="selected"' : ''?>>easeOutQuad</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutQuad')		? 'selected="selected"' : ''?>>easeInOutQuad</option>
									<option <?=($layer['properties']['easingout'] == 'easeInCubic')		? 'selected="selected"' : ''?>>easeInCubic</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutCubic')		? 'selected="selected"' : ''?>>easeOutCubic</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutCubic')	? 'selected="selected"' : ''?>>easeInOutCubic</option>
									<option <?=($layer['properties']['easingout'] == 'easeInQuart')		? 'selected="selected"' : ''?>>easeInQuart</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutQuart')		? 'selected="selected"' : ''?>>easeOutQuart</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutQuart')	? 'selected="selected"' : ''?>>easeInOutQuart</option>
									<option <?=($layer['properties']['easingout'] == 'easeInQuint')		? 'selected="selected"' : ''?>>easeInQuint</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutQuint')		? 'selected="selected"' : ''?>>easeOutQuint</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutQuint')	? 'selected="selected"' : ''?>>easeInOutQuint</option>
									<option <?=($layer['properties']['easingout'] == 'easeInSine')		? 'selected="selected"' : ''?>>easeInSine</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutSine')		? 'selected="selected"' : ''?>>easeOutSine</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutSine')		? 'selected="selected"' : ''?>>easeInOutSine</option>
									<option <?=($layer['properties']['easingout'] == 'easeInExpo')		? 'selected="selected"' : ''?>>easeInExpo</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutExpo')		? 'selected="selected"' : ''?>>easeOutExpo</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutExpo')		? 'selected="selected"' : ''?>>easeInOutExpo</option>
									<option <?=($layer['properties']['easingout'] == 'easeInCirc')		? 'selected="selected"' : ''?>>easeInCirc</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutCirc')		? 'selected="selected"' : ''?>>easeOutCirc</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutCirc')		? 'selected="selected"' : ''?>>easeInOutCirc</option>
									<option <?=($layer['properties']['easingout'] == 'easeInElastic')		? 'selected="selected"' : ''?>>easeInElastic</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutElastic')	? 'selected="selected"' : ''?>>easeOutElastic</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutElastic')	? 'selected="selected"' : ''?>>easeInOutElastic</option>
									<option <?=($layer['properties']['easingout'] == 'easeInBack')		? 'selected="selected"' : ''?>>easeInBack</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutBack')		? 'selected="selected"' : ''?>>easeOutBack</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutBack')		? 'selected="selected"' : ''?>>easeInOutBack</option>
									<option <?=($layer['properties']['easingout'] == 'easeInBounce')		? 'selected="selected"' : ''?>>easeInBounce</option>
									<option <?=($layer['properties']['easingout'] == 'easeOutBounce')		? 'selected="selected"' : ''?>>easeOutBounce</option>
									<option <?=($layer['properties']['easingout'] == 'easeInOutBounce')	? 'selected="selected"' : ''?>>easeInOutBounce</option>
								</select>
							</td>
							<td><input type="text" name="delayin" value="<?=$layer['properties']['delayin']?>"></td>
							<td><input type="text" name="delayout" value="<?=$layer['properties']['delayout']?>"></td>
						</tr>
					</table>
					<p><strong>Sublayers:</strong></p>
					<table>
						<tbody class="sortable">
						<tr>
							<th></th>
							<th></th>
							<th>Top</th>
							<th>Left</th>
							<th>Image</th>
							<th>Link</th>
							<th>Target</th>
							<th>P.Level</th>
							<th>SlideDirection</th>
							<th>ParallaxIn</th>
							<th>ParallaxOut</th>
							<th>DurationIn</th>
							<th>DurationOut</th>
							<th>EasingIn</th>
							<th>EasingOut</th>
							<th>DelayIn</th>
							<th>DelayOut</th>
							<th>Remove</th>
						</tr>
						<?php if(is_array($layer['sublayers'])) : ?>
						<?php foreach($layer['sublayers'] as $sublayerkey => $sublayer) : ?>
						<tr>
							<td><input type="checkbox" name="selected" class="layerslider-layer-select"></td>
							<td><div class="moveable"></div></td>
							<td><input type="text" name="top" value="<?=$sublayer['top']?>"></td>
							<td><input type="text" name="left" value="<?=$sublayer['left']?>"></td>
							<td><input type="text" name="image" class="layerslider_upload_input" value="<?=$sublayer['image']?>"></td>
							<td><input type="text" name="url" value="<?=$sublayer['url']?>"></td>
							<td>
    							<select name="target">
    								<option <?=($sublayer['target'] == '_self') 		? 'selected="selected"' : ''?>>_self</option>
    								<option <?=($sublayer['target'] == '_blank') 		? 'selected="selected"' : ''?>>_blank</option>
    								<option <?=($sublayer['target'] == '_parent') 		? 'selected="selected"' : ''?>>_parent</option>
    								<option <?=($sublayer['target'] == '_top') 			? 'selected="selected"' : ''?>>_top</option>
    							</select>
							</td>
							<td><input type="text" name="level" value="<?=$sublayer['level']?>"></td>
							<td>
								<select name="slidedirection">
									<option <?=($sublayer['slidedirection'] == 'left') 		? 'selected="selected"' : ''?>>left</option>
									<option <?=($sublayer['slidedirection'] == 'right') 	? 'selected="selected"' : ''?>>right</option>
									<option <?=($sublayer['slidedirection'] == 'top')		? 'selected="selected"' : ''?>>top</option>
									<option <?=($sublayer['slidedirection'] == 'bottom') 	? 'selected="selected"' : ''?>>bottom</option>
								</select>					
							</td>
							<td><input type="text" name="parallaxin" value="<?=$sublayer['parallaxin']?>"></td>
							<td><input type="text" name="parallaxout" value="<?=$sublayer['parallaxout']?>"></td>
							<td><input type="text" name="durationin" value="<?=$sublayer['durationin']?>"></td>
							<td><input type="text" name="durationout" value="<?=$sublayer['durationout']?>"></td>
							<td>
								<select name="easingin">
									<option <?=($sublayer['easingin'] == 'linear')				? 'selected="selected"' : ''?>>linear</option>
									<option <?=($sublayer['easingin'] == 'swing')				? 'selected="selected"' : ''?>>swing</option>
									<option <?=($sublayer['easingin'] == 'easeInQuad')			? 'selected="selected"' : ''?>>easeInQuad</option>
									<option <?=($sublayer['easingin'] == 'easeOutQuad')		? 'selected="selected"' : ''?>>easeOutQuad</option>
									<option <?=($sublayer['easingin'] == 'easeInOutQuad')		? 'selected="selected"' : ''?>>easeInOutQuad</option>
									<option <?=($sublayer['easingin'] == 'easeInCubic')		? 'selected="selected"' : ''?>>easeInCubic</option>
									<option <?=($sublayer['easingin'] == 'easeOutCubic')		? 'selected="selected"' : ''?>>easeOutCubic</option>
									<option <?=($sublayer['easingin'] == 'easeInOutCubic')		? 'selected="selected"' : ''?>>easeInOutCubic</option>
									<option <?=($sublayer['easingin'] == 'easeInQuart')		? 'selected="selected"' : ''?>>easeInQuart</option>
									<option <?=($sublayer['easingin'] == 'easeOutQuart')		? 'selected="selected"' : ''?>>easeOutQuart</option>
									<option <?=($sublayer['easingin'] == 'easeInOutQuart')		? 'selected="selected"' : ''?>>easeInOutQuart</option>
									<option <?=($sublayer['easingin'] == 'easeInQuint')		? 'selected="selected"' : ''?>>easeInQuint</option>
									<option <?=($sublayer['easingin'] == 'easeOutQuint')		? 'selected="selected"' : ''?>>easeOutQuint</option>
									<option <?=($sublayer['easingin'] == 'easeInOutQuint')		? 'selected="selected"' : ''?>>easeInOutQuint</option>
									<option <?=($sublayer['easingin'] == 'easeInSine')			? 'selected="selected"' : ''?>>easeInSine</option>
									<option <?=($sublayer['easingin'] == 'easeOutSine')		? 'selected="selected"' : ''?>>easeOutSine</option>
									<option <?=($sublayer['easingin'] == 'easeInOutSine')		? 'selected="selected"' : ''?>>easeInOutSine</option>
									<option <?=($sublayer['easingin'] == 'easeInExpo')			? 'selected="selected"' : ''?>>easeInExpo</option>
									<option <?=($sublayer['easingin'] == 'easeOutExpo')		? 'selected="selected"' : ''?>>easeOutExpo</option>
									<option <?=($sublayer['easingin'] == 'easeInOutExpo')		? 'selected="selected"' : ''?>>easeInOutExpo</option>
									<option <?=($sublayer['easingin'] == 'easeInCirc')			? 'selected="selected"' : ''?>>easeInCirc</option>
									<option <?=($sublayer['easingin'] == 'easeOutCirc')		? 'selected="selected"' : ''?>>easeOutCirc</option>
									<option <?=($sublayer['easingin'] == 'easeInOutCirc')		? 'selected="selected"' : ''?>>easeInOutCirc</option>
									<option <?=($sublayer['easingin'] == 'easeInElastic')		? 'selected="selected"' : ''?>>easeInElastic</option>
									<option <?=($sublayer['easingin'] == 'easeOutElastic')		? 'selected="selected"' : ''?>>easeOutElastic</option>
									<option <?=($sublayer['easingin'] == 'easeInOutElastic')	? 'selected="selected"' : ''?>>easeInOutElastic</option>
									<option <?=($sublayer['easingin'] == 'easeInBack')			? 'selected="selected"' : ''?>>easeInBack</option>
									<option <?=($sublayer['easingin'] == 'easeOutBack')		? 'selected="selected"' : ''?>>easeOutBack</option>
									<option <?=($sublayer['easingin'] == 'easeInOutBack')		? 'selected="selected"' : ''?>>easeInOutBack</option>
									<option <?=($sublayer['easingin'] == 'easeInBounce')		? 'selected="selected"' : ''?>>easeInBounce</option>
									<option <?=($sublayer['easingin'] == 'easeOutBounce')		? 'selected="selected"' : ''?>>easeOutBounce</option>
									<option <?=($sublayer['easingin'] == 'easeInOutBounce')	? 'selected="selected"' : ''?>>easeInOutBounce</option>
								</select>
							</td>
							<td>
								<select name="easingout">
									<option <?=($sublayer['easingout'] == 'linear')			? 'selected="selected"' : ''?>>linear</option>
									<option <?=($sublayer['easingout'] == 'swing')				? 'selected="selected"' : ''?>>swing</option>
									<option <?=($sublayer['easingout'] == 'easeInQuad')		? 'selected="selected"' : ''?>>easeInQuad</option>
									<option <?=($sublayer['easingout'] == 'easeOutQuad')		? 'selected="selected"' : ''?>>easeOutQuad</option>
									<option <?=($sublayer['easingout'] == 'easeInOutQuad')		? 'selected="selected"' : ''?>>easeInOutQuad</option>
									<option <?=($sublayer['easingout'] == 'easeInCubic')		? 'selected="selected"' : ''?>>easeInCubic</option>
									<option <?=($sublayer['easingout'] == 'easeOutCubic')		? 'selected="selected"' : ''?>>easeOutCubic</option>
									<option <?=($sublayer['easingout'] == 'easeInOutCubic')	? 'selected="selected"' : ''?>>easeInOutCubic</option>
									<option <?=($sublayer['easingout'] == 'easeInQuart')		? 'selected="selected"' : ''?>>easeInQuart</option>
									<option <?=($sublayer['easingout'] == 'easeOutQuart')		? 'selected="selected"' : ''?>>easeOutQuart</option>
									<option <?=($sublayer['easingout'] == 'easeInOutQuart')	? 'selected="selected"' : ''?>>easeInOutQuart</option>
									<option <?=($sublayer['easingout'] == 'easeInQuint')		? 'selected="selected"' : ''?>>easeInQuint</option>
									<option <?=($sublayer['easingout'] == 'easeOutQuint')		? 'selected="selected"' : ''?>>easeOutQuint</option>
									<option <?=($sublayer['easingout'] == 'easeInOutQuint')	? 'selected="selected"' : ''?>>easeInOutQuint</option>
									<option <?=($sublayer['easingout'] == 'easeInSine')		? 'selected="selected"' : ''?>>easeInSine</option>
									<option <?=($sublayer['easingout'] == 'easeOutSine')		? 'selected="selected"' : ''?>>easeOutSine</option>
									<option <?=($sublayer['easingout'] == 'easeInOutSine')		? 'selected="selected"' : ''?>>easeInOutSine</option>
									<option <?=($sublayer['easingout'] == 'easeInExpo')		? 'selected="selected"' : ''?>>easeInExpo</option>
									<option <?=($sublayer['easingout'] == 'easeOutExpo')		? 'selected="selected"' : ''?>>easeOutExpo</option>
									<option <?=($sublayer['easingout'] == 'easeInOutExpo')		? 'selected="selected"' : ''?>>easeInOutExpo</option>
									<option <?=($sublayer['easingout'] == 'easeInCirc')		? 'selected="selected"' : ''?>>easeInCirc</option>
									<option <?=($sublayer['easingout'] == 'easeOutCirc')		? 'selected="selected"' : ''?>>easeOutCirc</option>
									<option <?=($sublayer['easingout'] == 'easeInOutCirc')		? 'selected="selected"' : ''?>>easeInOutCirc</option>
									<option <?=($sublayer['easingout'] == 'easeInElastic')		? 'selected="selected"' : ''?>>easeInElastic</option>
									<option <?=($sublayer['easingout'] == 'easeOutElastic')	? 'selected="selected"' : ''?>>easeOutElastic</option>
									<option <?=($sublayer['easingout'] == 'easeInOutElastic')	? 'selected="selected"' : ''?>>easeInOutElastic</option>
									<option <?=($sublayer['easingout'] == 'easeInBack')		? 'selected="selected"' : ''?>>easeInBack</option>
									<option <?=($sublayer['easingout'] == 'easeOutBack')		? 'selected="selected"' : ''?>>easeOutBack</option>
									<option <?=($sublayer['easingout'] == 'easeInOutBack')		? 'selected="selected"' : ''?>>easeInOutBack</option>
									<option <?=($sublayer['easingout'] == 'easeInBounce')		? 'selected="selected"' : ''?>>easeInBounce</option>
									<option <?=($sublayer['easingout'] == 'easeOutBounce')		? 'selected="selected"' : ''?>>easeOutBounce</option>
									<option <?=($sublayer['easingout'] == 'easeInOutBounce')	? 'selected="selected"' : ''?>>easeInOutBounce</option>
								</select>
							</td>
							<td><input type="text" name="delayin" value="<?=$sublayer['delayin']?>"></td>
							<td><input type="text" name="delayout" value="<?=$sublayer['delayout']?>"></td>
							<td><a href="#" class="remove">remove</a></a></td>
						</tr>
						<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
					</table>
					<p><a href="#" class="layerslider_add_sublayer">Add new sublayer</a></p>
					<p><a href="#" class="layerslider_remove_layer">Remove this layer</a></p>
				</li>
				<?php endforeach; ?>
				<?php endif; ?>
			</ul>
			<a href="#" class="layerslider_add_slide">Add new slide</a>
		</div>
		<?php endforeach; ?>
	</div>
	<p class="submit">
		<input type="hidden" name="posted" value="1">
    	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>