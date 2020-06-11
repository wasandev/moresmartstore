import Vue from 'vue';
// import VueRouter from 'vue-router';
// import routes from './routes';
//import ElementUI from 'element-ui';
//import 'element-ui/lib/theme-chalk/index.css';


//Vue.use(VueRouter);
//Vue.use(ElementUI);

require('./bootstrap');
require('./nav');

window.$ = window.jQuery = require('jquery');

window.Vue = require('vue');

//import store from './store/index';
//import ThaiAddressInput from 'vue-thai-address-input/dist/vue-thai-address-input.common';


//require('vue-thai-address-input/dist/vue-thai-address-input.min.css');

//Vue.use(ThaiAddressInput);

require('./components');


var app = new Vue({
    el: "#app",
    //router: new VueRouter(routes),
    data: {
        termModalShowing: false,
    },
    //store

});

