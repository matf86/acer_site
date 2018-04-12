

export default class EventHandlers
{
    constructor() {
        this.eventHandlers = [
            {
                $el: $('.navbar__mobile'),
                event: "click",
                handler: function() {
                    $(".navbar__list").toggleClass('navbar_show');
                }
            },
            // {
            //     $el: $('header'),
            //     event: "mousemove",
            //     handler: function(e) {
            //         let header = $('header');
            //         let text = $('header > h1');
            //
            //         let width = header[0].offsetWidth;
            //         let height = header[0].offsetHeight;
            //         let walk = 10;
            //
            //         let x = e.offsetX;
            //         let y = e.offsetY;
            //
            //         if (this !== e.target) {
            //             x = x + e.target.offsetLeft;
            //             y = y + e.target.offsetTop;
            //         }
            //
            //         let xWalk = Math.round((x / width * walk) - (walk / 3.5));
            //         let yWalk = Math.round((y / height * walk) - (walk / 3.5));
            //
            //         let textShadow = xWalk + 'px '+ yWalk + 'px ' + '0 rgba(167, 207, 243, .7)';
            //
            //         text.css('textShadow', textShadow);
            //     }
            // },
            {
                $el: $('.recaptcha'),
                event: "validation",
                handler: function(evt, valid) {
                    if(valid && $(this).hasClass('has-error')) {
                        $(this).children().last().css('display', 'none');
                    }
                }
            }
        ];

        this.bindEventHandlers();
    }

    bindEventHandlers() {

        // console.log(this.eventHandlers);

        for (let i = 0; i < this.eventHandlers.length; i++) {
            this.bindEvent(this.eventHandlers[i]);
        }
    }

    bindEvent(e) {
        e.$el.on(e.event, e.handler);
        console.log('Bound ' + e.event + ' handler for', e.$el);
    }
}