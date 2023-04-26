<?php
get_header();
$services = array(
    'post_type' => 'services',
    'post_status' => 'publish',
    'posts_per_page' => '-1',
    'ignore_sticky_posts' => true
);
$loop_services = new WP_Query($services);
?>

    <section class="py-5 container min-vh-100">
        <div class="row align-items-center mt-5">
            <div class="col-lg-6">
                <ul class="list-unstyled d-inline-flex gap-3 svg-list">
                    <?php
                    if (have_rows('services_top_svg_list', 'option')):
                        $i = 0;
                        while (have_rows('services_top_svg_list', 'option')) : the_row();
                            $i++;
                            $svg_icon = get_sub_field('svg_icon'); ?>
                            <li
                                class="col-lg-1 svg-item">
                                <?= $svg_icon; ?>
                            </li>
                        <?php endwhile;
                    endif; ?>
                </ul>

            </div>
            <div class="col-lg-6">
                <h1 class="text-end text-primary display-1 text-uppercase sofia fw-bolder">
                    <?= get_field('services_title', 'option') ?>
                </h1>
            </div>
        </div>
        <div class="row align-items-stretch g-2 g-lg-4 justify-content-center justify-content-lg-start">
            <?php
            if ($loop_services->have_posts()) {
                $i = 0;
                while ($loop_services->have_posts()) : $loop_services->the_post();
                    $i++; ?>
                    <div class="col-xl-3 col-lg-6 col-12 my-list-item" data-aos="zoom-in"
                         data-aos-delay="<?= $i; ?>00">
                        <?php get_template_part('template-parts/services-card'); ?>
                    </div>
                <?php endwhile;
            }
            wp_reset_postdata() ?>
        </div>
    </section>

<?php get_footer();
