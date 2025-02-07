<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>光華亭</title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキストテキスト">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

</head>

<main class="news">
    <h3>お知らせ</h3>

    <!-- 投稿（お知らせ）を表示 -->
    <?php if (have_posts()) : ?>
        <div class="news-detail">
            <?php while (have_posts()) : the_post(); ?>
                <div class="news-detail__title">
                    <p><?php echo get_the_date(); ?></p>
                    <h4><?php the_title(); ?></h4>
                </div>
                <div class="news-detail__body">
                    <p><?php the_content(); ?></p>
                </div>
                <div class="news-detail__navigation">
                    <?php
                    // 前の記事と次の記事へのリンク
                    previous_post_link('%link', '前の記事');
                    ?>
                    <a href="<?php echo get_permalink(); ?>">詳細はこちら</a>
                    <?php
                    next_post_link('%link', '次の記事');
                    ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>お知らせはありません。</p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>