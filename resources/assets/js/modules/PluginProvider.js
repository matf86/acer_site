
export default class PluginProvider
{
    constructor() {
        this.setupScrollReveal();
        this.setupNavbarActiveLink();
        this.setupLightbox();
        this.setupContactFormValidator();
        this.setupScrollSmooth();
    }

    setupScrollReveal() {
        let $scrollElement = $('.scroll-reveal');
        let scroll = window.sr({
            duration: 600,
            delay:15
        });

        $.each($scrollElement, function() {
            scroll.reveal(this, $(this).data());
        });

        // console.log('ScrollReveal loaded');
    }

    setupScrollSmooth() {

        window.scroll('a[href*="#"]', {
            speed: 650,
            easing: 'easeInOutCubic'
        });

        // console.log('Smooth-scroll loaded');
    }

    setupNavbarActiveLink() {
        let location = window.location;
        let pathname;

        if(location.pathname === '/') {
            pathname = location.href.slice(0, -1);
        } else {
            pathname = location.href;
        }

        $('.navbar__list > li > a[href="'+pathname+'"]').parent().addClass('active');

        // console.log('Active link function loaded');
    }

    setupLightbox() {
        lightbox.option({
            'wrapAround': true
        });

        // console.log('Lightbox loaded');
    }

    setupContactFormValidator() {
        $.validate({
            modules : 'sanitize, security',
            lang: 'pl',
            ignore: '.ignore',
            form : '#contact_form',
            scrollToTopOnError : false,
            borderColorOnError : 'rgba(185, 74, 72, 0.65)',
            reCaptchaTheme: 'light',
            onSuccess: this.sendFormWithAjax
        });

        // console.log('Form validator loaded');
    }

    sendFormWithAjax($form) {

        $('.alert').removeClass().addClass('alert').empty();
        $('form button').empty().append("<i class=\"fa fa-spinner fa-spin\"></i>");

        let url = $form.attr("action");
        let formData = $form.serialize();

        $.post(url, formData).done(function(response) {

            $('.alert').addClass('alert-info show')
                .append("<strong>"+response.message+"</strong>");


            setTimeout(function() {
                $('.alert').removeClass('alert-info show').empty();
            }, 4500);

            $('#contact_form').get(0).reset();
            grecaptcha.reset();
            $('form button').empty().text('Wyślij...');

        }).fail(function(response) {

            if(response.status === 422) {
                let errors = response.responseJSON;
                let $ul = $('<ul>');

                for(error in errors){
                    $ul.append("<li>"+errors[error]+"</li>")
                }

                $('.alert').addClass('alert-danger show')
                    .append("<strong>Przsłanie wiadomości nie powiodło się. Aby przesłać formularz:</strong>"+$ul.html());
            } else {
                $('.alert').addClass('alert-danger show')
                    .append("<strong>Przsłanie wiadomości nie powiodło się. Prosimy o kontakt telefoniczny lub przesłanie wiadomości e-mail.</strong>");
            }

            $('form button').empty().text('Wyślij...');
            grecaptcha.reset();
        });

        return false;
    }
}