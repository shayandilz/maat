<section class="container min-vh-50 d-flex align-items-center mt-lg-4 mt-5">
    <div class="row justify-content-center justify-content-lg-between g-4 g-lg-2">
        <div class="col-lg-6 row px-0 px-lg-2">
            <div class="col-lg-6">
                <h2 class="text-start text-primary display-5 fw-bolder text-uppercase sofia" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
                    <?= get_field('services_section_title') ?>
                </h2>
            </div>
            <div class="col-lg-6 text-justify fw-normal" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                <?= get_field('services_section_text') ?>
                <?php
                $services_button = get_field('services_button');
                if( $services_button ): ?>
                    <div class="button-primary w-auto px-0">
                        <a class="btn bg-transparent position-relative fs-6 p-0 fw-semibold" data-aos="fade-left" data-aos-delay="500" href="<?php echo esc_url( $services_button['link'] ); ?>">
                            <?php echo esc_html( $services_button['title'] ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6">
            <?php
            $size = isset($args['size']) ? $args['size'] : 50;
            $services_list = get_field('services_list');
            if( $services_list ): $i = 1;?>
                <ul class="list-unstyled row g-4">
                    <?php foreach( $services_list as $service ):
                        $i++;
                        setup_postdata($service); ?>
                        <li class="col-12 col-md-6" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00" data-aos-duration="<?= $i; ?>00">
                            <div class="py-4 px-4 d-flex align-items-center justify-content-between gap-3 h-100 svg-service lazy">
                                <div class="border-end border-opacity-50 pe-4">
                                    <?php
                                    $svg_code = get_field('services_svg_icon', $service->ID);
                                    $modified_svg_code = sprintf($svg_code, $size, $size);
                                    echo $modified_svg_code;
                                    ?>
                                </div>
                                <p class="service-title mb-0 fs-5">
                                    <?= $service->post_title; ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>