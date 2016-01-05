<?php
/*
Template Name: Supported Games
*/

/* @Created : By Zubair Khan
 * @Software: Engineer
 * @Project : killping.com
 * @January : 2015
 */
get_header(); ?>


<!--main-->
<main>
    <section class="col-xs-12 sg-wrap">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1 class="glb-heading"><?php the_title(); ?></h1>
                <div class="col-lg-8 col-lg-offset-2 col-xs-12 glb-ttl-sub-txt"><?php the_content(); ?></div>
            <?php endwhile; endif; ?>
            <div class="col-xs-12 sg-main">
                <?php $get_games_posts = new WP_Query(array('post_type' => 'supported_games', 'post_status' => 'publish', 'ignore_sticky_posts' => 1)); ?>

                <?php $count = 1;
                while ($get_games_posts->have_posts()): $get_games_posts->the_post(); ?>
                <div class="sg-box-main">
                    <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($popular_posts->ID), "full"); ?>
                    <span class="sg-icon-box">  <!--<img class="img-responsive" src="<?php /*echo $thumb['0'];*/ ?>" />--> </span>
                    <h4><?php the_title(); ?></h4>
                    <p><?php the_content(); ?></p>
                </div>
                <!--/sg-box-main-->
                <?php
                if ($count == 3){?>
                <div class="glb-cta-wrap">
                    <div class="glb-cta-inr">
                        <a class="btn-glb-buynow" href="<?php echo do_shortcode('[buy_now]'); ?>">BUY NOW!<i class="fa fa-arrow-right"></i></a>
                        <span>*30% Lifetime Discount</span>
                    </div>
                </div>
                <!--/glb-cta-wrap-->

            </div>
            <!--/sg-main-->

            <div class="col-xs-12 sg-main">
            <?php $count = 1;}
                $count++;endwhile; ?>
            </div>
            <!--/container-->
    </section>
</main>
<!--main-->

<?php get_footer(); ?>
