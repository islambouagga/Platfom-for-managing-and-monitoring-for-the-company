/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import Vue from "vue";

require('./bootstrap');

window.Vue = require('vue').default;

import moment from "moment";

import Form from "vform";
import HasError from "vform";
import AlertError from "vform";

import Gate from "./Gate";

Vue.prototype.$gate = new Gate(window.user);



import Swal from 'sweetalert2'
window.Swal = Swal;


const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast; // with this inst we can use it in all files

window.form = Form;
vue.component(HasError.name, HasError)
vue.component(HasError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '6px'
});


import Multiselect from 'vue-multiselect'
// register globally
Vue.component('multiselect', Multiselect)



import Dashboard from "./components/Dashboard";
import Profile from "./components/profile";
import Users from "./components/Users";
import Client from "./components/Client";
import Projet from "./components/Projet";
import Intervenant from "./components/Intervenant";
import Fiche from "./components/Fiche";
import FichesSuivie from "./components/FichesSuivie";
import ConsulterPrj from "./components/ConsulterPrj";
import ManipIntervPrj from "./components/ManipIntervPrj";
import ImprimerPV from "./components/ImprimerPV";
import ConsulterArchive from "./components/ConsulterArchive";
import vue from "vue";

let routes = [
    { path: '/dashboard', component:Dashboard},
    { path: '/profile', component:Profile},
    { path: '/users', component:Users},
    { path: '/Client', component:Client},
    { path: '/Projet', component:Projet},
    { path: '/Intervenant', component:Intervenant},
    { path: '/Fiche', component:Fiche},
    { path: '/ConsulterPrj', component:ConsulterPrj},
    { path: '/FichesSuivie', component:FichesSuivie},
    { path: '/ManipIntervPrj', component:ManipIntervPrj},
    { path: '/ImprimerPV', component:ImprimerPV},
    { path: '/ConsulterArchive', component:ConsulterArchive},

]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})



vue.filter('upText',function (text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

vue.filter('myDate', function (created){
    return moment(created).format('YYYY-MM-D');
});

window.Fire = new Vue();



import JsonExcel from "vue-json-excel";
Vue.component("downloadExcel", JsonExcel);



import VueHtmlToPaper from 'vue-html-to-paper';
const options = {
    name: '_blank',
    specs: [
        'fullscreen=yes',
        'titlebar=yes',
        'scrollbars=yes'
    ],
    styles: [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'https://unpkg.com/kidlat-css/css/kidlat.css'
    ]
}

Vue.use(VueHtmlToPaper, options);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ConsulterArchive.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ConsulterArchive.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
