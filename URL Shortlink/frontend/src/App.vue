<script setup>
import { RouterView } from 'vue-router'
import NavBar from './components/NavBar.vue';
import Footer from './components/Footer.vue';
import { authStore } from './stores/auth'
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

const store = authStore()

onMounted(async () => {
    initFlowbite();
    await store.isSignedIn()
})


</script>

<template>

  <header>
      <NavBar/>
  </header>

  <div class="mx-4 flex flex-col">
    <RouterView />
  </div>

  <footer class="max-lg:mt-32">
    <Footer />
  </footer>

</template>

<style scoped>

</style>
