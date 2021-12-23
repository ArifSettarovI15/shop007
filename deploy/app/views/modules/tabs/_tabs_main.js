$( document ).on( "click", ".tabs__link", function(e) {
    e.preventDefault();
    TabsSet($(this));
});


if ($(window).width()<768) {
    $('.tabs-content__head').mod('active',false);
    $('.tabs-content__content').mod('active',false);
}