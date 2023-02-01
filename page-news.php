<?php get_header() ?>

<section class="subvisual subvisual__news">
    <h2 class="subvisual__title">お知らせ</h2>
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

    <section class="news">
        <div class="news__container section__container">
            <h2 class="news__title section__title">お知らせ一覧</h2>
            <div class="news__wrapper">
                <?php
                //カスタム投稿タイプの一覧を呼び出す
                    $news_post = new WP_Query(
                        array(
                            'paged' => $paged,
                    'post_type' => 'news',
                    'posts_per_page' => 10
                )
                    );
                if ($news_post->have_posts()) :
                while ($news_post->have_posts()) :
                $news_post->the_post();
            ?>
                <a class="news__item" href="<?php the_permalink(); ?>">
                    <div class="news__item__date"><?php the_time(get_option('date_format')); ?></div>
                    <div class="news__item__title"><?php the_short_title(30); ?></div>
                </a>
                <?php
                endwhile;
            else: ?>
                <p class="htanks">お知らせはありません。</p>
                <?php endif; ?>
            </div>
            <!--news__wrapper-->
        </div>
        <!--news__item__container-->

        <?php
        //ページネーション
        if (function_exists('my_pagination')) { // 関数が定義されていたらtrueになる
            my_pagination($news_post->max_num_pages, get_query_var('paged'));
        }
         
         //mdサイズ以降用　display: none;で隠す
         if (function_exists('my_pagination_md')) { // 関数が定義されていたらtrueになる
            my_pagination_md($news_post->max_num_pages, get_query_var('paged'), 1);
         }
        wp_reset_postdata();
        ?>
    </section>
    <!--news-->

    <?php get_template_part('./links') ?>
    <?php get_footer() ?>