function initHeroSlider() {
    var heroSlider = $('.js-hero')

    var iconLeft = $(window).width() > 767 ? '<svg viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M45.7071 17.2929C46.0976 17.6834 46.0976 18.3166 45.7071 18.7071L28.4142 36L45.7071 53.2929C46.0976 53.6834 46.0976 54.3166 45.7071 54.7071C45.3166 55.0976 44.6834 55.0976 44.2929 54.7071L26.2929 36.7071C25.9024 36.3166 25.9024 35.6834 26.2929 35.2929L44.2929 17.2929C44.6834 16.9024 45.3166 16.9024 45.7071 17.2929Z" fill="white"/>\n' +
        '</svg>' : '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M15.7071 5.29289C16.0976 5.68342 16.0976 6.31658 15.7071 6.70711L10.4142 12L15.7071 17.2929C16.0976 17.6834 16.0976 18.3166 15.7071 18.7071C15.3166 19.0976 14.6834 19.0976 14.2929 18.7071L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L14.2929 5.29289C14.6834 4.90237 15.3166 4.90237 15.7071 5.29289Z" fill="white"/>\n' +
        '</svg>'

    var iconRight = $(window).width() > 767 ? '<svg viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M26.2929 17.2929C26.6834 16.9024 27.3166 16.9024 27.7071 17.2929L45.7071 35.2929C46.0976 35.6834 46.0976 36.3166 45.7071 36.7071L27.7071 54.7071C27.3166 55.0976 26.6834 55.0976 26.2929 54.7071C25.9024 54.3166 25.9024 53.6834 26.2929 53.2929L43.5858 36L26.2929 18.7071C25.9024 18.3166 25.9024 17.6834 26.2929 17.2929Z" fill="white"/>\n' +
        '</svg>' : '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '<path fill-rule="evenodd" clip-rule="evenodd" d="M8.29289 5.29289C8.68342 4.90237 9.31658 4.90237 9.70711 5.29289L15.7071 11.2929C16.0976 11.6834 16.0976 12.3166 15.7071 12.7071L9.70711 18.7071C9.31658 19.0976 8.68342 19.0976 8.29289 18.7071C7.90237 18.3166 7.90237 17.6834 8.29289 17.2929L13.5858 12L8.29289 6.70711C7.90237 6.31658 7.90237 5.68342 8.29289 5.29289Z" fill="white"/>\n' +
        '</svg>'


    if (heroSlider.length > 0) {
        var tl = gsap.timeline({paused: true})

        tl.fromTo('.animate-hero-main', .3,{y: 70, opacity: 0}, { opacity: 1, y: 0, ease: Power3.easeInOut }, 0);
        tl.fromTo('.animate-hero-dop', .3,{x: 70, opacity: 0}, { opacity: 1, x: 0, ease: Power3.easeInOut }, 0);
        heroSlider.on('init', function (slick) {
            tl.play()
        })

        heroSlider.slick({
            dots: false,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            adaptiveHeight: true,
            waitForAnimate: true,
            autoplay: false,
            speed: 300,
            prevArrow: '<button class="slide-btn slide-btn_prev"><span class="slide-btn__icon">' + iconLeft + '</span></button>',
            nextArrow: '<button class="slide-btn slide-btn_next"><span class="slide-btn__icon">' + iconRight + '</span></button>',
            fade: true
        })

        heroSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            tl.pause(0)
        })
        heroSlider.on('afterChange', function (event, slick, currentSlide) {
            tl.play();
        })
    }
}
