<?php /* Template Name: Contact */
/**
 * Contact page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
 */
get_header(); ?>

    <section class="custom-container">
        <div class="row min-vh-100 align-items-end py-5">
            <div class="col-lg-6">
                <?php
                $contact_image = get_field('contact_page_svg', 'option');
                if ($contact_image) { ?>
                    <img class="img-fluid" src="<?= $contact_image['url'] ?>" alt="<?= $contact_image['alt'] ?>">
                <?php } ?>
            </div>
            <div class="col-lg-6">
                <h1 class="text-center text-lg-end display-1 sofia text-primary text-uppercase fw-semibold my-2">
                    contact us
                </h1>
                <div class="d-flex flex-column justify-content-center align-items-start gap-2 my-2">
                    <div>
                        <?php
                        if (have_rows('address_list', 'option')):
                            while (have_rows('address_list', 'option')) : the_row();
                                $address = get_sub_field('title_or_text'); ?>

                                <span class="text-dark">
                            <?= $address; ?>
                        </span>

                            <?php endwhile;
                        endif; ?>
                    </div>
                    <div>
                        <?php
                        if (have_rows('phone_list', 'option')):
                            while (have_rows('phone_list', 'option')) : the_row();
                                $phone = get_sub_field('title_or_text');
                                $phone_url = get_sub_field('url');
                                ?>
                                <a href="<?= $phone_url; ?>"
                                   class="text-dark border-end border-danger border-1 border-opacity-50 pe-3">
                                    <?= $phone; ?>
                                </a>

                            <?php endwhile;
                        endif; ?>
                    </div>
                    <div>
                    <span class="text-dark">
                         <?php the_field('fax', 'option') ?>
                    </span>
                    </div>
                    <div>
                        <?php
                        if (have_rows('email_list', 'option')):
                            while (have_rows('email_list', 'option')) : the_row();
                                $phone = get_sub_field('title_or_text');
                                $phone_url = get_sub_field('url');
                                ?>
                                <a href="<?= $phone_url; ?>"
                                   class="text-dark sofia text-lowercase">
                                    <?= $phone; ?>
                                </a>

                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
                <div class="d-flex justify-content-end my-2">
                    <ul class="d-inline-flex gap-3 align-items-end justify-content-end list-unstyled mb-0">
                        <?php
                        if (have_rows('social_list', 'option')):
                            while (have_rows('social_list', 'option')) : the_row();
                                $icon = get_sub_field_object('icon');
                                $url = get_sub_field('url');
                                $value = $icon['value'];
                                ?>
                                <li class="d-flex icon-dark align-items-center justify-content-center">
                                    <a href="<?= $url; ?>"
                                       class="p-2 position-relative">
                                        <i class="<?= $value; ?> d-flex align-items-center justify-content-center fs-5 text-primary"></i>

                                    </a>
                                </li>
                            <?php endwhile;
                        endif; ?>
                    </ul>
                </div>
                <div class="mt-5">
                    <?php
                    $gravity = get_field('gravity_choices');
                    echo do_shortcode('[gravityform id="' . $gravity . '" title="false" description="false" ajax="true"]') ?>
                </div>
            </div>

        </div>
    </section>


<?php get_footer();