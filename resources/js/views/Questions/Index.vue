<template>
  <div class="flex flex-col items-center py-4">

    <p v-if="loading">Loading questions...</p>

    <Question 
      v-else
      v-for="question in questions.data"
      :key="question.data.question_id"
      :question="question" />

  </div>
</template>

<script>
import Question from '../../components/Question.vue'

export default {
  name: 'Index',

  components: {
    Question
  },

  data() {
    return {
      questions: [],
      loading: true,
    }
  },

  mounted() {
    axios.get('/api/questions')
      .then(res => {
        this.questions = res.data;
      })
      .catch(err => {
        console.log('Unable to fetch questions');
      })
      .finally(() => {
        this.loading = false;
      });
  }
}
</script>

<style>

</style>