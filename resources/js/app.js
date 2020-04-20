/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.$ = window.jQuery = require('jquery');

window.Vue = require('vue');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
//import ThaiAddressInput from 'vue-thai-address-input/dist/vue-thai-address-input.common';


//require('vue-thai-address-input/dist/vue-thai-address-input.min.css');

//Vue.use(ThaiAddressInput);

require('./components');
import NavBar from './components/NavBar';

const app = new Vue({
    el: "#app",
    components: {
        NavBar
      },

});
