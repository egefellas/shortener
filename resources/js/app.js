import { createApp } from 'vue'
import Home from './components/pages/home/Index.vue'
import Redirect from './components/pages/redirect/Index.vue'

require('./bootstrap')
require('alpinejs')
window.axios = require('axios')
window.domain = window.location.protocol + '//' + window.location.host + '/'

const app = createApp({
    components: {
        Home,
        Redirect
    }
})

app.mount('#app')
