<?php

/**
 * Plugin Name: Server Stats Plugin
 * Created by Zubair Khan
 * Software Engineer
 */
class server_stats_plugin extends WP_Widget
{
     /**
     * Widget setup.
     */
    function server_stats_plugin()
    {
        /* Widget settings. */
        $widget_ops = array('classname' => 'server_stats_widget', 'description' => __('Displays list of posts by ids', 'server_stats_widget'));

        /* Widget control settings. */
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'server_stats_widget');

        /* Create the widget. */
        $this->WP_Widget('server_stats_widget', __('Server Stats ', 'server_stats'), $widget_ops, $control_ops);
    }


    /**
     * How to display the widget on the screen.
     */
    function widget($args, $instance)
    {
        extract($args);

        /* Our variables from the widget settings. */
        $number = $instance['number'];
        $posts = $instance['posts'];
        $discount = $instance['discount'];

        $post_ids = explode(",", $posts);
        $continent = "asia";
        ?>

        <section class="col-xs-12 server-stats-wrap">
            <div class="container">
                <h2 class="glb-ttl">Kill Ping <b>Server Stats</b></h2>

                <div class="col-xs-12 server-stats-tbl-main">
                    <div class="table-responsive">
                        <table class="table server-stats-tbl">
                            <thead>
                            <tr>
                                <th>Regions</th>
                                <th>Server Locations</th>
                                <th>No. of Players</th>
                                <th>Ping Improvement</th>
                                <th>Server Status</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $count = 1;
                            $get_continent_post = new WP_Query(array('post_type' => 'server_stats', 'server_stats_category' => $continent, 'showposts' => $number, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post__in'));
                            $wordwide_servers = array();
                            while ($get_continent_post->have_posts()): $get_continent_post->the_post();
                                $totalcol = $get_continent_post->post_count;?>
                                <tr>
                                <?php if ($count == 1) { ?>
                                    <td class="region-ttl" rowspan="<?php echo $totalcol; ?>">Your Region</td><?php } ?>
                                    <td><div class="server-location-col"><span class="flag flag-<?php echo get_field('flage'); ?>"></span><?php the_title(); ?></div></td>
                                    <td class="player-status"><span><?php echo get_field('number_of_players'); ?></span></td>
                                    <td class="ping-status"><span><?php echo get_field('ping_improvement'); ?>%</span></td>
                                    <td class="server-status"><span>Online</span></td>
                                </tr>

                                <?php
                                array_push($wordwide_servers, get_the_ID());
                                $count++; endwhile; ?>
                                <?php wp_reset_postdata(); ?>

                            <?php
                            $counter = 1;
                            $world_wide_post = new WP_Query(array('post_type' => 'server_stats', 'post__not_in' => $wordwide_servers, 'showposts' => $number, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post__in'));
                            while ($world_wide_post->have_posts()): $world_wide_post->the_post();
                            $totalcols = $world_wide_post->post_count;?>
                                    <tr>
                                    <?php if ($counter == 1) { ?>
                                        <td class="region-ttl" rowspan="<?php echo $totalcols; ?>">World Wide</td><?php } ?>
                                        <td><div class="server-location-col"><span class="flag flag-<?php echo get_field('flage'); ?>"></span><?php the_title(); ?></div></td>
                                        <td class="player-status"><span><?php echo get_field('number_of_players'); ?></span></td>
                                        <td class="ping-status"><span><?php echo get_field('ping_improvement'); ?>%</span></td>
                                        <td class="server-status"><span>Online</span></td>
                                    </tr>
                                <?php $counter++;endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="glb-cta-wrap">
                    <div class="glb-cta-inr">
                        <a class="btn-glb-buynow" href="<?php echo do_shortcode('[buy_now]'); ?>">BUY NOW!<i
                                class="fa fa-arrow-right"></i></a>
                        <span><?php echo $discount; ?></span>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }

    /**
     * Update the widget settings.
     */
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['number'] = strip_tags($new_instance['number']);
        $instance['posts'] = strip_tags($new_instance['posts']);
        $instance['discount'] = strip_tags($new_instance['discount']);

        return $instance;
    }

    function form($instance)
    {

        /* Set up some default widget settings. */
        $defaults = array('number' => 4);
        $instance = wp_parse_args((array)$instance, $defaults); ?>

        <!-- Number of posts -->
        <p>
            <label
                for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Server Stats to show', 'server_stats_widget') ?>
                :</label>
            <input id="<?php echo $this->get_field_id('number'); ?>"
                   name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>"
                   size="3"/>
        </p>

        <!-- Number of posts -->
        <p>
            <label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Which Server Stats you want to display just type post ID with separate by comma', 'server_stats_widget') ?>:</label>
            <br/>
            <input id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" size="30"/>
        </p>

        <!-- User Reviews See More Link -->
        <p>
            <label for="<?php echo $this->get_field_id('Discount'); ?>"><?php _e('Discount', 'server_stats_widget') ?>:</label>
            <br/>
            <input id="<?php echo $this->get_field_id('discount'); ?>" name="<?php echo $this->get_field_name('discount'); ?>" value="<?php echo $instance['discount']; ?>" size="30"/>
        </p>

        <hr/>

        <i>Created By Zubair Khan</i>
        <br/>
        <br/>
        <?php
    }
}
