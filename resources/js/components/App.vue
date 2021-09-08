<template>
  <div class="flex flex-col flex-1 h-screen overflow-y-hidden">

    <Nav />

    <div class="flex overflow-y-hidden flex-1">
        <Sidebar />

      <div class="overflow-x-hidden w-4/5">
        <router-view></router-view>
      </div>
    </div>

  </div>
</template>

<script>
import Nav from './Nav.vue';
import Sidebar from './Sidebar.vue';

export default {
  name: 'App',

  components: {
    Nav,
    Sidebar
  },


}
</script>

<style>

</style>