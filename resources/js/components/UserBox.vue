<template>
  <div class="flex justify-end">
    <div class="rounded bg-white p-1">
      <p class="text-xs">
        asked {{ userDate }}
      </p>

      <div class="flex justify-start mt-1">
        <a class="h-full mr-1">
          <img src="https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg" alt="Profile Image"  class="w-8 h-8 object-cover rounded-full">
        </a>

        <div>
          <p class="text-xs">
            {{ userName }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'UserBox',

  props: [
    'userDate',
    'userName'
  ]
}
</script>

<style>

</style>