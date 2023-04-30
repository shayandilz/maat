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

    <section class="py-5 container min-vh-100 mt-5 mt-lg-0">
        <ul class="nav nav-tabs border-bottom-0 justify-content-lg-center gap-4 flex-nowrap overflow-tab overflow-x-scroll overflow-y-hidden mt-5 my-lg-5"
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
            array_unshift($cats, (object)array('name' => 'مشاهده همه', 'term_taxonomy_id' => $term_ids));
            $s = 0;
            $i = 0;
            foreach ($cats as $key => $cat) { ?>
                <li class="nav-item" role="presentation">
                    <button class="px-lg-5 py-lg-4 filterPortfolio fs-5 rounded-0 lazy text-center border-0 position-relative d-inline-block nav-link <?php if ($i == 0) {
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
                <div class="tab-pane fade <?php if ($key == 0) {
                    echo 'show active';
                } ?>" id="cat-<?php echo $key; ?>" role="tabpanel"
                     aria-labelledby="cat-<?php echo $key; ?>-tab">
                    <div class="row gap-4 justify-content-lg-start justify-content-center"
                         id="my-custom-post-type-container">
                        <?php
                        $args = array(
                            'post_type' => 'portfolio',
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => 1,
                            'posts_per_page' => 10,
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
                                } ?>
                                <div class="<?php echo $col_class; ?> row align-items-center aos" data-aos="zoom-in"
                                     data-aos-delay="<?= $i; ?>00">
                                    <div class="ratio ratio-21x9 px-0 px-lg-2 order-2 order-lg-1">
                                        <img src="<?php echo get_the_post_thumbnail_url() ?>"
                                             class="object-fit"
                                             title="<?php the_title(); ?>"
                                             alt="<?php the_title(); ?>">
                                    </div>
                                    <?php if ($i == 1 || $i == 2 || $i == 3) { ?>
                                        <!--  showing year / brand name and client   -->
                                        <div class="my-lg-5 mb-3 mt-2 col-lg-6 d-flex flex-column align-items-start gap-3 order-3 order-lg-2">

                                            <?php
                                            $featured_post = get_field('client');
                                            if ($featured_post) { ?>
                                                <div class="d-inline-flex gap-3 align-items-center">
                                                    <h3 class="mb-0"><?php echo esc_html($featured_post->post_title); ?></h3>
                                                    <span class="sofia text-primary fs-5 fw-medium text-uppercase"> / <?php the_field('brand_in_english'); ?></span>
                                                </div>
                                            <?php } else {
                                                echo '';
                                            }; ?>
                                            <div>
                                                <h4 class="fs-6">
                                                    مشتری/ <?php the_title(); ?>
                                                </h4>
                                                <h6 class="fs-6">
                                                    سال تولید اثر/ <?php the_field('year'); ?>
                                                </h6>
                                            </div>
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

<?php get_footer();
