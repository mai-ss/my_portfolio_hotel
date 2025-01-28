$(document).ready(function () {
  if (checkWindowSize()) {
    changeClassName();
    scrollEvent();
  }

  $(window).on('resize', function () {
    if (checkWindowSize()) {
      changeClassName();
      scrollEvent();
    }
  });

});

/**
 * ウィンドウが、スマホサイズ(480px以下)なのかチェックする。
 */
function checkWindowSize() {
  const windowWidth = $(window).width();

  if (windowWidth <= 480) {
    return true;
  }

  return false;
}

/**
 * スクロールイベント
 */
function scrollEvent() {
  // 画像の要素を取得
  const mainVisualImg = $('[class^="header__mainvisual--img"] img');
  const menu = $('.header__menu span');
  const link = $('.header__link h1 a');

  // スクロール距離で、文字色を出しわけ
  $(window).on('scroll', function () {
    const mainVisualImgTop = mainVisualImg.offset().top;
    const mainVisualImgBottom = mainVisualImgTop + mainVisualImg.height();

    /***********************************************
     * 「光華亭」の文字色変更
    ************************************************/
    const linkTop = link.offset().top;

    if (
      (linkTop > mainVisualImgTop && linkTop < mainVisualImgBottom) // mainVisualImgと重なっている場合 → 白
    ) {
      link.removeClass('black').addClass('white');
    } else {
      link.removeClass('white').addClass('black');
    }

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

  });
}

/**
 * PC,タブレットでは、デフォルトでclass='black'がついているので、
 * whiteに書き換える。
 */
function changeClassName() {
  const headerMenuSpan = $('.header__menu span');
  const headerLinkTitle = $('.header__link h1 a');

  headerMenuSpan.css('transition', 'none');
  headerMenuSpan.removeClass('black').addClass('white');
  headerLinkTitle.removeClass('black').addClass('white');
}