<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img
                    class="mx-auto h-12 w-auto"
                    src="/images/nav_logo.png"
                    alt="Workflow"/>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Sign in to your account
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or
                    <a
                        :href="routes.REGISTER_URL"
                        class="font-medium text-indigo-600 hover:text-indigo-500">
                        start your 14-day free trial
                    </a>
                </p>
            </div>

            <div class="mt-8 space-y-6 border-2 rounded-2xl bg-white p-6">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div
                        v-if="showError"
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5"
                        role="alert">
                        <div v-html="errorMessages"></div>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg
                                @click="showError = !showError"
                                class="fill-current h-6 w-6 text-red-500"
                                role="button"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651
                                    3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10
                                     8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1
                                      0 1.698z"/>
                            </svg>
                        </span>
                    </div>
                    <div class="mb-2">
                        <label
                            for="email-address"
                            class="mb-1 text-sm font-sans font-bold">Email address</label>
                        <input
                            id="email-address"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required=""
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300
                                       placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500
                                       focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address"
                            v-model="email"/>
                    </div>
                    <div class="mt-3">
                        <label
                            for="password"
                            class="mb-1 text-sm font-sans font-bold">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required=""
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300
                                      placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500
                                      focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password"
                            v-model="password"/>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            id="remember-me"
                            name="remember-me"
                            type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                            v-model="rememberMe"/>
                        <label
                            for="remember-me"
                            class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a
                            href="#"
                            class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <button
                        @click="login"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent
                                   text-sm font-medium rounded-md text-white bg-indigo-600
                                   hover:bg-indigo-700 focus:outline-none focus:ring-2
                                   focus:ring-offset-2 focus:ring-indigo-500">
                        <span
                            class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <LockClosedIcon
                                class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                aria-hidden="true"/>
                        </span>
                        Sign in
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { LockClosedIcon } from '@heroicons/vue/solid'
    import { Routes } from '../../../enums/GeneralEnums'

    export default {
        data () {
            return {
                routes: Routes,
                email: '',
                password: '',
                rememberMe: null,
                showError: false,
                isLoggedIn: false
            }
        },
        components: {
            LockClosedIcon
        },
        props: ['postUrl'],
        created () {
            if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
        },
        methods: {
            async login () {
                this.showError = false
                this.errorMessages = ''
                const routeS = this.routes
                if (this.validate()) {
                    window.axios.get('/sanctum/csrf-cookie').then(response => {
                        window.axios.post(
                            this.routes.LOGIN_POST_URL,
                            { email: this.email, password: this.password, rememberMe: this.rememberMe }
                        )
                            .then(function (response) {
                                if (response.data.success) {
                                    console.log(response.data)
                                    // window.location.href = routeS.DASHBOARD_URL
                                } else {
                                    this.error = response.data.message
                                }
                            })
                            .catch(function (error) {
                                if (error.response) {
                                    console.log(error.response)
                                    // Request made and server responded
                                    for (let i; i <= error.response.data.errors.length; i++) {
                                        this.errorMessages += '<p>' + error.response.data[i] + '</p>'
                                    }
                                } else if (error.request) {
                                    // The request was made but no response was received
                                    console.log(error.request)
                                } else {
                                    // Something happened in setting up the request that triggered an Error
                                    console.log('Error', error.message)
                                }
                            })
                    })
                } else {
                    this.errorMessages = '<ul><li>These credentials do not match our records</li></ul>'
                    this.showError = true
                }
            },
            validate () {
                if (this.password.length < 6) {
                    return false
                }
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                return re.test(String(this.email).toLowerCase())
            }
        }
    }
</script>
