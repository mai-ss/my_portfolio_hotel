$(document).ready(function () {
    // 初期設定: 全ての画像を非表示。ただし、#top-image は除外
    $(".header__side--img img").not("#top-image").hide();

    // 各リンクのhoverイベントを設定
    $(".header__side--link ul li a").hover(
        function () {
            // 対応する画像を表示
            const imgId = $(this).data("img");
            $(".header__side--img img").hide(); // #top-image を除いて全て非表示
            $(`.header__side--img img[data-id="${imgId}"]`).fadeIn(); // 対象画像を表示
        },

    );
});