<?php

@ini_set('upload_max_size', '200M');
@ini_set('post_max_size', '200M');

add_action('init', function () {
    //アイキャッチ画像をサポート
    add_theme_support('post-thumbnails');
});


//メニューの登録
function my_menu_init()
{
    register_nav_menus(
        array(
        'global' => 'ヘッダーメニュー',
        'drawer' => 'ドロワーメニュー',
        'footer' => 'フッターメニュー',
        )
    );
}
add_action('init', 'my_menu_init');

/**
* アーカイブタイトル書き換え
*
* @param string $title 書き換え前のタイトル.
* @return string $title 書き換え後のタイトル.
*/
function my_archive_title($title)
{
    if (is_category()) { // カテゴリーアーカイブの場合
        $title = '' . single_cat_title('', false) . '一覧';
    } elseif (is_tag()) { // タグアーカイブの場合
        $title = '' . single_tag_title('', false) . '';
    } elseif (is_post_type_archive()) { // 投稿タイプのアーカイブの場合
        $title = '' . post_type_archive_title('', false) . '';
    } elseif (is_tax()) { // タームアーカイブの場合
        $title = '' . single_term_title('', false);
    } elseif (is_author()) { // 作者アーカイブの場合
        $title = '' . get_the_author() . '';
    } elseif (is_date()) { // 日付アーカイブの場合
        $title = '';
        if (get_query_var('year')) {
            $title .= get_query_var('year') . '年';
        }
        if (get_query_var('monthnum')) {
            $title .= get_query_var('monthnum') . '月';
        }
        if (get_query_var('day')) {
            $title .= get_query_var('day') . '日';
        }
    } else {
        $title = '新着一覧';
    }
    return $title;
};
    add_filter('get_the_archive_title', 'my_archive_title');

//タイトルの文字数を制限する（引数無しで20文字）
function the_short_title($length = 20)
{
    $ret = get_the_title($post->ID);
    if (mb_strlen($ret) > $length) {
        $ret = mb_substr($ret, 0, $length) . '...';
    }

    echo $ret;
}


/**
* カテゴリーを1つだけ表示
*
* @param boolean $anchor aタグで出力するかどうか.
* @param integer $id 投稿id.
* @return void
*/
    
function my_the_post_category($anchor = true, $id = 0)
{
    global $post;
    //引数が渡されなければ投稿IDを見るように設定
    if (0 === $id) {
        $id = $post->ID;
    }
    
    //カテゴリー一覧を取得
    $this_categories = get_the_category($id);
    if ($this_categories[0]) {
        if ($anchor) { //引数がtrueならリンク付きで出力
            echo '<a href="' . esc_url(get_category_link($this_categories[0]->term_id)) . '">' . esc_html($this_categories[0]->cat_name) . '</a>';
        } else { //引数がfalseならカテゴリー名のみ出力
            echo esc_html($this_categories[0]->cat_name);
        }
    }
}

// 人気記事出力用関数
function get_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// 記事viewカウント用関数
function set_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count=='') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);




