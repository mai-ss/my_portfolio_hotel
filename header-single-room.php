<?php
// 投稿スラッグで分岐
$slug = get_post_field('post_name', get_the_ID());
?>

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
        <!-- お部屋投稿ページ -->
        <!-- <?php if (is_single()): ?>
            <?php if ($slug === 'room2'): ?>
                <div class="header__mainvisual--img-single-room" data-default-img="room_02">                
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_02.jpg'); ?>" alt="mainvisual" data-id="room_02">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_05.jpg'); ?>" alt="mainvisual" data-id="room_05" style="display: none;">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_06.jpg'); ?>" alt="mainvisual" data-id="room_06" style="display: none;">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_07.jpg'); ?>" alt="mainvisual" data-id="room_07" style="display: none;">
                </div>
                <div class="header__mainvisual--img-select">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_05.jpg'); ?>" alt="room" data-img="room_05">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_06.jpg'); ?>" alt="room" data-img="room_06">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_07.jpg'); ?>" alt="room" data-img="room_07">
                </div>
            <?php elseif ($slug === 'room3'): ?>
                <div class="header__mainvisual--img-single-room" data-default-img="room_03">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_03.jpg'); ?>" alt="mainvisual" data-id="room_03">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_05.jpg'); ?>" alt="mainvisual" data-id="room_05" style="display: none;">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_08.jpg'); ?>" alt="mainvisual" data-id="room_08" style="display: none;">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_06.jpg'); ?>" alt="mainvisual" data-id="room_06" style="display: none;">
                </div>
                <div class="header__mainvisual--img-select">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_05.jpg'); ?>" alt="room" data-img="room_05">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_08.jpg'); ?>" alt="room" data-img="room_08">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_06.jpg'); ?>" alt="room" data-img="room_06">
                </div>
            <?php elseif ($slug === 'room4'): ?>
                <div class="header__mainvisual--img-single-room" data-default-img="room_04">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_04.jpg'); ?>" alt="mainvisual" data-id="room_04">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_05.jpg'); ?>" alt="mainvisual" data-id="room_05" style="display: none;">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_10.jpg'); ?>" alt="mainvisual" data-id="room_10" style="display: none;">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_06.jpg'); ?>" alt="mainvisual" data-id="room_06" style="display: none;">
                </div>
                <div class="header__mainvisual--img-select">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_05.jpg'); ?>" alt="room" data-img="room_05">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_10.jpg'); ?>" alt="room" data-img="room_10">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_06.jpg'); ?>" alt="room" data-img="room_06">
                </div>
            <?php else : ?>
            <?php endif; ?>
        <?php endif; ?> -->

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="header__mainvisual--img-single-room" data-default-img="<?php echo get_field("image_1"); ?>">                
                    <img src="<?php echo get_field("image_1"); ?>" alt="mainvisual" data-id="<?php echo get_field("image_1"); ?>">
                    <img src="<?php echo get_field("image_2"); ?>" alt="mainvisual" data-id="<?php echo get_field("image_2"); ?>" style="display: none;">
                    <img src="<?php echo get_field("image_3"); ?>" alt="mainvisual" data-id="<?php echo get_field("image_3"); ?>" style="display: none;">
                    <img src="<?php echo get_field("image_4"); ?>" alt="mainvisual" data-id="<?php echo get_field("image_4"); ?>" style="display: none;">
                </div>
                <div class="header__mainvisual--img-select">
                    <img src="<?php echo get_field("image_2"); ?>" alt="room" data-img="<?php echo get_field("image_2"); ?>">
                    <img src="<?php echo get_field("image_3"); ?>" alt="room" data-img="<?php echo get_field("image_3"); ?>">
                    <img src="<?php echo get_field("image_4"); ?>" alt="room" data-img="<?php echo get_field("image_4"); ?>">
                </div>

        <?php endwhile;
    endif; ?>

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