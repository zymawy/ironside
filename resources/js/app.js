require('./bootstrap');
window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);

import "cropperjs"
import "cropperjs/dist/cropper"
import "cropperjs/dist/cropper.css"
import 'jquery-cropper/dist/jquery-cropper'
import 'bootstrap-vue/dist/bootstrap-vue.css'

const app = new Vue({
    el: '#app'
});
