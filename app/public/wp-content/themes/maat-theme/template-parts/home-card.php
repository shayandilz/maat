<article class="position-relative overflow-hidden d-flex flex-column h-100 justify-content-between">
    <a href="<?php echo get_permalink(); ?>">
        <div class="ratio ratio-16x9">
            <img src="<?php echo get_the_post_thumbnail_url() ?>"
                 class="object-fit"
                 alt="<?php the_title(); ?>">
        </div>
        <div class="d-flex justify-content-center align-items-start flex-column gap-3 pt-4">
            <h6 class="text-start lh-lg text-primary ">
                <?php the_title(); ?>
            </h6>
            <p class=" mb-4 fs-6 text-dark text-justify">
                <?= wp_trim_words(get_the_content(), 30); ?>
            </p>
        </div>
    </a>
    <div class="button-primary w-auto px-0">
        <a class="btn bg-transparent position-relative fs-6 p-0 mb-2" data-aos="fade-left" data-aos-delay="500" href="<?php echo get_permalink(); ?>">
            بیشتر بدانید
        </a>
    </div>
</article>