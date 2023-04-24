<?php get_header();

while (have_posts()) :
    the_post();
    ?>
    <section>
       
    </section>

<?php endwhile;
wp_reset_query();
get_footer(); ?>
