<template>
  <div class="flex flex-col items-center py-4">

    <NewQuestion />
     This is the QFeed
  </div>
</template>

<script>
import NewQuestion from '../components/NewQuestion.vue';
export default {
  name: 'QuestionFeed',

  components: {
    NewQuestion,
  }
}
</script>

<style>

</style>