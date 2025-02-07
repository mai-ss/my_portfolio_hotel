<?php
$rooms = get_posts([
    'post_type' => 'room',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
]);
?>

<?php get_header('other'); ?>

<main class="room-main">
    <section class="room-main__concept">
        <h2 class="room-main__concept--title">お部屋</h2>
        <p class="room-main__concept--text">光華亭では、お客様一人ひとりが特別な時間を過ごせるよう、
            3種類の趣異なるお部屋をご用意しております。</p>
        <ul class="room-main__link">
            <?php foreach ($rooms as $room): ?>
                <li><a href="#__<?php echo esc_attr($room->post_name); ?>"><?php echo esc_html(get_the_title($room->ID)); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="room-main__room-list">
        <ul class="room-main__room-list--items">
            <?php foreach ($rooms as $room): ?>
                <li class="room-main__room-list--item" id="__<?php echo esc_attr($room->post_name); ?>">
                    <div class="room-main__room-list--item--img">
                        <?php
                        $image_url = get_the_post_thumbnail_url($room->ID, 'full');
                        if (!$image_url) {
                            $image_url = get_template_directory_uri() . '/img/default_room.jpg';
                        }
                        ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($room->ID)); ?>">
                    </div>
                    <div class="room-main__room-list--item--menu">
                        <p><?php echo esc_html(get_the_title($room->ID)); ?></p>
                        <p><?php echo esc_html(get_the_excerpt($room->ID)); ?></p>
                        <div class="room-main__room-list--item--menu--reservation">
                            <a href="<?php echo esc_url(get_permalink($room->ID)); ?>">詳細はこちら</a>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="main__reservation">
        <h3 class="main__reservation--title">ご予約</h3>
        <p class="main__reservation--description">ご予約は専用予約フォームまたは、お電話にて承ります。</p>
        <p class="main__reservation--note">当サイトからのご予約が最もお得です。</p>
        <div class="main__reservation--container">
            <p class="main__reservation--phone">Tel.0123-45-6789</p>
            <p class="main__reservation--hours">受付時間： 9:00~ 19:00</p>
            <div class="main__reservation--button">
                <a href="<?php echo esc_url(home_url('/reservation')); ?>" class="main__reservation--link">ご予約はこちら</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>