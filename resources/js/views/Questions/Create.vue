<template>
  <div class="flex flex-col items-center py-4">
    <div class="bg-white rounded shadow w-2/3 p-4">
    <h1 class="font-bold text-2xl">Ask A Question</h1>

    <!-- <form action="post"> -->
      <div class="my-2">
        <label for="title">Question:</label>
        <input v-model="questionTitle" type="text" class="p-2 w-full bg-gray-200 h-8 rounded border-gray-300 focus:border-gray-400 focus:shadow-outline focus:ring-1 ring-gray-500 focus:ring-gray-500 focus:ring-opacity-50 cursor-text" name="title" id="title" autocomplete="off"/>
      </div>

      <div class="my-2">
        <label for="description">More Information:</label>
        <textarea v-model="questionDescription" name="description" class="p-2 w-full bg-gray-200 rounded border-gray-300 focus:border-gray-400 focus:outline-none focus:shadow-outline focus:ring-1 ring-gray-500 focus:ring-gray-500 focus:ring-opacity-50 cursor-text" id="description" autocomplete="off" rows="4"></textarea>
      </div>

      <button @click="createQuestion()" class="bg-gray-200 h-8 px-4 py-1 rounded-full font-bold border-gray-300 hover:border-gray-400 focus:outline-none focus:shadow-outline focus:ring-1 focus:ring-gray-500 focus:ring-opacity-50 cursor-pointer">Submit Question</button>
    <!-- </form> -->
  </div>
  </div>
</template>

<script>
import _ from 'lodash';

export default {
  name: 'QuestionCreate',

  methods: {
    createQuestion() {
      this.$store.dispatch('createQuestion')
        .then(() => {
          this.$router.push('/');
        });
    }
  },

  computed: {
    questionTitle: {
      get() {
      return this.$store.getters.questionTitle;
      },

      set: _.debounce(function (questionTitle) {
        this.$store.commit('createTitle', questionTitle);
      }, 300),
    },

    questionDescription: {
      get() {
      return this.$store.getters.questionDescription;
      },

      set: _.debounce(function (questionDescription) {
       this.$store.commit('createDescription', questionDescription);
      }, 300),
    },

  }
}
</script>

<style>

</style>