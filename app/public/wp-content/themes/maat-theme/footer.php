<footer class="bg-primary">
    <div class="container">
        <div class="row justify-content-center justify-content-lg-start py-3 py-lg-5 g-3">
            <div class="col-lg-3 d-flex justify-content-center justify-content-lg-start">
                <a class="navbar-brand " href="<?php echo esc_url(get_home_url()) ?>">
                    <?php
                    $logo = get_field('footer_logo', 'option');
                    ?>
                    <img class="img-fluid" src="<?= $logo['url'] ?>" alt="<?= get_bloginfo('name'); ?>">
                </a>
            </div>
            <div class="col-lg-3 my-5 my-lg-0 d-flex justify-content-center justify-content-lg-start">
                <?php
                $footer_svg_map = get_field('footer_svg_map', 'option');
                if ($footer_svg_map): ?>
                    <a class="navbar-brand " href="<?php echo esc_url($footer_svg_map['url']) ?>">
                        <img class="img-fluid"
                             src="<?php echo esc_url($footer_svg_map['image']['url']); ?>"
                             alt="<?php echo esc_attr($footer_svg_map['image']['alt']); ?>">
                    </a>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 d-flex flex-column justify-content-center align-items-center align-items-lg-start gap-2">
                <div>
                    <?php
                    if (have_rows('address_list', 'option')):
                        $total_rows = count(get_field('address_list', 'option')); // calculate total rows
                        $current_row = 0; // initialize current row counter
                        while (have_rows('address_list', 'option')) : the_row();$current_row++;
                            $address = get_sub_field('title_or_text'); ?>
                            <span class="text-white">
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
                               class="text-white <?= $class; ?> border-danger border-1 border-opacity-50 px-2">
                                <?= $phone; ?>
                            </a>

                        <?php endwhile;
                    endif; ?>
                </div>
                <div>
                    <span class="text-white">
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
                               class="text-white">
                                <?= $phone; ?>
                            </a>

                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
            <div class="col-lg-2 d-inline-flex gap-2 align-items-center align-items-lg-end justify-content-center justify-content-lg-end">
                <ul class="d-inline-flex gap-3 align-items-end justify-content-end list-unstyled mb-0">
                    <?php
                    if (have_rows('social_list', 'option')):
                        while (have_rows('social_list', 'option')) : the_row();
                            $icon = get_sub_field_object('icon');
                            $url = get_sub_field('url');
                            $value = $icon['value'];
                            ?>
                            <li class="d-flex align-items-center justify-content-center icon-white">
                                <a href="<?= $url; ?>"
                                   class="p-2 position-relative">
                                    <i class="<?= $value; ?> d-flex align-items-center justify-content-center fs-3 "></i>

                                </a>
                            </li>
                        <?php endwhile;
                    endif; ?>
                </ul>
            </div>
        </div>
    </div>

</footer>
</main>
<?php wp_footer(); ?>
<a href="#" rel="nofollow"
   class="backTo_Top position-fixed bg-white text-primary rounded-circle shadow d-flex justify-content-center align-items-center intro">
    <i class="bi bi-chevron-up d-flex justify-content-center align-items-center fs-3"></i>
</a>
</body>
</html>