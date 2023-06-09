<?php
/** Template Name: Blog Page */

get_header(); ?>

    <section class="pt-5 min-vh-100">
        <div class="container">
            <h1 class="text-end text-primary display-1 text-uppercase sofia fw-bolder lh-sm mt-5 mb-0">
                Blog <br>
                AND News
            </h1>
            <?php if (have_posts()) : $i = 1; ?>
            <div class="row g-4 mt-2 mt-lg-5 ">
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    $i++;
                    the_post(); ?>
                    <div class="col-lg-3 col-md-6 col-12" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00">
                        <?php get_template_part('template-parts/home-card'); ?>
                    </div>
                <?php endwhile;
                ?>
            </div>
        </div>
        <div class="mt-5 py-5 w-100 bg-secondary ">
            <?php
            $links = paginate_links(array(
                'type' => 'array',
                'prev_next' => false,

            ));
            if ($links) : ?>

                <nav aria-label="age navigation example text-dark">
                    <?php echo '<ul class="pagination gap-3 justify-content-center align-items-center flex-row-reverse mb-0">';
                    // get_previous_posts_link will return a string or void if no link is set.
                    if ($prev_posts_link = get_previous_posts_link(__('قبلی'))) :
                        echo '<li class="prev-list-item page-item">';
                        echo $prev_posts_link;
                        echo '</li>';
                    endif;
                    echo '<li class="page-item">';
                    echo join('</li><li class="page-item">', $links);
                    echo '</li>';

                    // get_next_posts_link will return a string or void if no link is set.
                    if ($next_posts_link = get_next_posts_link(__('بعدی'))) :
                        echo '<li class="next-list-item page-item">';
                        echo $next_posts_link;
                        echo '</li>';
                    endif;
                    echo '</ul>';
                    ?>
                </nav>

            <?php endif;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>

<?php get_footer(); ?>