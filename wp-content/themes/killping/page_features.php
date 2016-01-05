<?php
/*
Template Name: Features
*/

/* @Created : By Zubair Khan
 * @Software: Engineer
 * @Project : killping.com
 * @January : 2015
 */
get_header();
?>

<!--Feature page Slider Ended-->
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Features Widgets")) {} ?>
<?php get_footer(); ?>
