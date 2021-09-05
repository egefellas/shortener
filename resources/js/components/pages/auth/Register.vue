<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img
                    class="mx-auto h-12 w-auto"
                    src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow"/>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Create your account
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Already have an account?
                    <a
                        href="/login"
                        class="font-medium text-indigo-600 hover:text-indigo-500">
                        Sing In
                    </a>
                </p>
            </div>
            <form
                class="mt-8 space-y-6 border-2 rounded-2xl bg-white p-6"
                @submit.prevent="submitform">
                <div class="rounded-md shadow-sm">
                    <div class="mb-2">
                        <label
                            for="name"
                            class="mb-1 text-sm font-sans font-bold">First Name</label>
                        <input
                            id="name"
                            v-model="formdata.firstname"
                            type="text"
                            required="required"
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300
                                      placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500
                                      focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Name"/>
                    </div>
                    <div class="my-3">
                        <label
                            for="surname"
                            class="mb-1 text-sm font-sans font-bold">Last Name</label>
                        <input
                            id="surname"
                            v-model="formdata.lastname"
                            type="text"
                            required="required"
                            class="appearance-none rounded relative block w-full px-3 py-2 border
                                      border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none
                                      focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Surname"/>
                    </div>
                    <div class="my-3">
                        <label
                            for="email-address"
                            class="mb-1 text-sm font-sans font-bold">Email address</label>
                        <input
                            id="email-address"
                            v-model="formdata.email"
                            type="email"
                            autocomplete="email"
                            required=""
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300
                                      placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500
                                      focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address"/>
                    </div>
                    <div class="my-3">
                        <label
                            for="password"
                            class="mb-1 text-sm font-sans font-bold">Password</label>
                        <input
                            id="password"
                            v-model="formdata.password"
                            type="password"
                            autocomplete="current-password"
                            required
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300
                                      placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500
                                      focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password"/>
                    </div>
                    <div class="my-3">
                        <label
                            for="password-confirmation"
                            class="mb-1 text-sm font-sans font-bold">Password Confirmation</label>
                        <input
                            id="password-confirmation"
                            v-model="formdata.password_confirmation"
                            type="password"
                            autocomplete="current-password"
                            required=""
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300
                                      placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500
                                      focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password Confirm"/>
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <div class="text-sm"> You have an account?
                        <a
                            href="/login"
                            class="font-medium text-indigo-600 hover:text-indigo-500">
                            Sing in
                        </a>
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent
                            text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <LockClosedIcon
                                class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                aria-hidden="true"/>
                        </span>
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import { LockClosedIcon } from '@heroicons/vue/solid'
    import axios from 'axios'

    export default {
        data () {
            return {
                formdata: { firstname: '', lastname: '', email: '', password: '', password_confirmation: '' }
            }
        },
        methods: {
            submitform: function () {
                axios.post('/register', this.formdata)
                    .then(res => {
                        console.log(res)
                    })
                    .catch(err => {
                        console.log(err)
                    })
            },
            components: {
                LockClosedIcon
            },
            props: ['postUrl']
        }
    }
</script>
