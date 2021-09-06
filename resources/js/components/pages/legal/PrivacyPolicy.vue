<template>
    <div>
        <navigator></navigator>
        <div class="container lg:max-w-screen-lg mx-auto px-6 py-8 sm:py-16 md:py-24 leading-normal">
            <div class="mb-12" v-html="letter"></div>
        </div>
    </div>

</template>

<script>
import navigator from '../../app/Header'
import Letter from 'raw-loader!./../../../../../storage/app/public/privacy_policy.txt'

export default {
    name: "PrivacyPolicy",
    data: function () {
        return {
            letter: Letter
        }
    },
    components: {
        navigator
    }
}
</script>
