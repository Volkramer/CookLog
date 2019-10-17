import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './registerServiceWorker'
import vuetify from './plugins/vuetify'
import Axios from 'axios'

Vue.config.productionTip = false

const token = localStorage.getItem('token');
if (token) {
    Axios.defaults.headers.common['Authorization'] = 'Bearer ' + token
}

new Vue({
    router,
    store,
    vuetify,
    render: h => h(App)
}).$mount('#app')