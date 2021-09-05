<template>
    <div
        class="fixed bottom-0 bg-indigo-800 text-white"
        v-show="isVisible === undefined ? true : !Boolean(isVisible)">
        <div class="p-2 flex justify-around">
            <div class="py-3 px-6 inline-block w-10/12">
                We use cookies to make interactions with our website and services easy and meaningful,
                and better understand how they are used and to tailor advertising.
                You can read more and make your cookie choices here.
                By continuing to use this site you are giving us your consent to do this.
            </div>
            <div class="py-3 px-6 inline-block"><a
                :href="privacy_link"
                class="underline text-white text-opacity-50">Learn
                More</a></div>
            <button
                class="w-24 h-10 border-2 rounded inline-block font-extrabold px-0 mt-3"
                @click="addGotItCookie">GOT IT
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Footer',
        data () {
            return {
                isVisible: this.getCookie(' showCookiePolicy'),
                privacy_link: window.domain + 'privacy-policy'
            }
        },
        methods: {
            addGotItCookie: function (event) {
                document.cookie = 'showCookiePolicy=false; expires=' + this.getCookieExpireTime()
                this.isVisible = 'false'
            },
            getCookie: function (cName) {
                let i
                let x
                let y
                const ARRcookies = document.cookie.split(';')
                for (i = 0; i < ARRcookies.length; i++) {
                    x = ARRcookies[i].substr(0, ARRcookies[i].indexOf('='))
                    y = ARRcookies[i].substr(ARRcookies[i].indexOf('=') + 1)
                    x = x.replace(/^s+|s+$/g, '')
                    if (x === cName) {
                        return unescape(y)
                    }
                }
            },
            getCookieExpireTime () {
                const now = new Date()
                const time = now.getTime()
                const expireTime = time + 1000 * 36000 * 3600
                now.setTime(expireTime)
                return now.toUTCString() + ';'
            }
        }
    }
</script>
