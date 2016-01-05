<?php
/*
	Plugin Name: killping-setting-plugin
*/

class killping_setting_page extends Wp_Widget{

	function killping_setting_page(){
		$widget_ops=array('description'=>'This is text widget.');
		$control_ops=array('width'=>'400');
		parent :: Wp_Widget(false,'My Setting Widget',$widget_ops,$control_ops);

	}
	function widget($arg,$instance){

		extract($instance);

		$title=$instance['title']==""?"My Title":$instance['title'];
		$text=$instance['text']==""?"<p>My Simple Widget</p>":$instance['text'];

		echo $arg['before_widget'];
		echo $arg['before_title'];
		echo get_option('killping_widget_title');
		echo "<h1 style='background:".get_option('killping_widget_color')."'>";
		echo $text;
		echo "</h1>";
	}
	function form($instance){
		?>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title');?>
        <input type="text" name="<?php echo $this->get_field_name('title');?>" id="<?php echo $this->get_field_id('title');?>" value="<?php echo $instance['title'];?>" />
        </label>
        <label for="<?php echo $this->get_field_id('text');?>"><?php _e('Text');?>
        <textarea rows="5" name="<?php echo $this->get_field_name('text');?>" id="<?php echo $this->get_field_id('text');?>"><?php echo $instance['text'];?></textarea>
        </label>

		<?php
	}
	function update($new_instance,$old_instance){
		$instance=array();
		$instance['killping_fb_link']=$new_instance['killping_fb_link'];
				$instance['killping_tw_link']=$new_instance['killping_tw_link'];
				$instance['killping_youtube_link']=$new_instance['killping_yoututbe_link'];
				$instance['killping_google_link']=$new_instance['killping_google_link'];


		       	$instance['killping_buynow_link']=$new_instance['killping_buynow_link'];
				$instance['killping_logo_url']=$new_instance['killping_logo_url'];
				$instance['killping_copyright']=$new_instance['killping_copyright'];
		return $instance;
	}
}

function register_killping_setting_page(){
	register_widget('killping_setting_page');
	}


add_action('killping_init','register_killping_setting_page');

function killping_create_menu(){
	add_options_page('killping Setting Page','killping Setting','manage_options','killping-setting-page','killping_create_page');
 }

 function killping_create_page(){
	if( isset($_POST['killping_submit']) && $_POST['killping_submit']=="Save" ){
		update_option('killping_fb_link',$_POST['killping_fb_link']);
					update_option('killping_tw_link',$_POST['killping_tw_link']);
					update_option('killping_youtube_link',$_POST['killping_youtube_link']);
					update_option('killping_google_link',$_POST['killping_google_link']);


		            		update_option('killping_buynow_link',$_POST['killping_buynow_link']);
					update_option('killping_logo_url',$_POST['killping_logo_url']);
					update_option('killping_copyright',$_POST['killping_copyright']);

			?>
			<div id="message">
            Data Saved.
            </div>
			<?php
	}

	?>
	<div class="wrap">
    <h1><?php echo screen_icon();?>Killping global setting</h1>

		<form id="killping_my_form" name="killping_my_form" method="post" action="">

	<fieldset>
	    <legend>Social Link:</legend>
	            <label><h3>Facebook Link<input type="text" name="killping_fb_link" id="killping_fb_link" value="<?php echo get_option('killping_fb_link');?>" /></h3></label>
	            <label><h3>Twitter Link<input type="text" name="killping_tw_link" id="killping_tw_link" value="<?php echo get_option('killping_tw_link');?>" /></h3></label>
	            <label><h3>You Tube Link<input type="text" name="killping_youtube_link" id="killping_youtube_link" value="<?php echo get_option('killping_youtube_link');?>" /></h3></label>
	            <label><h3>Google Link<input type="text" name="killping_google_link" id="killping_google_link" value="<?php echo get_option('killping_google_link');?>" /></h3></label>

	</fieldset>

	<fieldset>
	    <legend> Other Info:</legend>
	            <label><h3>Killping Buy Now Link<input type="text" name="killping_buynow_link" id="killping_buynow_link" value="<?php echo get_option('killping_buynow_link');?>" /></h3></label>
	            <label><h3>Killping Logo URL<input type="text" name="killping_logo_url" id="killping_logo_url" value="<?php echo get_option('killping_logo_url');?>"><h3></label>
	            <label><h3>Copyright<input type="text" name="killping_copyright" id="killping_copyright" value="<?php echo get_option('killping_copyright');?>" /></h3></label>

	</fieldset>
	        <p><input type="submit" name="killping_submit" value="Save" /></p>
	    </form>

    </div>
	<?php

	} /**/
add_action('admin_menu','killping_create_menu');



?>