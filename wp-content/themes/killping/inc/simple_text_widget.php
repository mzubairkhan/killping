<?php
/**
 * Plugin Name: Simple Text Widget
 * Created by Zubair Khan
 * Software Engineer
 */

class simple_text_widget extends WP_Widget {

    public $name = 'simple_text_widget';
    public $plugin_name = 'Simple Text Widget';
    public $description = 'Display Text in Widget';
    /**
     * Widget setup.
     */
    function simple_text_widget() {

        /* Widget settings. */
        $widget_ops = array( 'classname' => $this->name, 'description' => __($this->description, $this->name) );

        /* Widget control settings. */
        $control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => $this->name );

        /* Create the widget. */
        $this->WP_Widget( $this->name, __($this->plugin_name, $this->name), $widget_ops, $control_ops );
    }

    /**
     * How to display the widget on the screen.
     */
    function widget( $args, $instance ) {
        extract( $args );

        $widget_id = $args['id'];
        /* Our variables from the widget settings. */

        $content = $instance['content'];

        echo do_shortcode( $content );

    }
    /**
     * Update the widget settings.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;



        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['content'] =  $new_instance['content'];
        return $instance;
    }

    function form( $instance ) {

        /* Set up some default widget settings. */
        $defaults = array(


        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title',$this->name) ?>:</label>
            <br />
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" size="30" />
        </p>

        <!-- Content -->
        <p>
            <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e('Content',$this->name) ?>:</label>
            <br />
            <textarea id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" style="margin: 0px; width: 100%; height: 138px;"> <?php echo $instance['content']; ?> </textarea>
        </p>



        <hr />

        <i><?php echo $this->name ?> - Created By Zubair Khan</i>
        <br />
        <br />
    <?php
    }
}
