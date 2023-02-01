<?php get_header() ?>
<div class="breadcrumbs__wrapper">
    <div class="breadcrumbs section__container" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
    bcn_display();
}?>
    </div>
    <!-- breadcrumbs -->
</div>
<!-- breadcrumbs__wrapper -->

<section class="news-single">
    <div class="news-single__container section__container">
        <div class="entry">
            <?php
                    // カテゴリー１つ目の名前を表示
                    $category = get_the_category();
                    if ($category[0]) : ?>
            <a class="entry__category"
                href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>"><?php echo $category[0]->cat_name; ?></a>
            <?php endif; ?>
            <h1><?php the_title() ?></h1>

            <div class="entry__header">
                <div class="entry__header__sns">
                    <?php wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false)); ?>
                </div>
                <!--entry__header__sns-->
                <div class="entry__date"><?php the_time(get_option('date_format')); ?></div>
            </div>
            <!--entry__header-->
            <!-- entry__img -->
            <div class="entry__img">
                <?php
                    if (has_post_thumbnail()) {
                        // アイキャッチ画像が設定されてれば大サイズで表示
                        the_post_thumbnail('large');
                    }
                    ?>
            </div><!-- /entry__img -->
            <div class="entry__body">

                <?php the_content(); //本文を表示?>
                <?php
                    //改ページを有効にするための記述
                    wp_link_pages(
                        array(
                    'before' => '<nav class="entry-links">',
                    'after' => '</nav>',
                    'link_before' => '',
                    'link_after' => '',
                    'next_or_number' => 'number',
                    'separator' => '',
                    )
                    );
                    ?>
            </div>
        </div>
    </div>
    </div>
    <!--news-single__container-->
</section>
<!--news-single-->

<?php get_template_part('./links') ?>
<?php get_footer() ?>