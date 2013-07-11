<?php
/**
 * @package LayerSlider
 * @version 1.0
 */
/*

Plugin Name: LayerSlider
Plugin URI: http://codecanyon.net/user/kreatura/
Description: WordPress plugin for LayerSlider
Version: 1.0
Author: Kreatura Media
Author URI: http://kreaturamedia.com/
License: BSD
*/

/********************************************************/
/*                        Actions                       */
/********************************************************/
	
	// Link content resources
	add_action('wp_enqueue_scripts', 'layerslider_enqueue_content_res');

	// Link admin resources
	add_action('admin_enqueue_scripts', 'layerslider_enqueue_admin_res');

	// Register custom settings menu
	add_action('admin_menu', 'layerslider_settings_menu');
	
	// Widget action
	add_action( 'widgets_init', create_function( '', 'register_widget("LayerSlider_Widget");' ) );
	
	// Init LayerSlider
	add_action('wp_head', 'layerslider_js');
	
	// Add shortcode
	add_shortcode("layerslider","layerslider_init");

/********************************************************/
/*               Enqueue Content Scripts                */
/********************************************************/
	
	function layerslider_enqueue_content_res() {

		wp_enqueue_script('layerslider_js', plugins_url('/js/layerslider.kreaturamedia.jquery-min.js', __FILE__), array('jquery'), '1.0' );
		wp_enqueue_script('layerslider_easing', plugins_url('/js/jquery-easing-1.3.js', __FILE__), array('jquery'), '1.0' );
		wp_enqueue_style('layerslider_css', plugins_url('/css/layerslider.css', __FILE__), array(), '1.0' );
	}


/********************************************************/
/*                Enqueue Admin Scripts                 */
/********************************************************/

	function layerslider_enqueue_admin_res() {
		
		if(strstr($_SERVER['REQUEST_URI'], 'layerslider')) {

			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
			
			wp_enqueue_script('jquery-ui-tabs');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('jquery-ui-draggable');

			wp_enqueue_script('layerslider_admin_js', plugins_url('/js/layerslider_admin.js', __FILE__), array('jquery'), '1.0' );
			wp_enqueue_style('layerslider_admin_css', plugins_url('/css/layerslider_admin.css', __FILE__), array(), '1.0' );
		}
	}


/********************************************************/
/*                 Loads settings menu                  */
/********************************************************/
function layerslider_settings_menu() {

	//create new top-level menu
	add_menu_page('LayerSlider', 'LayerSlider', 'administrator', __FILE__, 'layerslider_settings_page');

	//call register settings function
	add_action( 'admin_init', 'layerslider_register_settings' );
}


/********************************************************/
/*                  Register settings                   */
/********************************************************/
function layerslider_register_settings() {

	if(isset($_POST['posted']) && strstr($_SERVER['REQUEST_URI'], 'layerslider')) {
		
		// Add option if it is not extists yet
		if(get_option('layerslider-slides') === false) {
			add_option('layerslider-slides', serialize($_POST['layerslider-slides']));
		
		// Update option
		} else {
			update_option('layerslider-slides', serialize($_POST['layerslider-slides']));
		}
		
		// Redirect back
		header('Location: '.$_SERVER['REQUEST_URI'].'');
		die();
	}
}


/********************************************************/
/*                  Settings page HTML                  */
/********************************************************/
function layerslider_settings_page() {

	include(dirname(__FILE__).'/settings.php');

} 


/********************************************************/
/*                  LayerSlider JS                    */
/********************************************************/

function layerslider_js() {
	
	$slides = unserialize(get_option('layerslider-slides'));
	
	include(dirname(__FILE__).'/init.php');
}


/********************************************************/
/*                 LayerSlider init                  */
/********************************************************/

function layerslider_init($atts) {
	
	// Get slider ID
	$id = $atts['id'];
	$id = empty($id) ? 0 : $id;
	
	// Get slider data
	$slides = unserialize(get_option('layerslider-slides'));
	$slides = $slides[($id-1)];
	
	// Include slider file
	include(dirname(__FILE__).'/slider.php');
	
	// Return data
	return $data;
}

/********************************************************/
/*                   Widget settings                    */
/********************************************************/

class LayerSlider_Widget extends WP_Widget {

	function LayerSlider_Widget() {
	
		$widget_ops = array( 'classname' => 'layerslider_widget', 'description' => __('LayerSlider Widget', 'layerslider') );
		$control_ops = array( 'id_base' => 'layerslider_widget' );
		$this->WP_Widget( 'layerslider_widget', __('LayerSlider Widget', 'layerslider'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );


		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;
		
		// Call layerslider_init to show the slider
		layerslider_init($instance);
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['id'] = strip_tags( $new_instance['id'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function form( $instance ) {

		$defaults = array( 'title' => __('LayerSlider', 'layerslider'));
		$instance = wp_parse_args( (array) $instance, $defaults );
		$slides = unserialize(get_option('layerslider-slides'));  ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'id' ); ?>">Choose a slider:</label><br>
			<select id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>">
				<?php foreach($slides as $key => $val) : ?>
				<?php if(($key+1) == $instance['id']) { ?>
				<option value="<?=($key+1)?>" selected="selected">LayerSlider #<?=($key+1)?></option>
				<?php } else { ?>
				<option value="<?=($key+1)?>">LayerSlider #<?=($key+1)?></option>
				<?php } ?>
				<?php endforeach; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>


	<?php
	}
}

?>