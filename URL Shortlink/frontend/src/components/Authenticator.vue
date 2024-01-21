<script setup>
</script>

<template>

<div class="flex items-center md:order-2">
    <ul class="flex flex-wrap font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 max-sm:flex-col md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
        <RouterLink to="login" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-800 to-purple-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Login</RouterLink>
        </li>
        <li>
        <RouterLink to="register" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-800 to-purple-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Cadastrar</RouterLink>
        </li>
    </ul>
</div>

</template>