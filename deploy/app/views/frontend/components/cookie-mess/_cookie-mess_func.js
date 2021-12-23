function setCookieMessHandler() {
    $('.cookie-notification').fadeOut();
    Cookies.set('mes_cookie', '1', {expires: 7})
    $(document).off('click', setCookieMessHandler)
}