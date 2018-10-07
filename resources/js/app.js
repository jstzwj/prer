
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Vuex from 'vuex';
Vue.use(Vuex);

import axios from 'axios';

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);

import 'jquery/dist/jquery.min.js'

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'

import 'font-awesome/css/font-awesome.css'

/* jquery init */
/*
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
*/


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import App from './App.vue'

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('sidebar-component', require('./components/SidebarComponent.vue'));
Vue.component('navbar-component', require('./components/NavbarComponent.vue'));
Vue.component('footer-component', require('./components/FooterComponent.vue'));
Vue.component('playlist-component', require('./components/PlaylistComponent.vue'));
Vue.component('signin-component', require('./components/SigninComponent.vue'));
Vue.component('signup-component', require('./components/SignupComponent.vue'));

Vue.component('main-layout', require('./layouts/MainLayout.vue'));

import Home from './pages/Home.vue'
import Signin from './pages/Signin.vue'
import Signup from './pages/Signup.vue'
import Watch from './pages/Watch.vue'
import Code404 from './pages/Code404.vue'


// router
const routes = [
    { path: '/', component: Home },
    { path: '/signin', component: Signin },
    { path: '/signup', component: Signup },
    { path: '/watch', component: Watch },
    { path: '*', component: Code404 }
]

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

// states
const store = new Vuex.Store({
    state: {
      userName: '',
      userMail: '',
      isSignin: false
    },
    mutations: {
        setUserName (state, name) {
            state.userName = name;
        },
        setUserMail (state, mail) {
            state.userMail = mail;
        },
        setSignin(state){
            state.isSignin = true;
        },
        setSignout(state){
            state.isSignin = false;
        }
    }
});


const app = new Vue({
    el: '#app',
    store: store,
    router: router,
    render: h=>h(App)
});
