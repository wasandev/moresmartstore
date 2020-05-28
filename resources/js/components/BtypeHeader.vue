<template>
    <div class="">
        <h1 class="font-normal text-3xl text-grey-darkest leading-none mb-4">
            {{btype.name}}
        </h1>

        <!-- Original Logo -->
        <div class="mb-4">
            <p>{{ btype.description }}</p>
        </div>

    </div>
</template>

<script>
import {mapGetters} from 'vuex'
export default {
    name: "Btype",
    watch: {
            $route(to, from) {
                if(to !== from ) {
                    this.$store.dispatch('GET_BTYPE',this.$route.params.id)
                 }
            }
        },
        mounted() {
                this.$store.dispatch('GET_BTYPE',this.$route.params.id)
        },
        computed: {
            ...mapGetters([
                'btype'
            ])
        },

};
</script>
