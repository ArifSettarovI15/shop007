var check_if_load = false;

function loadScript(url, callback) {
    var script = document.createElement("script");

    if (script.readyState) {  // IE
        script.onreadystatechange = function () {
            if (script.readyState == "loaded" ||
                script.readyState == "complete") {
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {
        script.onload = function () {
            callback();
        };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}

var ymap = function () {
    if (!check_if_load) {
        check_if_load = true
        loadScript("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;loadByRequire=1", function () {
            ymaps.load(initYaMap)
        });
    }
}

function initYaMap() {
    var map = $('#map')
    var coods = map.attr('data-coord').split(', ')
    var myMap = new ymaps.Map('map', {
        center: [coods[0], coods[1]],
        zoom: 17,
        controls: [],
    })

    var animatedLayout = ymaps.templateLayoutFactory.createClass(
        '<div class="placemark"</div>',
        {
            build: function () {
                animatedLayout.superclass.build.call(this);
                var element = this.getParentElement().getElementsByClassName('placemark')[0];
                var tl = initScrollTriggerTl('.anim-contacts')
                gsap.set(element, {opacity: 0, y: -70})
                tl.to(element, .3, {opacity: 1, y: 0})
            }
        }
    );

    var placemark = new ymaps.Placemark([coods[0], coods[1]], {}, {
        iconLayout: animatedLayout,
        iconImageSize: [48, 48],
        iconImageOffset: [-24, -24],
    })
    myMap.geoObjects.add(placemark)

    return myMap
}