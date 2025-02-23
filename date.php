<?php
get_header('other');

// 「news」の投稿がある年月を取得
global $wpdb;
$post_type = 'news';
$query = $wpdb->get_results("
    SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
    FROM $wpdb->posts
    WHERE post_type = '$post_type' AND post_status = 'publish'
    ORDER BY post_date DESC
");

$year  = get_query_var('year');    
$month = get_query_var('monthnum');

$news_query = new WP_Query([
    'post_type' => 'news',
    'posts_per_page' => -1,
    'year'           => $year, 
    'monthnum'       => $month,
]);
?>

<main class="news">
    <h3>お知らせ</h3>
    <div class="news__filter">        
        <!-- カテゴリー選択セレクトボックス -->
        <span>カテゴリー</span>
        <form action="">
            <select class="news__filter-select" onchange="location = this.value;">
                <option value="" selected>カテゴリーを選択</option>
                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'news_category',
                    'hide_empty' => false,
                ));
                foreach ($terms as $term) :
                    $term_link = get_term_link($term);
                ?>
                    <option value="<?php echo esc_url($term_link); ?>">
                        <?php echo esc_html($term->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- アーカイブ（年月別）の選択セレクトボックス -->
            <span>アーカイブ</span>
            <select class="news__filter-label" onchange="if(this.value) location.href=this.value;">
                <option value="" selected>月を選択</option>
                <?php
                foreach ($query as $row) :
                    $year = $row->year;
                    $month = $row->month;
                    $month_link = get_month_link($year, $month);
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