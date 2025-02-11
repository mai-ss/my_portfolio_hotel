<?php
add_action('wp_enqueue_scripts', 'add_styles');
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
add_action('init', 'create_room_post_type');
add_action('init', 'create_news_post_type');
add_theme_support('post-thumbnails');

function add_styles()
{
    // google fonts
    wp_register_style(
        'google-fonts_style',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap',
        array(),
        '1.0'
    );

    // reset style
    wp_register_style(
        'reset_style',
        'https://unpkg.com/ress/dist/ress.min.css',
        array(),
        '1.0'
    );

    // main style
    wp_enqueue_style(
        'main_style',
        get_template_directory_uri() . '/css/main.css',
        array('reset_style', 'google-fonts_style'),
        '1.0'
    );
}

function enqueue_custom_scripts()
{
    // 投稿スラッグ取得
    $slug = get_post_field('post_name', get_the_ID());

    wp_deregister_script('jquery');

    // jQueryを読み込む
    wp_enqueue_script(
        'jquery',
        'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
        array(),
        '1.0',
        true
    );

    // 共通スクリプト
    wp_enqueue_script('menu-btn', get_template_directory_uri() . '/js/menu-btn.js', array('jquery'), null, true);
    wp_enqueue_script('hover-image', get_template_directory_uri() . '/js/hover-image.js', array('jquery'), null, true);

    // index.php
    if (is_front_page()) {
        wp_enqueue_script('background-check', get_template_directory_uri() . '/js/background-check.js', array('jquery'), null, true);
    } 
    // アクセス、お風呂、お料理、館内案内、お知らせ、お部屋ページのみ
    if (is_page(array('access', 'bath', 'food', 'guide', 'news', 'single-news', 'room'))) {
        wp_enqueue_script('footer-background-check', get_template_directory_uri() . '/js/footer-background-check.js', array('jquery'), null, true);
    }

    if (is_page(array('bath', 'food', 'room'))) {
        wp_enqueue_script('header-background-check', get_template_directory_uri() . '/js/header-background-check.js', array('jquery'), null, true);
    }

    if (is_page(array('room'))) {
        wp_enqueue_script('scroll', get_template_directory_uri() . '/js/scroll.js', array('jquery'), null, true);
    }

    if ($slug === 'room2' || $slug === 'room3' || $slug === 'room4') {
        wp_enqueue_script('footer-background-check', get_template_directory_uri() . '/js/footer-background-check.js', array('jquery'), null, true);
        wp_enqueue_script('header-background-check', get_template_directory_uri() . '/js/header-background-check.js', array('jquery'), null, true);
    }
}

/**
 * 投稿ページ
 */
function create_room_post_type() {
    register_post_type('room',
        array(
            'labels'      => array(
                'name'          => __('お部屋一覧'),
                'singular_name' => __('お部屋')
            ),
            'public'      => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports'    => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'rewrite'     => array(
                'slug'       => 'rooms',  // /room/room2 などのURLを適用
                'with_front' => false
            ),
        )
    );
}

function create_news_post_type() {
    register_post_type('news',
        array(
            'labels'      => array(
                'name'          => __('お知らせ一覧'),
                'singular_name' => __('お知らせ')
            ),
            'public'      => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports'    => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'rewrite'     => array(
                'slug'       => 'info',
                'with_front' => false
            ),
        )
    );
}

// // プラグイン Search & Filter
// function add_news_filter() {
//     if (is_post_type_archive('news')) {
//         echo do_shortcode('[searchandfilter fields="news_category"]');
//     }
// }