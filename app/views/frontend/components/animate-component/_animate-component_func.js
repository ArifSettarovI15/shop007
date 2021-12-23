function animateSkills() {
    var tl = initScrollTriggerTl('.anim-skills')

    tl.to('.anim-skill-item', {
        opacity: 1, y: 0, stagger: {
            each: .3,
            stagger: .1,
            duration: .2
        }
    })
}

function animateCatalog() {
    var tl = initScrollTriggerTl('.anim-catalog')


    tl.to('.anim-catalog-item', .25, { opacity: 1, y: 0})
    tl.to('.anim-catalog-item-2', .25, { opacity: 1, y: 0})
}

function animateWorks() {
    var tl = initScrollTriggerTl('.anim-work')
    tl.from('.anim-work-item', {
        autoAlpha: 1, stagger: {
            each: .5,
            onComplete: function() {
            }
        }
    })
}

function animateFaq() {

}

function animateTeam() {
}

function animateFeeds() {
    var tl = initScrollTriggerTl('.anim-feeds')

    gsap.set('.anim-feeds-main', {y: 70, opacity: 0})
    tl.to('.anim-feeds-main', .3, {y: 0, opacity: 1})
}

function animateDelivery() {
    var tl = initScrollTriggerTl('.anim-delivery')

    gsap.set('.anim-delivery-main', {y: 50, opacity: 0})
    gsap.set('.anim-delivery-second', {x: 50})
    tl.to('.anim-delivery-main', .3, {y: 0, autoAlpha: 1}, 0)
    tl.to('.anim-delivery-second', .3, {x: 0, autoAlpha: 1}, 0)
}

function animateNews() {
    var tl = initScrollTriggerTl('.anim-news')

    gsap.set('.anim-news-main', {y: 70, opacity: 0})
    tl.to('.anim-news-main', .3, {y: 0, opacity: 1})
}

function animateCb() {
    var tl = initScrollTriggerTl('.anim-cb')

    gsap.set('.anim-cb-main', {y: 70, opacity: 0})
    gsap.set('.anim-cb-dop', {y: 70, opacity: 0})
    tl.to('.anim-cb-main', .3, {y: 0, opacity: 1})
    tl.to('.anim-cb-dop', .3, {y: 0, opacity: 1})
}

function animateContacts() {
    var tl = initScrollTriggerTl('.anim-contacts')

    var block = $('.anim-contacts')

    var contHeader = block.find('.section-head__title')
    var contBody = block.find('.c-block')

    gsap.set([contHeader, contBody], {x: -100, opacity: 0})
    tl.to([contHeader, contBody], .5, {x: 0, opacity: 1})
}

function animateSt() {
    var tl = initScrollTriggerTl('.box-st')
    tl.set('.box-st', { opacity: 0, y: 100 })
    tl.to('.box-st', .3, { y: 0, opacity: 1 })
}

function initScrollTriggerTl(selector) {
    return gsap.timeline({
        scrollTrigger: selector,
        start: 'bottom center',
        end: 'bottom center'
    })
}
