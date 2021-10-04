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

        <div class="flex justify-end">
          <div class="rounded bg-white p-1">
            <p class="text-xs">
              asked {{ question.data.attributes.posted_at }}
            </p>

            <div class="flex justify-start mt-1">
              <a class="h-full mr-1">
                <img src="https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg" alt="Profile Image"  class="w-8 h-8 object-cover rounded-full">
              </a>

              <div>
                <p class="text-xs">
                  {{ question.data.attributes.asked_by.data.attributes.name }}
                </p>
              </div>
            </div>
          </div>
        </div>
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
          <p>
            {{ answer.data.attributes.body }}
          </p>

          <div class="flex justify-end mt-4">
            <div class="rounded bg-white p-1">
              <p class="text-xs">
                answered {{ answer.data.attributes.answered_at }}
              </p>

              <div class="flex justify-start mt-1">
                <a class="h-full mr-1">
                  <img src="https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg" alt="Profile Image"  class="w-8 h-8 object-cover rounded-full">
                </a>

                <div>
                  <p class="text-xs">
                    {{ answer.data.attributes.answered_by.data.attributes.name }}
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- <div class="flex justify-end">
          <div class="rounded bg-white p-1">
            <p class="text-xs">
              answered Aug 1 '13 at 9:57
            </p>

            <div class="flex justify-start mt-1">
              <a class="h-full mr-1">
                <img src="https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg" alt="Profile Image"  class="w-8 h-8 object-cover rounded-full">
              </a>

              <div>
                <p class="text-xs">
                  User Name
                </p>
              </div>
            </div>
          </div>
        </div> -->

      </div>

  </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  name: 'QuestionShow',

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