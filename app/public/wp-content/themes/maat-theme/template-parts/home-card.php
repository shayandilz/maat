<article class="position-relative overflow-hidden d-flex flex-column h-100 justify-content-between">
    <?php
    $j = $args['j'];
    $j_display = $j < 10 ? '0' . $j : $j; ?>
    <a href="<?php echo get_permalink(); ?>">
        <div class="card-image d-flex flex-column justify-content-between align-items-end p-4 text-end">
            <?php if ($j) { ?>
                <div class="post-number display-3 fw-bold"><?= $j_display; ?></div>
            <?php }; ?>
            <div class="card-title display-7 fw-bold sofia text-uppercase">
                <?php if( get_field('card_label')) {
                    echo get_field('card_label');
                }
                else {
                    echo get_field('default_label_cards' , 'option');
                }?>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-start flex-column gap-3 pt-4">
            <!--            <h6 class="text-start lh-lg text-primary ">-->
            <!--                --><?php //the_title(); ?>
            <!--            </h6>-->
            <p class=" mb-4 fs-6 text-dark text-justify">
                <?= wp_trim_words(get_the_content(), 30); ?>
            </p>
        </div>
    </a>
    <div class="button-primary w-auto px-0">
        <a class="btn bg-transparent position-relative fs-6 p-0 mb-2 fw-semibold" data-aos="fade-left" data-aos-delay="500"
           href="<?php echo get_permalink(); ?>">
            بیشتر بدانید
        </a>
    </div>
</article>