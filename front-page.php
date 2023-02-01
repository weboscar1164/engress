<?php get_template_part('./header') ?>

<section class="mainvisual">
    <div class="mainvisual__container">
        <h1 class="mainvisual__title">TOEFL対策はEngress</h1>
        <p>
            日本人への<br class="br__xsm">TOEFL指導歴豊かな講師陣の<br>
            コーチング型TOEFLスクール
        </p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="mainvisual__request">資料請求</a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="mainvisual__contact">お問い合わせ</a>
    </div>
    <!--mainvisual__container-->
</section>

<section class="intro">
    <div class="intro__container section__container">
        <h2 class="intro__title section__title">TOEFL学習で<br class="br__sm">こんな悩みありませんか？</h2>
        <ul class="intro__items">
            <li>勉強の習慣が<br>身についていない</li>
            <li>勉強しているはず<br>なのに点数が伸びない</li>
            <li>正しい勉強方法が<br>わからない</li>
        </ul>
        <ul class="intro__items__sp">
            <li><span>勉強の習慣が身についていない</span></li>
            <li><span>勉強しているはずなのに点数が伸びない</span></li>
            <li><span>正しい勉強方法がわからない</span></li>
        </ul>
        <div class="intro__wrapper">
            <h2 class="intro__title section__title">
                Engressは<br>
                <span>TOEFLに特化した<br class="br__xsm">スクール</span>です
            </h2>
            <p class="intro__text">
                完全オーダーメイドで、<br class="br__xsm">１人１人の悩みに合わせた最適な指導で<br>
                TOEFLの苦手分野を克服します。
            </p>
        </div>
    </div>
</section>

<section class="feature">
    <div class="feature__container section__container">

        <h2 class="feature__title section__title">TOEFL対策に特化したEngress3つの強み</h2>

        <div class="feature__item">
            <div class="feature__item__contents">
                <div class="feature__item__contents__icon">特徴１</div>
                <h3 class="feature__item__contents__title">
                    TOEFLに最適化された<br>
                    無駄のないカリキュラム
                </h3>
                <p class="feature__item__contents__text">
                    TOEFLではビジネス英語には登場しない数多くの学術的内容が出題されます。そのため、ベースとなる知識も必要になります。Engressでは過去1000題を分析し、最適なカリキュラムを組んでいます。
                </p>
            </div>
            <div class="feature__item__img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/feature01.png" alt="">
            </div>
        </div>
        <!--feature__item-->

        <div class="feature__item">
            <div class="feature__item__contents">
                <div class="feature__item__contents__icon">特徴２</div>
                <h3 class="feature__item__contents__title">
                    日本人指導歴10年以上の<br>
                    経験豊富な講師陣
                </h3>
                <p class="feature__item__contents__text">
                    Engressの講師陣は、もともと日本人向けにTOEFLを教えていた人が大多数です。また全メンバーがTESOL(英語教授法)を取得しており、知識と経験を兼ね備えている教育のプロフェッショナルです。
                </p>
            </div>
            <div class="feature__item__img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/feature02.png" alt="">
            </div>
        </div>
        <!--feature__item-->

        <div class="feature__item">
            <div class="feature__item__contents">
                <div class="feature__item__contents__icon">特徴３</div>
                <h3 class="feature__item__contents__title">
                    平均3ヶ月でTOEFL iBT20点アップ
                </h3>
                <p class="feature__item__contents__text">
                    Engressは高校生からサラリーマンまで様々な年齢層の方々が通われていますが、完全オーダーメイドのカリキュラムで柔軟に対応しているため、平均3ヶ月でTOEFLスコアを20点アップさせています。
                </p>
            </div>
            <div class="feature__item__img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/feature03.png" alt="">
            </div>
        </div>
        <!--feature__item-->

        <div class="feature__price">
            <h2 class="feature__price__title">Engressの料金プランはこちら</h2>
            <a class="feature__price__btn" href="<?php echo esc_url(home_url('/plan')) ?>">料金を見てみる</a>
        </div>
        <!--feature__price-->

    </div>
    <!--feature__container-->

</section>

<?php
    //カスタム投稿タイプの一覧を呼び出す
    $performance = new WP_Query(
        array(
    'post_type' => 'performance',
    'posts_per_page' => 3
    )
    );
    if ($performance->have_posts()) :
?>
<section class="performance">
    <div class="performance__container section__container">
        <h2 class="performance__title section__title">TOEFL成功事例</h2>

        <div class="performance__wrapper">
            <?php
                while ($performance->have_posts()) :
                $performance->the_post();
            ?>
            <div class="performance__item">
                <h3 class="performance__item__title"><?php the_field('title'); ?></h3>
                <div class="performance__item__img">
                    <img src="<?php echo get_field('image');?>" alt="">
                </div>
                <div class="performance__item__bio">
                    <p class="performance__item__bio__work"><?php the_field('work'); ?></p>
                    <p class="performance__item__bio__name"><?php the_field('name'); ?></p>
                </div>
                <p class="performance__item__score"><?php the_field('score'); ?></p>
            </div>
            <!--performance__item-->
            <?php  endwhile; ?>
        </div>
        <!--performance__wrapper-->
    </div>
    <!--performance__container-->
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php wp_reset_query(); ?>

