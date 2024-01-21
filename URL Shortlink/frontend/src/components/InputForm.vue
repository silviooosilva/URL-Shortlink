<script setup>
import Buttom from './Buttom.vue';
import { urlApiStore } from '@/stores/url';
import { ref , computed } from 'vue';

const store = urlApiStore()
let response = computed(() => store.response)
const url = ref('')

function postUrl(){
  store.getShortUrl(url.value.value)
}
</script>

<template>

  <form @submit.prevent="postUrl" class="mb-6 flex flex-wrap mx-auto">
    <label for="default-input" class="max-lg:hidden block text-lg me-2 my-auto font-medium text-gray-900 dark:text-white">Url:</label>
    <input ref="url" placeholder="Insira a URL para ser encurtada aqui" type="text" id="default-input" class="max-lg:min-w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <Buttom text="Gerar" />
  </form>

  <dl v-if="Object.keys(response).length != 0" class="max-w-md mx-auto text-center text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
    <div class="flex flex-col pb-3">
        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">URL Original:</dt>
        <dd class="text md:text-lg font-bold">{{ response.long_url }}</dd>
    </div>
    <div class="flex flex-col py-3">
        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">URL Encurtada:</dt>
        <dd class="text md:text-lg font-bold">{{ response.short_url }}</dd>
    </div>

  </dl>

</template>

<style scoped>
.text{
  word-break: break-all;
}
</style>
