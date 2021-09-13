<template>
  <div class="flex flex-col items-center py-4">

    <p v-if="loading">Loading questions...</p>

    <QuestionIndex 
      v-else
      v-for="question in questions.data"
      :key="question.data.question_id"
      :question="question" />

  </div>
</template>

<script>
import QuestionIndex from '../components/QuestionIndex.vue';

export default {
  name: 'QuestionFeed',

  components: {
    QuestionIndex
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
        this.loading = false;
      })
      .catch(err => {
        console.log('Unable to fetch questions');
      });
  }
}
</script>

<style>

</style>