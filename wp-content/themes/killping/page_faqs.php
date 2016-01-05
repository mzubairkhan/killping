<?php
/*
Template Name: FAQ
*/

/* @Created : By Zubair Khan
 * @Software: Engineer
 * @Project : killping.com
 * @January : 2015
 */
get_header();
?>
    <!--main-->
<main>
    <section class="col-xs-12 custom-top">
        <div class="container">
            <div class="col-xs-12">
                <h1 class="glb-heading">Frequently Asked Questions</h1>
                <p class="glb-ttl-sub-txt">All the Help & Support You Need to Use Kill Ping</p>

                <div class="search-box-main">
                    <form action="javascript:void(0)" role="search" method="post" id="search">
                    <span class="search-box-field">
                        <input type="text" name="searching_text" id="searching_text" placeholder="Search you desire questions here">
                        <a href="javascript:void(0)" onclick="clear_field()" class="text_clear searchclear"><i class="fa fa-times"></i></a>
</span>
                        <button type="submit" id="faq_submit" ></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="col-xs-12 custom-main">
        <div class="container">
            <div class="col-xs-12">
                <div class="panel-group" id="accordion">
                    <div id="faq_serach">

                    <?php
                    $count=1;
                    $get_faq_posts = new WP_Query(array('post_type' => 'faq','post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post__in' ));
                    while($get_faq_posts->have_posts()): $get_faq_posts->the_post(); ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="faq-ques collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count;?>"><?php the_title();?></a>
                            </h4>
                        </div><!-- /panel-heading-->
                        <div id="collapse<?php echo $count;?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p><?php the_content();?></p>
                            </div>

                            <div class="faq-votes-box">
                                <span>Was it helpful?</span>
                                <?php $postid = get_the_ID(); ?>
                                <a  class="voting"  data-post_id="<?php echo $postid; ?>" data-post_voting="yes" href="javascript:void(0);" >Yes</a>
                                <a  class="voting"  data-post_id="<?php echo $postid; ?>" data-post_voting="no" href="javascript:void(0);" >No</a>
                            </div>
                        </div><!-- /panel-collapse-->
                    </div><!-- /panel-default-->
                        <?php $count++;
                    endwhile; ?>
                      </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!--main-->
<?php get_footer();?>