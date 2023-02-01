<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--検索を無効にする-->
    <meta name="robots" content="noindex">
    <title>Engress</title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/scroll-hint@latest/css/scroll-hint.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.min.css">
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
        </a>
        <div class="header__nav">
            <?php
                wp_nav_menu(
                //.header-listを置き換えて、PC用メニューを動的に表示する
                array(
                'depth' => 1,
                'theme_location' => 'global', //グローバルメニューをここに表示すると指定
                'container' => 'false',
                'menu_class' => 'header__nav__list',
                )
);
                ?>
            <!-- <ul>
                <li><a href="./index.html">ホーム</a></li>
                <li><a href="./news.html">お知らせ</a></li>
                <li><a href="./archive.html">ブログ</a></li>
                <li><a href="/plan.html">コース・料金</a></li>
            </ul> -->
        </div>
        <div class="header__links">
            <div class="header__links__phone">
                <p>平日08:00〜20:00</p>
                <a href="tel:+81-123-456-7890">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14.714" viewBox="0 0 10 14.714">
                        <defs>
                            <style>
                            .a {
                                fill: #1b224c;
                            }
                            </style>
                        </defs>
                        <path class="a"
                            d="M90.212,26.578c2.726,5.2,5.788,5.731,6.678,5.264l.232-.122-2.085-3.975-.233.12c-.718.377-1.435-.711-2.353-2.462s-1.406-2.959-.689-3.336l.232-.123L89.909,17.97l-.232.122C88.786,18.559,87.486,21.383,90.212,26.578Zm8.171,4.481c.344-.18.155-.576-.041-.949l-1.4-2.67c-.151-.287-.4-.449-.6-.343-.126.066-.421.206-.8.394l2.081,3.967Zm-5.114-9.818c.2-.105.209-.4.059-.69s-1.4-2.67-1.4-2.67c-.2-.373-.413-.753-.758-.572l-.761.4,2.081,3.967C92.86,21.47,93.142,21.307,93.269,21.241Z"
                            transform="translate(-88.574 -17.262)" />
                    </svg>
                    0123-456-7890
                </a>
            </div>

            <a href="<?php echo esc_url(home_url('/contact')); ?>"
                class="header__links__request header__links__btn">資料請求</a>
            <a href="<?php echo esc_url(home_url('/contact')); ?>"
                class="header__links__contact header__links__btn">お問い合わせ</a>
        </div>

        <div class="header__nav__sp">
            <div class="header__nav__sp__slider">
                <?php
                wp_nav_menu(
                //.header-listを置き換えて、PC用メニューを動的に表示する
                array(
                'depth' => 1,
                'theme_location' => 'global', //グローバルメニューをここに表示すると指定
                'container' => 'false',
                'menu_class' => 'header__nav__sp__slider__list',
                )
                );
                ?>
                <!-- <ul class="header__nav__sp__slider__list">
                    <li><a href="./index.html">ホーム</a></li>
                    <li><a href="./news.html">お知らせ</a></li>
                    <li><a href="./archive.html">ブログ</a></li>
                    <li><a href="/plan.html">コース・料金</a></li>
                </ul> -->
            </div>

            <div class="header__nav__sp__btn">
                <span></span>
            </div>
        </div>
    </header>