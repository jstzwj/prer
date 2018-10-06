
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'

import 'font-awesome/css/font-awesome.css'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('sidebar-component', require('./components/SidebarComponent.vue'));
Vue.component('navbar-component', require('./components/NavbarComponent.vue'));
Vue.component('footer-component', require('./components/FooterComponent.vue'));
Vue.component('playlist-component', require('./components/PlaylistComponent.vue'));


const app = new Vue({
    el: '#app'
});
