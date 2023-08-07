<?php /* Template Name: About */
/**
 * About page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Macan
 */
get_header(); ?>


    <section class="container">
        <div class="row gx-5 min-vh-50">
            <div class="col-lg-6">
                <?php the_field('svg'); ?>
            </div>
            <div class="col-lg-6 gap-5 d-flex flex-column justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-11">
                        <h1 class="text-center display-1 sofia text-primary text-uppercase fw-semibold pt-3 pt-lg-0"
                            data-aos="fade-up"
                            data-aos-delay="400"
                            data-aos-duration="2000">
                            <?php the_field('hero_title'); ?>
                        </h1>
                    </div>
                </div>
                <div class="row flex-column">
                    <div class="col-12">
                        <h4 class="text-start mb-2 fs-3 text-primary text-capitalize fw-semibold sofia" data-aos="fade-left" data-aos-delay="200">
                            <?php single_post_title(); ?>
                        </h4>

                        <div class="text-justify fs-6" data-aos="fade-left" data-aos-delay="400">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 container">
        <h3 class="text-start text-primary fs-1 fw-semibold mb-4 sofia text-capitalize" data-aos="fade-up" data-aos-delay="100">
            <?php the_field('section_1_title'); ?>

        </h3>
        <div class="text-justify fs-6" data-aos="fade-up" data-aos-delay="200">
            <?php the_field('section_1_text'); ?>

        </div>
    </section>
    <section class="bg-warning">
        <div class="container py-3 py-lg-0">
            <div class="row align-items-center">
                <div class="col-12 d-flex align-items-center justify-content-center justify-content-lg-start">
                    <div class="row align-items-center">
                        <div class="col-lg-12 ps-lg-4 py-lg-5 " data-aos="fade-in" data-aos-delay="300">
                            <?php if (have_rows('box_3')): ?>
                                <?php while (have_rows('box_3')): the_row();
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <h6 class="text-center text-lg-start text-primary text-primary sofia text-capitalize fs-1 fw-semibold mb-4">
                                        <?= $title; ?>
                                    </h6>
                                    <div class="text-dark text-justify text-white">
                                        <?= $text; ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-primary">
        <div class="container">
            <div class="row align-items-center align-items-lg-start justify-content-center py-3 py-lg-5">
                <div class="col-lg col-12" data-aos="fade-in" data-aos-delay="100">
                    <?php if (have_rows('box_1')): ?>
                        <?php while (have_rows('box_1')): the_row();
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                            ?>
                            <h6 class="text-center text-lg-start text-warning fs-1 fw-semibold pb-lg-4 sofia text-capitalize">
                                <?= $title; ?>
                            </h6>
                            <div class="text-white text-center text-lg-start">
                                <?= $text; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
                <div class="col-lg col-12 ps-lg-5" data-aos="fade-in" data-aos-delay="200">
                    <?php if (have_rows('box_2')): ?>
                        <?php while (have_rows('box_2')): the_row();
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                            ?>
                            <h6 class="text-center text-lg-start text-warning fs-1 fw-semibold pb-lg-4 sofia text-capitalize">
                                <?= $title; ?>
                            </h6>
                            <div class="text-white text-center text-lg-start">
                                <?= $text; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="my-5 container" data-aos="fade-in" data-aos-delay="100">
        <div class="row g-5 justify-content-center">
            <?php
            $section_2_image = get_field('section_2_image');
            if (!empty($section_2_image)): ?>
                <?php
                if (have_rows('section_2_image')):
                    $i = 0;
                    while (have_rows('section_2_image')) : the_row();
                        $i++;
                        $svg = get_sub_field('svg'); ?>
                        <div class="col-lg col-6" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00">
                            <?= $svg; ?>
                        </div>
                    <?php endwhile;
                endif; ?>
            <?php endif; ?>
        </div>
    </section>
    <section class="container py-5">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center text-primary fs-1 fw-semibold mb-4 sofia text-capitalize" data-aos="fade-left" data-aos-delay="100">
                    <?php the_field('section_3_title'); ?>

                </h3>
            </div>
        </div>
        <div class="swiper achievements-swiper">
            <div class="swiper-wrapper">
            <?php
            if (have_rows('achievements')):
                $i = 0;
                while (have_rows('achievements')) : the_row();
                    $i++;
                    $title = get_sub_field('title');
                    $image = get_sub_field('image'); ?>
                    <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00">
                        <div class="card border-0 rounded-0">
                            <div class="text-center">
                                <img src="<?= $image['url']; ?>" class="achivement-img" alt="<?= $image['alt']; ?>">
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            endif; ?>
            </div>
            <div class="col-lg-12 d-flex justify-content-center gap-3 text-primary fs-1">
                <div class="swiper-next-achiv" data-aos="fade-left" data-aos-delay="300" data-aos-offset="0">
                    <?php get_template_part('template-parts/svg/right-arrow'); ?>
                </div>
                <div class="swiper-prev-achiv" data-aos="fade-right" data-aos-delay="300" data-aos-offset="0">
                    <?php get_template_part('template-parts/svg/left-arrow'); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();