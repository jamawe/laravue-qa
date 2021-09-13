<template>
  <div class="flex flex-col items-center py-4">
    <NewQuestion />
  </div>
</template>

<script>
import NewQuestion from '../components/NewQuestion.vue';

export default {
  name: 'QuestionCreate',

  components: {
    NewQuestion
  }
}
</script>

<style>

</style>