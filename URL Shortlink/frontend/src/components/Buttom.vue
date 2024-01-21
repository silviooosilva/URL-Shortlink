<script>

export default{
    props: {
        text: String   
    }
}

</script>

<template>
    <button type="submit" class="max-lg:mt-3 max-xl:mx-auto relative inline-flex items-center justify-center p-0.5 mx-2 my-auto overflow-hidden text-sm text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-purple-700 group-hover:from-cyan-500 group-hover:to-purple-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
        <span class="relative text-gray-800 px-5 font-bold py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            {{ this.text }}
        </span>
    </button>
</template>