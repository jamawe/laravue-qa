<template>
  <div class="flex flex-col items-start p-4">

      <!-- <div class="w-full p-4 border-b border-gray-600"> -->
      <div class="w-full p-4">
        <h1 class="font-bold text-2xl">{{ question.data.attributes.title }}</h1>

        <div class="flex mt-2">
          <div class="mr-4">
            <p class="text-xs">{{ question.data.attributes.posted_at }}</p>
          </div>
          <div class="mr-4">
            <p class="text-xs">Active 9 months ago</p>
          </div>
          <div class="mr-4">
            <p class="text-xs">Viewed 242k times</p>
          </div>
        </div>

        <div class="w-full my-4">
          <p>
            {{ question.data.attributes.description }}
          </p>
        </div>

        <UserBox 
          :user-date="question.data.attributes.posted_at"
          :user-name="question.data.attributes.asked_by.data.attributes.name"
        />
        
      </div>

      <div class="w-full p-4">
        <div>
          <h2 v-if="answerCount === 1" class="text-lg font-semibold">{{ answerCount }} Answer</h2>
          <h2 v-else-if="answerCount > 1" class="text-lg font-semibold">{{ answerCount }} Answers</h2>
          <h2 v-else class="text-lg font-semibold">This question has no answers yet. Write one below!</h2>

        </div>

        <div
            v-for="(answer, i) in answers"
            :key="i"
            class="w-full my-4">
          <p class="mb-4">
            {{ answer.data.attributes.body }}
          </p>

          <UserBox 
            :user-date="answer.data.attributes.answered_at"
            :user-name="answer.data.attributes.answered_by.data.attributes.name"
          />

        </div>

      </div>

      <div class="w-full p-4">
        <div class="mb-2">
          <h2 class="mb-3 text-lg">Your Answer</h2>
          <textarea v-model="answerBody" name="answer" id="answer" cols="30" rows="4" class="w-full bg-white rounded border-gray-300 focus:border-gray-400 focus:outline-none focus:shadow-outline focus:ring-1 ring-gray-500 focus:ring-gray-500 focus:ring-opacity-50 cursor-text"></textarea>
        </div>

        <button @click="$store.dispatch('createAnswer', { questionId: question.data.question_id }); answerBody = ''" class="bg-white h-8 px-4 py-1 rounded-full border-gray-300 hover:border-gray-400 focus:outline-none focus:shadow-outline focus:ring-1 focus:ring-gray-500 focus:ring-opacity-50 cursor-pointer">Submit Answer</button>
      </div>

  </div>
</template>

<script>
import UserBox from '../../components/UserBox.vue';
import _ from 'lodash';
import { mapGetters } from 'vuex';

export default {
  name: 'QuestionShow',

  components: {
    UserBox,
  },

  mounted() {
    this.$store.dispatch('fetchQuestion', this.$route.params.questionId);
  },

  data() {
    return {
      // answerBody: '', 2RKjM6@6 R?qJ4eDhigTb
    }
  },

  computed: {
    ...mapGetters({
      question: 'question',
      answers: 'answers',
      answerCount: 'answerCount',
    }),

    answerBody: {
      get() {
      return this.$store.getters.answerBody;
      },

      set: _.debounce(function (answerBody) {
        this.$store.commit('createAnswerBody', answerBody);
      }, 300),
    }
  }
}
</script>

<style>

</style>