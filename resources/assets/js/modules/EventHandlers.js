

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
            {
                $el: $('.recaptcha'),
                event: "validation",
                handler: function(evt, valid) {
                    if(valid && $(this).hasClass('has-error')) {
                        $(this).children().last().css('display', 'none');
                    }
                }
            },
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