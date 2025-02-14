<?php get_header('other'); ?>
<main>
    <section class="reservation__section">
        <h2 class="reservation__title">ご予約</h2>
        <div class="reservation__calender">
            <?php echo do_shortcode('[booking_package id=3]'); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>