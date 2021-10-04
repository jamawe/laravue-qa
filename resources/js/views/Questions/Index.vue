<template>
  <div class="flex flex-col items-center py-4">

    <p v-if="status.questionStatus === 'loading'">Loading questions...</p>

    <Question 
      v-else
      v-for="question in questions.data"
      :key="question.data.question_id"
      :question="question" />

  </div>
</template>

<script>
import Question from '../../components/Question.vue'
import { mapGetters } from 'vuex';

export default {
  name: 'Index',

  components: {
    Question
  },

  mounted() {
    this.$store.dispatch('fetchFeedQuestions');
  },

  computed: {
    ...mapGetters({
      questions: 'questions',
      status: 'status',
    })
  },

}
</script>

<style>

</style>