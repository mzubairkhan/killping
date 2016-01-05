<?php
/**
 * Plugin Name: Features Icon Plugin
 * Created by Zubair Khan
 * Software Engineer
 */

class features_icon_plugin extends WP_Widget {


    /**  Widget setup. */
    function features_icon_plugin() {
        /* Widget settings. */
        $widget_ops = array( 'classname' => 'features_icon_widget', 'description' => __('Displays Features Icon Information', 'features_icon_widget') );

        /* Widget control settings. */
        $control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'features_icon_widget' );

        /* Create the widget. */
        $this->WP_Widget( 'features_icon_widget', __('features icon', 'features_icon'), $widget_ops, $control_ops );
    }


    /**
     * How to display the widget on the screen.
     */

    function widget( $args, $instance ) {
        extract( $args );

        /* Our variables from the widget settings. */
        $title = $instance['title'];
        $description = $instance['description'];
        $count_list = $instance['count_list'];
        $discount = $instance['discount'];

        for ($i = 1; $i <=$instance['count_list']; $i++) {
            if ($instance['feature-title-' . $i] !== '') {
                 $widget_output[] = array(
                             'feature-class' => $instance['feature-class-' . $i],
                             'feature-title' => $instance['feature-title-' . $i],
                             'feature-desc' => $instance['feature-desc-' . $i]);
            }
            }?>

    <section class="col-xs-12 fetr-fold-wrap">
            <div class="container">
              <h1 class="glb-heading"><?php echo $title;?></h1>
              <p class="glb-ttl-sub-txt"><?php echo $description;?></p>
                <div class="col-xs-12 fetr-fold-main">
                <?php for ($i = 1; $i<= $instance['count_list']; $i++){
                                if ($instance['feature-title-' . $i] !== '') {
                                $widget_output[] = array(
                                    'feature-class' => $instance['feature-class-' . $i],
                                    'feature-title' => $instance['feature-title-' . $i],
                                    'feature-desc' => $instance['feature-desc-' . $i]);
                                }
                }

                        foreach($widget_output as $key => $val) {   ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 fetr-box">
                                <span class="fetr-<?= $val['feature-class']; ?>"></span>
                                    <h4><?= $val['feature-title']; ?></h4>
                                    <p><?= $val['feature-desc']; ?></p>
                            </div>
                        <?php } ?>

                </div><!--/fetr-fold-main-->
                        <div class="glb-cta-wrap">
                            <div class="glb-cta-inr">
                                <a class="btn-glb-buynow" href="<?php echo do_shortcode('[buy_now]'); ?>">BUY NOW!<i class="fa fa-arrow-right"></i></a>
                                <span><?php echo $discount;?></span>
                            </div>
                        </div>
                    <!--</div>-->
            </section><!--/fetr-fold-wrap-->


<?php
    }
    /**
     * Update the widget settings.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
       // dump_die($instance['count_list']);



        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = $new_instance['title'];
        $instance['description'] = strip_tags( $new_instance['description'] );
        $instance['count_list'] = $new_instance['count_list'];
        $instance['discount'] = strip_tags( $new_instance['discount'] );

       // * Strip tags for title and name to remove HTML (important for text inputs). */
         for ($i = 1; $i <= $instance['count_list']; $i++) {
             $instance['feature-class-'.$i] = strip_tags( $new_instance['feature-class-'.$i] );
             $instance['feature-title-'.$i] = strip_tags( $new_instance['feature-title-'.$i] );
             $instance['feature-desc-'.$i] = strip_tags( $new_instance['feature-desc-'.$i] );
         }










          /*foreach($widget_output as $key => $val) {   */?><!--
              <div class="col-lg-6 col-md-6 col-sm-6 torrent_secFtr-subContent">
                  <div class="row">
                      <span class="col-lg-3 col-md-3 col-sm-4 col-xs-12 torrent_secFtr-icn <?/*=$prefix_class . $val['feature-class']; */?>"></span>
                      <article style="text-align: left;" class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                          <h3><?/*= $val['feature-title']; */?></h3>
                          <p><?/*= $val['feature-desc']; */?></p>
                      </article>
                  </div>
              </div>
          --><?php /*}*/


    return $instance;
    }

    function form( $instance ) {

        /* Set up some default widget settings. */
       // $defaults = array('number' => 4);
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

        <!-- discount -->
        <p>
                  <label for="<?php echo $this->get_field_id( 'discount' ); ?>"><?php _e('Discount','game_support_widget') ?>:</label>
                  <br />
                  <input id="<?php echo $this->get_field_id( 'discount' ); ?>" name="<?php echo $this->get_field_name('discount'); ?>" value="<?php echo $instance['discount']; ?>" size="30" />
        </p>

        <p>
           <label for="<?php echo $this->get_field_id( 'count_list' ); ?>"><?php _e('Select list count and press save.', $this->name); ?>:</label>
            <br/>
           <select id="<?php echo $this->get_field_id('count_list'); ?>" name="<?php echo $this->get_field_name('count_list'); ?>">
               <?php for($x=3; $x <= 12; $x+=3) {?>
                   <option value="<?php echo $x; ?>" <?php echo ($x == $instance['count_list'])?"selected='selected'":""?>><?php echo $x; ?></option>
               <?php } ?>
           </select>

         </p>

        <?php for ($i = 1; $i<= $instance['count_list']; $i++) { ?>
        <div class="option_block">
                        <a href="javascript:void(0)" class="option_open">Option <?=$i?></a>
                            <div class="option_content" style="display: none">

                   <p>
                        <label for="<?php echo $this->get_field_id('feature-class-' . $i); ?>"><?php _e('Class', $this->name); ?>:</label>
                               <br />
                       <input id="<?php echo $this->get_field_id('feature-class-' . $i); ?>"
                              name="<?php echo $this->get_field_name('feature-class-' . $i); ?>"
                              value="<?php echo $instance['feature-class-' . $i]; ?>"
                              placeholder="<?php _e('Class', $this->name) ?>"
                              size="30"/>
                   </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('feature-title-' . $i); ?>"><?php _e('Title', $this->name); ?>:</label>
                               <br />
                       <input id="<?php echo $this->get_field_id('feature-title-' . $i); ?>"
                              name="<?php echo $this->get_field_name('feature-title-' . $i); ?>"
                              value="<?php echo $instance['feature-title-' . $i]; ?>"
                              placeholder="<?php _e('Title', $this->name) ?>"
                              size="30"/>
                   </p>

                   <p>
                       <label for="<?php echo $this->get_field_id('feature-desc-' . $i); ?>"><?php _e('Description', $this->name); ?>:</label>
                              <br />
                       <textarea name="<?php echo $this->get_field_name('feature-desc-' . $i); ?>"
                                 id="<?php echo $this->get_field_id('feature-desc-' . $i); ?>"
                                 cols="30" rows="5"
                                 placeholder="<?php _e('Description', $this->name) ?>"><?php echo $instance['feature-desc-' . $i]; ?></textarea>
                   </p>
                            </div>
                    </div>
                    <hr/>
               <?php } ?>

        <hr />

        <i>Created By Zubair Khan</i>
        <br />
        <br />
    <?php
    }
}

