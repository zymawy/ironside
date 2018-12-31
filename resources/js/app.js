require('./bootstrap');
window.Vue = require('vue');
// Assets
require('./assets')

import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app'
});
