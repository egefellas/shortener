<template>
    <div>
        <navigator></navigator>
        <redirect-frame :variables="variables"></redirect-frame>
    </div>
</template>

<script>
    import Navigator from '../../app/Header.vue'
    import RedirectFrame from './RedirectFrame.vue'

    export default {
        components: {
            Navigator,
            RedirectFrame
        },

        data () {
            return {
                variables: window.variables
            }
        }
    }
</script>
