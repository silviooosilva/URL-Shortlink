<script setup>
import { RouterLink } from 'vue-router';
import DropDownUser from './DropDownUser.vue'
import { authStore } from '../stores/auth'
import Authenticator from './Authenticator.vue';
import { computed } from 'vue'

const store = authStore()
let isSignedIn = computed(() => store.response)

</script>
<template>

<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="flex flex-wrap items-center justify-between mx-auto p-4">
    <div>
      <p class="text-blue-800 to-purple-700 font-bold text-4xl">URL ShortLink</p>
    </div>
    <div class="flex md:order-2">
        <DropDownUser v-if="isSignedIn"/>
        <Authenticator v-else/>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <RouterLink to="/" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-800 to-purple-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Início</RouterLink>
        </li>
        <li>
            <RouterLink to="" class="block py-2 pl-3 pr-4 mx-5 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sobre</RouterLink>
        </li>
        <li>
          <RouterLink to="contact" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-800 to-purple-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contato</RouterLink>
        </li>
      </ul>
    </div>
  </div>
</nav>

</template>