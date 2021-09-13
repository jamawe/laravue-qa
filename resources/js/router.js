import Vue from 'vue';
import VueRouter from 'vue-router';
import QuestionsIndex from './views/Questions/Index.vue'
import QuestionsCreate from './views/Questions/Create.vue'
Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',

  routes: [
    {
      path: '/', name: 'home', component: QuestionsIndex,
    },
    {
      path: '/questions/create', name: 'questions.create', component: QuestionsCreate,
    },
    // {
    //   path: '/questions/{id}', name: 'question.show', component: QuestionShow,
    // },
  ]
});