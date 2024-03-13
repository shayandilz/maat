<?php /* Template Name: landing */
/**
 * Contact page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
 */
get_header(); ?>

    <section class="section-class lazy position-relative min-vh-100 overflow-hidden">
        <div class="d-flex flex-column align-items-center justify-content-center position-absolute top-0 end-0 w-100 sofia fw-semibold h-100 lazy"
             id="section1">
            <svg class="z-1 lazy" height='100%' id='mask-text' width='100%'>
                <rect fill-opacity='1' fill='#FFF' height='100%' id='base' mask='url(#mask)' width='100%' x='0'
                      y='0'></rect>
                <text class="text-uppercase" x="50%" y="50%" dy="-14em" text-anchor="middle" fill="black">
                    maat marcom holding
                </text>
                <mask id='mask' class="display-1 fw-semibold">
                    <rect fill='#FFF' height='100%' width='100%' x='0' y='0'></rect>
                    <g id="landing" class="lazy" style="transform-origin: center">
                        <text class="lazy" dy='-0.55em' x='50%' y='53%' text-anchor="middle">
                            MAKE IT
                        </text>
                        <text dy='0.2em' x='50%' y='53%' text-anchor="middle">
                            STUNNING
                        </text>
                    </g>
                </mask>
                <text class="text-capitalize" x="50%" y="50%" dy="10em" text-anchor="middle" fill="black">
                    Advertising And Marketing Agency
                </text>
            </svg>

        </div>
        <div class="d-flex flex-column align-items-center justify-content-center position-absolute top-0 end-0 w-100 sofia fw-semibold h-100 bg-primary"
             id="section2">
            <div class="d-flex flex-column align-items-center justify-content-center sofia fw-semibold lazy gap-4">
                <svg width="90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 134.66 134.67">
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                            <path d="M126.18,67.33A58.85,58.85,0,1,1,67.33,8.48a58.92,58.92,0,0,1,58.85,58.85M67.33,0a67.34,67.34,0,1,0,67.33,67.33A67.4,67.4,0,0,0,67.33,0" fill="#fff"/>
                            <polygon
                                    points="87.77 39.27 67.39 80.47 46.77 39.27 43.25 39.27 35.13 95.78 43.91 95.78 48.53 61.82 65.58 95.78 69.16 95.78 85.96 62.08 90.61 95.78 99.53 95.78 91.3 39.27 87.77 39.27" fill="#fff"/>
                        </g>
                    </g>
                </svg>
                <h5 class="text-white fw-bold fs-5 text-center mb-5">Advertising And Marketing Agency</h5>
                <div class="container margin-t-80">
                    <?php if (have_rows('companies_list', 'option')): ?>
                        <ul class="row flex-row-reverse flex-wrap list-unstyled align-items-center justify-content-between g-2">
                            <?php while (have_rows('companies_list', 'option')): the_row();
                                $svg = get_sub_field('svg');
                                if ($svg == 'Maat') { ?>
                                    <li class="col-lg-3 d-flex justify-content-center align-items-center mb-3 border-opacity-50 border-white border-start py-3" title="<?= $svg; ?>">
                                        <a href="<?php esc_url(the_sub_field('url')); ?>" target="_blank">
                                            <?php
                                            $svgWidth = '130';
                                            $svgHeight = '60';
                                            $args = array(
                                                'svgWidth' => $svgWidth,
                                                'svgHeight' => $svgHeight
                                            );
                                            get_template_part('template-parts/svg/companies/maat', null, $args);
                                            ?>
                                        </a>
                                    </li>
                                <?php }
                                if ($svg == 'Armani') { ?>
                                    <li class="col-lg-3 d-flex justify-content-center align-items-center mb-3 border-opacity-50 border-white border-start py-3" title="<?= $svg; ?>">
                                        <a href="<?php esc_url(the_sub_field('url')); ?>" target="_blank">
                                            <?php
                                            $svgWidth = '150';
                                            $svgHeight = '60';
                                            $args = array(
                                                'svgWidth' => $svgWidth,
                                                'svgHeight' => $svgHeight
                                            );
                                            get_template_part('template-parts/svg/companies/armani', null, $args);
                                            ?>
                                        </a>
                                    </li>
                                <?php }
                                if ($svg == 'Macan') { ?>
                                    <li class="col-lg-3 d-flex justify-content-center align-items-center mb-3 border-opacity-50 border-white border-start py-3" title="<?= $svg; ?>">
                                        <a href="<?php esc_url(the_sub_field('url')); ?>" target="_blank">
                                            <?php
                                            $svgWidth = '130';
                                            $svgHeight = '60';
                                            $args = array(
                                                'svgWidth' => $svgWidth,
                                                'svgHeight' => $svgHeight
                                            );
                                            get_template_part('template-parts/svg/companies/macan', null, $args);
                                            ?>
                                        </a>
                                    </li>
                                <?php }
                                if ($svg == 'Raifilm') { ?>
                                    <li class="col-lg-3 d-flex justify-content-center align-items-center mb-3 py-3" title="<?= $svg; ?>">
                                        <a href="<?php esc_url(the_sub_field('url')); ?>" target="_blank">
                                            <?php
                                            $svgWidth = '150';
                                            $svgHeight = '60';
                                            $args = array(
                                                'svgWidth' => $svgWidth,
                                                'svgHeight' => $svgHeight
                                            );
                                            get_template_part('template-parts/svg/companies/raifilm', null, $args);
                                            ?>
                                        </a>
                                    </li>
                                <?php }
                                if ($svg == 'Hoodad') { ?>
                                    <li class="col-lg d-flex justify-content-center align-items-center mb-3 border-opacity-50 border-white border-start py-3" title="<?= $svg; ?>">
                                        <a href="<?php esc_url(the_sub_field('url')); ?>" target="_blank">
                                            <?php
                                            $svgWidth = '130';
                                            $svgHeight = '60';
                                            $args = array(
                                                'svgWidth' => $svgWidth,
                                                'svgHeight' => $svgHeight
                                            );
                                            get_template_part('template-parts/svg/companies/hoodad', null, $args);
                                            ?>
                                        </a>
                                    </li>
                                <?php }
                                if ($svg == 'Houger') { ?>
                                    <li class="col-lg d-flex justify-content-center align-items-center mb-3 border-opacity-50 border-white border-start py-3" title="<?= $svg; ?>">
                                        <a href="<?php esc_url(the_sub_field('url')); ?>" target="_blank">
                                            <?php
                                            $svgWidth = '130';
                                            $svgHeight = '60';
                                            $args = array(
                                                'svgWidth' => $svgWidth,
                                                'svgHeight' => $svgHeight
                                            );
                                            get_template_part('template-parts/svg/companies/houger', null, $args);
                                            ?>
                                        </a>
                                    </li>
                                <?php }
                                if ($svg == 'Nilmoti') { ?>
                                    <li class="col-lg d-flex justify-content-center align-items-center mb-3 border-opacity-50 border-white border-start py-3" title="<?= $svg; ?>">
                                        <a href="<?php esc_url(the_sub_field('url')); ?>" target="_blank">
                                            <?php
                                            $svgWidth = '130';
                                            $svgHeight = '60';
                                            $args = array(
                                                'svgWidth' => $svgWidth,
                                                'svgHeight' => $svgHeight
                                            );
                                            get_template_part('template-parts/svg/companies/nilmoti', null, $args);
                                            ?>
                                        </a>
                                    </li>
                                <?php }
                                if ($svg == 'Ager') { ?>
                                    <li class="col-lg d-flex justify-content-center align-items-center mb-3 border-opacity-50 border-white border-start py-3" title="<?= $svg; ?>">
                                        <a href="<?php esc_url(the_sub_field('url')); ?>" target="_blank">
                                            <?php
                                            $svgWidth = '130';
                                            $svgHeight = '60';
                                            $args = array(
                                                'svgWidth' => $svgWidth,
                                                'svgHeight' => $svgHeight
                                            );
                                            get_template_part('template-parts/svg/companies/ager', null, $args);
                                            ?>
                                        </a>
                                    </li>
                                <?php }
                                if ($svg == 'Taal') { ?>
                                    <li class="col-lg d-flex justify-content-center align-items-center mb-3 py-3" title="<?= $svg; ?>">
                                        <a href="<?php esc_url(the_sub_field('url')); ?>" target="_blank">
                                            <?php
                                            $svgWidth = '130';
                                            $svgHeight = '60';
                                            $args = array(
                                                'svgWidth' => $svgWidth,
                                                'svgHeight' => $svgHeight
                                            );
                                            get_template_part('template-parts/svg/companies/taal', null, $args);
                                            ?>
                                        </a>
                                    </li>
                                <?php } ?>

                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


<?php get_footer();