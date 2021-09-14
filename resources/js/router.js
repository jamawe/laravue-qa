import Vue from 'vue';
import VueRouter from 'vue-router';
import QuestionIndex from './views/Questions/Index.vue';
import QuestionCreate from './views/Questions/Create.vue';
import UserShow from './views/Users/Show.vue';
Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',

  routes: [
    {
      path: '/', name: 'home', component: QuestionIndex,
    },
    {
      path: '/questions/create', name: 'question.create', component: QuestionCreate,
    },
    {
      path: '/users/:userId', name: 'user.show', component: UserShow,
    }
    // {
    //   path: '/questions/{id}', name: 'question.show', component: QuestionShow,
    // },
  ]
});