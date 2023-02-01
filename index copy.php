<?php get_header() ?>

<section class="subvisual subvisual__archive">
    <h2 class="subvisual__title">ブログ</h2>
</section>

<section class="bredclambs">
    <div class="breadcrumbs__wrapper">
        <div class="breadcrumbs section__container" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if (function_exists('bcn_display')) {
    bcn_display();
}?>
        </div>
        <!-- breadcrumbs -->
    </div>
    <!-- breadcrumbs__wrapper -->

    <section class="article">
        <div class="article__container section__container">
            <h2 class="article__title section__title"><?php  echo my_archive_title(''); //一覧ページ名を表示?></h2>

            <div class="article__list">
                <?php if (have_posts()) :
                    while (have_posts()):
                    the_post();
                    $category = get_the_category();
                ?>
                <a href="<?php the_permalink() ?>" class="article__item">
                    <div class="contents__blog__card__category"><?php echo $category[0]->cat_name;?></div>
                    <p class="article__item__img thumbnail">
                        <?php
                            if (has_post_thumbnail()) {
                                // アイキャッチ画像が設定されていれば大サイズで表示
                                the_post_thumbnail();
                            } else {
                                // なければnoimage画像をデフォルトで表示
                                echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/no-img.jpg" alt="">';
                            }
                            ?>
                    </p>

                    <div class="article__item__contents">
                        <p class="article__item__contents__date"> <?php the_time(get_option('date_format')); ?></p>
                        <h3 class="article__item__contents__title">
                            <?php the_short_title(30); ?>
                        </h3>
                        <p class="article__item__contents__text">
                            <?php the_excerpt(); ?>
                        </p>
                    </div>
                    <!--article__item__contents-->
                </a>
                <!--article__item-->

                <?php endwhile; ?>
                <?php else: ?>
                <p>記事が見つかりませんでした。</p>
                <?php endif; ?>

            </div>
            <!--article__list-->

            <?php
                if (function_exists('pagenation')) { // 関数が定義されていたらtrueになる
                    pagenation();
                }?>

        </div>
        <!--article__container-->
    </section>
    <?php get_template_part('./links') ?>
    <?php get_footer() ?>