<script setup>
import Cards from '../components/Cards.vue';


</script>

<template>
    <main class="box w-full flex justify-center">
      <div class="w-6/12 mb-8 max-xl:min-w-full max-xl:pt-5 max-md:px-5 h-auto justify-center bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h1 class="mb-4 text-4xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Encurtador de URLs <span class="text-blue-800 to-purple-700 font-extrabold">URL Shortlink</span></h1>
      </div>
    </main>
    <div class="flex justify-evenly flex-wrap max-w-max mx-auto mb-34">
      <Cards 
        title="Histórico de urls"
        subject="No URL Shortlink você pode guardar por quanto tempo quiser suas URLS encurtadas e utiliza-las quando quiser"  
      />

      <Cards 
        title="Sem custos"
        subject="No URL Shortlink existem modalidades gratuitas para uso da api."  
      />

      <Cards 
        title="Api's sem a necessidade de tokens"
        subject="No URL Shortlink existem modalidades gratuitas para uso da api."  
      />
    </div>
</template>

<style scoped>
.box{
  margin-top: 5%;
}
</style>