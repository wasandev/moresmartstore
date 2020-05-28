<template>

    <div class="max-w-md mx-auto mx-0 ">

        <div class="w-full flex p-4 md:p-4">

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-labelledby="search" role="presentation" class="fill-current absolute  ml-3 mt-3 text-gray_200"><path fill-rule="nonzero" d="M14.32 12.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387a8 8 0 1 1 1.414-1.414zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path></svg>
            <input v-model="query" type="text" class="transition-colors duration-100 ease-in-out focus:outline-0 border border-transparent focus:bg-white  placeholder-gray-600 rounded-lg bg-gray-100 py-2 pr-4 pl-10 block w-full appearance-none leading-normal ds-input" placeholder="กด / เพื่อค้นหาสินค้าหรือธุรกิจ" >
            <button class="btn btn-blue ml-1 flex-shrink-0  rounded-lg " @click="searchVendors" @keyup.enter="searchVendors" type="button">
                ค้นหา
            </button>
            {{btype}}
        </div>

    </div>

</template>

<script>
    export default {
        name: "SearchVendor",
        data() {
            return {
                query: ''
            }
        },
        watch: {
            query: {
                handler: _.debounce(function () {
                    this.searchVendors()
                }, 100)
            },




        },

        methods: {
            searchVendors() {

                this.$store.dispatch('SEARCH_VENDORS',this.query)

            }
         }
}
</script>

<style scoped>

</style>
