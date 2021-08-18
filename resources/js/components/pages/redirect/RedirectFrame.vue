<template>
    <div>
        <div class="overflow-x-hidden">
            <div class="relative max-w-4xl mx-auto px-8 py-16 sm:py-32">

                <div class="relative mx-auto rounded-full h-24 w-24 p-1.5 border-2 border-grey-light mb-4">
                    <p class="text-5xl pl-6 pt-4">{{count}}</p>
                </div>
                <div class="relative text-center">
                    <figure class="font-display">
                        <blockquote class="relative text-2xl sm:text-3xl mx-auto italic mb-4 px-12 sm:px-16">

                            We are redirecting you to last stop please wait

                        </blockquote>
                        <figcaption class="uppercase text-indigo-dark tracking-wide font-bold text-lg">
                            <a
                                href="https://twitter.com/erikdkennedy/status/1001836296501805056"
                                class="text-indigo-dark hover:text-indigo no-underline">
                                sho.lc
                            </a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                count: 8
            }
        },

        mounted () {
            const self = this
            setInterval(() => {
                self.countDown()
            }, 1000)
        },

        props: {
            /**
             * @property {object} variables
             */
            variables: {
                type: Object,
                required: true
            }
        },

        methods: {
            /**
             * @return void
             */
            countDown () {
                if (this.count === 0) {
                    // redirect
                    window.location.replace(this.variables.url)
                } else {
                    this.count--
                }
            }
        }
    }
</script>
