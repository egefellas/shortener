<template>
    <div>
        <navigator></navigator>
        <main-frame></main-frame>
    </div>
</template>

<script>
    import Navigator from '../../app/Header.vue'
    import MainFrame from './MainFrame.vue'

    export default {
        components: {
            Navigator,
            MainFrame
        }
    }
</script>
