<?php get_header() ?>

<section class="subvisual subvisual__contact">
    <h2 class="subvisual__title">お問い合わせ・資料請求</h2>
</section>

<section class="bredclambs">
    <div class="breadcrumbs__wrapper">
        <div class="breadcrumbs section__container" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if (function_exists('bcn_display')) {
    bcn_display();
} ?>
        </div>
        <!-- breadcrumbs -->
    </div>
    <!-- breadcrumbs__wrapper -->

    <section class="form">
        <div class="form__container entry__body">
            <?php
                $contact = get_post();
                the_content();
            ?>
        </div>
        <!--form__container-->
    </section>
    <!--form-->

    <?php get_footer() ?>