import './bootstrap';
import Vue from 'vue'
import VueRouter from 'vue-router'
import ElementUI from 'element-ui';

import router from './router/index'
import store from './store/index'
import App from './App.vue'
import {initialize} from './helpers/general'
import Permissions from './mixins/Permissions';

// import 'element-ui/lib/theme-chalk/index.css';
// import './styles/element-variables.scss'
// import 'element-ui/lib/theme-chalk/index.css';

Vue.use(VueRouter)
Vue.use(ElementUI);

Vue.mixin(Permissions);

initialize(store,router)

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
})