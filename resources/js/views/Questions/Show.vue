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
          <h2 v-if="question.data.attributes.answers.answer_count === 1" class="text-lg font-semibold">{{ question.data.attributes.answers.answer_count }} Answer</h2>
          <h2 v-else-if="question.data.attributes.answers.answer_count > 1" class="text-lg font-semibold">{{ question.data.attributes.answers.answer_count }} Answers</h2>
          <h2 v-else class="text-lg font-semibold">This question has no answers yet. Write one below!</h2>

        </div>

        <div
            v-for="(answer, i) in question.data.attributes.answers.data"
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

  </div>
</template>

<script>
import UserBox from '../../components/UserBox.vue';
import { mapGetters } from 'vuex';

export default {
  name: 'QuestionShow',

  components: {
    UserBox,
  },

  mounted() {
    this.$store.dispatch('fetchQuestion', this.$route.params.questionId);
  },

  computed: {
    ...mapGetters({
      question: 'question'
    })
  }
}
</script>

<style>

</style>