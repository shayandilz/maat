<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package baloochy
 */
get_header()
?>

<?php
while (have_posts()) :
    the_post();
    ?>

    <div class="container pt-3 pt-lg-0" id="blog">
        <div class="row align-items-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <?php the_breadcrumb(); ?>
                </nav>
            </div>
        </div>
        <section class="row flex-column-reverse flex-lg-row py-0 py-lg-5 gap-lg-0 gap-5">
            <div class="col-lg-6 col-12">
                <h1 class="fs-3 fw-bold text-dark">
                    <?php the_title(); ?>
                </h1>
                <div class="d-inline-flex w-100 justify-content-between justify-content-lg-start">
                    <span class="text-semi-light small fw-lighter">
                        زمان خواندن: <?= reading_time(); ?> دقیقه
                    </span>
                    <span class="text-semi-light ms-5 small fw-lighter">
                        تاریخ انتشار:
                     <?php echo get_the_date('d  F , Y'); ?>
                    </span>
                </div>
                <div class="list-unstyled mt-4">
                    <?php echo do_shortcode('[TOC]') ?>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <?php if (get_the_post_thumbnail_url()) { ?>
                    <img src="<?php echo get_the_post_thumbnail_url() ?>"
                         class="img-fluid"
                         alt="<?php the_title(); ?>">
                <? } ?>
            </div>
        </section>
        <section class="row py-5 blog-sticky">
            <div id="startProgressBar" class="col-lg-12 text-dark d-flex gap-3 flex-column">
                <article class="text-justify border-bottom border-opacity-50 border-dark pb-3 text-link">
                    <?php the_content(); ?>
                </article>
                <div class="col-12 py-lg-5 py-2">
                    <h6 class="pb-3 text-start text-lg-center fs-3 fw-bold">جدیدترین اخبار مات</h6>
                    <div class="row gap-5 gap-lg-0">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => '3',
                            'ignore_sticky_posts' => true
                        );
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1; // Get the current page number

                        // Calculate the initial value of the post index based on the current page
                        // Assuming you have 12 posts per page (adjust this based on your actual posts per page)
                        $posts_per_page = 12;
                        $initial_post_index = ($paged - 1) * $posts_per_page;

                        // Initialize the counter variable
                        $j = $initial_post_index + 1;
                        $loop = new WP_Query($args);
                        if ($loop->have_posts()) : $i = 0;
                            /* Start the Loop */
                            while ($loop->have_posts()) :
                                $loop->the_post(); ?>
                                <div class="col-lg-4 col-12">
                                    <?php get_template_part('template-parts/home-card', null, array('j' => $j)); ?>
                                </div>
                                <?php
                                $j++;
                            endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </section>

    </div>


<?php
endwhile;
get_footer() ?>