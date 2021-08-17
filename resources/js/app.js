import { createApp } from 'vue'
import Home from './components/pages/home/Index.vue'

require('./bootstrap')
require('alpinejs')
window.axios = require('axios')
window.domain = window.location.protocol + '//' + window.location.host + '/'

const app = createApp({
    components: {
        Home
    }
})

app.mount('#app')
