<div class="card h-100 border-0 bg-secondary p-xl-5 p-4 rounded-0 d-flex justify-content-between flex-column gap-3">
    <div class="d-flex align-items-center gap-3 justify-content-between">
        <h5 class="card-title fs-6"><?php the_title(); ?></h5>
        <span class="border-start border-2 border-danger ps-4">
            <?php the_field('services_svg_icon'); ?>
        </span>
    </div>
    <div class="card-body">
        <div class="card-text h-100 fs-6 text-center d-flex flex-column justify-content-center align-items-center">
            <div class="expandText">
                <?php the_content(); ?>
            </div>
            <span class="position-absolute expandButton">
                <?php get_template_part('template-parts/svg/down-arrow'); ?>
            </span>
        </div>
    </div>
</div>