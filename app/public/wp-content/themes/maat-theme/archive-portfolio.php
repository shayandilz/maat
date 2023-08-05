<?php
get_header();
$portfolio = array(
    'post_type' => 'portfolio',
    'post_status' => 'publish',
    'posts_per_page' => '-1',
    'ignore_sticky_posts' => true
);
$loop_portfolio = new WP_Query($portfolio);
?>

<section class="pb-5 container min-vh-100">
    <ul class="nav nav-tabs border-bottom-0 justify-content-lg-between gap-2 gap-lg-4 flex-nowrap overflow-tab overflow-x-scroll overflow-y-hidden mb-lg-4 portfolio-nav-item"
        id="myTab"
        role="tablist">

        <?php
        $args_cat = array(
            'taxonomy' => 'portfolio_categories',
//            'hide_empty'=> false,
            'orderby' => 'name',
            'order' => 'ASC'
        );
        $cats = get_categories($args_cat);
        foreach ($cats as $key => $cat) {
            $term_ids[] = $cat->term_taxonomy_id;
        }
        // Add a new category object at the beginning for "Show All" option
        //        array_unshift($cats, (object)array('name' => 'ALL', 'term_taxonomy_id' => $term_ids));
        $s = 0;
        $i = 0;
        foreach ($cats as $key => $cat) { ?>
            <li class="nav-item w-100" role="presentation">
                <button class="text-uppercase sofia px-lg-4 h-100 py-lg-4 filterPortfolio fs-6 rounded-0 lazy text-center border-0 position-relative d-inline-block w-100 nav-link <?php if ($i == 0) {
                    $i = 1;
                    echo 'active';
                } ?>"
                        id="cat-<?php echo $key ?>-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#cat-<?php echo $key ?>"
                        type="button" role="tab"
                        aria-controls="cat-<?php echo $key ?>"
                        aria-selected="true">
                    <?php echo $cat->name; ?>
                </button>
            </li>
            <?php $s++;
        }
        wp_reset_postdata() ?>
    </ul>

    <div class="tab-content" id="myTabContent" role="tablist">
        <?php foreach ($cats as $key => $cat) { ?>
            <div class="tab-pane fade <?php if ($key == 1) {
                echo 'show active';
            } ?>" id="cat-<?php echo $key; ?>" role="tabpanel"
                 aria-labelledby="cat-<?php echo $key; ?>-tab">
                <div class="row gap-4 justify-content-center"
                     id="my-custom-post-type-container">
                    <?php
                    $args = array(
                        'post_type' => 'portfolio',
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => 1,
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'portfolio_categories',
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'field' => 'term_id',
                                'terms' => $cat->term_taxonomy_id,
                                'operator' => 'IN'
                            )
                        )
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                        $i = 0;
                        while ($loop->have_posts()) : $loop->the_post();
                            $i++;
                            // determine which class to use based on post index
                            if ($i == 1) {
                                $col_class = 'col-12';
                            } else if ($i == 2 || $i == 3) {
                                $col_class = 'col-md-6';
                            } else {
                                $col_class = 'col-md-3';
                            }
                            $current_post = get_post();
                            ?>
                            <div class="<?php echo $col_class; ?> row align-items-center aos" data-aos="zoom-in"
                                 data-aos-delay="<?= $i; ?>00">
                                <div class="ratio ratio-21x9 px-0 px-lg-2 order-2 order-lg-1 portfolio-card overflow-hidden shadow-sm position-relative">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>"
                                         class="object-fit"
                                         <?php  if (!has_term('video', 'portfolio_categories', $current_post)) {?>
                                             data-bs-toggle="modal" data-bs-target="#modal-<?= get_the_ID(); ?>";
                                         <?php }?>
                                         title="<?php the_title(); ?>"
                                         alt="<?php the_title(); ?>">
                                    <?php
                                    // Assuming $current_post is the current post object in the loop
                                    if (has_term('video', 'portfolio_categories', $current_post)) {
                                        ?>
                                        <span data-bs-toggle="modal" data-bs-target="#modal-<?= get_the_ID(); ?>"
                                                class="play_button position-absolute start-50 translate-middle rounded-circle d-flex justify-content-center align-items-center">
                                                <i class="bi bi-play-circle display-2 shadow-sm bg-primary bg-opacity-75 rounded-circle p-2 text-white"></i>
                                        </span>
                                        <?php } ?>
                                </div>
                                <?php if ($i == 1) { ?>
                                    <!--  showing year / brand name and client   -->
                                    <div class="my-lg-5 mb-3 mt-2 col-lg-6 d-flex flex-column align-items-start gap-3 order-3 order-lg-2">

                                        <?php
                                        $featured_post = get_field('client');
                                        if ($featured_post) { ?>
                                            <div class="d-inline-flex gap-3 align-items-center  w-100 pb-2">
                                                <h3 class="mb-0 product-placeholder"><?php echo esc_html($featured_post->post_title); ?></h3>
                                                <span class="sofia text-primary fs-5 fw-medium text-uppercase"> / <?php the_field('brand_in_english'); ?></span>
                                            </div>
                                        <?php } else {
                                            echo '';
                                        }; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($i == 2 || $i == 3) { ?>
                                    <!--  showing year / brand name and client   -->
                                    <div class="my-lg-5 mb-3 mt-2 col-lg-12 d-flex flex-column align-items-start gap-3 order-3 order-lg-2 px-0">

                                        <?php
                                        $featured_post = get_field('client');
                                        if ($featured_post) { ?>
                                            <div class="d-inline-flex gap-3 align-items-center  w-100 pb-2">
                                                <h3 class="mb-0"><?php echo esc_html($featured_post->post_title); ?></h3>
                                                <span class="sofia text-primary fs-5 fw-medium text-uppercase"> / <?php the_field('brand_in_english'); ?></span>
                                            </div>
                                        <?php } else {
                                            echo '';
                                        }; ?>
                                        <!--                                            <div class="w-100">-->
                                        <!--                                                <h4 class="fs-6  pb-2">-->
                                        <!--                                                    مشتری/ --><?php //the_title(); ?>
                                        <!--                                                </h4>-->
                                        <!--                                                <h6 class="fs-6  pb-2">-->
                                        <!--                                                    سال تولید اثر/ --><?php //the_field('year'); ?>
                                        <!--                                                </h6>-->
                                        <!--                                            </div>-->
                                    </div>
                                <?php } ?>
                                <?php if ($i == 1) { ?>
                                    <!--  showing Portfolio   -->
                                    <div class="my-3 col-lg-6 order-lg-3 order-1 pe-0 pe-lg-2">
                                        <h1 class="sofia display-1 text-uppercase text-end text-primary fw-bolder">
                                            PORTFOLIO
                                        </h1>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endwhile;
                    }
                    wp_reset_postdata() ?>
                </div>
            </div>
        <?php } ?>

    </div>
