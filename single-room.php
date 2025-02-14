<?php get_header('single-room'); ?>

<main class="room-main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <section class="room-main__concept">
                <h2 class="room-main__concept--title"><?php the_title(); ?></h2>
                <p class="room-main__concept--text"><?php the_content(); ?></p>
                <div class="room-main__room-list--item--menu--reservation">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('reservation'))); ?>">この部屋を予約する</a>
                </div>
            </section>

            <section class="room-main__details">
                <h3>お部屋の概要</h3>
                <table class="room-main__details--table">
                    <tr>
                        <th>客室タイプ</th>
                        <td><?php echo get_post_meta(get_the_ID(), 'room_type', true); ?></td>
                    </tr>
                    <tr>
                        <th>間取り</th>
                        <td><?php echo get_post_meta(get_the_ID(), 'layout', true); ?></td>
                    </tr>
                    <tr>
                        <th>定員</th>
                        <td><?php echo get_post_meta(get_the_ID(), 'capacity', true); ?></td>
                    </tr>
                    <tr>
                        <th>客室内設備</th>
                        <td><?php echo get_post_meta(get_the_ID(), 'facilities', true); ?></td>
                    </tr>
                    <tr>
                        <th>アメニティ</th>
                        <td><?php echo get_post_meta(get_the_ID(), 'amenities', true); ?></td>
                    </tr>
                    <tr>
                        <th>お煙草</th>
                        <td><?php echo get_post_meta(get_the_ID(), 'smoking', true); ?></td>
                    </tr>
                </table>
            </section>

    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>