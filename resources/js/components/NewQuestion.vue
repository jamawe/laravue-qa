<template>
  <div class="bg-white rounded shadow w-2/3 p-4">
    <h1 class="font-bold text-2xl">Ask A Question</h1>

    <form action="">
      <div class="my-2">
        <label for="title">Question:</label>
        <input type="text" class="p-2 w-full bg-gray-200 h-8 rounded focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 cursor-text" name="title" id="title" autocomplete="off"/>
      </div>

      <div class="my-2">
        <label for="description">More Information:</label>
        <textarea name="description" class="p-2 w-full bg-gray-200 rounded focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 cursor-text" id="description" autocomplete="off" rows="4"></textarea>
      </div>

      <button type="submit" class="bg-gray-200 h-8 px-4 py-1 rounded-full font-bold focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 cursor-pointer">Submit Question</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'NewQuestion',

  
}
</script>

<style>

</style>