$(document).ready(function () {
  // 要素を取得
  const footer = $('.footer');
  // const links = $('.header__link-room a');
  const links = $('#__background-check a')

  // スクロール距離で、文字色を出しわけ
  $(window).on('scroll', function () {
    const footerTop = footer.offset().top;
    const footerBottom = footerTop + footer.height();

    /***********************************************
     * 各リンクの文字色変更
    ************************************************/ 
    links.each(function () {
      const linkTop = $(this).offset().top;

      if (linkTop > footerTop && linkTop < footerBottom) {
        // footerと重なっている場合 → 白
        $(this).removeClass('black').addClass('white');
      } else {
        $(this).removeClass('white').addClass('black');
      }

    });

  });
});