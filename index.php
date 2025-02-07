<?php get_header(); ?>

<main class="main">
    <section class="main__concept">
        <h2 id="title" class="main__concept--title">光と花が織りなす、心ほどける癒しのひととき</h2>
        <p class="main__concept--text">柔らかな光と四季を感じる華やかな空間で、日常を忘れる特別な時間をお過ごしください。<br>
            和の美しさとモダンな快適さが調和した空間で、大切な人とのひとときや自分自身をいたわる贅沢を。<br>
            光華亭は、訪れる全てのお客様に癒しと感動をお届けします。</p>
    </section>

    <section class="main__room">
        <div class="main__room--img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/room_01.jpg'); ?>" alt="和モダンなデザインの客室">
        </div>
        <div class="main__room--wrapper">
            <h3 class="main__room--wrapper--title">お部屋</h3>
            <p class="main__room--wrapper--text">光華亭では、お客様一人ひとりが特別な時間を過ごせるよう、3種類の趣異なるお部屋をご用意しております。</p>
            <div class="main__room--wrapper--reservation">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('room'))); ?>">お部屋について</a>
            </div>
        </div>
    </section>

    <section class="main__bath">
        <div class="main__bath--img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/bath_01.jpg'); ?>" alt="露天風呂">
        </div>
        <div class="main__bath--wrapper">
            <h3 class="main__bath--wrapper--title">お風呂</h3>
            <p class="main__bath--wrapper--text">光華亭では、四季折々の自然と調和したお風呂をご用意しております。
                湯けむりとともに訪れる静寂と、身体の芯から温まる湯浴みが、心身の疲れをほどいてくれます。</p>
            <div class="main__bath--wrapper--reservation">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('bath'))); ?>">お風呂について</a>
            </div>
        </div>
    </section>

    <section class="main__food">
        <div class="main__food--img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/food_01.jpg'); ?>" alt="会席料理">
        </div>
        <div class="main__food--wrapper">
            <h3 class="main__food--wrapper--title">お料理</h3>
            <p class="main__food--wrapper--text">
                料理長が厳選した旬の食材を使用した会席料理は、四季の移ろいを感じられる繊細な味わいが魅力です。地元の新鮮な海の幸や山の幸を活かした献立は、訪れるたびに新たな感動をお楽しみいただけます。</p>
            <div class="main__food--wrapper--reservation">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('food'))); ?>">お料理について</a>
            </div>
        </div>
    </section>

    <section class="main__news">
        <div class="main__news--header">
            <h3 class="main__news--header--title">お知らせ</h3>
            <a href="<?php echo esc_url(home_url('/news')); ?>" class="main__news--header--link">一覧で見る</a>
        </div>
        <div class="main__news--list">
            <?php
            $news_posts = get_posts([
                'post_type' => 'news',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC'
            ]);
            if ($news_posts):
                foreach ($news_posts as $post):
                    setup_postdata($post);
                    $news_title = get_the_title();
                    $news_link  = get_permalink();
                    $news_img   = get_the_post_thumbnail_url($post->ID, 'full');
                    if (!$news_img) {
                        $news_img = get_template_directory_uri() . '/img/default_news.jpg';
                    }
            ?>
                    <a href="<?php echo esc_url($news_link); ?>" class="main__news--list--item">
                        <img src="<?php echo esc_url($news_img); ?>" alt="<?php echo esc_attr($news_title); ?>">
                        <p><?php echo esc_html($news_title); ?></p>
                    </a>
            <?php
                endforeach;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>

    <section class="main__reservation">
        <h3 class="main__reservation--title">ご予約</h3>
        <p class="main__reservation--description">ご予約は専用予約フォームまたは、お電話にて承ります。</p>
        <p class="main__reservation--note">当サイトからのご予約が最もお得です。</p>
        <div class="main__reservation--container">
            <p class="main__reservation--phone">Tel.0123-45-6789</p>
            <p class="main__reservation--hours">受付時間： 9:00~ 19:00</p>
            <div class="main__reservation--button">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('reservation'))); ?>" class="main__reservation--link">ご予約はこちら</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>