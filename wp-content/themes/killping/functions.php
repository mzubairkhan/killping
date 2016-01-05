<?php
/*
 * Global Variables
 * */
define("BANNER", true);
$base_url  = get_bloginfo('url');
$theme_url = get_bloginfo('template_url');
$theme_dir = get_template_directory();

 function base_url(){
     global $base_url;
     return $base_url;
 }

 function theme_url(){
     global $theme_url;
     return $theme_url;
 }

function theme_dir(){
    global $theme_dir;
    return $theme_dir;
}
//** Include Feature Slider Plugin **//
require __DIR__ . '/inc/post-types.php';

//** Include Post Types **//
require __DIR__ . '/inc/features_plugin.php';


//** Include User Review**//
require __DIR__ . '/inc/user_reviews_plugin.php';

//** Include Server Stats**//
require __DIR__ . '/inc/server_stats_plugin.php';

//** Include Games support**//
require __DIR__ . '/inc/games_support_plugin.php';

//** Include Recently Subscribed **//
require __DIR__ . '/inc/recently_subscribed_plugin.php';

//** Include Features Icon **//
require __DIR__ . '/inc/features_icon_plugin.php';


//** Include Simple Text  **//
require __DIR__ . '/inc/simple_text_widget.php';

//** Include Payment Option  **//
require __DIR__ . '/inc/payment_option_plugin.php';

//** Include Pricing plan  **//
require __DIR__ . '/inc/pricing_plan_plugin.php';

//** Include User Review**//
require __DIR__ . '/inc/shortcodes.php';

//** Include FAQ Serach**//
require __DIR__ . '/inc/faq_search.php';



//** Register and enqueue scripts and styles **//

function ub_scripts_styles()
{

    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');

    //** Register and enqueue all scripts **//

    wp_register_script('ub_jquery', get_template_directory_uri() . '/template/js/jquery-1.11.3.min.js', '', '1.11.1', true);
    wp_register_script('ub_bootstrap_min', get_template_directory_uri() . '/template/js/bootstrap.min.js', '', '1.11.1', true);
    wp_register_script('ub_custom', get_template_directory_uri() . '/template/js/custom.js', '', '', true);

    wp_enqueue_script('ub_jquery', array(), '1.11.1', true);
    wp_enqueue_script('ub_bootstrap_min', array(), '1.11.1', true);
    wp_enqueue_script('ub_custom', array(), '1.0.0', true);

    //** Register and enqueue all stylesheets **//

    wp_register_style('ub_bootstrap', get_template_directory_uri() . '/template/css/bootstrap.min.css');
    wp_register_style('ub_font-awesome', get_template_directory_uri() . '/template/css/font-awesome.min.css');
    wp_register_style('ub_fonts', get_template_directory_uri() . '/template/css/fonts.css');
    wp_register_style('ub_custom', get_template_directory_uri() . '/template/css/custom.css');

    wp_enqueue_style('ub_bootstrap');
    wp_enqueue_style('ub_font-awesome');
    wp_enqueue_style('ub_fonts');
    wp_enqueue_style('ub_custom');

}

add_action('wp_enqueue_scripts', 'ub_scripts_styles', 1);

// Add RSS links to <head> section
automatic_feed_links();

// Load jQuery
if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false);
    wp_enqueue_script('jquery');
}

// Clean up the <head>
function removeHeadLinks()
{
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}

add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Declare sidebar widget zone
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id' => 'sidebar-widgets',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
            'name' => 'Home Widgets',
            'Description' => 'Description',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '')
    );

    register_sidebar(array(
                'name' => 'Features Widgets',
                'Description' => 'Description',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '')
    );


    register_sidebar(array(
                    'name' => 'Pricing Widgets',
                    'Description' => 'Description',
                    'before_widget' => '',
                    'after_widget' => '',
                    'before_title' => '',
                    'after_title' => '')
        );

    register_widget('featured_plugin');
    register_widget('user_reviews_plugin');
    register_widget('server_stats_plugin');
    register_widget('game_support_plugin');
    register_widget('recently_subscribed_plugin');
    register_widget('features_icon_plugin');
    register_widget('simple_text_widget');
    register_widget('payment_option_plugin');
    register_widget('pricing_plan_plugin');

}

//** WP Actions **//

add_action('init', 'removeHeadLinks');

remove_action('wp_head', 'wp_generator');

//Thumbnails Functions
add_theme_support('post-thumbnails');

