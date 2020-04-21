<template>
  <header class="bg-black sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3">
    <div class="flex items-center justify-between px-4 py-3 sm:p-0">
      <div class="flex text-left flex-no-shrink mr-0">
            <a class="flex text-base font-semibold no-underline hover:text-mstore hover:no-underline" href="/">
                <span class=" text-white text-center text-xl  font-extrabold">MStore</span>
            </a>

        </div>
      <div class="sm:hidden">
        <button @click="isOpen = !isOpen" type="button" class="block text-blue hover:text-white focus:text-white focus:outline-none">
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path v-if="isOpen" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
            <path v-if="!isOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
          </svg>
        </button>
      </div>
    </div>
    <nav :class="isOpen ? 'block' : 'hidden'" class="sm:block">
      <div class="px-2 pt-2 pb-4 sm:flex sm:p-0">
      <a href="/" class="block px-2 py-1 text-white font-semibold rounded hover:bg-blue">Home</a>
      <a href="#" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue sm:mt-0 sm:ml-2">Services</a>
      <a href="/blog" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue sm:mt-0 sm:ml-2">Blog</a>
      <a href="/contact" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue sm:mt-0 sm:ml-2">Contact Us</a>
      <AccountDropdown class="hidden sm:block sm:ml-6"/>
      </div>
      <div class="px-4 py-5 border-t border-gray-800 sm:hidden">
        <div class="flex items-center">
          <img class="h-8 w-8 border-2 border-gray-600 rounded-full object-cover" src="" alt="Your avatar">
          <span class="ml-3 font-semibold text-white">Member</span>
        </div>
        <div class="mt-4">
          <a href="#" class="block text-white hover:text-blue">Account settings</a>
          <a href="#" class="mt-2 block text-white hover:text-blue">Support</a>
          <a href="#" class="mt-2 block text-white hover:text-blue">Sign out</a>
        </div>
      </div>

    </nav>
  </header>
</template>

<script>
import AccountDropdown from './AccountDropdown'
export default {
    components: {
    AccountDropdown,
  },
  data() {
    return {
      isOpen: false,
    }
  },
}
</script>
