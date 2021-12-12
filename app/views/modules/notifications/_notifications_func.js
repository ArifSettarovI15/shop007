function ShowError (text) {
    ShowNotificationAndHide(text, 'error');
}

function ShowMessage (text) {
    ShowNotificationAndHide(text, 'message');
}
function ShowInlineError(text,elem) {
    ShowInlineInfo(text,elem,"error");
}
function ShowInlineMessage(text,elem) {
    ShowInlineInfo(text,elem,"message");
}
function ShowInlineInfo(text,elem,class_name) {
    class_name = class_name || "message";
    elem.html('<div class="inline_notification '+class_name+'">'+text+'</div>');
}

function ShowNotification (text,class_name) {
    class_name = class_name || 'default';
    var icon;
    var iconCloseColor = class_name === 'default' ? '#9B876E' : '#fff'
    var iconClose = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M15.7071 5.70711C16.0976 5.31658 16.0976 4.68342 15.7071 4.29289C15.3166 3.90237 14.6834 3.90237 14.2929 4.29289L10 8.58579L5.70711 4.29289C5.31658 3.90237 4.68342 3.90237 4.29289 4.29289C3.90237 4.68342 3.90237 5.31658 4.29289 5.70711L8.58579 10L4.29289 14.2929C3.90237 14.6834 3.90237 15.3166 4.29289 15.7071C4.68342 16.0976 5.31658 16.0976 5.70711 15.7071L10 11.4142L14.2929 15.7071C14.6834 16.0976 15.3166 16.0976 15.7071 15.7071C16.0976 15.3166 16.0976 14.6834 15.7071 14.2929L11.4142 10L15.7071 5.70711Z" fill="'+ iconCloseColor +'"/>\n' +
        '</svg>\n'

    switch (class_name) {
        case 'error':
            icon = '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                '<path fill-rule="evenodd" clip-rule="evenodd" d="M9 2C9.43043 2 9.81257 2.27543 9.94868 2.68377L15 17.8377L17.0513 11.6838C17.1874 11.2754 17.5696 11 18 11H22C22.5523 11 23 11.4477 23 12C23 12.5523 22.5523 13 22 13H18.7208L15.9487 21.3162C15.8126 21.7246 15.4304 22 15 22C14.5696 22 14.1874 21.7246 14.0513 21.3162L9 6.16228L6.94868 12.3162C6.81257 12.7246 6.43043 13 6 13H2C1.44772 13 1 12.5523 1 12C1 11.4477 1.44772 11 2 11H5.27924L8.05132 2.68377C8.18743 2.27543 8.56957 2 9 2Z" fill="white"/>\n' +
                '</svg>\n';
            break;
        case 'message':
            icon = '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                '<path fill-rule="evenodd" clip-rule="evenodd" d="M10.0166 3.21555C11.9096 2.78783 13.8902 2.98352 15.663 3.77342C16.1675 3.9982 16.7587 3.77146 16.9834 3.26699C17.2082 2.76251 16.9815 2.17134 16.477 1.94656C14.3103 0.981129 11.8896 0.74196 9.57581 1.26472C7.26206 1.78748 5.17929 3.04416 3.63811 4.84734C2.09693 6.65052 1.17992 8.90358 1.02384 11.2705C0.86777 13.6374 1.48099 15.9914 2.77206 17.9813C4.06312 19.9713 5.96285 21.4906 8.18792 22.3126C10.413 23.1347 12.8442 23.2154 15.1189 22.5428C17.3936 21.8703 19.39 20.4804 20.8103 18.5806C22.2306 16.6807 22.9987 14.3726 23 12.0006V12V11.08C23 10.5277 22.5523 10.08 22 10.08C21.4477 10.08 21 10.5277 21 11.08V11.9994C20.9989 13.9402 20.3705 15.8286 19.2084 17.3831C18.0464 18.9375 16.413 20.0746 14.5518 20.6249C12.6907 21.1752 10.7015 21.1091 8.88102 20.4365C7.06051 19.764 5.50619 18.5209 4.44987 16.8928C3.39354 15.2646 2.89181 13.3387 3.01951 11.4021C3.14721 9.46552 3.89749 7.62211 5.15845 6.14678C6.41942 4.67145 8.12351 3.64326 10.0166 3.21555ZM22.7075 4.70674C23.0978 4.31602 23.0975 3.68286 22.7068 3.29253C22.316 2.9022 21.6829 2.90252 21.2925 3.29323L11.9997 12.5954L9.70711 10.3029C9.31659 9.91236 8.68342 9.91236 8.2929 10.3029C7.90238 10.6934 7.90238 11.3266 8.2929 11.7171L11.2929 14.7171C11.4805 14.9047 11.735 15.0101 12.0003 15.01C12.2656 15.0099 12.52 14.9044 12.7075 14.7167L22.7075 4.70674Z" fill="white"/>\n' +
                '</svg>\n';
            break;
        case 'decline':
            icon = '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                '<path fill-rule="evenodd" clip-rule="evenodd" d="M6.38231 4.9681C7.92199 3.73647 9.87499 3 12 3C16.9706 3 21 7.02944 21 12C21 14.125 20.2635 16.078 19.0319 17.6177L6.38231 4.9681ZM4.9681 6.38231C3.73647 7.92199 3 9.87499 3 12C3 16.9706 7.02944 21 12 21C14.125 21 16.078 20.2635 17.6177 19.0319L4.9681 6.38231ZM12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1Z" fill="white"/>\n' +
                '</svg>\n';
            break;
        case 'wait':
            icon = '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                '<path fill-rule="evenodd" clip-rule="evenodd" d="M8.14109 4.99636C9.66003 4.15882 11.41 3.83765 13.1274 4.08125C14.8448 4.32484 16.4364 5.12 17.6626 6.3469C17.6717 6.35608 17.6811 6.36507 17.6906 6.37389L20.5278 9.00002H16.9999C16.4476 9.00002 15.9999 9.44773 15.9999 10C15.9999 10.5523 16.4476 11 16.9999 11H22.9999C23.5522 11 23.9999 10.5523 23.9999 10V4.00002C23.9999 3.44773 23.5522 3.00002 22.9999 3.00002C22.4476 3.00002 21.9999 3.44773 21.9999 4.00002V7.63737L19.0631 4.91901C17.5323 3.39341 15.5484 2.40463 13.4083 2.10107C11.2616 1.79658 9.07407 2.19804 7.17538 3.24495C5.2767 4.29187 3.76971 5.92752 2.8815 7.90543C1.9933 9.88334 1.772 12.0963 2.25095 14.211C2.7299 16.3256 3.88316 18.2273 5.53694 19.6294C7.19072 21.0316 9.25541 21.8583 11.4199 21.9849C13.5844 22.1115 15.7314 21.5312 17.5374 20.3315C19.3434 19.1317 20.7105 17.3775 21.4328 15.3331C21.6167 14.8124 21.3437 14.2411 20.823 14.0571C20.3023 13.8732 19.731 14.1462 19.547 14.6669C18.9692 16.3024 17.8755 17.7058 16.4307 18.6656C14.9859 19.6254 13.2683 20.0896 11.5367 19.9883C9.80511 19.887 8.15335 19.2257 6.83033 18.1039C5.50731 16.9822 4.58471 15.4609 4.20154 13.7692C3.81838 12.0775 3.99542 10.3071 4.70598 8.72474C5.41655 7.14241 6.62214 5.83389 8.14109 4.99636Z" fill="white"/>\n' +
                '</svg>\n';
            break;
        default:
            icon = '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                '<path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 11C12.5523 11 13 11.4477 13 12V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V12C11 11.4477 11.4477 11 12 11ZM12 7C11.4477 7 11 7.44772 11 8C11 8.55228 11.4477 9 12 9H12.01C12.5623 9 13.01 8.55228 13.01 8C13.01 7.44772 12.5623 7 12.01 7H12Z" fill="#9B876E"/>\n' +
                '</svg>\n';
            break;
    }

    $('#notification').remove();
    $( '<div id="notification" class="notification animated bounceInDown '+class_name+'"><div class="notification__wrapper"><div class="notification__icon">' + icon +'</div>' + '<div class="notification__text">' + text + '</div></div><div class="notification__close close">' + iconClose + '</div></div>' ).insertAfter( $( "body" ) );
}

function HideNotification () {
    $("#notification").remove();
}
var notification_id;
function ShowNotificationAndHide (text,class_name,sec) {
    class_name = class_name || 'default';
    sec = sec || 3;
    var hide_time=sec*1000;

    ShowNotification (text,class_name);

    setTimeout(
        function()
        {
            HideNotification();
        }, hide_time);
}
