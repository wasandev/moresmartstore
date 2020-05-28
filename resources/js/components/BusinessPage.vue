<template>
     <div  class=" max-w-full mx-auto rounded-lg">
        <!-- <btype-header></btype-header> -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-2">
            <div class="w-full" v-for="(vendor,i) in vendors" :key=i>
                <div class="flex">
                    <div class="flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg m-2 p-2 no-underline transition">
                        <div class="aspect-16x9 rounded" v-bind:style="{ 'background': 'url(' + vendor.path +')' +'no-repeat center center/cover' } ">
                        </div>
                        <div class="p-2 flex flex-col flex-1 bg-gray-100  rounded-b-lg subpixel-antialiased">
                            <p class="mb-2 text-grey-900 text-sm font-semibold text-left">{{vendor.name}}</p>
                        </div>
                         <div class="mb-3 w-full flex-1 mx-auto text-left text-sm font-thin ">
                                <p> {{ truncateText(vendor.description) }} </p>
                            </div>
                        <div class="flex flex-col bg-gray-100">
                            <button class="btn btn-blue m-2" @click="viewVendor(i)">
                                ดูรายละเอียด
                            </button>

                        </div>

                    </div>
                </div>
            </div>
            <el-dialog v-if="currentVendor" :visible.sync="vendorDialogVisible" width="40%">
                <span>
                    <h3>{{currentVendor.name}}</h3>
                    <div class="row">
                        <img :src="currentVendor.path" class="img-thumbnaul">
                    </div>
                    <p>{{ currentVendor.description }}</p>
                </span>
                <span slot="footer" class="dialog-footer">
                    <el-button type="primary" @click="vendorDialogVisible = false">ปิด</el-button>
                </span>
            </el-dialog>
            <!-- <pagination :pagination="pagination" @paginate="fetchProducts" :offset="4" /> -->
        </div>
    </div>
</template>

<script>
 import {mapGetters} from 'vuex'


    export default {
        name: "Vendors",

        data() {
            return {
                vendorDialogVisible: false,
                currentVendor: '',

            };
        },
        watch: {
            $route(to, from) {
                if(to !== from ) {

                    this.$store.dispatch('GET_VENDORS',this.$route.params.id)
                 }
            }
        },
        mounted() {
                this.$store.dispatch('GET_VENDORS',this.$route.params.id)

                window.Echo.channel('searchvendor')
                    .listen('.searchVendorResults', (e) => {
                        this.$store.commit('SET_VENDORS', e.vendors)
                    })

        },
        computed: {

            ...mapGetters([
                'vendors'
            ])
        },

        methods: {
            truncateText(text) {
                if(text.length > 30) {
                    return text.substr(0,30)+'...' ;
                }
            return text;
            },
            viewVendor(VendorIndex) {
                const showvendor = this.vendors[VendorIndex];
                this.currentVendor = showvendor;
                this.vendorDialogVisible = true;
            },

        },
    }
</script>
