<template>
    <div class="fixed bottom-0 bg-indigo-800 text-white">
        <div class="p-2 flex justify-around">
            <div class="py-3 px-6 inline-block w-10/12">
                We use cookies to make interactions with our website and services easy and meaningful,
                and better understand how they are used and to tailor advertising.
                You can read more and make your cookie choices here.
                By continuing to use this site you are giving us your consent to do this.
            </div>
            <div class="py-3 px-6 inline-block">
                <a :href="privacy_link" class="underline text-white text-opacity-50">Learn More</a>
            </div>
            <button class="w-24 h-10 border-2 rounded inline-block font-extrabold px-0 mt-3"
                    :click="addGotItCookie">GOT IT</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Footer',
        data () {
            return {
                privacy_link: window.domain+'privacy-policy'
            }
        },
        methods: {
            addGotItCookie: function (event) {
                console.log('hi!');
            }
        }
    }
</script>
