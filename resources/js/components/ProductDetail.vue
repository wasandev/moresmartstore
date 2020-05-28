<template>
    <div class="flex-1">
        <!-- <a :href="product" class=" flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-4 p-2 no-underline transition"> -->

         <!-- <div class="aspect-16x9 rounded " v-bind:style="{ 'background': 'url(' + product.path +')' +'no-repeat center center/cover' } ">
        </div> -->

        <div class="p-2 flex flex-col flex-1 bg-gray-100  rounded-b-lg subpixel-antialiased">
            <p class="mb-2 text-grey-900 text-sm font-semibold text-left">Product </p>
            <div class="mb-3 w-full mx-auto text-left text-sm font-thin ">
                <p>สินค้า {{ $route.params.id }}</p>
                <p> {{ product.id }} </p>
                <p class="text-blue-500">{{product.price}}</p>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        name: "productdetail",
        data () {
            return {
               product: []
            }
        },
        created () {
            this.getProduct(this.$route.params.id)
        },
        methods: {
            getProduct: function (id) {
                axios.get('api/product/detail/' + id)
                    .then(response => {
                        console.log(response.data)
                        this.product = response.data
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            },
        }
    }
</script>


