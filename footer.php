<footer class="footer">
    <div class="footer__container section__container">
        <div class="footer__nav">
            <?php
                wp_nav_menu(
                //.header-listを置き換えて、PC用メニューを動的に表示する
                array(
                'depth' => 1,
                'theme_location' => 'footer', //フッターメニューをここに表示すると指定
                'container' => 'false',
                'menu_class' => 'footer__nav__list',
                )
);
                ?>
        </div>
        <!--footer__nav-->

        <div class="footer__links">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__links__logo">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
            </a>
            <a href="tel:+8123-456-7890" class="footer__links__phone">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14.714" viewBox="0 0 10 14.714">
                    <defs>
                        <style>
                        .b {
                            fill: #fff;
                        }
                        </style>
                    </defs>
                    <path class="b"
                        d="M90.212,26.578c2.726,5.2,5.788,5.731,6.678,5.264l.232-.122-2.085-3.975-.233.12c-.718.377-1.435-.711-2.353-2.462s-1.406-2.959-.689-3.336l.232-.123L89.909,17.97l-.232.122C88.786,18.559,87.486,21.383,90.212,26.578Zm8.171,4.481c.344-.18.155-.576-.041-.949l-1.4-2.67c-.151-.287-.4-.449-.6-.343-.126.066-.421.206-.8.394l2.081,3.967Zm-5.114-9.818c.2-.105.209-.4.059-.69s-1.4-2.67-1.4-2.67c-.2-.373-.413-.753-.758-.572l-.761.4,2.081,3.967C92.86,21.47,93.142,21.307,93.269,21.241Z"
                        transform="translate(-88.574 -17.262)" />
                </svg>
                0123-456-7890
            </a>
            <p class="footer__links__text">平日08:00~20:00</p>
        </div>
        <!--footer__links-->
    </div>
    <!--footer__contaiener-->
    <div class="footer__copy">
        <div class="footer__copy__container section__container">
            <small>© 2020 Engress.</small>
        </div>
    </div>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/scroll-hint@latest/js/scroll-hint.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

<?php wp_footer(); ?>
</body>

</html>