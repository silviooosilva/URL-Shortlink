<script setup>
import { ref } from 'vue';
import { RouterLink } from 'vue-router';
import Buttom from '../components/Buttom.vue';
import BannerForms from '../components/BannerForms.vue';
import { authStore } from '../stores/auth'

const login = authStore()
const email = ref('')
const password = ref('')

function postLogin(){
    login.signIn(email.value.value, password.value.value)
}
</script>

<template>
    <div class="box md:flex">
        <BannerForms />
        <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
            <form class="bg-white" @submit.prevent="postLogin">
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Olá novamente!</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Bem vindo de volta</p>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input ref="email" class="pl-2 outline-none border-none" type="text" name="" id="" placeholder="Endereço de email" />
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <input ref="password" class="pl-2 outline-none border-none" type="text" name="" id="" placeholder="Senha" />
                </div>
                <Buttom text="Entrar"/>
                <div class="flex justify-between mt-3">
                    <RouterLink to="register" class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Cadastrar</RouterLink>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
    .box{
        height: 85vh;
    }
</style>