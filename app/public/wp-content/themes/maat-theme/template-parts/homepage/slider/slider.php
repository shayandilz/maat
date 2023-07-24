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