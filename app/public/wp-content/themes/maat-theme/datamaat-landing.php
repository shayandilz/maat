<?php /* Template Name: data maat landing */
/**
 * Contact page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
get_header(); ?>
<?php
//hero
?>
<?php
$logo = get_field( 'logo' );
?>
    <section class="bg-primary pt-lg-0 pt-4">
        <div class="container position-relative">
            <a class="position-absolute top-0 start-0 navbar-brand  mt-5 d-none d-lg-inline"
               href="<?php echo esc_url( get_home_url() ) ?>" aria-label="logo">
                <img class="w-50 object-fit-contain" src="<?= $logo['url'] ?? ''; ?>" alt="<?= $logo['title']; ?>">
            </a>
            <a class="w-75 position-absolute top-0 z-10 text-center start-0 end-0 translate-middle-y mt-3 navbar-brand  d-lg-none"
               href="<?php echo esc_url( get_home_url() ) ?>" aria-label="logo">
                <img class="w-100 px-4 object-fit-contain" src="<?= $logo['url'] ?? ''; ?>"
                     alt="<?= $logo['title']; ?>">
            </a>
        </div>
		<?php
		$heroImage       = get_field( 'hero-image' );
		$heroImageMobile = get_field( 'hero-image-mobile' );
		?>
        <img class="w-100 object-fit-cover <?= $heroImageMobile ? 'd-none d-lg-inline' : ''; ?>"
             src="<?= $heroImage['url'] ?? '' ?>"
             alt="<?= $heroImage['title'] ?? ''; ?>">
		<?php
		if ( $heroImageMobile ):
			?>
            <img class="w-100 object-fit-cover pt-5 d-lg-none" src="<?= $heroImageMobile['url'] ?? '' ?>"
                 alt="<?= $heroImageMobile['title'] ?? ''; ?>">
		<?php endif; ?>
    </section>
<?php
//introduction
$introduction = get_field( 'introduction' );
if ( $introduction ) :
	?>
    <section
            class="container py-5 p-2 px-lg-0 d-flex flex-wrap flex-lg-nowrap justify-content-center align-items-center gap-3">
        <div class="col-lg-3 col-12 p-lg-4 text-center">
            <h2 class="mb-3 text-landing fw-bolder"><?= $introduction['title'] ?></h2>
			<?php
			if ( $introduction['image'] ):?>
                <img class="object-fit-contain" src="<?= $introduction['image']['url'] ?? ''; ?>"
                     alt="<?= $introduction['image']['title'] ?? ''; ?>">
			<?php endif; ?>
        </div>
        <div>
            <article class="text-justify px-lg-3 px-2 fs-5 text-dark text-opacity-75">
				<?= $introduction['content'] ?? ''; ?>
            </article>
        </div>

    </section>
<?php endif; ?>
    <section class="gradient-landing py-5">
        <div class="container d-flex flex-wrap justify-content-center gap-3 align-items-center">
            <div class="col-lg-5 col-11 text-center">
                <img class="w-100 pb-5" src="<?= get_field( 'form-image' )['url'] ?? ''; ?>"
                     alt="<?= get_field( 'form-image' )['title'] ?? ''; ?>">
            </div>
            <div class="col-lg-5 col-11" id="form-landing">
                <h5 class="fw-bolder text-landing fs-5">ارﺗﺒﺎط ﺑﺎ ﻣﺎ</h5>
				<?php
				$gravity = get_field( 'form-id' );
				echo do_shortcode( '[gravityform id="' . $gravity . '" title="false" description="false" ajax="true"]' ) ?>
            </div>
        </div>
    </section>
<?php
//specs
$specs = get_field( 'specs' );
if ( $specs ):
	?>
    <section class="bg-dark bg-opacity-10 py-5">
        <div class="container">
            <div class="row gap-4 col-lg-8 mx-auto justify-content-center align-items-center">
				<?php
				foreach ( $specs as $spec ) :
					?>
                    <div class="p-4 px-2 px-lg-4 text-center">
                        <div class="d-flex gap-4 flex-wrap flex-lg-nowrap align-items-center justify-content-center mt-3">
                            <div class="col-lg-4 d-grid justify-content-center row-gap-4">
                                <div class="bg-landing rounded-pill d-inline-flex gap-2 p-0 pe-5 align-items-center">
                                    <div class="bg-primary dot-round rounded-circle"></div>
                                    <h3 class="text-white fs-5 fw-bolder mb-0 p-1 pt-2"><?= $spec['title']; ?></h3>
                                </div>
                                <img class="object-fit-contain mx-auto" src="<?= $spec['image']['url'] ?? '' ?>"
                                     alt="<?= $spec['image']['title'] ?? '' ?>">
                            </div>
                            <article class="fs-5 text-justify"><?= $spec['content']; ?></article>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>

    </section>
<?php endif; ?>

<?php
//steps
$steps = get_field( 'steps' );
if ( $steps ):
	?>
    <section class="py-lg-5 pb-5 container">
        <div class="d-flex gap-lg-5 flex-wrap row-gap-4 justify-content-center align-items-center">
            <div class="order-last order-lg-start col-lg-5 text-center">
				<?php
				if ( $steps['title'] ):
					?>
                    <div class="bg-landing rounded-pill d-inline-flex gap-2 p-2 pe-4 align-items-center">
                        <div class="bg-primary dot-round rounded-circle"></div>
                        <h2 class="text-white fs-5 fw-bolder mb-0 p-1 pt-2"><?= $steps['title']; ?></h2>
                    </div>
				<?php
				endif;
				?>
				<?php
				if ( $steps['image'] ): ?>
                    <img class="w-100 step-image p-3 object-fit-contain" src="<?= $steps['image']['url']; ?>"
                         alt="<?= $steps['image']['title']; ?>">
				<?php endif; ?>
            </div>
            <div class="order-lg-last order-start col-lg-5 col-11">
				<?php
				$allSteps = get_field( 'allsteps' );
				if ( $allSteps ) :
					foreach ( $allSteps as $allStep ) :?>
                        <div class="d-block my-4 mb-lg-5">
							<?php
							if ( $allStep['image'] ):?>
                                <img width="80" class="w-auto object-fit-contain" src="<?= $allStep['image']['url'] ?>"
                                     alt="<?= $allStep['image']['title'] ?>">
							<?php endif;
							if ( $allStep['title'] ): ?>
                                <div class="bg-landing rounded-pill d-inline-flex gap-2 p-2 mb-3 pe-4 align-items-center">
                                    <div class="bg-primary dot-round rounded-circle"></div>
                                    <h4 class="text-white fs-5 fw-bolder mb-0 p-1 pt-2"><?= $allStep['title']; ?></h4>
                                </div>
							<?php endif;
							if ( $allStep['content'] ): ?>
                                <article
                                        class="fs-5 text-dark text-justify text-opacity-75"><?= $allStep['content']; ?></article>
							<?php endif; ?>
                        </div>
					<?php
					endforeach;
				endif;

				?>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php
$phone     = get_field( 'phone' );
$phoneShow = get_field( 'phone-show' );
$email     = get_field( 'email' );
$socials   = get_field( 'socials' );
?>
    <footer class="bg-primary position-relative pt-5">
        <div class="bg-landing rounded-pill py-2 p-lg-3 pb-lg-2 pb-1 fs-5 col-lg-3 col-11 gap-lg-4 translate-middle d-flex gap-3 align-items-center justify-content-center position-absolute top-0 end-50 start-50">
            <a class="d-flex justify-content-end gap-2 align-items-center" href="mailto:<?= $email; ?>">
				<?= $email; ?>
                <svg width="25" height="25" id="Layer_2" data-name="Layer 2" viewBox="0 0 23.87 18.96">
                    <g id="Layer_1-2" data-name="Layer 1">
                        <path class="cls-1-1"
                              d="M20.05,0H3.82C1.72,0,0,1.72,0,3.82V13.31c0,3.12,2.54,5.65,5.65,5.65h12.57c3.12,0,5.65-2.54,5.65-5.65V3.82c0-2.11-1.72-3.82-3.82-3.82Zm-.64,2.53l-6.23,7.14c-.32,.36-.76,.57-1.24,.57s-.93-.2-1.24-.57L4.46,2.53h14.95Zm-1.19,13.89H5.65c-1.72,0-3.12-1.4-3.12-3.12V4.17l6.25,7.17c.79,.91,1.94,1.43,3.15,1.43s2.36-.52,3.15-1.43l6.25-7.17V13.31c0,1.72-1.4,3.12-3.12,3.12Z"/>
                    </g>
                </svg>
            </a>
            <a class="d-flex justify-content-end gap-2 align-items-center" href="tel:<?= $phone; ?>">
				<?= $phoneShow; ?>
                <svg width="25" height="25" id="Layer_2" data-name="Layer 2" viewBox="0 0 23.93 21.37">
                    <g id="Layer_1-2" data-name="Layer 1">
                        <path class="cls-1-1"
                              d="M17.2,21.37c-3.47,0-7.48-2.2-10.31-4.45C3.68,14.41,.18,10.39,0,6.68,.02,4.47,1.05,2.16,2.56,.88,3.43,.13,4.46-.14,5.53,.07c2.19,.44,3.87,2.86,4.29,3.62,1.17,1.8-.09,3.33-.85,4.25l-.28,.35c-.18,.23-.33,.51,.03,1.17,.36,.66,1.11,1.44,2.24,2.33,2.02,1.6,3.01,1.76,3.41,1.71,.15-.02,.32-.07,.52-.32l.27-.36c.72-.95,1.91-2.54,3.94-1.81,.84,.23,3.58,1.3,4.52,3.33,.46,.99,.42,2.05-.1,3.08-.9,1.76-2.9,3.29-4.98,3.82-.43,.08-.88,.12-1.33,.12ZM4.84,2.5c-.18,0-.4,.06-.66,.28-.96,.81-1.66,2.44-1.68,3.85,.11,2.29,2.45,5.59,5.94,8.33,3.48,2.77,7.23,4.29,9.56,3.85,1.32-.34,2.71-1.38,3.29-2.51,.22-.42,.15-.69,.05-.9-.46-1-2.37-1.84-2.91-1.97l-.15-.04c-.22-.09-.35-.08-1.13,.95-.1,.13-.2,.27-.3,.4-.56,.72-1.32,1.15-2.19,1.25-1.45,.17-3.12-.54-5.25-2.23-1.4-1.11-2.34-2.12-2.88-3.08-.77-1.4-.7-2.79,.2-3.93,.1-.13,.21-.26,.32-.39,.82-1,.8-1.12,.67-1.32l-.08-.13c-.25-.5-1.52-2.16-2.59-2.38-.06-.01-.13-.02-.2-.02Z"/>
                    </g>
                </svg>
            </a>
        </div>
		<?php
		if ( $socials ):?>
            <div class="d-flex gap-3 justify-content-center mt-3 mt-lg-0">
				<?php foreach ( $socials as $social ): ?>
                    <a target="_blank" class="bg-landing p-2 rounded-3" aria-label="link to <?= $social['name']; ?>"
                       href="<?= $social['link']['url'] ?? ''; ?>">
						<?= $social['icon']; ?>
                    </a>
				<?php endforeach; ?>
            </div>
		<?php endif;
		?>
    </footer>
    <style>
        :root {
            --landing: #222c52;
        }
        p {
            font-size: 1.15rem !important;
        }

        .bg-landing {
            background-color: var(--landing)
        }

        .border-landing {
            border-color: var(--landing)
        }

        .text-landing {
            color: #222c52
        }

        .cls-1 {
            fill: #fff;
        }

        .cls-2 {
            fill: #88cde3;
        }

        .cls-3 {
            fill: #b8daec;
        }

        .cls-1-1 {
            fill: #15b1aa;
        }

        footer {
            height: 200px;
        }
        .step-image {
            700px
        }
        @media  (max-width:768px) {
            footer {
                height: 150px;
            }
            .step-image {
                400px
            }
            p, li{
                font-size: 15px !important;
                white-space: break-spaces;
            }
        }
        .dot-round {
            width: 36px;
            height: 36px;
        }

        .gradient-landing {
            background: linear-gradient(to bottom, #d0efee, #f0faf9);
        }

        input {
            background: transparent;
            border: 1px solid var(--landing) !important;
            border-radius: 10px !important;
            padding: 15px !important;
        }

        #field_5_7{
            margin-top: 0
        }

        #gform_submit_button_5 {
            background-color: var(--landing) !important;
            color: white !important;
            border-radius: 5px !important;
            border: unset !important;
            padding: 8px 20px !important;
        }

        .gform_footer {
            text-align: left;
        }
    </style>
<?php
get_footer(); ?>