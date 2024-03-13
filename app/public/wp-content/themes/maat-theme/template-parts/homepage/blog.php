<section class="container ">
    <div class="row py-5 align-items-start min-vh-50 justify-content-center">
        <div class="col-xl-3">
            <h3 class="text-start text-primary display-5 fw-bolder sofia text-uppercase" data-aos="fade-up"
                data-aos-delay="100"
                data-aos-duration="500">
                <?= get_field('blog_section_title') ?>
            </h3>
        </div>
        <div class="col-xl-9 row justify-content-center g-2 g-lg-4">
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
            $loopPortfolio = new WP_Query($args);
            if ($loopPortfolio->have_posts()) {
                $i = 1;
                while ($loopPortfolio->have_posts()) : $loopPortfolio->the_post();
                    $i++;
                    ?>
                    <div class="col-xl-4 col-md-6 col-12" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00"
                         data-aos-duration="<?= $i; ?>00">
                        <?php get_template_part('template-parts/home-card', null, array('j' => $j)); ?>
                    </div>
                    <?php
                    $j++;
                endwhile;
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>