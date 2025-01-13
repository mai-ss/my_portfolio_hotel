
$(".header__menu,.header__menu-room,.header__menu-bath,.header__menu-food,.header__menu-hotel_guide,.header__menu-access").click(function () {
    $(this).toggleClass('active');
});



/*=================================================
ハンバーガーメニュー
===================================================*/
$(function () {
    $(".header__menu, .header__menu-room,.header__menu-bath,.header__menu-food,.header__menu-hotel_guide,.header__menu-access").on("click", function () {
        // headerにopenクラスがあるか判定する
        if ($("header").hasClass("open")) {
            $("#__remove-transition").css('transition', 'all 0s');
            // headerにopenクラスが存在する場合、openクラスを削除する
            $("header").removeClass("open");
            $("body").css("overflow-y", "scroll");
        } else {
            $("#__remove-transition").css('transition', 'all 0s');
            // headerにopenクラスが存在しない場合、openクラスを加える
            $("header").addClass("open");
            $("body").css("overflow-y", "hidden");
        }
    });
});
