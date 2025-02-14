<?php get_header('other'); ?>

<main class="bath-main">
    <section class="bath-main__concept">
        <h2 class="bath-main__concept--title">お風呂</h2>
        <p class="bath-main__concept--text">夜空に輝く満天の星を眺めながら、心地よい湯に包まれる贅沢なひととき。<br>
            周囲を囲む木々と澄んだ空気が、都会の喧騒を忘れさせてくれます。<br>
            昼は爽やかな光を浴びながら、夜は星空と月明かりの下で、季節の移ろいを感じられる開放的なお風呂です。</p>
    </section>
    <section class="bath-main__details">
        <h3>お風呂の概要</h3>
        <table class="bath-main__details--table">
            <tr>
                <th>泉質</th>
                <td>弱アルカリ性単純泉<br>肌にやさしく、保湿効果が高い湯質で「美肌の湯」として知られています。</td>
            </tr>
            <tr>
                <th>適応症</th>
                <td>疲労回復、冷え性、肩こり、神経痛、リウマチ、慢性消化器病など</td>
            </tr>
            <tr>
                <th>利用時間</th>
                <td>6:00～10:00 15:00～23:00</td>
            </tr>
        </table>
    </section>
    <section class="bath-main__private">
        <div class="bath-main__private--text">
            <p>お部屋にも専用露天風呂がございます。</p>
            <p>どうぞ、自慢のお風呂をお好きな時間に、ゆったりと存分にお楽しみください。</p>
        </div>
        <div class="bath-main__private--reservation">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('reservation'))); ?>" class="main__reservation--link">ご予約はこちら</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>