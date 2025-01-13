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

