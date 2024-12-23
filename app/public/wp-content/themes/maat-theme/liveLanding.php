<?php /* Template Name: live landing */
get_header(); ?>

    <section class="container pb-5">
        <h1 class="fw-bolder d-lg-none text-center text-lg-start pb-4 fs-2"><?php the_title(); ?></h1>
        <div class="row justify-content-center row-gap-5 justify-content-lg-between align-items-center">
			<?php
			$content = get_field( 'content' );
			if ( $content ):?>
                <div class="col-lg-4 d-flex flex-column text-justify">
                    <h1 class="fw-bolder d-none d-lg-inline text-center text-lg-start pb-3 fs-2"><?php the_title(); ?></h1>
					<?= get_field( 'content' ) ?? ''; ?>
                </div>
			<?php endif; ?>
            <div class="order-first order-lg-last <?= $content ? 'col-lg-8 ' : 'col-12' ?>">
				<?= get_field( 'liveVideo' ) ?? ''; ?>
            </div>

        </div>
    </section>
<?php get_footer(); ?>