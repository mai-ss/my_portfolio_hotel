<?php
$news_query = new WP_Query([
    'post_type' => 'news',
    'posts_per_page' => -1,
]);
?>

<?php get_header('other'); ?>

<main class="news">
    <h3>お知らせ</h3>
    <div class="news__filter">
        <span>カテゴリー</span>
        <?php
        // カテゴリーのドロップダウンリスト
        wp_dropdown_categories(array(
            'show_option_all' => '全てを見る',
            'name' => 'category',
            'selected' => get_query_var('cat'),
            'value_field' => 'term_id'
        ));
        ?>
        <span>アーカイブ</span>
        <?php
        // 月別アーカイブのドロップダウンリスト
        wp_get_archives(array(
            'type' => 'monthly',
            'format' => 'option',
        ));
        ?>
    </div>

    <!-- 投稿（お知らせ）を表示 -->
    <?php if ($news_query->have_posts()) : ?>
        <ul class="news-list">
            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <?php 
                $content = get_the_content(); 
                $sentence = wp_trim_words($content, 70, '...');
                ?>
                <li class="news-list__item">
                    <a href="<?php the_permalink(); ?>" class="news-list__link">
                        <p class="news-list__date"><?php echo get_the_date('Y年m月d日'); ?></p>
                        <h4 class="news-list__title"><?php the_title(); ?></h4>
                        <p class="news-list__excerpt"><?php echo $sentence; ?></p>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>お知らせはありません。</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>