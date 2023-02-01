<?php get_template_part('./header'); ?>
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
            404 not found<br>
            お探しのページは見つかりませんでした。
        </p>
        <a class="thanks__btn" href="<?php echo esc_url(home_url('/')); ?>">ホームへ戻る</a>
        <a class="thanks__btn" href="#">一つ前のページに戻る</a>
    </div>
</section>

<?php get_template_part('./footer'); ?>