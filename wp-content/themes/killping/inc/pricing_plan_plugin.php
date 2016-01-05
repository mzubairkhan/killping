<?php

/**
 * Plugin Name: Payment Option Plugin
 * Created by Zubair Khan
 * Software Engineer
 */
class pricing_plan_plugin extends WP_Widget
{


    /**  Widget setup. */
    function pricing_plan_plugin()
    {
        /* Widget settings. */
        $widget_ops = array('classname' => 'pricing_plan_widget', 'description' => __('Displays Pricing Plan Information', 'pricing_plan_widget'));

        /* Widget control settings. */
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'pricing_plan_widget');

        /* Create the widget. */
        $this->WP_Widget('pricing_plan_widget', __('Pricing Plan', 'pricing_plan'), $widget_ops, $control_ops);
    }


    /**
     * How to display the widget on the screen.
     */
    function widget($args, $instance)
    {
        extract($args);

        /* Our variables from the widget settings. */
        $title = $instance['title'];
        $featured_block = $instance['featured_block'];
        #dump_die($instance);
        for ($i = 1; $i <= 3; $i++) {
            $widget_output[] = array(
                'position' => $instance['position-' . $i],
                'last_sold' => $instance['last_sold-' . $i],
                'plane_title' => $instance['plane_title-' . $i],
                'price' => $instance['price-' . $i],
                'discount' => $instance['discount-' . $i],
                'discount_price' => $instance['discount_price-' . $i],
                'plan_period' => $instance['plan_period-' . $i],
                'extra_option' => $instance['extra_option-' . $i]);

        }


        ?>


        <section class="col-xs-12 prc-fold-wrap">
            <div class="container">
                <h1><?php echo $title; ?></h1>

                <div class="col-xs-12 prc-box-main">
                    <?php
                    sort_array_of_array($widget_output, 'position');
                    $count = 1;
                    foreach ($widget_output as $key => $val) {
                    if ($count == 1) {
                        echo ' <div class="col-lg-4 col-lg-push-4 col-md-4 col-md-push-4 col-sm-12 col-xs-12 prc-box hilighted">';
                    } elseif ($count == 2) {
                        echo '<div class="col-lg-4 col-lg-pull-4 col-md-4 col-md-pull-4 col-sm-12 col-xs-12 prc-box">';
                    } else {

                       echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 prc-box">';
                    }
                    ?>
                    <div class="prc-box-inr">
                        <div class="last-sold"><span><b>Last Sold :</b><?php echo $val['last_sold']?></span></div>
                        <h3><span><?php echo $val['plane_title'] ?></span></h3>
                        <div class="dscnt-offer"><?php echo $val['discount']?>% Discount</div>
                        <div class="cut-prc">$<?php echo $val['price']?><span></span></div>
                        <div class="real-prc"><sup>$</sup><?php echo $val['discount_price'] ?>
                            <span class="real-prc-txt"><?php echo $val['plan_period'] ?></span></div>
                        <div class="buynow-cta-wrap"><a class="" href="javascript:void(0);">Buy Now!<i class="fa fa-arrow-right"></i></a><span><?php echo $val['extra_option'] ?></span>
                        </div>
                    </div>
                    <!--/prc-box-inr-->
                </div>
                <!--/prc-box-->
                <?php $count++;
                } ?>
            </div>
            <!--/prc-box-main-->
            </div>
        </section><!--/prc-fold-wrap-->

        <?php
    }

    /**
     * Update the widget settings.
     */
    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = $new_instance['title'];
        $instance['featured_block'] = $new_instance['featured_block'];
        for ($i = 1; $i <= 3; $i++) {
            $instance['position-' . $i] = strip_tags($new_instance['position-' . $i]);
            $instance['last_sold-' . $i] = strip_tags($new_instance['last_sold-' . $i]);
            $instance['plane_title-' . $i] = strip_tags($new_instance['plane_title-' . $i]);
            $instance['price-' . $i] = strip_tags($new_instance['price-' . $i]);
            $instance['discount-' . $i] = strip_tags($new_instance['discount-' . $i]);
            $instance['discount_price-' . $i] = strip_tags($new_instance['discount_price-' . $i]);
            $instance['plan_period-' . $i] = strip_tags($new_instance['plan_period-' . $i]);
            $instance['extra_option-' . $i] = strip_tags($new_instance['extra_option-' . $i]);
        }


        return $instance;
    }

    function form($instance)
    {

        /* Set up some default widget settings. */
        /* $defaults = array('number' => 4);
         $instance = wp_parse_args( (array) $instance, $defaults );*/ ?>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'game_support_widget') ?>
                :</label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
                   value="<?php echo $instance['title']; ?>" size="30"/>
        </p>



        <?php for ($i = 1; $i <= 3; $i++) { ?>
        <div class="option_block">
            <a href="javascript:void(0)" class="option_open">Block <?= $i ?></a>

            <div class="option_content" style="display: none">



                <p>
                  <label for="<?php echo $this->get_field_id('position-' . $i); ?>"><?php _e('Select Position of  Block and press save.', $this->name); ?>:</label>
                            <br/>
                            <select id="<?php echo $this->get_field_id('position-' . $i); ?>"
                                    name="<?php echo $this->get_field_name('position-' . $i); ?>">
                                <?php for ($x = 1; $x <= 3; $x++) { ?>
                                    <option
                                        value="<?php echo $x; ?>" <?php echo ($x == $instance['position-' . $i]) ? "selected='selected'" : "" ?>><?php echo "Position  " . $x; ?></option>
                                <?php } ?>
                            </select>

                        </p>

                <p>
                    <label
                        for="<?php echo $this->get_field_id('last_sold-' . $i); ?>"><?php _e('Last Sold', $this->name); ?>
                        :</label>
                    <br/>
                    <input id="<?php echo $this->get_field_id('last_sold-' . $i); ?>"
                           name="<?php echo $this->get_field_name('last_sold-' . $i); ?>"
                           value="<?php echo $instance['last_sold-' . $i]; ?>"
                           placeholder="<?php _e('Last Sold', $this->name) ?>"
                           size="30"/>
                </p>

                <p>
                    <label
                        for="<?php echo $this->get_field_id('plane_title-' . $i); ?>"><?php _e('Plane Title', $this->name); ?>
                        :</label>
                    <br/>
                    <input id="<?php echo $this->get_field_id('plane_title-' . $i); ?>"
                           name="<?php echo $this->get_field_name('plane_title-' . $i); ?>"
                           value="<?php echo $instance['plane_title-' . $i]; ?>"
                           placeholder="<?php _e('Plane Title', $this->name) ?>"
                           size="30"/>
                </p>


                <p>
                    <label
                        for="<?php echo $this->get_field_id('price-' . $i); ?>"><?php _e('Price ($)', $this->name); ?>
                        :</label>
                    <br/>
                    <input id="<?php echo $this->get_field_id('price-' . $i); ?>"
                           name="<?php echo $this->get_field_name('price-' . $i); ?>"
                           value="<?php echo $instance['price-' . $i]; ?>"
                           placeholder="<?php _e('Price', $this->name) ?>"
                           size="15"/>
                </p>

                <p>
                    <label
                        for="<?php echo $this->get_field_id('discount-' . $i); ?>"><?php _e('Discount (%)', $this->name); ?>
                        :</label>
                    <br/>
                    <input id="<?php echo $this->get_field_id('discount-' . $i); ?>"
                           name="<?php echo $this->get_field_name('discount-' . $i); ?>"
                           value="<?php echo $instance['discount-' . $i]; ?>"
                           placeholder="<?php _e('Discount', $this->name) ?>"
                           size="15"/>
                </p>


                <p>
                    <label
                        for="<?php echo $this->get_field_id('discount_price-' . $i); ?>"><?php _e('Discount Price', $this->name); ?>
                        :</label>
                    <br/>
                    <input id="<?php echo $this->get_field_id('discount_price-' . $i); ?>"
                           name="<?php echo $this->get_field_name('discount_price-' . $i); ?>"
                           value="<?php echo $instance['discount_price-' . $i]; ?>"
                           placeholder="<?php _e('Discount Price', $this->name) ?>"
                           size="15"/></p

                <p>
                    <label
                        for="<?php echo $this->get_field_id('plan_period-' . $i); ?>"><?php _e('Plan Period', $this->name); ?>
                        :</label>
                    <br/>
                    <input id="<?php echo $this->get_field_id('plan_period-' . $i); ?>"
                           name="<?php echo $this->get_field_name('plan_period-' . $i); ?>"
                           value="<?php echo $instance['plan_period-' . $i]; ?>"
                           placeholder="<?php _e('Plan Period', $this->name) ?>"
                           size="30"/>
                </p>

                <p>
                    <label
                        for="<?php echo $this->get_field_id('extra_option-' . $i); ?>"><?php _e('Extra Option', $this->name); ?>
                        :</label>
                    <br/>
                    <input id="<?php echo $this->get_field_id('extra_option-' . $i); ?>"
                           name="<?php echo $this->get_field_name('extra_option-' . $i); ?>"
                           value="<?php echo $instance['extra_option-' . $i]; ?>"
                           placeholder="<?php _e('Extra Option', $this->name) ?>"
                           size="30"/>
                </p>


            </div>
        </div>
        <hr/>
    <?php } ?>

        <hr/>

        <i>Created By Zubair Khan</i>
        <br/>
        <br/>
        <?php
    }
}

