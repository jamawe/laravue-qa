<template>
  <div class="bg-white h-12 px-4 flex items-center">

    <div class="w-1/3">

      <div class="flex">
        <router-link to="/">
          Laravue QA
        </router-link>

        <div class="ml-2 relative">
          <div class="absolute text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mt-2 ml-2" fill="currentColor">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
          </div>
          <input type="text" name="search" class="w-56 pl-8 bg-gray-200 h-8 rounded-full focus:outline-none focus:shadow-outline text-sm" placeholder="Search...">
        </div>
      </div>

    </div>

    <div class="w-1/3 flex justify-center items-center h-full">
      <router-link to="/" class="px-6 h-full flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-6 h-6">
          <path d="M22.6 11l-9.9-9c-.4-.4-1.1-.4-1.5 0l-9.9 9c-.3.3-.5.8-.3 1.2.2.5.6.8 1.1.8h1.6v9c0 .4.3.6.6.6h5.4c.4 0 .6-.3.6-.6v-5.5h3.2V22c0 .4.3.6.6.6h5.4c.4 0 .6-.3.6-.6v-9h1.6c.5 0 .9-.3 1.1-.7.3-.5.2-1-.2-1.3zm-2.5-8h-4.3l5 4.5V3.6c0-.3-.3-.6-.7-.6z"/>
        </svg>
      </router-link>

      <router-link to="/" class="px-6 h-full flex items-center">
        <img src="https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg" alt="Profile Image"  class="w-8 h-8 object-cover rounded-full">
      </router-link>

      <router-link to="/" class="px-6 h-full flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
      </router-link>
    </div>

    <div class="w-1/3 flex justify-end">
      <button
        class="bg-gray-200 h-8 ml-2 px-4 py-1 rounded-full">
        Ask A Question
      </button>


    </div>

  </div>
</template>

<script>
export default {
  name: 'Nav',


}
</script>

<style>

</style>