<script setup>
import { urlApiStore } from '../stores/url'
import { onMounted , computed } from 'vue'
import { initFlowbite } from 'flowbite'

const store = urlApiStore()
let urls = computed(() => store.allUrl)
let url = computed(() => store.url)

async function getUrl(id){
  try{
    await store.getUrl(id)
    console.log(url.value)
  } catch (error) {
    console.error('Erro ao carregar os dados:', error)
  }
}

async function deleteUrl(id){
  try{
    await store.deleteUrl(id)
  } catch (error) {
    console.error('Erro ao carregar os dados:', error)
  }
}

onMounted(async () => {
  initFlowbite();
  try {
    await store.getAllUrl()
  } catch (error) {
    console.error('Erro ao carregar os dados:', error)
  }
})

</script>
<template>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Histórico
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Navegue pela lista de histórico de URLs que você já encurtou e as gerencie, podendo visualizar e excluir do histórico.</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Url Original
                </th>
                <th scope="col-2" class="px-6 py-3">
                    Url Encurtada
                </th>

                  <th scope="col-2" class="px-6 py-3">
                    Nº Clicks
                </th>


                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Info</span>
                </th>
            </tr>
        </thead>
        <tbody v-for="url in urls" :key="url.short_url">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace dark:text-white">
                  {{ url.url }}
                </th>
                <td class="px-6 py-4">
                  {{ url.short_url }}
                </td>
                <td class="px-6 py-4">
                  <svg class="svg mt-8" viewBox="0 0 600 600" v-html="url.code"></svg>
                </td>
                <td class="px-6 py-4 text-right">
                  <div class="flex space-x-4">
                    <button type="button" data-modal-toggle="default-modal" class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline" @click="getUrl(url.id)">Info</button>
                  
                  </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Default Modal -->
<div id="default-modal" data-modal-show="true" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Default modal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>
.svg{
  width: 5rem;
}
.svg-crash{
  width: 1.3rem;
}
</style>
