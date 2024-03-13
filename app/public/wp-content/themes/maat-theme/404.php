<?php
get_header();
?>

    <section class="mx-2 mx-lg-0 py-5 d-flex flex-column justify-content-center align-items-center h-100 bg-secondary position-relative">
        <div class="position-absolute top-50 start-50 translate-middle navbar-brand col-lg-4 col-md-5 col-9 p-lg-5"
           data-aos="zoom-out" data-aos-duration="1000" aria-label="logo">
            <?php
            the_field('footer_logo', 'option');
            ?>
        </div>
        <article class="border border-2 border-primary bg-secondary bg-opacity-50 shadow-sm glass-card p-lg-5 p-3 text-center rounded">
            <div class="my-auto text-dark d-flex align-items-center justify-content-center gap-1">
                <div class="overflow-hidden"><div data-aos-duration="400" data-aos="fade-left" data-aos-delay="100" class="mb-0 display-1 fw-bolder text-primary">4</div></div>
                <div data-aos="zoom-in" data-aos-delay="200" class="mb-0 display-1 fw-bolder text-primary">0</div>
                <div class="overflow-hidden"><div data-aos-duration="400" data-aos="fade-right" data-aos-delay="100" class="mb-0 display-1 fw-bolder text-primary">4</div></div>
            </div>
            <p>برگه یافت نشد!</p>
            <h3>برگه شما در حال حاضر حذف شده!</h3>
            <p>میتونید با برگشت به صفحه ی اصلی از بقیه وبسایت استفاده کنید</p>
            <div class="w-auto overflow-hidden">
                <a class="btn bg-primary text-white fs-6"
                   data-aos="fade-up"
                   data-aos-duration="500"
                   data-aos-delay="500"
                   href="<?php echo esc_url(home_url()); ?>">
                        بازگشت به صفحه اصلی
                </a>
            </div>
        </article>
    </section>
<?php
get_footer();
