<footer class="bg-primary" <?php echo is_page_template( 'landing.php') ? 'style="display:none;"' : ''; ?>>
    <?php
    if (is_page_template('contact.php')) { ?>
        <div class="row py-5 align-items-center justify-content-center">
            <div class="col-10 col-lg-4">
                <a href="<?php echo esc_url(get_home_url()) ?>" aria-label="logo">
                    <?php get_template_part('template-parts/svg/footer_contact') ?>
                </a>
            </div>

        </div>
    <?php } else { ?>
        <div class="container">
            <div class="row justify-content-center justify-content-lg-start py-3 py-lg-5 g-3">
                <div class="col-8 col-lg-2 d-flex justify-content-center justify-content-lg-start">
                    <a class="navbar-brand w-75" href="<?php echo esc_url(get_home_url()) ?>" aria-label="logo">
                        <?php
                        the_field('footer_logo', 'option');
                        ?>
                    </a>
                </div>
                <div class="col-lg-3 my-5 my-lg-0 d-flex justify-content-center justify-content-lg-start">
                    <?php
                    $footer_svg_map = get_field('footer_svg_map', 'option');
                    if ($footer_svg_map): ?>
                        <a class="navbar-brand d-flex" href="<?php echo esc_url($footer_svg_map['url']) ?>" aria-label="logo">
                            <img class="img-fluid object-fit-cover" width="400" height="200"
                                 src="<?php echo esc_url($footer_svg_map['image']['url']); ?>"
                                 alt="<?php echo esc_attr($footer_svg_map['image']['alt']); ?>">
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center align-items-center align-items-lg-start gap-2">
                    <div class="text-lg-start text-center">
                        <?php
                        if (have_rows('address_list', 'option')):
                            $total_rows = count(get_field('address_list', 'option')); // calculate total rows
                            $current_row = 0; // initialize current row counter
                            while (have_rows('address_list', 'option')) : the_row();$current_row++;
                                $address = get_sub_field('title_or_text'); ?>
                                <span class="text-white text-shadow">
                                <?= $address; ?>
                            </span>
                                <?= $current_row !== $total_rows ? '<br>' : '' ?>

                            <?php endwhile;
                        endif; ?>
                    </div>
                    <div class="d-inline-flex">
                        <?php
                        if (have_rows('phone_list', 'option')):
                            $total_rows = count(get_field('phone_list', 'option')); // calculate total rows
                            $current_row = 0; // initialize current row counter

                            while (have_rows('phone_list', 'option')) : the_row(); $current_row++;
                                $phone = get_sub_field('title_or_text');
                                $phone_url = get_sub_field('url');
                                $class = 'border-end'; // add border-end class to all links
                                if ($current_row === $total_rows) {
                                    $class = ''; // remove border-end class from last link
                                }
                                ?>
                                <a href="tel:<?= $phone_url; ?>"
                                   class="text-white <?= $class; ?> border-danger border-1 border-opacity-50 px-2 pt-1 text-shadow">
                                    <?= $phone; ?>
                                </a>

                            <?php endwhile;
                        endif; ?>
                    </div>
                    <div>
                    <span class="text-white text-shadow">
                         <?php the_field('fax', 'option') ?>
                    </span>
                    </div>
                    <div>
                        <?php
                        if (have_rows('email_list', 'option')):
                            while (have_rows('email_list', 'option')) : the_row();
                                $phone = get_sub_field('title_or_text');
                                $phone_url = get_sub_field('url__optional_');
                                ?>
                                <a href="mailto:<?= $phone_url; ?>"
                                   class="text-white sofia text-lowercase text-shadow">
                                    <?= $phone; ?>
                                </a>

                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
                <div class="col-lg-2 d-inline-flex gap-2 align-items-center align-items-lg-end justify-content-center justify-content-lg-end">
                    <ul class="d-inline-flex gap-3 align-items-end justify-content-end list-unstyled mb-0">
                        <?php
                        $i = 0;
                        if (have_rows('social_list', 'option')):
                            while (have_rows('social_list', 'option')) : the_row();
                                $i++;
                                $icon = get_sub_field_object('icon');
                                $name = get_sub_field_object('name');
                                $url = get_sub_field('url');
                                $value = $icon['value'];
                                ?>
                                <li class="d-flex align-items-center justify-content-center text-white <?= $i == 1 ? 'border-end border-white pe-2' : ''?>">
                                    <a href="<?= $url; ?>" aria-label="<?= $name['value']; ?>"
                                       class="p-2 position-relative lazy">
                                        <i class="<?= $value; ?> d-flex align-items-center justify-content-center fs-3 "></i>

                                    </a>
                                </li>
                            <?php endwhile;
                        endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>


</footer>
</main>
<?php wp_footer(); ?>
<a href="#" rel="nofollow"
   class="backTo_Top position-fixed bg-white text-primary rounded-circle shadow d-flex justify-content-center align-items-center"
   aria-label="backToTop" data-aos="fade-left" data-aos-duration="500">
    <i class="bi bi-chevron-up d-flex justify-content-center align-items-center fs-3"></i>
</a>
</body>
</html>