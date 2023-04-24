<section class="custom-container">
    <div class="row gx-5 min-vh-75 mt-5 mt-lg-0">
        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
            <div class="swiper home-swiper" data-aos="fade-in" data-aos-delay="200">
                <div class="swiper-wrapper">
                    <?php
                    $images = get_field('slider_image');
                    if ($images): ?>
                        <?php foreach ($images as $image): ?>
                            <div class="swiper-slide">
                                <img class="img-fluid"
                                     src="<?php echo esc_url($image['url']);?>"
                                     alt="<?php echo esc_attr($image['alt']); ?>"/>
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="row pt-1 justify-content-between align-items-center">
                <div class="col-6 d-flex justify-content-start gap-3 text-primary fs-3">
                    <div class="swiper-next" data-aos="fade-left" data-aos-delay="300" data-aos-offset="0">
                        <?php get_template_part('template-parts/svg/right-arrow'); ?>
                    </div>
                    <div class="swiper-prev" data-aos="fade-right" data-aos-delay="300" data-aos-offset="0">
                        <?php get_template_part('template-parts/svg/left-arrow'); ?>
                    </div>
                </div>
                <div class="col-6" data-aos="fade-up" data-aos-delay="400" data-aos-offset="0">
                    <div class="swiper-paginate d-flex justify-content-end sofia gap-1 align-items-center fw-light"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 gap-lg-5 gap-3 d-flex flex-column justify-content-center mt-lg-0 mt-5">
            <div class="row justify-content-end">
                <div class="col-12">
                    <h1 class="text-center fs-6" data-aos="fade-up" data-aos-delay="300" >
                        <?php the_field('hero_small_text'); ?>
                    </h1>
                    <h4 class="text-center mt-2 mt-lg-0 text-lg-end display-2 sofia text-primary text-uppercase fw-bolder lh-sm" data-aos="fade-up" data-aos-delay="400" data-aos-duration="2000">
                        <?php the_field('hero_title'); ?>
                    </h4>
                </div>
            </div>
            <div class="row flex-column">
                <div class="col-xl-6 col-lg-12 text-justify fs-6" data-aos="fade-left" data-aos-delay="200">
                    <?php the_field('hero_text'); ?>
                </div>
                <?php
                $hero_button = get_field('hero_button');
                if( $hero_button ): ?>
                    <div class="button-primary w-auto px-0">
                        <a class="btn bg-transparent position-relative overflow-hidden fs-4" data-aos="fade-left" data-aos-delay="500" href="<?php echo esc_url( $hero_button['link'] ); ?>">
                            <p class="fs-6 fw-bold w-100 text-start h-100 position-absolute top-0 start-0 d-flex justify-content-center align-items-center m-0 p-0 z-top">
                                <?php echo esc_html( $hero_button['title'] ); ?>
                            </p>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>