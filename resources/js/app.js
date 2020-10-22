require('./bootstrap');
window.Vue = require('vue');







Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',

    created(){
        Echo.channel('test')
    .listen('TaskEvent', (e) => {
        console.log(e);
    });
    }
})
