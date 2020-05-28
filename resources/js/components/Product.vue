<template>
    <div class="flex-1">

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
            <div class="p-2 flex flex-col bg-gray-300">
                <button class=" btn btn-blue m-2" @click="viewProduct(product.id )">
                    ดูรายละเอียด
                </button>

            </div>
            <el-dialog v-if="currentProduct" :visible.sync="productDialogVisible" width="40%">
                <span>
                    <h3>
                        {{currentProduct.title}}
                    </h3>
                    <div>
                        <div>{{ currentProduct.path }}</div>
                    </div>
                    <div>
                        <p>{{ currentProduct.description }}</p>
                    </div>
                </span>
                <span slot="footer" class="dialog-footer">
                    <el-button type="primary" @click="productDialogVisible = false">ปิด</el-button>
                </span>
            </el-dialog>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Product",
        props: ['product'],
        data() {
                return {
                    productDialogVisible: false,
                    currentProduct: '',
                };
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
            }
        },

}
</script>


