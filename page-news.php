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
        <!-- 検索フィルター -->
        <?php echo do_shortcode('[searchandfilter id="1" fields="news_category" types="select"]'); ?>
        <!-- カテゴリー選択セレクトボックス -->
        <span>カテゴリー</span>
        <select class="news__filter-select" onchange="location = this.value;">
            <option value="" selected>カテゴリーを選択</option>
            <?php
            // カスタムタクソノミー "news_category" の全カテゴリーを取得
            $terms = get_terms(array(
                'taxonomy' => 'news_category', // お知らせ用のカテゴリー
                'hide_empty' => false, // 記事がないカテゴリーも表示
            ));
            // 取得したカテゴリーをセレクトボックスの選択肢として追加
            foreach ($terms as $term) :
                $term_link = get_term_link($term);  // カテゴリーのリンクを取得
            ?>
                <option value="<?php echo esc_url($term_link); ?>">
                    <?php echo esc_html($term->name); ?> <!-- カテゴリー名を表示 -->
                </option>
            <?php endforeach; ?>
        </select>
        <!-- アーカイブ（年月別）の選択セレクトボックス -->
        <span>アーカイブ</span>
        <select class="news__filter-label" onchange="if(this.value) location.href=this.value;">
            <option value="" selected>月を選択</option>
            <?php
            $args = array(
                'type' => 'monthly', // 月別のアーカイブ
                'format' => 'option', // <option>タグとして出力
                'show_post_count' => false, // 記事数を表示しない
                'post_type' => 'news', // // お知らせ投稿タイプのアーカイブを取得
                'echo' => false,
            );
            echo wp_get_archives($args); 
            // アーカイブリストを取得
            ?>
        </select>
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
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>お知らせはありません。</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>