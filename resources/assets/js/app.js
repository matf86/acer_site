try {
    window.$ = window.jQuery = require('jquery');
    window.sr = require('scrollreveal');
    window.lightbox = require('../../../node_modules/lightbox2/dist/js/lightbox.js');
    require('bootstrap');
    require('jquery-form-validator');
    require('../../../node_modules/jquery-form-validator/src/modules/security.js');
    require('../../../node_modules/jquery-form-validator/src/modules/sanitize.js');
} catch (e) {
    console.log(e);
}

import Boot from './modules/Boot';

$(document).ready(function() {
    new Boot();
});
