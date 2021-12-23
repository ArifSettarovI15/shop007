function HeadsUp(selector, options) {
    this.selector = $(selector)
    this.options = extend(this.defaults, options)
    this.init()
}

HeadsUp.prototype = {
    defaults: {
        delay       : 300,
        sensitivity : 20,
        offset: 1
    },
    init: function() {
        var self = this,
            options = self.options,
            selector = self.selector,
            oldScrollY = 0,
            winHeight

        function resizeHandler() {
            winHeight = window.innerHeight;
            return winHeight;
        }

        function scrollHandler() {
            var newScrollY = window.pageYOffset,
                docHeight  = document.body.scrollHeight,
                pastDelay  = newScrollY > options.delay,
                goingDown  = newScrollY > oldScrollY,
                fastEnough = newScrollY < oldScrollY - options.sensitivity,
                rockBottom = newScrollY < 0 || newScrollY + winHeight >= docHeight,
                rockTop = newScrollY < options.offset,
                isOpenMenu = $('body').hasClass('menu-open')

            if (!isOpenMenu) {
                if ( (pastDelay && goingDown) ) {
                    selector.addClass('header_up')
                } else if ( !goingDown && fastEnough && !rockBottom || !pastDelay ) {
                    selector.removeClass('header_up')
                }

                if ( !rockTop ) {
                    selector.addClass('header_move')
                } else {
                    selector.removeClass('header_move')
                }
            }
            oldScrollY = newScrollY;
        }

        if (selector) {
            resizeHandler();
            $(document).ready(scrollHandler)
            window.addEventListener( 'resize', throttle( resizeHandler ), false );
            window.addEventListener( 'scroll', throttle( scrollHandler, 100 ), false );
        }
    }
}

function throttle( fn, threshhold, scope ) {
    threshhold || ( threshhold = 250 );
    var previous, deferTimer;
    return function () {
        var context = scope || this,
            current = Date.now(),
            args    = arguments;
        if ( previous && current < previous + threshhold ) {
            clearTimeout( deferTimer );
            deferTimer = setTimeout( function () {
                previous   = current;
                fn.apply( context, args );
            }, threshhold );
        } else {
            previous = current;
            fn.apply( context, args );
        }
    };
}

function menuClose() {
    $('html body').removeClass('menu-open')
}