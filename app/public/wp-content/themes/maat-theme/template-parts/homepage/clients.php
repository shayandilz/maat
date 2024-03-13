<section class="bg-secondary" id="clients">
    <div class="container">
        <div class="row pt-5 align-items-start min-vh-50 justify-content-center">
            <h3 class="text-center text-primary display-5 fw-bolder sofia text-uppercase" data-aos="fade-up" data-aos-delay="100"
                data-aos-duration="500">
                <?= get_field('client_section_title') ?>
            </h3>
            <div class="col-xl-8 col-12">
                <div class="swiper client-swiper">
                    <div class="swiper-wrapper py-lg-4 align-items-center">
                        <?php
                        $args = array(
                            'post_type' => 'clients',
                            'post_status' => 'publish',
                            'posts_per_page' => '-1',
                            'ignore_sticky_posts' => true
                        );
                        $loopClients = new WP_Query($args);
                        if ($loopClients->have_posts()) {
                            $i = 1;
                            while ($loopClients->have_posts()) : $loopClients->the_post();
                                $i++;
                                ?>
                                <div class="swiper-slide">
                                    <img    width="100" height="100"
                                            class="img-fluid"
                                            src="<?php echo get_the_post_thumbnail_url() ?>"
                                            alt="<?php the_title(); ?>"/>
                                </div>
                            <?php endwhile;
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-center gap-3 text-primary mt-5 mt-lg-3 fs-3">
                    <div class="swiper-next-client" data-aos="fade-left" data-aos-delay="300" data-aos-offset="0">
                        <?php get_template_part('template-parts/svg/right-arrow'); ?>
                    </div>
                    <div class="swiper-prev-client" data-aos="fade-right" data-aos-delay="300" data-aos-offset="0">
                        <?php get_template_part('template-parts/svg/left-arrow'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>