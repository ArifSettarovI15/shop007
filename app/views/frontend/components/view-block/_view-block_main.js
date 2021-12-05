$(document).ready(function() {
    $('.a-images').each(function() {
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: true,
            fixedContentPos: true,
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,2],
                tCounter: '<span class="mfp-counter">%curr% из %total%</span>',
            },
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out'
            }
        })
    })
})