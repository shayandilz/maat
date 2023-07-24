<?php /* Template Name: Home */
/**
 * Front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
 */

get_header();
if (have_posts()) {
    the_post();
//    slider
    get_template_part('template-parts/homepage/hero');
//    services
    get_template_part('template-parts/homepage/services');
//    portfolio
    get_template_part('template-parts/homepage/portfolio');
//    blog
    get_template_part('template-parts/homepage/blog');
//    clients
    get_template_part('template-parts/homepage/clients');


}
get_footer();