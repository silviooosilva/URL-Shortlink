<script>

export default{
    props: {
        title:String,
        subject:String   
    }
}
</script>
<template>

<a href="#" class="block my-3 mx-2 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ this.title }}</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">{{ this.subject }}</p>
</a>

</template>