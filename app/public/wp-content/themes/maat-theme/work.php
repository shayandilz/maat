<?php /* Template Name: Work */
/**
 * Work with us page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
 */
get_header(); ?>

    <section class="container">
        <div class="row align-items-end">
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">
                <h1 class="text-center text-lg-end display-1 sofia text-primary text-uppercase fw-semibold my-2 lh-sm"
                    data-aos="fade-right"
                    data-aos-delay="100">
                    Work With us
                </h1>

            </div>

        </div>
        <div class="row mb-5">
            <div class="mt-5"
                 data-aos="fade-up"
                 data-aos-delay="300">
                <?php
                $gravity = get_field('gravity_choices');
                echo do_shortcode('[gravityform id="' . $gravity . '" title="false" description="false" ajax="true"]') ?>
            </div>
        </div>
    </section>


<?php get_footer();