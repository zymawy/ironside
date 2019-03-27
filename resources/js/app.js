require('./bootstrap');

window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue'

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// import 'tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js'

Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app'
});