<section class="flow">
    <div class="flow__conteiner section__container">
        <h2 class="flow__title section__title">ご利用の流れ</h2>

        <ul class="flow__list">
            <li class="flow__list__item">
                <span class="flow__list__item__number">01</span>
                <dl class="flow__list__item__text">
                    <dt>お問い合わせ</dt>
                    <dd>まずはフォームまたはお電話からお申し込みください。</dd>
                </dl>
            </li>

            <li class="flow__list__item">
                <span class="flow__list__item__number">02</span>
                <dl class="flow__list__item__text">
                    <dt>ヒアリング</dt>
                    <dd>現在の学習状況やTOEFLスコア、目標のスコアをお聞きします。</dd>
                </dl>
            </li>

            <li class="flow__list__item">
                <span class="flow__list__item__number">03</span>
                <dl class="flow__list__item__text">
                    <dt>学習プランのご提供</dt>
                    <dd>目標達成のために最適な学習プランをご提案致します。</dd>
                </dl>
            </li>

            <li class="flow__list__item">
                <span class="flow__list__item__number">04</span>
                <dl class="flow__list__item__text">
                    <dt>ご入会</dt>
                    <dd>お申込み完了後、レッスンがスタートします。</dd>
                </dl>
            </li>
        </ul>
        <!--flow__list-->
    </div>
    <!--flow__container-->
</section>

<section class="faq">
    <div class="faq__container section__container">
        <h2 class="faq__title section__title">よくある質問</h2>
        <div class="faq__wrapper">
            <dl class="faq__item">
                <dt class="faq__item__question jsQuestionActive">Engressはサラリーマンでも学習を続けられるでしょうか？</dt>
                <dd class="faq__item__answer">Engressは各個人に最適な学習プランをご提供しております。サラリーマンの方でも継続できます。</dd>
            </dl>
            <dl class="faq__item">
                <dt class="faq__item__question">教材はオリジナルのものを使用しているのでしょうか？</dt>
                <dd class="faq__item__answer faq__item__answer__close">
                    Engressの教材はオリジナルの教材のほか、各個人の特性に合ったレッスン内容に合わせるために一部市販の教材も使用します。</dd>
            </dl>
            <dl class="faq__item">
                <dt class="faq__item__question">講師に日本人はいますか？</dt>
                <dd class="faq__item__answer faq__item__answer__close">
                    はい。一部日本人が在籍しておりますが、全メンバーがTESOL(英語教授法)を取得しており、知識と経験を兼ね備えたプロフェッショナルです。</dd>
            </dl>
            <dl class="faq__item">
                <dt class="faq__item__question">TOEFL以外の海外大学合格のサポートもしてもらえるのでしょうか？</dt>
                <dd class="faq__item__answer faq__item__answer__close">
                    Engressは基本的にTOEFLの海外大学受験に特化したカリキュラムですが、個人に合わせてカリキュラムを組み替えるフレックスプランもご用意しております。詳しくはご相談ください。</dd>
            </dl>
        </div>
        <!--faq__wrapper-->
    </div>
    <!--faq__container-->
</section>

<section class="contents">
    <div class="contents__container section__container">
        <div class="contents__blog">
            <h3 class="contents__blog__title">ブログ</h3>
            <div class="contents__blog__wrapper">
                <?php
               $list_cnt = 3;
               $sticky = get_option('sticky_posts');
               if ($list_cnt <= count($sticky)) {
                   //「先頭固定」が「$list_cnt」に設定した数値と同じ又は超えた時の記述
                   $args = array(
                       'posts_per_page' => '3',
                       'post_type' => 'post',
                       //「この投稿を先頭に固定表示」の無効化
                       'ignore_sticky_posts' => true,
                   );
               } else {
                   //「先頭固定」が「$list_cnt」を超えてない時
                   //「$list_cnt」から「先頭固定」の数を引いた数最新記事出力
                   if (!empty($sticky)) {
                       $list_cnt -= count($sticky);
                   }
                   $args = array(
                       'posts_per_page' => $list_cnt,
                       'post_type' => 'post',
                   );
               }
                $new_posts = new WP_Query($args);
                if ($new_posts->have_posts()) :
                while ($new_posts->have_posts()) :
                $new_posts->the_post();
                $category = get_the_category();
                ?>

                <a href="<?php the_permalink(); ?>" class="contents__blog__card">
                    <div class="contents__blog__card__category"><?php echo $category[0]->cat_name;?></div>
                    <div class="contents__blog__card__img thumbnail">
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
                    <div class="contents__blog__card__text">
                        <p class="contents__blog__card__text__title"><?php the_short_title(30); ?></p>
                        <small
                            class="contents__blog__card__text__date"><?php the_time(get_option('date_format')); ?></small>
                    </div>
                </a>
                <?php wp_reset_postdata();
                // endforeach;
            endwhile;
                else: ?>
                <p>記事が見つかりませんでした。</p>
                <?php endif;
                    wp_reset_query(); ?>

            </div>
            <!--contents__blog__wrapper-->
        </div>
        <!--contents__blog-->

        <div class="contents__info">
            <h2 class="contents__info__title">お知らせ</h2>
            <div class="contents__info__wrapper">

                <?php
                    //カスタム投稿タイプの一覧を呼び出す
                        $posts = new WP_Query(
                            array(
                        'post_type' => 'news',
                        'posts_per_page' => 3
                    )
                        );
                    if ($posts->have_posts()) :
                    while ($posts->have_posts()) :
                    $posts->the_post();
                    ?>

                <a href="<?php the_permalink(); ?>" class="contents__info__card">
                    <p class="contents__info__card__date"><?php the_time(get_option('date_format')); ?></p>
                    <p class="contents__info__card__title"><?php the_short_title(30); ?></p>
                </a>
                <!--contents__info__card-->

                <?php wp_reset_postdata();
                    endwhile;
                    else: ?>

                <p>お知らせはありません。</p>

                <?php endif;
                     wp_reset_query(); ?>

            </div>
            <!--contents__info__wrapper-->
        </div>
        <!--contents__info-->
    </div>
    <!--contents-->
</section>

<?php get_template_part('./links') ?>
<?php get_template_part('./footer') ?>