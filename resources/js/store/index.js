import Vue from 'vue';
import Vuex from 'vuex';
import User from './modules/user';
import Title from './modules/title';
import Questions from './modules/questions';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    User,
    Title,
    Questions,
  },
});