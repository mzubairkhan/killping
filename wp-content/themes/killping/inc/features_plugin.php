<?php
/**
 * Plugin Name: Feature Slider Posts
 * Created by Zubair Khan
 * Software Engineer
 */

class featured_plugin extends WP_Widget {


    /**
     * Widget setup.
     */
    function featured_plugin() {
        /* Widget settings. */
        $widget_ops = array( 'classname' => 'sam_widget', 'description' => __('Displays list of posts by ids', 'sam_widget') );

        /* Widget control settings. */
        $control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'sam_widget' );

        /* Create the widget. */
        $this->WP_Widget( 'sam_widget', __('Featured Slider', 'sam'), $widget_ops, $control_ops );
    }


    /**
     * How to display the widget on the screen.
     */
    function widget( $args, $instance ) {
        extract( $args );

        /* Our variables from the widget settings. */
        $number = $instance['number'];
        $posts = $instance['posts'];
        $post_ids = explode(",",$posts);

        $i = 1;
        $popular_posts = new WP_Query(array('post_type' => 'features_slider', 'post__in' => $post_ids , 'showposts' => $number,'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post__in' ));
       // dump_die($popular_posts);
        ?>


<section class="col-xs-12 slider-fold-wrap">
       	            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
       	                <!-- Carousel indicators -->
       	                <ol class="carousel-indicators">
                    <?php $x = 0; while($popular_posts->have_posts()): $popular_posts->the_post(); ?>
       	                    <li data-target="#myCarousel" data-slide-to="<?php echo $x; ?>" class="<?php echo $x == 0 ? 'active' : ''; ?>"></li>
                        <?php $x++; endwhile; ?>
       	                </ol>
       	                <!-- Wrapper for carousel items -->

       	                <div class="carousel-inner">

                    <?php while($popular_posts->have_posts()): $popular_posts->the_post(); ?>
       	                    <div class="item <?php echo $i == 1 ? 'active' : ''; ?>">
       	                        <div class="slide-box <?php echo "slide-box".$i;?>">
       	                            <div class="container">
       	                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 slide-box-left">
       	                                    <h2><?php the_title();?></h2>
       	                                    <p><?php echo get_the_content(); ?></p>
       	                                    <div class="glb-cta-wrap">
       	                                        <div class="glb-cta-inr">
       	                                            <a class="btn-glb-buynow" href="<?php  echo get_field('buy_url');?>">BUY NOW!<i class="fa fa-arrow-right"></i></a>
       	                                            <span><?php  echo get_field('discount');?></span>
       	                                        </div>
       	                                    </div>
       	                                </div>
       	                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 slide-box-right">
       	                                    <div class="slide-box-right-frame">
                                                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $popular_posts->ID ), "full");?>
                                                <img alt="" class="img-responsive" src="<?php echo $thumb['0'];?>">
       	                                    </div>
       	                                </div>
       	                            </div>
       	                        </div>

       	                    </div>
                        <?php $i++; endwhile; ?>
                         <?php wp_reset_postdata(); ?>
                        </div>
       	                <!-- Carousel controls -->
       	                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
       	                    <span class="arrow-left"></span>
       	                </a>
       	                <a class="carousel-control right" href="#myCarousel" data-slide="next">
       	                    <span class="arrow-right"></span>
       	                </a>
       	            </div>
       	    </section><!--/slider-fold-wrap-->
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

        return $instance;
    }

    function form( $instance ) {

        /* Set up some default widget settings. */
        $defaults = array('number' => 3);
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

        <hr />

        <i>Created By Zubair Khan</i>
        <br />
        <br />
    <?php
    }
}
