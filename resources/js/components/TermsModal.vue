<template>
  <div v-if="showing" class="fixed inset-0 w-full mx-auto sm:p-4 h-screen flex items-center justify-center bg-gray-300"
    @click.self="close">
    <div class="relative p-6 bg-white w-full rounded-lg shadow-lg max-w-md m-auto flex-col flex overflow-auto h-screen" >
      <button
            aria-label="close"
            class="absolute top-0 right-0 text-xl text-gray-500 my-2 mx-4"
            @click.prevent="close">
            <svg class="h-12 w-12 text-grey hover:text-grey-darkest" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
      </button>
      <slot />
    </div>
  </div>
</template>
<script>
export default {
  props: {
    showing: {
      required: true,
      type: Boolean
    }
  },
  methods: {
    close() {
      this.$emit('close');
    }
  }
};
</script>