//add_image_size( 'small-featured', 300, 9999 ); // image 300px wide
//add_image_size( 'small-cropped', 200, 200, true ); // 200px height/width
add_image_size('slider-cropped', 960, 409, true); // Creates a cropped new

function load_script_admin() {

echo '<style>
              .option_open{
              background-color: #d3d3d3;
              color: #000;
              width: 100%;
              float: left;
              padding: 8px 5px;
              text-decoration: none;
              font-size: 15px;
              border: 1px solid rgba(0, 0, 0, 0.24);
              box-shadow: 0 0 7px -2px;
              margin-bottom: 12px;} </style>';

    echo '<script type="text/javascript" src="'.theme_url().'/admin/custom.js"></script>';
}
add_action('admin_head', 'load_script_admin');


//**  for dump and die**//
function dump_die($val)
{
    echo '<pre>';
    print_r($val);
    die();
}

/*
 * Navigation menu
 * @returns navigation
 */

if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'main_menu' => 'Main Menu',
            'footer_menu' => 'Footer Menu',
        )
    );
}
class My_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\" role=\"menu\">\n";
    }
}

function sort_array_of_array(&$array, $subfield)
{
    $sortarray = array();
    foreach ($array as $key => $row)
    {
        $sortarray[$key] = $row[$subfield];
    }

    array_multisort($sortarray, SORT_ASC, $array);
}

function faq_search()
 {

$search=$_POST['search'];
     $count=1;

     if(!empty($search)){
     $get_faq_posts = new WP_Query(array('post_type' => 'faq','post_status' => 'publish', 's' => "'".$search."'", 'ignore_sticky_posts' => 1, 'orderby' => 'post__in' ));
     }else{
         $get_faq_posts = new WP_Query(array('post_type' => 'faq','post_status' => 'publish','ignore_sticky_posts' => 1, 'orderby' => 'post__in' ));
     }
    while($get_faq_posts->have_posts()): $get_faq_posts->the_post();?>
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
                               <a href="javascript:void(0);" >Yes</a>
                               <a href="javascript:void(0);" >No</a>
                           </div>
                       </div><!-- /panel-collapse-->
                   </div><!-- /panel-default-->
                       <?php $count++;
                   endwhile;
     exit;
}

add_action('wp_ajax_faq_search','faq_search');
add_action('wp_ajax_nopriv_faq_search','faq_search');




function form_submit()
 {
     $response = array();

           if (isset($_POST['action'])) {
              $full_name = strip_tags(trim($_POST["fullName"]));
              $full_name = str_replace(array("\r", "\n"), array(" ", " "), $full_name);
              $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
              $message = strip_tags(trim($_POST["message"]));

              // Check that data was sent to the mailer.

               if (empty($full_name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                   $response['status'] = 'error';
                  $response['message'] = 'Please enter your email address in the format someone@example.com';
                  echo json_encode($response);
                      exit;

              }

              // Set the recipient email address.
              $recipient = 'zubair.khan@gaditek.com';

              // Build the email content.
              $email_content = "Full Name: $full_name\n";
              $email_content .= "Email: $email\n\n";
              $email_content .= "Message: \n$message\n";

              // Build the email headers.
              $email_headers = "From: $full_name <$email>";



          }

        // Send the email.
              if (mail($recipient, $subject, $email_content, $email_headers)) {
                  // Set a 200 (okay) response code.

                  $response['status'] = 'success';
                  $response['message'] = 'Thank You For your Feedback.';
              } else {

                  $response['status'] = 'error';
                  $response['message'] = 'Error while proccesing your request.';
              }

     echo json_encode($response);
     exit;
}

add_action('wp_ajax_form_submit','form_submit');
add_action('wp_ajax_nopriv_form_submit','form_submit');



function faq_posts_vote(){
    $post_id= $_POST['post_id'];
    //$_COOKIE['faq_posts_vote'];



    $_POST['ip'] = $_SERVER['REMOTE_ADDR'];
    $_POST['timestamp']=time();
    unset($_POST['post_id']);


    $response = array(
        'status' => 'success',
        'ip' => $_POST['ip'],
        'post_id' => $post_id,
        'post_vote' => $_POST['post_vote']
    );

    echo json_encode($response);


    exit;
}
add_action('wp_ajax_faq_posts_vote','faq_posts_vote');
add_action('wp_ajax_nopriv_faq_posts_vote','faq_posts_vote');

?>