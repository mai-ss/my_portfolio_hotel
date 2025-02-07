// ハンバーガーメニューオープン　linkをhoverする際の画像切り替え

$(document).ready(function () {
    // 初期設定: 全ての画像を非表示。ただし、#top-image は除外
    $(".header__side--img img").not("#top-image").hide();

    // 各リンクのhoverイベントを設定
    $(".header__side--link ul li a").hover(
        function () {
            // 対応する画像を表示
            const imgId = $(this).data("img");
            $(".header__side--img img").hide(); // #top-image を除いて全て非表示
            $(`.header__side--img img[data-id="${imgId}"]`).show(); // 対象画像を表示
        },

    );
});



// foodページ　hover時対応画像への切り替え

$(document).ready(function () {
    // 各リンクのhoverイベントを設定
    $(".header__mainvisual--img-select img").hover(
        function () {
            // 対応する画像を表示
            const imgId = $(this).data("img");
            $(".header__mainvisual--img-food img").stop(true,true).hide();
                $(`.header__mainvisual--img-food img[data-id="${imgId}"]`).stop(true.true).fadeIn(500); // 対象画像を表示
        });
    }
);

// roomページ　hover時対応画像への切り替え
$(document).ready(function () {
    $(".header__mainvisual--img-select img").hover(
        function () {
            // 対応する画像を表示
            const imgId = $(this).data("img");
            $(".header__mainvisual--img-single-room img").stop(true,true).hide(); // 一旦全て非表示
            $(`.header__mainvisual--img-single-room img[data-id="${imgId}"]`).stop(true,true).fadeIn(500); // 対応する画像を表示
        },
        function () {
            // hoverを外したらデフォルト画像に戻す
            const defaultImage = $(".header__mainvisual--img-single-room").data("default-img"); // デフォルト画像を取得
            $(".header__mainvisual--img-single-room img").stop(true,true).hide(); // 一旦全て非表示
            $(`.header__mainvisual--img-single-room img[data-id="${defaultImage}"]`).stop(true,true).fadeIn(500); // デフォルト画像を表示
        }
    );
});