<section class="bg-primary py-5">
    <div class="custom-container min-vh-50">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="text-start text-white display-5 fw-bolder" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
                    <?= get_field('portfolio_section_title') ?>
                </h3>
            </div>
            <div class="col-lg-6 text-justify text-white" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                <?= get_field('portfolio_section_text') ?>
                <?php
                $portfolio_button = get_field('portfolio_button');
                if( $portfolio_button ): ?>
                    <div class="button-white w-auto px-0">
                        <a class="btn bg-transparent position-relative overflow-hidden fs-4" data-aos="fade-left" data-aos-delay="500" href="<?php echo esc_url( $portfolio_button['link'] ); ?>">
                            <p class="fs-6 fw-bold w-100 text-start h-100 position-absolute top-0 start-0 d-flex justify-content-center align-items-center m-0 p-0 z-top">
                                <?php echo esc_html( $portfolio_button['title'] ); ?>
                            </p>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
        <div class="row justify-content-center">
            <?php
            $portfolio_list = get_field('portfolio_list');
            if ($portfolio_list): $i = 1; ?>
                <ul class="list-unstyled row g-4">
                    <?php foreach ($portfolio_list as $portfolio):
                        $i++;
                        setup_postdata($portfolio); ?>
                        <li class="col-lg-6" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00" data-aos-duration="<?= $i; ?>00">
                            <img class="img-fluid"
                                 src="<?php echo get_the_post_thumbnail_url($portfolio->ID) ?>"
                                 alt="<?= $portfolio->post_title; ?>">
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>