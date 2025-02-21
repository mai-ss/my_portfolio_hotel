<?php
get_header('other');

$term = get_queried_object(); // 現在のタクソノミー情報を取得

if ($term && isset($term->term_id)) {
    $news_query = new WP_Query([
        'post_type' => 'news',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'news_category', // カスタムタクソノミー
                'field' => 'term_id',
                'terms' => $term->term_id, // 現在のタクソノミーID
            ]
        ]
    ]);
} else {
    $news_query = new WP_Query([
        'post_type' => 'news',
        'posts_per_page' => -1,
    ]);
}
?>
<main class="news">
    <h3>お知らせ</h3>
    <div class="news__filter">
        <!-- 検索フィルター -->
        <?php echo do_shortcode('[searchandfilter id="1" post_types="news" fields="news_category" types="select"]'); ?>
        <!-- カテゴリー選択セレクトボックス -->
        <span>カテゴリー</span>
        <form action="">
            <select class="news__filter-select" onchange="location = this.value;">
                <option value="" disabled selected>カテゴリーを選択</option>
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
    global $wpdb;
    $post_type = 'news'; // カスタム投稿タイプ「news」

    // 「news」投稿タイプの公開済み記事から、年と月を取得
    $news_dates = $wpdb->get_results("
        SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
        FROM {$wpdb->posts}
        WHERE post_type = %s AND post_status = 'publish'
        ORDER BY post_date DESC
    ", ARRAY_A, $post_type); // %s を使うことで SQL インジェクション対策

    // セレクトボックスの選択肢を作成
    foreach ($news_dates as $date) :
        $year = $date['year'];
        $month = $date['month'];

        // 年月ごとのアーカイブページへのリンクを生成
        $month_link = home_url("/news_category/$year/$month/");
        $month_text = sprintf('%d年%d月', $year, $month);
    ?>
        <option value="<?php echo esc_url($month_link); ?>">
            <?php echo esc_html($month_text); ?>
        </option>
    <?php endforeach; ?>
</select>
        </form>
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