<template>
    <div>
        <navigator></navigator>
        <main-frame></main-frame>
        <Footer></Footer>
    </div>
</template>

<script>
    import Navigator from '../../app/Header.vue'
    import MainFrame from './MainFrame.vue'
    import Footer from '../../app/Footer.vue'

    export default {
        components: {
            Navigator,
            MainFrame,
            Footer
        }
    }
</script>
