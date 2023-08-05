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

<section class="pb-5 container min-vh-100 mt-2">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <ul class="list-unstyled row gap-2 svg-list mb-0 align-items-center justify-content-center justify-content-lg-start mt-3 svg-service bg-transparent pb-3 pb-xl-0">
                <?php
                if (have_rows('services_top_svg_list', 'option')):
                    while (have_rows('services_top_svg_list', 'option')) : the_row();
                        $size = isset($args['size']) ? $args['size'] : 70;
                        $svg_code = get_sub_field('svg_icon');
                        $modified_svg_code = sprintf($svg_code, $size, $size);
                        ?>
                        <li
                                class="col-auto svg-item">
                            <?php echo $modified_svg_code; ?>
                        </li>
                    <?php endwhile;
                endif; ?>
            </ul>

        </div>
        <div class="col-lg-6">
            <h1 class="text-lg-end text-center text-primary display-1 text-uppercase sofia fw-bolder"
                data-aos="fade-right"
                data-aos-delay="100">
                <?= get_field('services_title', 'option') ?>
            </h1>
        </div>
    </div>
    <div class="row align-items-stretch g-2 g-lg-4 justify-content-center justify-content-lg-start svg-service-second">
        <?php
        if ($loop_services->have_posts()) {
            $i = 0;
            while ($loop_services->have_posts()) : $loop_services->the_post();
                $i++; ?>
                <div
                        title="<?php the_title(); ?>"
                        class="col-xl-3 col-lg-4 col-md-6 col-12 my-list-item"
                        data-aos="zoom-in"
                        data-aos-offset="0"
                        data-aos-id="super-duper"
                        data-aos-delay="<?= $i; ?>00">
                    <?php get_template_part('template-parts/services-card'); ?>
                </div>
            <?php endwhile;
        }
        wp_reset_postdata() ?>
    </div>
</section>

<?php get_footer(); ?>

<?php
if ($loop_services->have_posts()) {
    $i = 0;
    while ($loop_services->have_posts()) : $loop_services->the_post();

        $size = isset($args['size']) ? $args['size'] : 70;
        $svg_code = get_field('services_svg_icon');
        $modified_svg_code = sprintf($svg_code, $size, $size);

        $i++; ?>
        <!-- Modal -->
        <div class="modal fade" id="modal-<?= get_the_ID(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" style="pointer-events: auto!important;">
                <div class="card w-100 h-100 border-0 bg-secondary pt-xl-4 p-4 rounded-0 d-flex justify-content-between flex-column gap-3 align-items-center glass-card">
                    <div class="d-flex align-items-center gap-3 justify-content-center mb-5 svg-service">
                         <span class="border-end border-2 border-dark border-opacity-25 pe-5">
                            <?php echo $modified_svg_code; ?>
                        </span>
                        <h5 class="card-title fs-3 fw-semibold ">
                            <?php the_title(); ?>
                        </h5>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center w-100 h-100 pb-2">
                        <?php $content = get_the_content();

                        $lines = explode("\n", $content);
                        $dividedLines = ceil(count($lines) / 2);

                        if (count($lines) > 8) { // Display in two columns if more than 7 lines
                            ?>
                            <div class="row align-items-center w-100 flex-row-reverse">
                                <div class="col-md-6 lh-lg">
                                    <?php echo wpautop(implode("\n", array_slice($lines, $dividedLines))); ?>
                                </div>
                                <div class="col-md-6 lh-lg">
                                    <?php echo wpautop(implode("\n", array_slice($lines, 0, $dividedLines))); ?>
                                </div>
                            </div>
                            <?php echo "</div>";
                        } else { ?>
                            <div class="lh-lg">
                                <?php echo wpautop($content); ?>
                            </div>
                        <?php } ?>
                        <div class="button-primary w-auto px-0 z-top">
                            <a class="btn bg-transparent position-relative"
                               href="#" data-bs-dismiss="modal">
                                <p class="fs-6 fw-bold w-100 text-start h-100 position-absolute top-0 start-0 d-flex justify-content-center align-items-center m-0 p-0 z-top">
                                    بستن
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;
}
wp_reset_postdata() ?>