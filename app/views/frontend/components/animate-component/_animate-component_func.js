function animateSkills() {
    var tl = initScrollTriggerTl('.anim-skills')
    gsap.set('.anim-skill-item', {opacity: 0, y: 30})

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

    gsap.set(['.anim-catalog-item', '.anim-catalog-item-2'], {opacity: 0, y: 100})
    tl.to('.anim-catalog-item', .25, { opacity: 1, y: 0})
    tl.to('.anim-catalog-item-2', .25, { opacity: 1, y: 0})
}

function animateWorks() {
    var tl = initScrollTriggerTl('.anim-work')
    gsap.set('.anim-work-item-elem', {opacity: 0, y: 10})
    gsap.set('.anim-work-item-arrow', {opacity: 0, x: -20})
    tl.from('.anim-work-item', {
        autoAlpha: 1, stagger: {
            each: .5,
            onComplete: function() {
                var arrOfChilds = gsap.utils.toArray(this.targets()[0].children)
                gsap.to(arrOfChilds, {
                    opacity: 1,
                    y: 0,
                    x: 0,
                    stagger: .1,
                    duration: .2
                })
            }
        }
    })
}

function animateFaq() {
    var tl = initScrollTriggerTl('.anim-faq')

    gsap.set('.anim-faq-main', {y: 70, opacity: 0})
    tl.to('.anim-faq-main', .3, {y: 0, opacity: 1})
}

function animateTeam() {
    var tl = initScrollTriggerTl('.anim-team')

    gsap.set('.anim-team-img', {y: -70, opacity: 0})
    gsap.set('.anim-team-text', {y: 70, opacity: 0})
    gsap.set('.anim-team-list', {x: 70, opacity: 0})
    tl.to('.anim-team-img', .5, {y: 0, autoAlpha: 1}, 0)
    tl.to('.anim-team-text', .5, {y: 0, autoAlpha: 1}, 0)
    tl.to('.anim-team-list', .7, {x: 0, autoAlpha: 1})
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
