import Vue from 'vue';
import VueRouter from 'vue-router';
import QuestionFeed from './views/QuestionFeed.vue'
import QuestionCreate from './views/QuestionCreate.vue'
Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',

  routes: [
    {
      path: '/', name: 'home', component: QuestionFeed,
    },
    {
      path: '/questions/create', name: 'question.create', component: QuestionCreate,
    },
    // {
    //   path: '/questions/{id}', name: 'question.show', component: QuestionShow,
    // },
  ]
});