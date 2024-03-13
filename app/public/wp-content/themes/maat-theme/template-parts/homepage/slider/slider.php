<div class="swiper home-swiper" data-aos="fade-in" data-aos-delay="200">
    <div class="swiper-wrapper">
        <?php
        if (get_field('image__svg') == 'image') {
            $images = get_field('slider_image');
            if ($images): ?>
                <?php foreach ($images as $image): ?>
                    <div class="swiper-slide">
                        <img class="img-fluid"
                             src="<?php echo esc_url($image['url']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                    </div>
                <?php endforeach; ?>
            <?php endif;
        } ?>
        <?php if (get_field('image__svg') == 'svg') {
            if (have_rows('slider_svg')):
                while (have_rows('slider_svg')) : the_row(); ?>
                    <div class="swiper-slide bg-white">
                          <?php echo get_sub_field('svg'); ?>
                    </div>
                <?php
                endwhile;
            endif;
        } ?>
    </div>
</div>
<?php