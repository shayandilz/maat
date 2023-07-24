<?php
$size = isset($args['size']) ? $args['size'] : 70;
$svg_code = get_field('services_svg_icon');
$modified_svg_code = sprintf($svg_code, $size, $size);
?>
<div class="card h-100 border-0 bg-secondary px-xl-4 pt-xl-4 p-4 rounded-0 d-flex justify-content-between flex-column gap-3">
    <div class="d-flex align-items-center gap-3 justify-content-between">
        <h5 class="card-title fs-6 ">
            <?php the_title(); ?>
        </h5>
        <span class="border-start border-2 border-danger ps-4">
            <?php echo $modified_svg_code; ?>
        </span>
    </div>
    <?php
    $content = get_the_content();
    $lines = explode("\n", $content);
    ?>
    <div class="d-flex flex-column <?= count($lines) > 4 ? 'justify-content-between pt-xl-5' : 'justify-content-center'; ?> align-items-center text-center w-100 h-100 pb-2">


        <?php if (count($lines) > 4) { // Display button if more than 5 lines
            $content = implode("\n", array_slice($lines, 0, 4)); // Show only first 5 lines ?>
            <div class="py-3 py-lg-0 text-start fw-semibold">
                <?= $content; ?>
            </div>
            <div class="button-primary w-auto px-0" data-bs-toggle="modal" data-bs-target="#modal-<?= get_the_ID(); ?>">
                <a class="btn bg-transparent position-relative p-0 fs-6"
                   href="#" onclick="return false;">
                    بیشــــتر
                </a>
            </div>
        <?php } else { ?>
            <div class="py-3 py-lg-0 text-start fw-semibold">
                <?= wpautop($content); ?>
            </div>
        <?php }

        ?>
    </div>
</div>