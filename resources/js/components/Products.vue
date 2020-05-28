<template>
    <div class=" max-w-full xl:mx-0 rounded-lg px-2">
        <!-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-2" v-for="(products,i) in groupedProducts" :key=i > -->
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
            <div class="w-full mx-auto" v-for="(product,j) in products" :key=j>
                <div class="flex">
                    <div class="flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-4 p-2 no-underline transition">
                        <div class="aspect-16x9 rounded" v-bind:style="{ 'background': 'url(' + product.path +')' +'no-repeat center center/cover' } ">
                        </div>


                        <div class="p-2 flex flex-col flex-1 bg-gray-100  rounded-b-lg subpixel-antialiased">
                            <p class="mb-2 text-grey-900 text-sm font-semibold text-left">{{product.name}}</p>
                            <div class="mb-3 w-full mx-auto text-left text-sm font-thin ">
                                <p> {{ truncateText(product.description) }} </p>
                                <p class="text-blue-500">{{product.price}}</p>
                            </div>
                        </div>
                        <div class="flex flex-col bg-gray-100">
                            <button class=" btn btn-blue m-2" @click="viewProduct(j)">
                                ดูรายละเอียด
                            </button>

                        </div>
                        <el-dialog v-if="currentProduct" :visible.sync="productDialogVisible" width="40%">
                            <span>
                                <h3>{{currentProduct.name}}</h3>
                                <div class="row">
                                    <img :src="currentProduct.path" class="img-thumbnaul">
                                </div>
                                <p>{{ currentProduct.description }}</p>
                            </span>
                            <span slot="footer" class="dialog-footer">
                                <el-button type="primary" @click="productDialogVisible = false">ปิด</el-button>
                            </span>
                        </el-dialog>
                    </div>
                </div>
            </div>
            <!-- <pagination :pagination="pagination" @paginate="fetchProducts" :offset="4" /> -->
        </div>
    </div>


</template>

<script>
    import {mapGetters} from 'vuex'
    //import Pagination from '../components/Pagination.vue' ;

    export default {
        name: "Products",

        data() {
            return {
                productDialogVisible: false,
                currentProduct: '',

            };
        },

        mounted() {
            this.$store.dispatch('GET_PRODUCTS')

                window.Echo.channel('search')
                    .listen('.searchResults', (e) => {
                        this.$store.commit('SET_PRODUCTS', e.products)
                    })

        },
        computed: {

            ...mapGetters([
                'products'
            ])
        },

        methods: {
            truncateText(text) {
                if(text.length > 30) {
                    return text.substr(0,30)+'...' ;
                }
            return text;
            },
            viewProduct(ProductIndex) {
                const showproduct = this.products[ProductIndex];
                this.currentProduct = showproduct;
                this.productDialogVisible = true;
            },

        },
    }
</script>
