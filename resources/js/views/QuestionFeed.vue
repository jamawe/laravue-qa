<template>
  <div class="flex flex-col items-center py-4">

    <QuestionCreate />

    This is the QFeed

    <QuestionIndex 
      v-for="question in questions.data" :key="question.data.question_id" :question="question" />

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
  },

  data() {
    return {
      questions: null,
    }
  },

  mounted() {
    axios.get('/api/questions')
      .then(res => {
        this.questions = res.data; 
      })
      .catch(err => {
        console.log('Unable to fetch questions');
      });
  }
}
</script>

<style>

</style>