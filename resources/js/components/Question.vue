<template>
  <div class="bg-white rounded shadow w-2/3 mt-6 overflow-hidden">
    <div class="flex justify-around items-start">
      <template v-if="question.data.attributes.answers.answer_count === 1">
        <div class="flex flex-col w-1/6 mx-2 py-4 items-center text-center">
          <p class="text-xl">{{ question.data.attributes.answers.answer_count }}</p>
          <p class="text-xs">answer</p>
        </div>
      </template>

      <template v-else>
        <div class="flex flex-col w-1/6 mx-2 py-4 items-center text-center">
          <p class="text-xl">{{ question.data.attributes.answers.answer_count }}</p>
          <p class="text-xs">answers</p>
        </div>
      </template>

      <div class="flex flex-col w-5/6 mx-2 py-4">
        <router-link :to="`/questions/${question.data.question_id}`">
          <div class="flex justify-start text-blue-700 hover:text-blue-800 text-xl">
            {{ question.data.attributes.title }}
          </div>
        </router-link>

        <div class="flex justify-end m-2">
          <!-- <div class="flex justify-between items-center">
            <button class="bg-gray-200 text-xs">laravel</button>
            <button class="bg-gray-200 text-xs">vuejs</button>
          </div> -->
          <div class="text-xs">
            <p>asked by {{ question.data.attributes.asked_by.data.attributes.name }} {{ question.data.attributes.posted_at }}</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: 'Question',

  props: [
    'question',
  ],

}
</script>

<style>

</style>