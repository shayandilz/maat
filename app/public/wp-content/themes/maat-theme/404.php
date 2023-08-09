<?php
get_header();
?>

    <section class="pb-5 d-flex flex-column justify-content-center align-items-center min-vh-100">
        <article class="z-top position-relative text-center">
            <div class="fw-bolder my-auto text-dark d-flex align-items-center justify-content-center gap-1">
                <span data-aos="zoom-in" data-aos-delay="100" class="mb-0 display-1">4</span>
                <span data-aos="zoom-in" data-aos-delay="200" class="mb-0 display-1">0</span>
                <span data-aos="zoom-in" data-aos-delay="300" class="mb-0 display-1">4</span>
            </div>
            <p>برگه یافت نشد!</p>
            <h3>برگه شما در حال حاضر حذف شده!</h3>
            <p>میتونید با برگشت به صفحه ی اصلی از بقیه وبسایت استفاده کنید</p>
            <div class="button-primary w-auto px-0">
                <a class="btn bg-primary text-white position-relative overflow-hidden fs-6"
                   data-aos="fade-left"
                   data-aos-delay="500"
                   href="<?php echo esc_url(home_url()); ?>">
                        بازگشت به صفحه اصلی
                </a>
            </div>
        </article>
    </section>
<?php
get_footer();
