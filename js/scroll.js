// $(document).ready(function () {
//     // スクロールイベントを監視
//     $(window).scroll(function () {
//         const scrollPosition = $(window).scrollTop(); // スクロール位置を取得
//         const offset = 300; // 何pxのスクロールで位置を変更するか

//         // スクロール量に応じてタイトルの位置を変更
//         if (scrollPosition > offset) {
//             $(".main__concept--title,.room-main__concept--title,.food-main__concept--title,.bath-main__concept--title").css("top", 0);
//         } else {
//             const newTop = -300 + (scrollPosition /2); // スクロール量に応じて上に移動
//             $(".main__concept--title,.room-main__concept--title,.food-main__concept--title,.bath-main__concept--title").css("top", newTop + "px");
//         }
//     });
// });

// $(function () {
//     const title = $("#title");
//     const text = $(".main__concept--text");
//     const stopPosition = text.offset().top; // title が text の上で止まる位置
//     const windowHeight = $(window).height();

//     $(window).on("scroll", function () {
//         const scroll = $(window).scrollTop(); // 現在のスクロール位置

//         if (scroll  < stopPosition - windowHeight + 150) {
//             // スクロール中: title を動かす
//             title.css({
//                 position: "absolute",
//                 top: `${-300 + scroll}px`,
//             });
//         } else {
//             // 停止位置で止まる
//             title.css({
//                 position: "absolute",
//                 top: '0px',
//             });
//         }
//     });
// });

/*=================================================
            room１.html  スムーススクロール
===================================================*/
$(function () {
    // ページ内のリンクをクリックした時に動作する
    $('a[href^="#"]').click(function () {
        // クリックしたaタグのリンクを取得
        let href = $(this).attr("href");
        // ジャンプ先のid名をセット hrefの中身が#もしくは空欄なら,htmlタグをセット
        let target = $(href == "#" || href == "" ? "html" : href);
        // ページトップからジャンプ先の要素までの距離を取得
        let position = target.offset().top;
        // animateでスムーススクロールを行う   ページトップからpositionだけスクロールする
        // 600はスクロール速度で単位はミリ秒  swingはイージングのひとつ
        $("html, body").animate({ scrollTop: position }, 600, "swing");
        // urlが変化しないようにfalseを返す
        return false;
    });
});
