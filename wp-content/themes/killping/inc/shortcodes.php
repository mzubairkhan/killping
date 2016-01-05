<?php
/**
 * Created by Zubair Khan
 * User: muhammadzubairkhan@live.com
 * Date: 12/30/15
 * Time: 11:39 AM
 */

function buy_now_shortcode( $atts ){

    /*$atts = shortcode_atts(array(
        'type' => 'url',

    ), $atts, 'bartag' );*/

    $result ="javascript:void(0);"; /*get_bloginfo($atts['type']);*/

    return $result;
}

add_shortcode( 'buy_now', 'buy_now_shortcode' );
add_filter( 'buy_now', 'do_shortcode', 13 );

