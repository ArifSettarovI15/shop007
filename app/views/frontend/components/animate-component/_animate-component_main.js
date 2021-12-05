$(window).on('load', function () {
    if ($('.ajax-loading_preload').length) {
        $('.ajax-loading').fadeOut(1000, function() {
            $('.ajax-loading').mod('preload', false)
            $('body').fadeIn()
        })
    }

    gsap.registerPlugin(ScrollTrigger)
    gsap.registerPlugin(CSSPlugin)

    // animate skills

    initHeroSlider()

    if ($('.anim-skills').length > 0) {
        animateSkills()
    }

    // animate catalog
    if ($('.anim-catalog').length > 0) {
        animateCatalog()
    }

    // animate workss
    if ($('.anim-work').length > 0 && $(window).width() > 767) {
        animateWorks()
    }

    // animate faq

    if ($('.anim-faq').length > 0) {
        animateFaq()
    }

    // animate team
    if ($('.anim-team').length > 0) {
        animateTeam()
    }

    // animate feeds
    if ($('.anim-feeds').length > 0) {
        animateFeeds()
    }
    //
    // animate delivery
    if ($('.anim-delivery').length > 0) {
        animateDelivery()
    }

    // animate news
    if ($('.anim-news').length > 0) {
        animateNews()
    }

    // animate callback
    if ($('.anim-cb').length > 0) {
        animateCb()
    }

    // animate contacts
    if ($('.anim-contacts').length > 0) {
        animateContacts()
    }

    // animate seo text
    if ($('.box-st').length > 0) {
        animateSt()
    }
})
