<?php
/**
 * Plugin Name: Payment Option Plugin
 * Created by Zubair Khan
 * Software Engineer
 */

class payment_option_plugin extends WP_Widget {


    /**  Widget setup. */
    function payment_option_plugin() {
        /* Widget settings. */
        $widget_ops = array( 'classname' => 'payment_option_widget', 'description' => __('Displays Payment Option Information', 'payment_option_widget') );

        /* Widget control settings. */
        $control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'payment_option_widget' );

        /* Create the widget. */
        $this->WP_Widget( 'payment_option_widget', __('Payment Option', 'payment_option'), $widget_ops, $control_ops );
    }


    /**
     * How to display the widget on the screen.
     */
    function widget( $args, $instance ) {
        extract( $args );

        /* Our variables from the widget settings. */
        $title = $instance['title'];
        $classes = $instance['class'];
        $plane_link = $instance['link'];

        $class = explode(",", $classes);


        ?>
<section class="col-xs-12 payment-method-wrap">
               <div class="container">
                   <h3 class="payment-ttl"> <?php echo $title;?></h3>

                   <div class="payment-methods">
                   <?php
                   foreach($class as $cal){?>
                       <span class="<?php echo $cal; ?>"></span>
                    <?php  }?>
                    </div>
                   <div class="payment-right"><a href="<?php echo $plane_link;?>">Start with Monthly Plan<i class="fa fa-long-arrow-right"></i></a></div>
               </div>
           </section><!--/payment-method-wrap-->

<?php
    }
    /**
     * Update the widget settings.
     */
    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;



        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = $new_instance['title'];
        $instance['class'] = strip_tags( $new_instance['class'] );
        $instance['plane_link'] =  $new_instance['plane_link'];


        return $instance;
    }

    function form( $instance ) {

        /* Set up some default widget settings. */
       /* $defaults = array('number' => 4);
        $instance = wp_parse_args( (array) $instance, $defaults );*/ ?>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','game_support_widget') ?>:</label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" size="30" />
        </p>

       <!-- User Reviews See More Link -->
         <p>
             <label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e('Which payment option you want to display separate by comma', 'payment_option_plugin') ?>:</label>
             <br />
             <input id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name('class'); ?>" value="<?php echo $instance['class']; ?>" size="30" />
         </p>


        <!-- User Reviews See More Link -->
        <p>
            <label for="<?php echo $this->get_field_id( 'plane_link' ); ?>"><?php _e('Plane Link','payment_option_plugin') ?>:</label>
            <br />
            <input id="<?php echo $this->get_field_id( 'plane_link' ); ?>" name="<?php echo $this->get_field_name('plane_link'); ?>" value="<?php echo $instance['plane_link']; ?>" size="30" />
        </p>

        <hr />

        <i>Created By Zubair Khan</i>
        <br />
        <br />
    <?php
    }
}
