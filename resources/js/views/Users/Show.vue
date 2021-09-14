<template>
  <div class="flex justify-start items-center w-100 h-48 p-6 overflow-hidden">
    <div class="mr-6">
      <img src="https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg" alt="Profile Image"  class="w-32 h-32 object-cover rounded-full">
    </div>
    <div>
      <p class="text-2xl font-bold">User name</p>
      <p class="text-sm">Member for 5 years, 11 months</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Show',

  data() {
    return {
      user: null,
      loading: true,
    }
  },

  mounted() {
    axios.get('/api/users/' + this.$route.params.userId)
      .then(res => {
        this.user = res.data;
      })
      .catch(err => {
        console.log('Unable to fetch user from server.');
      })
      .finally(() => {
        this.loading = false;
      });
  },

}
</script>

<style>

</style>