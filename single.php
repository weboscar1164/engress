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
<?php
$post_type = get_post_type();
if ($post_type !== 'news') : ?>

<div class="single">
    <div class="single__container section__container">
        <div class="single__wrapper">
            <section class="entry">
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
            </section>
            <!--entry-->

            <section class="recommend">
                <h2 class="recommend__title">おすすめの記事</h2>
                <?php
                // views post metaで記事のPV情報を取得する
                set_post_views(get_the_ID());


                $args = array(
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => 3 // ← 3件取得
                );


                // WP_Queryによるループ
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();
                        $category = get_the_category();
            ?>
                <a href="<?php the_permalink(); ?>" class="recommend__card">
                    <!-- <p class="recommend__card__category">カテゴリ1</p> -->
                    <div class="recommend__card__category"><?php echo $category[0]->cat_name;?></div>

                    <div class="recommend__card__img thumbnail">
                        <?php
                            if (has_post_thumbnail()) {
                                // アイキャッチ画像が設定されていれば大サイズで表示
                                the_post_thumbnail();
                            } else {
                                // なければnoimage画像をデフォルトで表示
                                echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/no-img.jpg" alt="">';
                            }
                            ?>
                    </div>
                    <div class="recommend__card__contents">
                        <div class="recommend__card__contents__date"><?php the_time(get_option('date_format')); ?></div>
                        <p class="recommend__card__contents__title"><?php the_short_title(30); ?></p>
                    </div>
                </a>
                <?php endwhile;
                    wp_reset_postdata();
                     else: ?>
                <p>記事が見つかりませんでした。</p>
                <?php endif; ?>

            </section>
        </div>
        <!--single__wrapper-->

        <aside class="single__sidebar">

            <section class="related">

                <h2 class="related__title single__sidebar__title">関連記事</h2>
                <div class="related__wrapper">
                    <?php
                    //シングルページと同じカテゴリを取得して一覧をランダムで表示する
                    $categ = get_the_category($post->ID);
                    $catID = array();

                    foreach ($categ as $cat) {
                        array_push($catID, $cat -> cat_ID);
                    }

                    $args = array(
                        'post__not_in' => array($post->ID),
                        'category__in' => $catID,
                        'posts_per_page' => 3,
                        'orderby' => 'rand'//ランダム表示
                    );

                    $the_query = new WP_Query($args);
                    if ($the_query -> have_posts()) :
                    while ($the_query -> have_posts()) :
                        $the_query -> the_post();?>
                    <a class="related__card" href="<?php the_permalink(); ?>">
                        <div class="related__card__img thumbnail">
                            <?php
                            if (has_post_thumbnail()) {
                                // アイキャッチ画像が設定されていれば大サイズで表示
                                the_post_thumbnail();
                            } else {
                                // なければnoimage画像をデフォルトで表示
                                echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/no-img.jpg" alt="">';
                            }
                            ?>
                        </div>
                        <p class="related__card__title">
                            <?php the_short_title(30); ?>
                        </p>
                    </a>
                    <?php
                    wp_reset_postdata();
                    endwhile;
                    else: ?>
                    <p>関連記事はありません</p>
                    <?php endif; ?>

                </div>
                <!--related__wrapper-->
            </section>
            <!--related-->

            <section class="category">
                <h2 class="category__title single__sidebar__title">カテゴリー</h2>
                <ul class="category__list">
                    <?php
                    // 親カテゴリーのものだけを一覧で取得
                    $args = array(
                        'parent' => 0,
                        'orderby' => 'term_order',
                        'order' => 'ASC'
                    );
                    $categories = get_categories($args);?>

                    <?php foreach ($categories as $category) : ?>
                    <li class="category__list__item">
                        <a
                            href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </aside>
    </div>
</div>
<!--single-->

<?php else : ?>

<section class="news-single">
    <div class="news-single__container section__container">
        <div class="entry">
            <h1><?php the_title() ?></h1>
            <div class="entry__header">
                <p class="entry__date"><?php the_time(get_option('date_format')); ?></p>
            </div>
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
    <!--news-single__container-->
</section>
<!--news-single-->
<?php endif; ?>

<?php get_template_part('./links') ?>
<?php get_footer() ?>