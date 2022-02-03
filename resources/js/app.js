require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import VueSweetalert2 from  "vue-sweetalert2"
Vue.use(VueSweetalert2)

// Do not import this file if you want to use custom style
import 'sweetalert2/dist/sweetalert2.min.css';

import App from './components/App.vue'

Vue.component('posts-index', require('./components/Posts/Index.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

import route from './routes'

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router: new VueRouter(route)
});