</section>

<?php get_footer(); ?>
<?php
if ($loop_portfolio->have_posts()) {
    while ($loop_portfolio->have_posts()) : $loop_portfolio->the_post(); ?>
        <!-- Modal -->
        <div class="modal portfolio-modal fade" id="modal-<?= get_the_ID(); ?>" tabindex="-1"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog portfolio-dialog modal-xl pt-lg-3 glass-card"
                 style="pointer-events: auto!important;">
                <div class="modal-content bg-transparent border-3 border-white border">
                    <div class="modal-body p-lg-3 p-1">
                        <div class="swiper portfolio-swiper rounded-2">
                            <div class="swiper-wrapper">
                                <?php
                                if (have_rows('gallery_slider')):
                                    while (have_rows('gallery_slider')) : the_row(); ?>
                                        <div class="swiper-slide">
                                            <?php if (get_sub_field('file_type') == 'image') { ?>
                                                <img class="w-100"
                                                     src="<?php echo get_sub_field('item_image')['url']; ?>"
                                                     alt="<?php echo get_sub_field('item_video')['title']; ?>">
                                            <?php } ?>
                                            <?php if (get_sub_field('file_type') == 'video') { ?>
                                                <video class="w-100" controls
                                                       src="<?php echo get_sub_field('item_video')['url']; ?>">
                                                </video>
                                            <?php } ?>
                                        </div>
                                    <?php endwhile;
                                endif;
                                ?>
                            </div>
                            <?php  $row_count = count(get_field('gallery_slider'));
                                if ($row_count > 1) {?>
                            <div class="row px-3 justify-content-between align-items-center bg-white">
                                <div class="col-6 d-flex justify-content-start gap-3 text-primary fs-4">
                                    <div class="swiper-next" data-aos="fade-left" data-aos-delay="300"
                                         data-aos-offset="0">
                                        <?php get_template_part('template-parts/svg/right-arrow'); ?>
                                    </div>
                                    <div class="swiper-prev" data-aos="fade-right" data-aos-delay="300"
                                         data-aos-offset="0">
                                        <?php get_template_part('template-parts/svg/left-arrow'); ?>
                                    </div>
                                </div>
                                <div class="col-6" data-aos="fade-up" data-aos-delay="400" data-aos-offset="0">
                                    <div class="swiper-paginate-portfolio text-primary d-flex justify-content-end sofia gap-1 align-items-center fw-light"></div>
                                </div>
                            </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;
}
wp_reset_postdata() ?>
