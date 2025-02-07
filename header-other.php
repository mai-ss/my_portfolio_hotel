<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>光華亭</title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキストテキスト">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

</head>

<body>
    <header class="header">
        <div class="header__menu">
            <span class="black"></span>
            <span class="black"></span>
            <span class="black"></span>
        </div>
        <div class="header__link" id="__background-check">
            <h1>
                <a href="<?php echo esc_url(home_url()); ?>">光華亭</a>
            </h1>
            <nav>
                <ul>
                    <li><a id="__room1" href="<?php echo esc_url(get_permalink(get_page_by_path('room'))); ?>">お部屋</a></li>
                    <li><a id="__bath" href="<?php echo esc_url(get_permalink(get_page_by_path('bath'))); ?>">お風呂</a></li>
                    <li><a id="__food" href="<?php echo esc_url(get_permalink(get_page_by_path('food'))); ?>">お料理</a></li>
                    <li><a id="__hotel_guide" href="<?php echo esc_url(get_permalink(get_page_by_path('guide'))); ?>">館内紹介</a></li>
                    <li><a id="__access" href="<?php echo esc_url(get_permalink(get_page_by_path('access'))); ?>">アクセス</a></li>
                </ul>
            </nav>
            <p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('reservation'))); ?>" class="reservation-btn">予約</a>
            </p>
        </div>
        <!-- お部屋 -->
        <?php if (is_page('room')): ?>
            <div class="header__mainvisual--img-room">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_01.jpg'); ?>" alt="mainvisual">
            </div>
        <!-- お料理 -->
        <?php elseif (is_page('food')): ?>
            <div class="header__mainvisual--img-food">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/food_01.jpg'); ?>" alt="food" data-id="food_01">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/food_02.jpg'); ?>" alt="food" data-id="food_02" style="display: none;">
            </div>
            <div class="header__mainvisual--img-select">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/food_01.jpg'); ?>" alt="food" data-img="food_01">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/food_02.jpg'); ?>" alt="food" data-img="food_02">
            </div>
        <!-- お風呂 -->
        <?php elseif (is_page('bath')): ?>
            <div class="header__mainvisual--img-bath">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/bath_01.jpg'); ?>" alt="bath">
            </div>
        <!-- 館内案内、アクセス、お知らせ(画像なし) -->
        <?php else : ?>
        <?php endif; ?>

        <div class="header__side" id="__remove-transition">
            <div class="header__side--img">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/mv_01.jpg'); ?>" alt="トップ画像" id="top-image">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/mv_02.jpg'); ?>" alt="お部屋" data-id="room1">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/mv_03.jpg'); ?>" alt="お風呂" data-id="bath">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/mv_04.jpg'); ?>" alt="お料理" data-id="food">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/mv_05.jpg'); ?>" alt="館内紹介" data-id="hotel_guide">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/mv_06.jpg'); ?>" alt="アクセス" data-id="access">
            </div>
            <div class="header__side--menu">
                <div class="header__side--link">
                    <h1>
                        <a href="index.html">光華亭</a>
                    </h1>
                    <nav>
                        <ul>
                            <li><a id="__room1" href="<?php echo esc_url(get_permalink(get_page_by_path('room'))); ?>" data-img="room1">お部屋</a></li>
                            <li><a id="__bath" href="<?php echo esc_url(get_permalink(get_page_by_path('bath'))); ?>" data-img="bath">お風呂</a></li>
                            <li><a id="__food" href="<?php echo esc_url(get_permalink(get_page_by_path('food'))); ?>" data-img="food">お料理</a></li>
                            <li><a id="__hotel_guide" href="<?php echo esc_url(get_permalink(get_page_by_path('guide'))); ?>" data-img="hotel_guide">館内紹介</a></li>
                            <li><a id="__access" href="<?php echo esc_url(get_permalink(get_page_by_path('access'))); ?>" data-img="access">アクセス</a></li>
                        </ul>
                    </nav>
                    <div class="header__side--reservation">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('reservation'))); ?>">ご予約はこちら</a>
                    </div>
                    <address class="header__side--address">
                        <p>〒390-1521 長野県松本市美ヶ原高原1234-5<br>
                            TEL:0263-87-0011 / FAX:0263-87-0012</p>
                    </address>
                </div>
            </div>
        </div>
    </header>