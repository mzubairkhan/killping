<?php
ob_start();

/**
 * Plugin Name: Game Support Plugin
 * Created by Zubair Khan
 * Software Engineer
 */
class recently_subscribed_plugin extends WP_Widget
{


    /**
     * Widget setup.
     */
    function recently_subscribed_plugin()
    {
        /* Widget settings. */
        $widget_ops = array('classname' => 'recently_subscribed_widget', 'description' => __('Displays Recently Subscribed', 'recently_subscribed_widget'));

        /* Widget control settings. */
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'recently_subscribed_widget');

        /* Create the widget. */
        $this->WP_Widget('recently_subscribed_widget', __('Recently Subscribed', 'recently_subscribed'), $widget_ops, $control_ops);
    }


    /**
     * How to display the widget on the screen.
     */
    function widget($args, $instance)
    {
        extract($args);

        $title = $instance['title'];


        $recent_subscribes = array(
            0 => array(
                array("country_code" => "cg", "name" => "Robert", "time" => "12 mins 10 secs ago", "plane" => "Monthly Plan"),
                array("country_code" => "ae", "name" => "John", "05 mins 14 secs ago", "plane" => "12 Months Plan"),
                array("country_code" => "ag", "name" => "Clark", "15 mins 21 secs ago", "plane" => "6 Monthly Plan"),
                array("country_code" => "at", "name" => "Shawn", "10 mins 22 secs ago", "plane" => "4 Monthly Plan"),
                array("country_code" => "bn", "name" => "Doe", "12 mins 10 secs ago", "plane" => "12Monthly Plan")
            ),
            1 => array(
                array("country_code" => "ag", "name" => "Clark", "time" => "15 mins 21 secs ago", "plane" => "6 Monthly Plan"),
                array("country_code" => "at", "name" => "Shawn", "time" => "10 mins 22 secs ago", "plane" => "4 Monthly Plan"),
                array("country_code" => "cg", "name" => "Robert", "time" => "12 mins 10 secs ago", "plane" => "Monthly Plan"),
                array("country_code" => "ae", "name" => "John", "time" => "05 mins 14 secs ago", "plane" => "12 Months Plan"),
                array("country_code" => "bn", "name" => "Doe", "time" => "12 mins 10 secs ago", "plane" => "12Monthly Plan")
            ),
            2 => array(
                array("country_code" => "bn", "name" => "Doe", "time" => "12 mins 10 secs ago", "plane" => "12Monthly Plan"),
                array("country_code" => "cg", "name" => "Robert", "time" => "12 mins 10 secs ago", "plane" => "Monthly Plan"),
                array("country_code" => "at", "name" => "Shawn", "time" => "10 mins 22 secs ago", "plane" => "4 Monthly Plan"),
                array("country_code" => "ae", "name" => "John", "time" => "05 mins 14 secs ago", "plane" => "12 Months Plan"),
                array("country_code" => "ag", "name" => "Clark", "time" => "15 mins 21 secs ago", "plane" => "6 Monthly Plan")

            )
        );


        ?>
        <section class="col-xs-12 recent-subs-wrap">
            <div class="container">
                <h2><?php echo $title; ?></h2>
                <marquee class="recent-subs-main" behavior="" direction="">
                    <ul class="recent-subs-list">
                        <?php

                        if (isset($_COOKIE['subscribed'])) {
                            $rand = $_COOKIE['subscribed'];
                        } else {
                            $rand = array_rand($recent_subscribes, 1);
                            setcookie('subscribed', $rand, time() + (7 * DAY_IN_SECONDS));
                        }
                        ob_flush();
                        ?>
                        <?php
                        foreach ($recent_subscribes[$rand] as $k => $v) {
                            ?>
                            <li>
                                <div class="user-dtl"><span
                                        class="flag flag-<?php echo $v["country_code"] ?>"></span><?php echo $v["name"] ?>
                                </div>
                                <span class="time-dtl"><?php echo $v["time"] ?></span>
                                <b><?php echo $v["plane"] ?></b>
                            </li>
                        <?php } ?>
                    </ul>
                </marquee>
            </div>
        </section><!--/recent-subs-wrap-->
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
        return $instance;
    }

    function form($instance)
    {
        /* Set up some default widget settings. */
        $defaults = array('number' => 4);
        $instance = wp_parse_args((array)$instance, $defaults); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'game_support_widget') ?>
                :</label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
                   value="<?php echo $instance['title']; ?>" size="30"/>
        </p>

        <i>Created By Zubair Khan</i>
        <br/>
        <br/>
        <?php
    }
}
