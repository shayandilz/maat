<section class="container">
    <div class="row gx-4 min-vh-75">
        <div class="col-lg-6 col-12 pt-3">
            <?php  get_template_part('template-parts/homepage/slider/slider');?>
        </div>
        <div class="col-lg-6 col-12 gap-lg-5 gap-3 d-flex flex-column justify-content-start pt-4 pt-lg-0">
            <div class="row justify-content-end">
                <div class="col-12">
                    <h1 class="text-center mt-2 mt-lg-0 text-lg-end display-2 sofia text-primary text-uppercase fw-bolder lh-sm"
                        data-aos="fade-up" data-aos-delay="300" data-aos-duration="2000">
                        <?php the_field('hero_title'); ?>
                    </h1>
                </div>
            </div>
            <div class="row flex-column mt-0 mt-lg-5 align-items-end">
                <div class="col-12 col-xxl-6 text-justify fs-6 mt-0 mt-lg-5" data-aos="fade-left" data-aos-delay="200">
                    <?php the_field('hero_text'); ?>
                </div>
            </div>
        </div>
        <?php
        if (get_field('slider-detail')) { ?>
            <div class="col-lg-6">
                <div class="row pt-1 justify-content-between align-items-center">
                    <div class="col-6 d-flex justify-content-start gap-3 text-primary fs-4">
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
        <?php } ?>
    </div>
</section>