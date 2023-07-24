<?php /* Template Name: Contact */
/**
 * Contact page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
 */
get_header(); ?>

    <section class="container">
        <div class="row min-vh-100 align-items-end py-5">
            <div class="col-lg-6">
                <?php
                $contact_image = get_field('contact_page_svg', 'option');
                if ($contact_image) { ?>
                    <img data-aos="fade-in" data-aos-delay="200" class="img-fluid" src="<?= $contact_image['url'] ?>"
                         alt="<?= $contact_image['alt'] ?>">
                <?php } ?>
            </div>
            <div class="col-lg-6">
                <h1 class="text-center text-lg-end display-1 sofia text-primary text-uppercase fw-semibold my-2"
                    data-aos="fade-right" data-aos-delay="300">
                    contact us
                </h1>
                <div class="d-flex flex-column justify-content-center align-items-lg-start align-items-center gap-2 my-2">
                    <div class="text-lg-start text-center gap-2 d-flex flex-column align-items-lg-start align-items-center justify-content-center">
                        <?php
                        if (have_rows('address_list', 'option')):
                            $i = 0;
                            while (have_rows('address_list', 'option')) : the_row();
                                $i++;
                                $address = get_sub_field('title_or_text'); ?>
                                <span class="text-dark" data-aos="fade-up" data-aos-delay="<?= $i; ?>00">
                                    <?= $address; ?>
                                </span>
                            <?php endwhile;
                        endif; ?>
                    </div>
                    <div class="d-inline-flex gap-2 align-items-center">
                        <?php
                        if (have_rows('phone_list', 'option')):
                            $i = 1;
                            $total_rows = count(get_field('phone_list', 'option')); // calculate total rows
                            $current_row = 0; // initialize current row counter

                            while (have_rows('phone_list', 'option')) : the_row();
                                $i++;
                                $current_row++;
                                $phone = get_sub_field('title_or_text');
                                $phone_url = get_sub_field('url');
                                $class = 'border-end'; // add border-end class to all links
                                if ($current_row === $total_rows) {
                                    $class = ''; // remove border-end class from last link
                                }
                                ?>
                                <a href="tel:<?= $phone_url; ?>"
                                   class="text-dark <?= $class; ?> border-danger border-1 border-opacity-50 pe-2 pt-1"
                                   data-aos="fade-up"
                                   data-aos-delay="<?= $i; ?>00">
                                    <?= $phone; ?>
                                </a>

                            <?php endwhile;
                        endif; ?>
                    </div>
                    <div>
                        <span class="text-dark"
                              data-aos="fade-up"
                              data-aos-delay="300">
                             <?php the_field('fax', 'option') ?>
                        </span>
                    </div>
                    <div>
                        <?php
                        if (have_rows('email_list', 'option')):
                            $i = 2;
                            while (have_rows('email_list', 'option')) : the_row();
                                $i++;
                                $phone = get_sub_field('title_or_text');
                                $phone_url = get_sub_field('url');
                                ?>
                                <a href="<?= $phone_url; ?>"
                                   class="text-dark sofia text-lowercase"
                                   data-aos="fade-up"
                                   data-aos-delay="<?= $i; ?>00">
                                    <?= $phone; ?>
                                </a>

                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
                <div class="d-flex justify-content-lg-end justify-content-center my-2">
                    <ul class="d-inline-flex gap-3 align-items-end justify-content-end list-unstyled mb-0">
                        <?php
                        if (have_rows('social_list', 'option')):
                            $i = 3;
                            while (have_rows('social_list', 'option')) : the_row();
                                $i++;
                                $icon = get_sub_field_object('icon');
                                $url = get_sub_field('url');
                                $value = $icon['value'];
                                ?>
                                <li class="d-flex icon-dark align-items-center justify-content-center"
                                    data-aos="fade-up"
                                    data-aos-delay="<?= $i; ?>00">
                                    <a href="<?= $url; ?>"
                                       class="p-2 position-relative">
                                        <i class="<?= $value; ?> d-flex align-items-center justify-content-center fs-5 text-primary"></i>

                                    </a>
                                </li>
                            <?php endwhile;
                        endif; ?>
                    </ul>
                </div>
                <div class="mt-5" data-aos="fade-up"
                     data-aos-delay="500">
                    <?php
                    $gravity = get_field('gravity_choices');
                    echo do_shortcode('[gravityform id="' . $gravity . '" title="false" description="false" ajax="true"]') ?>
                </div>
            </div>

        </div>
    </section>


<?php get_footer();