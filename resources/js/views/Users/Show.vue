<template>
    <div>

      <div class="flex justify-start items-center w-100 h-48 ml-12 overflow-hidden">

        <div class="mr-6">
          <img src="https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg" alt="Profile Image"  class="w-32 h-32 object-cover rounded-full">
        </div>

        <div>
          <p class="text-2xl font-bold">{{ user.data.attributes.name }}</p>
          <p class="text-sm">Member for 5 years, 11 months</p>
        </div>

      </div>

      <div class="flex flex-col items-center">

        <p v-if="questionLoading">Loading questions...</p>

        <Question 
          v-else
          v-for="question in questions.data"
          :key="question.data.question_id"
          :question="question" />

        <p v-if="!questionLoading && questions.data.length < 1">
          This user has not asked any questions yet.
        </p>

      </div>

    </div>
</template>

<script>
import Question from '../../components/Question.vue';

export default {
  name: 'Show',

  components: {
    Question,
  },

  data() {
    return {
      user: null,
      userLoading: true,
      questions: [],
      questionLoading: true,
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
        this.userLoading = false;
      });

    axios.get('/api/users/' + this.$route.params.userId + '/questions')
      .then(res => {
        this.questions = res.data;
      })
      .catch(err => {
        console.log('Unable to fetch questions.');
      })
      .finally(() => {
        this.questionLoading = false;
      })
  },

}
</script>

<style>

</style>