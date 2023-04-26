<?php /* Template Name: About */
/**
 * About page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
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
                        <h3 class="text-center fs-6">
                            <?php the_field('hero_small_text'); ?>

                        </h3>
                        <h1 class="text-center display-1 sofia text-primary text-uppercase fw-semibold">
                            <?php the_field('hero_title'); ?>
                        </h1>
                    </div>
                </div>
                <div class="row flex-column">
                    <div class="col-lg-6">
                        <h4 class="text-start mb-2 fs-3 text-primary text-uppercase fw-semibold ">
                            <?php single_post_title(); ?>
                        </h4>

                        <div class="text-justify fs-6">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 custom-container">
        <h3 class="text-start text-primary fs-1 fw-semibold mb-4">
            <?php the_field('section_1_title'); ?>

        </h3>
        <div class="text-justify fs-6">
            <?php the_field('section_1_text'); ?>

        </div>
    </section>
    <section class="mt-3 d-flex flex-column flex-lg-row">
        <div class="bg-primary col-lg-6 col-12 d-flex align-items-center py-3 py-lg-0">
            <div class="custom-container">
                <div class="row align-items-center align-items-lg-start py-lg-5">
                    <div class="col-lg-6  border-end border-secondary border-1 border-opacity-50 ps-lg-5">
                        <?php if (have_rows('box_1')): ?>
                            <?php while (have_rows('box_1')): the_row();
                                $title = get_sub_field('title');
                                $text = get_sub_field('text');
                                ?>
                                <h6 class="text-center text-lg-start text-white fs-1 fw-semibold pb-4">
                                    <?= $title; ?>
                                </h6>
                                <div class="text-white text-center text-lg-start">
                                    <?= $text; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                    <div class="col-lg-6 ps-lg-5">
                        <?php if (have_rows('box_2')): ?>
                            <?php while (have_rows('box_2')): the_row();
                                $title = get_sub_field('title');
                                $text = get_sub_field('text');
                                ?>
                                <h6 class="text-center text-lg-start text-white fs-1 fw-semibold pb-4">
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
        </div>
        <div class="bg-secondary col-lg-6 col-12 d-flex align-items-center py-3 py-lg-0">
            <div class="custom-container p-lg-0">
                <div class="row align-items-center">
                    <div class="col-lg-12 py-lg-5 border-end border-secondary border-1 border-opacity-50 pe-lg-5">
                        <?php if (have_rows('box_3')): ?>
                            <?php while (have_rows('box_3')): the_row();
                                $title = get_sub_field('title');
                                $text = get_sub_field('text');
                                ?>
                                <h6 class="text-start text-primary fs-1 fw-semibold mb-4">
                                    <?= $title; ?>
                                </h6>
                                <div class="text-dark text-justify">
                                    <?= $text; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <?php
        $section_2_image = get_field('section_2_image');
        if (!empty($section_2_image)): ?>
            <img class="img-fluid w-100"
                 src="<?php echo esc_url($section_2_image['url']); ?>"
                 alt="<?php echo esc_attr($section_2_image['alt']); ?>"/>
        <?php endif; ?>
    </section>
    <section class="custom-container py-5">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="text-start text-danger fs-1 fw-semibold mb-4">
                    <?php the_field('section_3_title'); ?>

                </h3>
            </div>
            <div class="col-lg-6">
                <div class="text-dark text-justify">
                    <?php the_field('section_3_text'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (have_rows('achievements')):
                while (have_rows('achievements')) : the_row();
                    $title = get_sub_field('title');
                    $image = get_sub_field('image'); ?>
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <div class="p-5">
                                <img src="<?= $image['url']; ?>" class="card-img-top" alt="<?= $image['alt']; ?>">
                            </div>
                            <div class="card-body py-lg-5 bg-secondary text-center">
                                <h6 class="card-text">
                                    "<?= $title; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                <? endwhile;
            endif; ?>
        </div>
    </section>

<?php get_footer();