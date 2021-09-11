<template>
  <div class="bg-white rounded shadow w-2/3 mt-6 overflow-hidden">
    <div class="flex justify-around items-start">
      <div class="flex flex-col w-1/6 mx-2 py-4 items-center text-center">
        <p class="text-xl">0</p>
        <p class="text-xs">answers</p>
      </div>

      <div class="flex flex-col w-5/6 mx-2 py-4">
        <div class="flex justify-start text-blue-700 hover:text-blue-800 text-xl">This is an awesome question title</div>

        <div class="flex justify-end m-2">
          <!-- <div class="flex justify-between items-center">
            <button class="bg-gray-200 text-xs">laravel</button>
            <button class="bg-gray-200 text-xs">vuejs</button>
          </div> -->
          <div class="text-xs">
            <p>asked by Panda 23 hours ago</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: 'QuestionIndex',


}
</script>

<style>

</style>