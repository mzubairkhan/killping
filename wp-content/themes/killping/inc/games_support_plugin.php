<?php
/**
 * Plugin Name: Game Support Plugin
 * Created by Zubair Khan
 * Software Engineer
 */

class game_support_plugin extends WP_Widget {


    /**  Widget setup. */
    function game_support_plugin() {
        /* Widget settings. */
        $widget_ops = array( 'classname' => 'game_support_widget', 'description' => __('Displays Game Supports Information', 'game_support_widget') );

        /* Widget control settings. */
        $control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'game_support_widget' );

        /* Create the widget. */
        $this->WP_Widget( 'game_support_widget', __('Game Support', 'game_support'), $widget_ops, $control_ops );
    }


    /**
     * How to display the widget on the screen.
     */
    function widget( $args, $instance ) {
        extract( $args );

        /* Our variables from the widget settings. */
        $title = $instance['title'];
        $description = $instance['description'];
        $image_text = $instance['image_text'];
        $discount = $instance['discount'];

        ?>


        <section class="col-xs-12 game-sprt-wrap">
               <div class="container">
                   <h2 class="glb-ttl"><?php echo $title; ?></b></h2>
                   <div class="glb-ttl-sub-txt"><?php echo $description; ?></div>
                   <div class="col-lg-offset-1 col-lg-10 game-sprt-main">
                      <?php echo $image_text;?>
                       <div class="glb-cta-wrap">
                           <div class="glb-cta-inr">
                               <a class="btn-glb-buynow" href="javascript:void(0);">BUY NOW!<i class="fa fa-arrow-right"></i></a>
                               <span><?php echo $discount;?></span>
                           </div>
                       </div>
                   </div>
               </div>
           </section><!--/game-sprt-wrap-->
<?php
    }
    /**
     * Update the widget settings.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;



        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = $new_instance['title'];

        $instance['description'] = strip_tags( $new_instance['description'] );
        $instance['image_text'] =  $new_instance['image_text'];
        $instance['discount'] = strip_tags( $new_instance['discount'] );

        return $instance;
    }

    function form( $instance ) {

        /* Set up some default widget settings. */
        $defaults = array('number' => 4);
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','game_support_widget') ?>:</label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" size="30" />
        </p>

        <!-- Number of description -->
        <p>
            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e('Description','game_support_widget') ?>:</label>
            <br />
            <textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"  cols="30"><?php echo $instance['description']; ?></textarea>
        </p>

        <!-- User Reviews See More Link -->
         <p>
             <label for="<?php echo $this->get_field_id( 'image_text' ); ?>"><?php _e('HTML Of Image', 'game_support_widget') ?>:</label>
             <br />
             <textarea id="<?php echo $this->get_field_id( 'image_text' ); ?>" name="<?php echo $this->get_field_name( 'image_text' ); ?>"  cols="30"><?php echo $instance['image_text']; ?></textarea>
         </p>


        <!-- User Reviews See More Link -->
        <p>
            <label for="<?php echo $this->get_field_id( 'discount' ); ?>"><?php _e('Discount','game_support_widget') ?>:</label>
            <br />
            <input id="<?php echo $this->get_field_id( 'discount' ); ?>" name="<?php echo $this->get_field_name('discount'); ?>" value="<?php echo $instance['discount']; ?>" size="30" />
        </p>

        <hr />

        <i>Created By Zubair Khan</i>
        <br />
        <br />
    <?php
    }
}
