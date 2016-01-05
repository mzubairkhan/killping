<?php
/**
 * Created by Zubair Khan
 * User: muhammadzubairkhan@live.com
 * Date: 12/28/15
 * Time: 4:55 PM
 */



//*** Features Slider Start ***//
register_post_type( 'features_slider',
    array(
        'labels' => array(
            'name'   => __( 'Features Slider' ),
            'singular_name'  => __( 'features_slider' ),
            'add_new'        => __( 'Add new' ),
            'add_new_item'   => __( 'Add new' ),
            'new_item'       => __( 'New' ),
            #'view_item'      => __( 'View' ),
            'search_items'   => __( 'Search Items' ),
            'not_found_in_trash' => __( 'No Items Found in Trash' ),
        ),
        'public' => true,
        'supports' => array( 'title','editor' ,'thumbnail')
    )
);

//*** Features Slider End ***//


//*** Recently Subscribed Start ***//
register_post_type( 'recently_subscribed',
    array(
        'labels' => array(
            'name'   => __( 'Recently Subscribed' ),
            'singular_name'  => __( 'recently_subscribed' ),
            'add_new'        => __( 'Add new' ),
            'add_new_item'   => __( 'Add new' ),
            'new_item'       => __( 'New' ),
            #'view_item'      => __( 'View' ),
            'search_items'   => __( 'Search Items' ),
            'not_found_in_trash' => __( 'No Items Found in Trash' ),
        ),
        'public' => true,
        'supports' => array( 'title','editor' ,'thumbnail')
    )
);

//*** Recently Subscribed End ***//



//*** User Reviews Start ***//
register_post_type( 'user_reviews',
    array(
        'labels' => array(
            'name'   => __( 'User Reviews' ),
            'singular_name'  => __( 'user_reviews' ),
            'add_new'        => __( 'Add new' ),
            'add_new_item'   => __( 'Add new' ),
            'new_item'       => __( 'New' ),
            #'view_item'      => __( 'View' ),
            'search_items'   => __( 'Search Items' ),
            'not_found_in_trash' => __( 'No Items Found in Trash' ),
        ),
        'public' => true,
        'supports' => array( 'title','editor' ,'thumbnail')
    )
);

//*** User Reviews End ***//


//*** Server Stats Start ***//
register_post_type( 'server_stats',
    array(
        'labels' => array(
            'name'   => __( 'Server Stats' ),
            'singular_name'  => __( 'server_stats' ),
            'add_new'        => __( 'Add new' ),
            'add_new_item'   => __( 'Add new' ),
            'new_item'       => __( 'New' ),
            #'view_item'      => __( 'View' ),
            'search_items'   => __( 'Search Items' ),
            'not_found_in_trash' => __( 'No Items Found in Trash' ),
        ),
        'public' => true,
            'supports' => array( 'title', 'thumbnail' )
    )
);
//*** Server Stats End ***//

//** Taxonomies for Server Stats  Start*//
function taxonomies_server_stats() {
  $labels = array(
    'name'              => _x( 'Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ),
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category' ),
    'menu_name'         => __( 'Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'server_stats_category', 'server_stats', $args );
}
add_action( 'init', 'taxonomies_server_stats', 0 );

//** Taxonomies for Server Stats  End*//



//*** Supported Games Start ***//
register_post_type( 'supported_games',
    array(
        'labels' => array(
            'name'   => __( 'Supported Games' ),
            'singular_name'  => __( 'supported_games' ),
            'add_new'        => __( 'Add new' ),
            'add_new_item'   => __( 'Add new' ),
            'new_item'       => __( 'New' ),
            #'view_item'      => __( 'View' ),
            'search_items'   => __( 'Search Items' ),
            'not_found_in_trash' => __( 'No Items Found in Trash' ),
        ),
        'public' => true,
        'supports' => array( 'title','editor' ,'thumbnail')
    )
);

//*** Supported Games End ***//


//*** FAQ Start ***//
register_post_type( 'faq',
    array(
        'labels' => array(
            'name'   => __( 'FAQ' ),
            'singular_name'  => __( 'faq' ),
            'add_new'        => __( 'Add new' ),
            'add_new_item'   => __( 'Add new' ),
            'new_item'       => __( 'New' ),
            #'view_item'      => __( 'View' ),
            'search_items'   => __( 'Search Items' ),
            'not_found_in_trash' => __( 'No Items Found in Trash' ),
        ),
        'public' => true,
        'supports' => array( 'title','editor' ,'thumbnail')
    )
);
//*** FAQ End ***//





