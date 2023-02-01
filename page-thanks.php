<?php get_header() ?>

<section class="subvisual subvisual__contact">
    <h2 class="subvisual__title">お問い合わせ・資料請求</h2>
</section>

<div class="breadcrumbs__wrapper">
    <div class="breadcrumbs section__container" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
    bcn_display();
}?>
    </div>
    <!-- breadcrumbs -->
</div>
<!-- breadcrumbs__wrapper -->

<section class="thanks">
    <div class="section__container">
        <p class="thanks__text">
            お問い合わせいただきありがとうございます<br>
            内容を確認した後、担当者よりご連絡いたします
        </p>
        <a class="thanks__btn" href="<?php echo esc_url(home_url('/')); ?>">ホームへ戻る</a>
    </div>
</section>

<?php get_footer() ?>