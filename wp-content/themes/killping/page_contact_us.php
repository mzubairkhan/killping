<?php
/*
Template Name: Contact us
*/

/* @Created : By Zubair Khan
 * @Software: Engineer
 * @Project : Killping.com
 * @January : 2015
 */
get_header()
?>
    <!--main-->
   <main>
       <section class="col-xs-12 custom-top">
           <div class="container">
               <div class="col-xs-12">
                   <h1 class="glb-heading"><?php echo the_title();?></h1>
                   <p class="glb-ttl-sub-txt"><?php  echo get_field('contact_us_sub_title');?></p>
               </div>
           </div>
       </section>
       <section class="col-xs-12 custom-main">
           <div class="container">
               <p class="contact-txt"><?php the_content();?></p>
               <div class="col-md-8 col-xs-12 conatct-main">

                   <form action="javascript:void(0)" role="form" method="post" id="contact-form">
                       <div class="contact-form-group">
                           <input class="form-control" id="fullName" type="text" name="full_name" placeholder="Full Name">
                           <input class="form-control email-field" id="email" type="text" name="user_email" placeholder="Email Address">
                           <textarea class="form-control" rows="5"   id="message" name="message" placeholder="Your Message"></textarea>
                           <div id="form-messages"></div>
                           <button type="submit" id="form-submit"><i class="fa fa-envelope contact-us-submit"></i> Send Message</button>
                       </div>
                   </form>
               </div>
           </div>
       </section>
       <section class="col-xs-12 conatct-btm">
           <div class="container">
               <div class="col-md-6 col-xs-6">
                   <h4>Mailing Address:</h4>
                   <p><?php  echo get_field('mailing_address');?></p>
               </div>
               <div class="col-md-6 col-xs-6">
                   <h4>Email Address:</h4>
                   <?php  echo get_field('email_address');?>
               </div>
           </div>
       </section>
   </main>
   <!--main-->





<?php get_footer(); ?>