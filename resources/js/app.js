import { createApp } from 'vue'
import Home from './components/pages/home/Index.vue'
import Redirect from './components/pages/redirect/Index.vue'
import PrivacyPolicy from './components/pages/legal/PrivacyPolicy'
import Login from './components/pages/auth/Login'
import Register from './components/pages/auth/Register'
import Dashboard from './components/pages/Dashboard'

require('./bootstrap')
require('alpinejs')
window.axios = require('axios')
window.domain = window.location.protocol + '//' + window.location.host + '/'

const app = createApp({
    components: {
        Home,
        Redirect,
        PrivacyPolicy,
        Login,
        Register,
        Dashboard
    }
})

app.mount('#app')
