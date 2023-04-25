<section class="custom-container min-vh-50 d-flex align-items-center mt-lg-0 mt-5">
    <div class="row justify-content-center justify-content-lg-start g-3 g-lg-2">
        <div class="col-lg-6 row px-0 px-lg-2">
            <div class="col-lg-6">
                <h3 class="text-start text-primary display-5 fw-bolder" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
                    <?= get_field('services_section_title') ?>
                </h3>
            </div>
            <div class="col-lg-6 text-justify" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                <?= get_field('services_section_text') ?>
                <?php
                $services_button = get_field('services_button');
                if( $services_button ): ?>
                    <div class="button-primary w-auto px-0">
                        <a class="btn bg-transparent position-relative overflow-hidden fs-4" data-aos="fade-left" data-aos-delay="500" href="<?php echo esc_url( $services_button['link'] ); ?>">
                            <p class="fs-6 fw-bold w-100 text-start h-100 position-absolute top-0 start-0 d-flex justify-content-center align-items-center m-0 p-0 z-top">
                                <?php echo esc_html( $services_button['title'] ); ?>
                            </p>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6">
            <?php
            $services_list = get_field('services_list');
            if( $services_list ): $i = 1;?>
                <ul class="list-unstyled row g-4">
                    <?php foreach( $services_list as $service ):
                        $i++;
                        setup_postdata($service); ?>
                        <li class="col-12 col-md-6" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00" data-aos-duration="<?= $i; ?>00">
                            <div class="bg-secondary py-4 px-2 d-flex align-items-center justify-content-center gap-3 h-100">
                                <div class="border-end border-danger border-opacity-50 pe-3">
                                    <?php the_field('services_svg_icon', $service->ID);?>
                                </div>
                                <h5 class="mb-0">
                                    <?= $service->post_title; ?>
                                </h5>
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