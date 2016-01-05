<?php
/**
 * Plugin Name: User Reviews Plugin
 * Created by Zubair Khan
 * Software Engineer
 */

class user_reviews_plugin extends WP_Widget {


    /**
     * Widget setup.
     */
    function user_reviews_plugin() {
        /* Widget settings. */
        $widget_ops = array( 'classname' => 'user_review_widget', 'description' => __('Displays list of posts by ids', 'user_review_widget') );

        /* Widget control settings. */
        $control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'user_review_widget' );

        /* Create the widget. */
        $this->WP_Widget( 'user_review_widget', __('User Reviews ', 'user_review'), $widget_ops, $control_ops );
    }


    /**
     * How to display the widget on the screen.
     */
    function widget( $args, $instance ) {
        extract( $args );

        /* Our variables from the widget settings. */
        $number = $instance['number'];
        $posts = $instance['posts'];
       $user_reiews_link = $instance['user_reiews_link'];

        $post_ids = explode(",",$posts);

        $i = 1;

        $review_post = new WP_Query(array('post_type' => 'user_reviews', 'post__in' => $post_ids , 'showposts' => $number,'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post__in' ));
       //dump_die($popular_posts);
        ?>

        <section class="col-xs-12 user-review-wrap">
                <div class="container">
                    <h2 class="glb-ttl"><b>User</b> Reviews</h2>
                    <div class="user-review-main">
                        <ul class="nav nav-tabs">
                           <?php $x = 1; while($review_post->have_posts()): $review_post->the_post(); ?>
                               <li class="<?php echo $x == 1 ? 'active' : ''; ?>"><a data-toggle="tab" href="#video<?php echo $x;?>"><img src="<?php echo get_template_directory_uri();?>/template/img/video-play-btn.png"></a></li>
                               <?php $x++; endwhile; ?>
                            <li><a class="ur-see-more-btn" href="<?php echo $user_reiews_link;?>">See More <i class="fa fa-long-arrow-right"></i></a></li>
                        </ul>

                        <div class="col-xs-12 tab-content">
                           <?php while($review_post->have_posts()): $review_post->the_post(); ?>


                            <div id="video<?php echo $i;?>" class="tab-pane <?php echo $i == 1 ? 'active' : ''; ?>">
                                <div class="col-md-7 col-sm-12 col-xs-12 user-review-left">
                                    <iframe src="<?php echo get_field('video_url');?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-5 col-sm-12 col-xs-12 user-review-right">
                                    <h4><?php the_title();?></h4>
                                    <span class="user-dtl">User:<b><?php echo get_field('user_name');?></b></span>
                                    <span class="user-dtl">Country:<b> <?php echo get_field('country_name');?></b></span>
                                    <div class="ping-box-main">
                                        <div class="ping-box-inr">
                                            <div class="loader-img"><b><?php echo get_field('ping_before_using');?></b> ms</div>
                                            <span>Ping Before Using</span>
                                            <b>Killping</b>
                                        </div>

                                        <div class="ping-box-divider"><i class="fa fa-angle-right"></i></div>

                                        <div class="ping-box-inr">
                                            <div class="loader-img loader-img2"><b><?php echo get_field('ping_after_using');?></b> ms</div>
                                            <span>Ping After Using</span>
                                            <b>Killping</b>
                                        </div>
                                    </div>
                                    <div class="glb-cta-wrap">
                                        <div class="glb-cta-inr">
                                            <a class="btn-glb-buynow" href="javascript:void(0);">BUY NOW!<i class="fa fa-arrow-right"></i></a>
                                            <span><?php echo get_field('user_review_discount');?></span>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/tab content End-->
                               <?php $i++; endwhile; ?>
                               <?php wp_reset_postdata(); ?>



                        </div>
                    </div>
                </div>
            </section><!--/user-review-wrap-->

<?php
    }
    /**
     * Update the widget settings.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['number'] = strip_tags( $new_instance['number'] );
        $instance['posts'] = strip_tags( $new_instance['posts'] );
        $instance['user_reiews_link'] = strip_tags( $new_instance['user_reiews_link'] );

        return $instance;
    }

    function form( $instance ) {

        /* Set up some default widget settings. */
        $defaults = array('number' => 4);
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <!-- Number of posts -->
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show','sam_widget') ?>:</label>
            <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
        </p>

        <!-- Number of posts -->
        <p>
            <label for="<?php echo $this->get_field_id( 'posts' ); ?>"><?php _e('Which post you want to display separate by comma','sam_widget') ?>:</label>
            <br />
            <input id="<?php echo $this->get_field_id( 'posts' ); ?>" name="<?php echo $this->get_field_name( 'posts' ); ?>" value="<?php echo $instance['posts']; ?>" size="30" />
        </p>

        <!-- User Reviews See More Link -->
               <p>
                   <label for="<?php echo $this->get_field_id( 'User Reviews Link (See More)' ); ?>"><?php _e('User Reviews Link','sam_widget') ?>:</label>
                   <br />
                   <input id="<?php echo $this->get_field_id( 'user_reiews_link' ); ?>" name="<?php echo $this->get_field_name( 'user_reiews_link' ); ?>" value="<?php echo $instance['user_reiews_link']; ?>" size="30" />
               </p>

        <hr />

        <i>Created By Zubair Khan</i>
        <br />
        <br />
    <?php
    }
}
