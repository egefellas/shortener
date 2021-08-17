<template>
    <div>
        <div class="relative bg-white overflow-hidden">
            <div class="pb-80 sm:pt-24 sm:pb-40 lg:pb-48">
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 sm:static">
                    <div class="sm:max-w-3xl sm:float-left">
                        <h1 class="text-4xl font font-extrabold tracking-tight text-gray-900 sm:text-6xl">
                            Short links, big results
                        </h1>
                        <p class="mt-4 text-xl text-gray-500">
                            A URL shortener built with powerful tools to help you grow and protect your brand.
                        </p>
                        <div class="mt-10 flex">
                            <input v-model="link" class="sm:w-9/12 rounded-l-lg p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" placeholder="Shorten Your Url"/>
                            <button @click="shortenUrl" class="px-8 rounded-r-lg text-white bg-indigo-600 hover:bg-indigo-700 font-bold p-4 uppercase border-transparent border-t border-b border-r">Subscribe</button>
                        </div>
                        <p v-if="showError" class="text-red-600">
                            Unable to shorten that link. It is not a valid url.
                        </p>
                    </div>
                    <div class="sm:max-w-sm sm:float-right">
                        <img src="http://pixner.net/cortaly/main/assets/images/blog/blog3.jpg" alt="Sample Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="relative bg-white overflow-hidden">
            <div class="pt-8 pb-80 sm:pt-12 sm:pb-40 lg:pt-20 lg:pb-48">
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 sm:static">
                    <ul>
                        <li v-for="data in shortUrlList" class="p-5 sm:h-20 border border-indigo-600 rounded" >
                            <span class="float-left pt-2 text-lg overflow-ellipsis w-6/12 overflow-hidden">
                                {{data.url}}
                            </span>
                            <a @click="copyText(data.short)" class="cursor-pointer float-right ml-8  whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Copy
                            </a>
                            <a :href="'/'+data.short" target="_blank" class="text-indigo-600 pt-1 text-2xl float-right"> {{domain}}/{{data.short}}</a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Routes } from '../../../enums/GeneralEnums'

    export default {

        data () {
            return {
                link: null,
                showError: false,
                domain: window.domain,
                shortUrlList: []
            }
        },

        methods: {

            /**
             * @return {void}
             */
            async shortenUrl () {
                this.showError = false
                if (this.validateUrl()) {
                    const self = this
                    window.axios.post(Routes.SHORTEN_URL, {
                        link: this.link
                    })
                    .then(function (response) {
                        self.shortUrlList = [response.data].concat(self.shortUrlList)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
                } else {
                    this.showError = true
                }
            },

            /**
             * @return {boolean}
             */
            validateUrl () {
                // eslint-disable-next-line prefer-regex-literals
                const r = new RegExp(/^(ftp|http|https):\/\/[^ "]+$/)
                return r.test(this.link)
            },

            /**
             * @param {string} url
             * @return {boolean}
             */
            copyText (url) {
                navigator.clipboard.writeText(window.domain + url)
            }
        }
    }
</script>