/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function my_pagination($pages, $paged, $range = 2, $show_only = false)
{
    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "« 最初へ";
    $text_before  = "‹ 前へ";
    $text_next    = "次へ ›";
    $text_last    = "最後へ »";

    if ($show_only && $pages === 1) {
        // １ページのみで表示設定が true の時
        echo '<ul class="pagination"><span class="pagination__item pagination__item__active">1</span></ul>';
        return;
    }

    if ($pages === 1) {
        return;
    }    // １ページのみで表示設定もない場合

    if (1 !== $pages) {
        //２ページ以上の時
        echo '<ul class="pagination">';
        //     //現ページ/全体ページ 表示
        // echo '<span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
        // if ($paged > $range + 1) {
        //     // 「最初へ」 の表示
        //     echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
        // }
        // if ($paged > 1) {
        //     // 「前へ」 の表示
        //     echo '<a href="', get_pagenum_link($paged - 1) ,'" class="prev">', $text_before ,'</a>';
        // }
        //[...]表示
        if (($paged + 0) > 3) {
            echo '<li class="pagination__item"><a href="'.get_pagenum_link(1).'">1</a></li>';
            echo '<li class="pagination__dot">...</li>';
        }

        for ($i = 1; $i <= $pages; $i++) {
            if ($i <= $paged + $range && $i >= $paged - $range) {
                // $paged +- $range 以内であればページ番号を出力
                if ($paged === $i) {
                    echo '<li class="pagination__item pagination__item__active"><span class="current pager">', $i ,'</span></li>';
                } else {
                    echo '<li class="pagination__item"><a href="', get_pagenum_link($i) ,'" class="pager">', $i ,'</a></li>';
                }
            }
        }
        //[...]表示
        if (($paged + 2) < $pages) {
            echo '<li class="pagination__dot">...</li>';
            echo '<li class="pagination__item"><a href="'.get_pagenum_link($pages).'">'.$pages.'</a></li>';
        }
        // if ($paged < $pages) {
        //     // 「次へ」 の表示
        //     echo '<a href="', get_pagenum_link($paged + 1) ,'" class="next">', $text_next ,'</a>';
        // }
        // if ($paged + $range <う $pages) {
        //     // 「最後へ」 の表示
        //     echo '<a href="', get_pagenum_link($pages) ,'" class="last">', $text_last ,'</a>';
        // }
        echo '</ul>';
    }
}

function my_pagination_md($pages, $paged, $range = 2, $show_only = false)
{
    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "«";
    $text_before  = "‹";
    $text_next    = "›";
    $text_last    = "»";

    if ($show_only && $pages === 1) {
        // １ページのみで表示設定が true の時
        echo '<ul class="pagination__md"><li class="pagination__item pagination__item__active"><span>1</span></ul>';
        return;
    }

    if ($pages === 1) {
        return;
    }    // １ページのみで表示設定もない場合

    if (1 !== $pages) {
        //２ページ以上の時
        echo '<ul class="pagination__md">';
        // //現ページ/全体ページ 表示
        // echo '<li class="pagination__item"><span>Page ', $paged ,' of ', $pages ,'</span></li>';
        if ($paged > $range + 1) {
            // 「最初へ」 の表示
            echo '<li class="pagination__btn"><a href="', get_pagenum_link(1) ,'">', $text_first ,'</a></li>';
        }
        if ($paged > 1) {
            // 「前へ」 の表示
            echo '<li class="pagination__btn"><a href="', get_pagenum_link($paged - 1) ,'">', $text_before ,'</a></li>';
        }
        // if (($paged + 0) > 3) {
        // //[...]表示
        //     echo '<li class="pagination__item"><a href="'.get_pagenum_link(1).'">1</a></li>';
        //     echo '<li class="pagination__dot">...</li>';
        // }

        for ($i = 1; $i <= $pages; $i++) {
            if ($i <= $paged + $range && $i >= $paged - $range) {
                // $paged +- $range 以内であればページ番号を出力
                if ($paged === $i) {
                    echo '<li class="pagination__item pagination__item__active"><span class="current pager">', $i ,'</span></li>';
                } else {
                    echo '<li class="pagination__item"><a href="', get_pagenum_link($i) ,'" class="pager">', $i ,'</a></li>';
                }
            }
        }

        // if (($paged + 2) < $pages) {
        // //[...]表示
        //     echo '<li class="pagination__dot">...</li>';
        //     echo '<li class="pagination__item"><a href="'.get_pagenum_link($pages).'">'.$pages.'</a></li>';
        // }

        if ($paged < $pages) {
            // 「次へ」 の表示
            echo '<li class="pagination__btn"><a href="', get_pagenum_link($paged + 1) ,'">', $text_next ,'</a></li>';
        }
        if ($paged + $range < $pages) {
            // 「最後へ」 の表示
            echo '<li class="pagination__btn"><a href="', get_pagenum_link($pages) ,'">', $text_last ,'</a></li>';
        }
        echo '</ul>';
    }
}