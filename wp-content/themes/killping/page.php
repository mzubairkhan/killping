<?php get_header(); ?>



<!--main-->
<main>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="col-xs-12 custom-top">
        <div class="container">
            <div class="col-xs-12">
                <h1 class="glb-heading"><?php the_title(); ?></h1>
                <p class="glb-ttl-sub-txt"><?php  echo get_field('sub_title');?></p>
            </div>
        </div>
    </section>
    <section class="col-xs-12 custom-main">
        <div class="container">
            <div class="col-xs-12 polices-main">
				<?php the_content(); ?>
            </div>
        </div>
    </section>
<?php endwhile; endif; ?>

</main>
<!--main-->


<?php get_footer(); ?>