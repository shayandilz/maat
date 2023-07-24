<section class="container ">
    <div class="row py-5 align-items-start min-vh-50 justify-content-center">
        <div class="col-xl-3">
            <h3 class="text-start text-primary display-5 fw-bolder sofia text-uppercase" data-aos="fade-up" data-aos-delay="100"
                data-aos-duration="500">
                <?= get_field('blog_section_title') ?>
            </h3>
        </div>
        <div class="col-xl-9 row justify-content-center gy-4 gx-3 g-lg-4">
            <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => '3',
                'ignore_sticky_posts' => true
            );
            $loopPortfolio = new WP_Query($args);
            if ($loopPortfolio->have_posts()) {
                $i = 1;
                while ($loopPortfolio->have_posts()) : $loopPortfolio->the_post();
                    $i++;
                    ?>
                    <div class="col-xl-4 col-md-6 col-12" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00"
                         data-aos-duration="<?= $i; ?>00">
                        <?php get_template_part('template-parts/home-card'); ?>
                    </div>
                <?php endwhile;
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>