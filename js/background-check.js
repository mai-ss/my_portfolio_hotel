$(document).ready(function () {
  // 画像の要素を取得
  const mainVisualImg = $('.header__mainvisual--img img');
  const roomImg = $('.main__room--img img');
  const bathImg = $('.main__bath--img img');
  const foodImg = $('.main__food--img img');
  const footer = $('.footer');
  const menu = $('.header__menu span');
  const links = $('.header__link a');

  // スクロール距離で、文字色を出しわけ
  $(window).on('scroll', function () {
    const mainVisualImgTop = mainVisualImg.offset().top;
    const mainVisualImgBottom = mainVisualImgTop + mainVisualImg.height();
    const roomImgTop = roomImg.offset().top;
    const roomImgBottom = roomImgTop + roomImg.height();
    const bathImgTop = bathImg.offset().top;
    const bathImgBottom = bathImgTop + bathImg.height();
    const foodImgTop = foodImg.offset().top;
    const foodImgBottom = foodImgTop + foodImg.height();
    const footerTop = footer.offset().top;
    const footerBottom = footerTop + footer.height();

    /***********************************************
     * 各リンクの文字色変更
    ************************************************/ 
    links.each(function () {
      const linkTop = $(this).offset().top;

      if (linkTop > mainVisualImgTop && linkTop < mainVisualImgBottom) {
        // mainVisualImgと重なっている場合 → 白
        $(this).removeClass('black').addClass('white');
      } else {
        $(this).removeClass('white').addClass('black');
      }

      if (linkTop > roomImgTop && linkTop < roomImgBottom) {
        // roomImgと重なっている場合 → 白
        $(this).removeClass('black').addClass('white');
      }

      if (linkTop > bathImgTop && linkTop < bathImgBottom) {
        // bathImgと重なっている場合 → 白
        $(this).removeClass('black').addClass('white');
      }

      if (linkTop > foodImgTop && linkTop < foodImgBottom) {
        // foodImgと重なっている場合 → 白
        $(this).removeClass('black').addClass('white');
      }

      if (linkTop > footerTop && linkTop < footerBottom) {
        // footerと重なっている場合 → 白
        $(this).removeClass('black').addClass('white');
      }

    });

    /***********************************************
     * ハンバーガーメニューの文字色変更
    ************************************************/
    const menuTop = menu.offset().top;

    if (menuTop > mainVisualImgTop && menuTop < mainVisualImgBottom) {
      // mainVisualImgと重なっている場合 → 白
      menu.removeClass('black').addClass('white');
    } else {
      menu.removeClass('white').addClass('black');
    }

    if (menuTop > roomImgTop && menuTop < roomImgBottom) {
      // roomImgと重なっている場合 → 白
      menu.removeClass('black').addClass('white');
    }

    if (menuTop > bathImgTop && menuTop < bathImgBottom) {
      // bathImgと重なっている場合 → 白
      menu.removeClass('black').addClass('white');
    }

    if (menuTop > foodImgTop && menuTop < foodImgBottom) {
      // foodImgと重なっている場合 → 白
      menu.removeClass('black').addClass('white');
    }

  });
});
