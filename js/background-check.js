BackgroundCheck.init({
    targets: '.header__link h1 a'
    images: '.header__link'

  });
  $(window).on('scroll', function () {
    BackgroundCheck.refresh();
});