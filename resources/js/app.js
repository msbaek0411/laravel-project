/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



Vue.component('Chat3', require('./components/MusicList.vue').default);

Vue.component('Chat4', require('./components/MusicChat.vue/NewList').default);

Vue.component('Chat5', require('./components/MusicChat.vue/TopList').default);

Vue.component('Chat6', require('./components/MusicChat.vue/MainHome').default);

Vue.component('Chat7', require('./components/MusicChat.vue/MainPageC').default);

Vue.component('Chat8', require('./components/MusicChat.vue/AdminPage').default);

Vue.component('Chat9', require('./components/MusicChat.vue/AdminPageDetail').default);





// Vue.component('TestList', require('./components/TestList.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
