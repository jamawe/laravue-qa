import Vue from 'vue';
import VueRouter from 'vue-router';
import QuestionFeed from './views/QuestionFeed.vue'
Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',

  routes: [
    {
      path: '/', name: 'home', component: QuestionFeed,
    },
  ]
});