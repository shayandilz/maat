<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="keywords" content="<?= get_bloginfo('name'); ?>">
    <meta name="description" content="<?= get_bloginfo('description'); ?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KYV67SD976"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-KYV67SD976');
    </script>
</head>

<body <?php body_class(); ?>>

<header class="w-100 lazy <?php echo is_page_template('landing-1403.php') || is_page_template('landing.php') ? 'd-none' : ''; ?>"
        id="main-header"  <?php is_user_logged_in() ?? 'style="margin-top:30px" '; ?>>
    <div class="main__header flex-nowrap bg-white py-lg-3 lazy">
        <div class="iphone__inner d-lg-none d-block z-top position-relative">
            <div class="d-inline-flex justify-content-between align-items-center p-3 w-100 z-top position-absolute bg-white">
                <?php get_template_part('template-parts/header-button'); ?>
                <a class="navbar-brand me-0" href="<?php echo esc_url(get_home_url()) ?>" aria-label="logo">
                    <?php
                    the_field('header_logo', 'option');
                    ?>
                </a>
            </div>

            <div class="nav-container position-absolute end-0 top-0 start-0 bottom-0 overflow-visible">
                <div class="nav-container__menu bg-white position-absolute top-0 vh-100 overflow-hidden">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'headerMenuLocation',
                        'menu_class' => 'navbar-nav mt-5 w-100 flex-column pe-0 gap-4 w-100 justify-content-between',
                        'container' => false,
                        'menu_id' => 'navbarTogglerMenu',
                        'item_class' => 'nav-item',
                        'link_class' => 'nav-link fs-3 text-dark fw-bold p-0',
                        'depth' => 2,
                    ));
                    ?>
                    <i class="fab fa-arcadecompany"></i>
                </div>

                <div class="nav-container__social bg-primary position-absolute top-0 vh-100 overflow-hidden">
                    <ul class="d-flex flex-column pt-4 align-items-center justify-content-center list-unstyled">
                        <?php
                        if (have_rows('social_list', 'option')):
                            while (have_rows('social_list', 'option')) : the_row();
                                $icon = get_sub_field_object('icon');
                                $url = get_sub_field('url');
                                $value = $icon['value'];
                                $name = get_sub_field_object('name');
                                ?>
                                <li class="d-flex align-items-center justify-content-center">
                                    <a href="<?= $url; ?>" aria-label="<?= $name['value']; ?>"
                                       class="p-1 social-icon position-relative d-block">
                                        <i class="<?= $value; ?> d-flex align-items-center justify-content-center fs-1"></i>

                                    </a>
                                </li>
                            <?php endwhile;
                        endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="container d-none d-lg-block">

            <div class="row navbar lazy-slow">
                <div class="col-lg-6 d-none d-lg-block justify-content-start " id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'headerMenuLocation',
                        'menu_class' => 'navbar-nav flex-row pe-0 gap-lg-5 gap-4 w-100 justify-content-between desktop-menu',
                        'container' => false,
                        'menu_id' => 'navbarTogglerMenu',
                        'item_class' => 'nav-item',
                        'link_class' => 'nav-link text-success p-0 position-relative',
                        'depth' => 2,
                    ));
                    ?>
                </div>
                <div class="d-flex col-lg-6 justify-content-end align-items-center">
                    <a class="navbar-brand me-0" href="<?php echo esc_url(get_home_url()) ?>" aria-label="logo">
                        <?php
                        the_field('header_logo', 'option');
                        ?>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
<?php
if (is_single() && get_post_type() == 'post') { ?>
    <div class="progress-container position-fixed w-100 pt-3 lazy" style="z-index: 10">
        <!-- Add this to your HTML file -->
        <div class="progress rounded-0">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"></div>
        </div>
    </div>
<?php } ?>
<?php if (!is_page_template('landing.php') && !is_page_template('landing-1403.php'))  { ?>
    <div class="gap"></div>
<?php } ?>
