<script setup>
import InputForm from '../components/InputForm.vue'
import Table from '../components/Table.vue'

</script>

<template>

    <main class="box w-full flex flex col justify-center mt-24">
      <div class="w-6/12 max-xl:min-w-full max-xl:pt-5 max-md:px-5 h-auto justify-center bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <InputForm />
      </div>
    </main>
    <div class="w-2/4 mx-auto max-xl:w-full h-screen">
      <Table />
    </div>

</template>

<style scoped>

</style>