<template>
  <div class="flex flex-col items-center py-4">

    <QuestionCreate />

    This is the QFeed

    <QuestionIndex />

  </div>
</template>

<script>
import QuestionCreate from '../components/QuestionCreate.vue';
import QuestionIndex from '../components/QuestionIndex.vue';

export default {
  name: 'QuestionFeed',

  components: {
    QuestionCreate,
    QuestionIndex
  }
}
</script>

<style>

</style>