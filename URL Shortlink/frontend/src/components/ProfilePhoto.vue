<script setup>
import { ref } from 'vue'

const inputFile = ref(null)
const photoPreview = ref(null)

function changeFile(event){
    const file = event.target.files[0]
    if (file != null) {
        const blob = new Blob([file], { type: file.type });
        photoPreview.value = URL.createObjectURL(blob);
        console.log(blob)
        console.log(photoPreview.value)
    }
}
function beforeDestroy(blob) {
    URL.revokeObjectURL(blob)
}

</script>

<template>

<div class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
    <!-- Photo File Input -->
    <input ref="inputFile" @change="changeFile" accept="image/jpeg, image/png" type="file" class="hidden">

    <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
        Foto de Perfil <span class="text-red-600"> </span>
    </label>
    
    <div class="text-center">
        <!-- Current Profile Photo -->
        <div class="mt-2">
            <img v-if="photoPreview != null" :src="photoPreview.value" class="w-40 h-40 m-auto rounded-full shadow">
            <img v-else src="https://images.unsplash.com/photo-1531316282956-d38457be0993?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80" class="w-40 h-40 m-auto rounded-full shadow">
        </div>
        <!-- New Profile Photo Preview >
        <div class="mt-2" x-show="photoPreview" style="display: none;">
            <span class="block w-40 h-40 rounded-full m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + {{ photoPreview }} + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
            </span>
        </div-->
        <button @click.prevent="inputFile.click()" type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3">
            Selecionar foto
        </button>
    </div>
</div>

</template>