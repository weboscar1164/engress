<?php get_header() ?>

<section class="subvisual subvisual__plan">
    <h2 class="subvisual__title">コース・料金</h2>
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

<section class="desc">
    <div class="desc__container section__container">
        <h2 class="desc__title section__title">料金体系</h2>
        <div class="desc__wrapper">
            <p class="desc__item">入会金 39,800円</p>
            <span class="desc__icon"></span>
            <p class="desc__item">月額費用</p>
        </div>
        <p class="desc__text">
            Engressのカリキュラムは完全オーダーメイドのため、カリキュラム内のサポート内容によって料金が変動します。おすすめのスタンダードプランでは、進学先に合わせたサポートまで包括的に行います。</p>
    </div>
    <!--desc__container-->
</section>

<section class="detail">
    <h2 class="detail__title section__title">料金表</h2>

    <div class="detail__container section__container">
        <div class="detail__wrapper jsScrollable">

            <?php
            //カスタム投稿タイプの一覧を呼び出す
                $posts = new WP_Query(
                    array(
                'post_type' => 'price',
                'posts_per_page' => 4
            )
                );
            if ($posts->have_posts()) :
            while ($posts->have_posts()) :
            $posts->the_post();
            ?>

            <?php
                $recommend = get_field('recommend');
                if ($recommend == null) : ?>

            <div class="detail__card">

                <?php else : ?>

                <div class="detail__card  detail__card--recommend">

                    <?php endif; ?>

                    <h3 class="detail__card__title"><?php the_title() ?></h3>
                    <div class="detail__card__box">
                        <?php $price = get_field('price'); ?>
                        <p class="detail__card__price"><?php echo number_format($price); ?>円~</p>
                        <p class="detail__card__notice">*月額（税抜価格）</p>
                        <ul class="detail__card__list">
                            <?php
                        $askme = get_field('askme');
                        if ($askme == 'false') :
                        $lists = get_field('list');
                            if ($lists) :
                                foreach ($lists as $list) :
                                ?>
                            <li class="detail__card__list__item detail__card__list__item--check"><?php echo $list?></li>
                            <?php
                            endforeach;
                            endif;
                            else : ?>
                            <li class="detail__card__list__item">＊別途ご相談ください</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <!--detail__card-->
                <?php  endwhile; ?>

                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>



            </div>
            <!--detail__wrapper-->
        </div>
        <!--detail__container-->
</section>
<!--detail-->

<?php get_template_part('./links') ?>
<?php get_footer() ?>