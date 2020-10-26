import $ from 'jquery';

import '../scss/style.scss';

import './jquery.validate';
import './formValidate';
import './formsSending';
import './select2';
import './slick';
import './main';

import fns from "./functions";

$(document).ready(function () {
    fns.init();
});
